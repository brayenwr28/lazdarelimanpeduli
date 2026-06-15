<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    /**
     * Show register form
     */
    public function showRegisterForm()
    {
        return view('register');
    }

    /**
     * Handle registration
     */
    public function register(Request $request)
    {
        // Validasi input
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|unique:users',
            'phone' => 'required|string|min:10',
            'password' => 'required|string|min:8|confirmed',
            'agree_terms' => 'required|accepted',
        ], [
            'name.required' => 'Nama wajib diisi',
            'email.required' => 'Email wajib diisi',
            'email.unique' => 'Email sudah terdaftar',
            'phone.required' => 'No HP wajib diisi',
            'password.required' => 'Password wajib diisi',
            'password.min' => 'Password minimal 8 karakter',
            'password.confirmed' => 'Password tidak cocok',
            'agree_terms.required' => 'Anda harus setuju dengan syarat & ketentuan',
        ]);

        // Hash password
        $validated['password'] = Hash::make($validated['password']);

        // Buat user baru
        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'phone' => $validated['phone'],
            'password' => $validated['password'],
            'is_active' => true,
            'role' => 'user', // Default role
        ]);

        return redirect('/login')->with('success', 'Akun Anda berhasil dibuat. Silakan login.');
    }

    /**
     * Show login form
     */
    public function showLoginForm()
    {
        return view('login');
    }

    /**
     * Handle login
     */
    public function login(Request $request)
    {
        // Validasi input
        $credentials = $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ], [
            'email.required' => 'Email wajib diisi',
            'password.required' => 'Password wajib diisi',
        ]);

        // Cek apakah user ada & password benar
        if (Auth::attempt($credentials, $request->boolean('remember'))) {
            // Generate ulang session token untuk security
            $request->session()->regenerate();

            if (Auth::user()->role === 'admin') {
                return redirect()->intended('/admin/dashboard')->with('success', 'Selamat datang di Panel Admin, ' . Auth::user()->name . '!');
            }

            return redirect()->intended('/donasi')->with('success', 'Selamat datang kembali, ' . Auth::user()->name . '!');
        }

        // Login gagal
        throw ValidationException::withMessages([
            'email' => 'Email atau password salah.',
        ]);
    }

    /**
     * Handle logout
     */
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/')->with('success', 'Anda telah logout.');
    }

    /**
     * Show user profile (optional)
     */
    public function profile()
    {
        return view('profile', ['user' => Auth::user()]);
    }

    /**
     * Update profile (optional)
     */
    public function updateProfile(Request $request)
    {
        $user = Auth::user();

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|min:10',
            'address' => 'nullable|string|max:500',
            'city' => 'nullable|string|max:100',
            'province' => 'nullable|string|max:100',
        ]);

        $user->update($validated);

        return back()->with('success', 'Profil Anda berhasil diperbarui.');
    }
}

