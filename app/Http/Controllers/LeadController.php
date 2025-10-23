<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lead;
use Illuminate\Support\Facades\Http;
use Symfony\Component\HttpFoundation\StreamedResponse;
use Illuminate\Support\Facades\Mail;
use App\Mail\NewLeadMail;
/** @var \Illuminate\Contracts\Pagination\LengthAwarePaginator $leads */


class LeadController extends Controller
{
    public function create() { return view('leads.create'); }

    
    // == NEW: list di dashboard ==
    public function index(Request $request)
    {
        $q = trim($request->get('q', ''));
        $leads = Lead::query()
            ->when($q, fn($qq) => $qq->where(function($w) use ($q) {
                $w->where('name','like',"%$q%")
                  ->orWhere('email','like',"%$q%")
                  ->orWhere('phone','like',"%$q%");
            }))
            ->latest()
            ->paginate(20)
            ->appends($request->query());

        return view('leads.admin.index', compact('leads', 'q'));
    }

    // == NEW: export CSV cepat ==
    public function export(): StreamedResponse
    {
        $filename = 'leads_'.now()->format('Ymd_His').'.csv';

        $headers = [
            'Content-Type'        => 'text/csv',
            'Content-Disposition' => "attachment; filename=\"$filename\"",
        ];

        return response()->stream(function () {
            $out = fopen('php://output', 'w');
            fputcsv($out, ['ID','Name','Email','Phone','Program','Message','Created At']);

            Lead::orderBy('id')->chunk(100, function ($chunk) use ($out) {
                foreach ($chunk as $row) {
                    fputcsv($out, [
                        $row->id,
                        $row->name,
                        $row->email,
                        $row->phone,
                        $row->program,
                        preg_replace("/\s+/"," ", (string) $row->message),
                        $row->created_at?->format('Y-m-d H:i:s'),
                    ]);
                }
            });

            fclose($out);
        }, 200, $headers);
    }

    // == PERKUAT store(): validasi + anti-duplikat + email notif ==
    public function store(Request $request)
    {
        if ($request->filled('cf-turnstile-response')) {
    try {
        $resp = Http::asForm()->post('https://challenges.cloudflare.com/turnstile/v0/siteverify', [
            'secret'   => env('TURNSTILE_SECRET_KEY'),
            'response' => $request->input('cf-turnstile-response'),
            'remoteip' => $request->ip(),
        ])->json();

        if (!($resp['success'] ?? false)) {
            return back()->withErrors(['captcha' => 'Verifikasi tidak valid.'])->withInput();
        }
    } catch (\Throwable $e) {
        logger()->warning('Turnstile error: '.$e->getMessage());
        return back()->withErrors(['captcha' => 'Gagal memverifikasi.'])->withInput();
    }
}

        $data = $request->validate([
            'name'    => ['required','string','min:3','max:120'],
            'email'   => ['required','email','max:255'],
            'phone'   => ['nullable','string','max:40'],
            'program' => ['nullable','string','in:Newsletter,Pelatihan Branding,Konsultasi 1:1','max:100'],
            'message' => ['nullable','string','max:2000'],
            'website' => ['present','size:0'], // honeypot
            'cf-turnstile-response' => ['nullable','string'], // biar aman kalau belum aktif
        ], [
            'website.size' => 'Silakan selesaikan validasi.',
        ]);

        // Anti-duplikat: 1 email sekali per hari
        $already = Lead::where('email',$data['email'])
            ->whereDate('created_at', today())
            ->exists();

        if ($already) {
            return back()->with('ok','Terima kasih! Data kamu sudah kami terima hari ini.');
        }

        $lead = Lead::create($data);

        // Email notifikasi ke admin
        try {
            $admin = config('mail.from.address'); // pastikan di .env sudah benar
            if ($admin) {
                Mail::to($admin)->send(new NewLeadMail($lead));
            }
        } catch (\Throwable $e) {
            // jangan gagalkan user; cukup diam/log jika perlu
            logger()->warning('Lead mail failed: '.$e->getMessage());
        }

        return back()->with('ok', 'Terima kasih! Kami akan menghubungi Anda.');
    }
}