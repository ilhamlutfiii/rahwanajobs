<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class SessionTimeout
{
    protected $timeout = 1200; // Timeout dalam detik (misalnya 20 menit)

    public function handle($request, Closure $next)
    {
        if (Auth::check()) {
            $lastActivity = session('lastActivityTime');

            // Cek apakah sesi pengguna sudah melebihi batas waktu (timeout)
            if ($lastActivity && (time() - $lastActivity > $this->timeout)) {
                Auth::logout();  // Logout pengguna

                // Hapus semua data sesi yang tersisa untuk mencegah masalah login ulang
                session()->invalidate();    // Menghapus data sesi lama
                session()->regenerateToken(); // Membuat token CSRF baru

                // Redirect ke halaman login dengan pesan timeout
                return redirect()->route('login')->with('error', 'Session Anda telah habis karena tidak ada aktivitas. Silakan login kembali.');
            }

            // Jika belum timeout, perbarui waktu aktivitas terakhir
            session(['lastActivityTime' => time()]);
        }

        return $next($request);
    }
}
