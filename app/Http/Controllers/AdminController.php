<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Loker;
use App\Models\Resume;
use App\Models\Video;
use App\Models\Setting;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Menampilkan dashboard admin dengan statistik.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        // Menghitung jumlah entri dari setiap tabel
        $settings = Setting::first(); // Ambil data dari tabel settings
        $totalPengunjung = $settings ? $settings->views : 0; // Jika tidak ada data, default ke 0
        $totalLike = $settings ? $settings->likes : 0; // Jika tidak ada data, default ke 0
        $totalUsers = User::count(); // Menghitung jumlah user
        $totalLokers = Loker::count(); // Menghitung jumlah loker
        $totalResumes = Resume::count(); // Menghitung jumlah resume
        $totalVideos = Video::count(); // Menghitung jumlah video

        // Kirim data ke view
        return view('admin.dashboard', compact('totalPengunjung', 'totalLike', 'totalUsers', 'totalLokers', 'totalResumes', 'totalVideos', 'settings'));
    }

    /**
     * Menampilkan halaman untuk mengelola pengguna.
     *
     * @return \Illuminate\View\View
     */
    public function manageUsers()
    {
        $users = User::all();
        return view('admin.users.index', compact('users'));
    }

    /**
     * Fungsi logout untuk admin.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function logout(Request $request)
    {
        auth()->logout();
        return redirect('/login')->with('success', 'Logout berhasil!');
    }
}
