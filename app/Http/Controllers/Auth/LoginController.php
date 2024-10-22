<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    // Menampilkan form login
    public function showLoginForm()
    {
        $settings = Setting::all();
        return view('auth.login', compact('settings'));
    }

    // Method redirect setelah login
    protected function authenticated(Request $request, $user)
    {
        // Redirect berdasarkan role pengguna
        if ($user->role === 'admin') {
            return redirect()->route('admin.dashboard'); // Redirect admin ke dashboard
        }

        return redirect()->route('home'); // Redirect user ke home
    }

    public function login(Request $request)
    {
        // Validasi data login
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Cek kredensial pengguna
        if (Auth::attempt($credentials)) {
            $user = Auth::user(); // Dapatkan data pengguna yang sedang login

            // Gunakan authenticated method untuk pengalihan
            return $this->authenticated($request, $user);
        }

        // Jika kredensial tidak cocok, kembalikan error
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->withInput($request->only('email')); // Mengingat input email
    }

    public function logout(Request $request)
    {
        Auth::logout();
        return redirect()->route('login')->with('success', 'You have been logged out successfully.'); // Arahkan ke halaman login setelah logout dengan pesan sukses
    }
}
