<?php

namespace App\Http\Controllers;

use App\Models\Resume;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class ResumesController extends Controller
{
    public function index()
    {
        $resumes = Resume::all();
        $settings = Setting::all();
        return view('admin.resumes.index', compact('resumes', 'settings'));
    }

    public function create()
    {
        return view('admin.resumes.create');
    }

    public function show($id)
    {
        $resume = Resume::findOrFail($id);
        return view('admin.resumes.show', compact('resume'));
    }

    public function edit($id)
    {
        $resume = Resume::findOrFail($id);
        return view('admin.resumes.edit', compact('resume'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'nomer' => 'required|string|max:20',
            'file_path' => 'nullable|file|mimes:pdf,jpg,png|max:2048',
        ]);

        $resume = Resume::findOrFail($id);
        $resume->name = $request->name;
        $resume->nomer = $request->nomer;

        if ($request->hasFile('file_path')) {
            if ($resume->file_path) {
                Storage::delete($resume->file_path);
            }
            $resume->file_path = $request->file('file_path')->store('resumes');
        }

        $resume->save();
        return redirect()->route('resumes.index')->with('success', 'Resume updated successfully.');
    }

    // Menghapus resume
    public function destroy($id)
    {
        $resume = Resume::findOrFail($id);
        if ($resume->file_path) {
            Storage::delete($resume->file_path);
        }
        $resume->delete();
        return redirect()->route('resumes.index')->with('success', 'Resume deleted successfully.');
    }


    // Fungsi untuk menyimpan resume
    public function submitResume(Request $request)
    {
        // Validasi data input
        $request->validate([
            'name' => 'required|string|max:255',
            'nomer' => 'required|string|max:20',
            'file_path' => 'required|file|mimes:pdf,jpg,png|max:2048', // Atur ekstensi file yang diizinkan
        ]);

        // Simpan file yang diunggah
        if ($request->hasFile('file_path')) {
            $file = $request->file('file_path');
            $filename = time() . '_' . preg_replace('/[^a-zA-Z0-9._-]/', '_', $file->getClientOriginalName()); // Ganti karakter tidak valid
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
    }

    public function checkLoginStatus()
    {
        return response()->json([
            'isLoggedIn' => Auth::check()
        ]);
    }
}
