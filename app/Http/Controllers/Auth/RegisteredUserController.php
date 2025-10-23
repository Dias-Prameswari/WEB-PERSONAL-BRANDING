<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        // validasi basic
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        // ===== IZINKAN HANYA EMAIL WHITELIST =====
        $allowed = array_filter(config('admin.emails', []));
        abort_unless(in_array($request->email, $allowed, true), 403, 'Pendaftaran ditutup');

        // ===== Pastikan total admin <= 3 =====
        $adminCount = \App\Models\User::whereIn('email', $allowed)->count();
        abort_if($adminCount >= 3, 403, 'Kuota admin sudah penuh');

        // ---- baru BUAT user ----
        $user = User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($user));
        Auth::login($user);


        return redirect(RouteServiceProvider::HOME);
    }
}
