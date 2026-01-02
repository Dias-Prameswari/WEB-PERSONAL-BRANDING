<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactMail;
use App\Models\Lead;

class ContactController extends Controller
{
    public function send(Request $r)
    {
        // optional Turnstile
        if ($r->filled('cf-turnstile-response')) {
            try {
                $ok = Http::asForm()->post(
                    'https://challenges.cloudflare.com/turnstile/v0/siteverify',
                    [
                        'secret' => env('TURNSTILE_SECRET_KEY'),
                        'response' => $r->input('cf-turnstile-response'),
                        'remoteip' => $r->ip()
                    ]
                )->json()['success'] ?? false;

                if (!$ok) {
                    return back()
                        ->withErrors(['captcha' => 'Verifikasi tidak valid.'])
                        ->withInput();
                }
            } catch (\Throwable $e) {
                // simpan ke log biar tidak diam-diam hilang
                logger()->warning('Turnstile error: ' . $e->getMessage());
                return back()
                    ->withErrors(['captcha' => 'Gagal verifikasi.'])
                    ->withInput();
            }
        }

        // validasi form
        $data = $r->validate([
            'name'    => ['required', 'string', 'min:3', 'max:120'],
            'email'   => ['required', 'email', 'max:255'],
            'subject' => ['required', 'string', 'max:150'],
            'message' => ['required', 'string', 'max:2000'],
            'phone'   => ['nullable', 'string', 'max:30'],
            'website' => ['present', 'size:0'], // honeypot
            'cf-turnstile-response' => ['nullable', 'string'],
        ], [
            'website.size' => 'Silakan selesaikan validasi.'
        ]);

        // simpan ke tabel leads juga
        $already = Lead::where('email', $data['email'])
            ->whereDate('created_at', today())
            ->exists();

        if (! $already) {
            Lead::create([
                'name'    => $data['name'],
                'email'   => $data['email'],
                'phone'   => $data['phone'] ?? null,
                // subject dari form kontak kita simpan ke kolom program
                'program' => $data['subject'] ?? 'Kontak Website',
                'message' => $data['message'] ?? null,
            ]);
        }


        // kirim email ke admin (alamat ngikut .env MAIL_FROM_ADDRESS)
        try {
            Mail::to(config('mail.from.address'))
                ->send(new ContactMail((object)$data));
        } catch (\Throwable $e) {
            logger()->warning('Contact mail failed: ' . $e->getMessage());
            // jangan bocorkan error ke user
        }

        return back()->with('ok', 'Terima kasih! Pesan kamu sudah terkirim.');
    }
}
