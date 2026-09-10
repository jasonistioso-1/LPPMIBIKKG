<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminAuthController extends Controller
{
    /**
     * Show the admin login form.
     */
    public function showLoginForm()
    {
        if (Auth::check()) {
            return redirect()->route('home');
        }
        return view('admin.login');
    }

    /**
     * Handle admin login request.
     */
    public function login(Request $request)
    {
        // Custom strict validation rules
        $request->validate([
            'username' => 'required|string|max:20',
            'password' => [
                'required',
                'string',
                'min:12',
                'regex:/[a-z]/',      // At least one lowercase letter
                'regex:/[A-Z]/',      // At least one uppercase letter
                'regex:/[0-9]/',      // At least one number
                'regex:/[!@#$%^&*(),.?":{}|<>]/', // At least one special symbol
            ],
        ], [
            // Custom descriptive Indonesian error messages
            'username.required' => 'Username wajib diisi.',
            'username.max' => 'Username tidak boleh lebih dari 20 karakter.',
            'password.required' => 'Password wajib diisi.',
            'password.min' => 'Password harus memiliki panjang minimal 12 karakter.',
            'password.regex' => 'Password harus berupa kombinasi dari huruf besar, huruf kecil, angka, dan simbol khusus (misal: !@#$%^&*).',
        ]);

        $credentials = $request->only('username', 'password');

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->route('home')->with('success', 'Selamat datang di LPPM Visual Editor, Administrator!');
        }

        return back()->withErrors([
            'login_failed' => 'Username atau password yang Anda masukkan salah.',
        ])->onlyInput('username');
    }

    /**
     * Handle admin logout.
     */
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('home')->with('success', 'Anda telah berhasil logout.');
    }
}
