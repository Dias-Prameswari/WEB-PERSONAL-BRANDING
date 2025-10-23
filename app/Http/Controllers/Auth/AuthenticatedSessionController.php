<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Illuminate\Validation\ValidationException;

class AuthenticatedSessionController extends Controller
{
    /** Tampilkan form login */
    public function create(): View
    {
        return view('auth.login');
    }

    /** Proses login + whitelist 3 email */
    public function store(LoginRequest $request): RedirectResponse
    {
        // Validasi basic (LoginRequest juga sudah validasi)
        $request->validate([
            'email'    => ['required', 'string', 'email'],
            'password' => ['required', 'string'],
        ]);

        // Hanya izinkan email di whitelist
        $allowed = array_filter(config('admin.emails', []));
        if (! in_array($request->email, $allowed, true)) {
            throw ValidationException::withMessages([
                'email' => 'Akses ditolak: akun ini tidak memiliki izin.',
            ]);
        }

        // Lanjut autentikasi Breeze
        $request->authenticate();
        $request->session()->regenerate();

        return redirect()->intended(RouteServiceProvider::HOME);
    }

    /** Logout */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
