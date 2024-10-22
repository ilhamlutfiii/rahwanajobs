<?php

namespace App\Http\Controllers;

use App\Models\Loker;
use App\Models\Resume;
use App\Models\Video;
use App\Models\Setting;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        // Ambil parameter pencarian dari request
        $search = $request->input('search');

        // Ambil jumlah pagination dari request (default 2)
        $itemsPerPage = $request->input('items_per_page', 2);

        // Ambil data dengan pagination dan filter berdasarkan pencarian
        $lokers = Loker::when($search, function ($query, $search) {
            return $query->where('bid', 'like', "%{$search}%")
                ->orWhere('nampe', 'like', "%{$search}%");
        })->paginate($itemsPerPage);

        $resumes = Resume::all();
        $videos = Video::all();
        $settings = Setting::all();

        // Kembalikan view dengan data
        return view('awal.home', compact('lokers', 'resumes', 'videos', 'settings'));
    }


    // Fungsi untuk menyimpan resume
    public function submitResume(Request $request)
    {

        try {
            // Validasi data input
            $request->validate([
                'name' => 'required|string|max:255',
                'nomer' => 'required|string|max:20',
                'file_path' => 'required|file|mimes:pdf,jpg,png|max:2048', // Atur ekstensi file yang diizinkan
            ]);

            // Simpan file yang diunggah
            if ($request->hasFile('file_path')) {
                $file = $request->file('file_path');
                $filename = time() . '_' . $file->getClientOriginalName();
                $path = $file->storeAs('uploads/resumes', $filename, 'public'); // Simpan file di direktori storage/public/uploads/resumes

                // Simpan data ke database
                Resume::create([
                    'name' => $request->input('name'),
                    'nomer' => $request->input('nomer'),
                    'file_path' => $path,
                ]);

                return redirect()->back()->with('success', 'Resume berhasil dikirim!');
            }

            return redirect()->back()->with('error', 'Gagal mengunggah file.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }
}
