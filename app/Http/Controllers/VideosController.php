<?php

namespace App\Http\Controllers;

use App\Models\Video;
use App\Models\Setting;
use Illuminate\Http\Request;

class VideosController extends Controller
{
    // Menampilkan daftar video
    public function index()
    {
        $videos = Video::all(); // Ambil semua video
        $settings = Setting::all();
        return view('admin.videos.index', compact('videos', 'settings')); // Tampilkan tampilan dengan daftar video
    }

    // Menampilkan form untuk membuat video baru
    public function create()
    {
        return view('admin.videos.create'); // Tampilkan form pembuatan video baru
    }

    // Menyimpan video baru
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'link' => 'required|url', // Validasi link video
        ]);

        Video::create($validatedData); // Simpan data video

        return redirect()->route('videos.index')->with('success', 'Video created successfully.');
    }

    // Menampilkan detail video
    public function show($id)
    {
        $video = Video::findOrFail($id); // Ambil video berdasarkan ID
        return view('admin.videos.show', compact('video')); // Tampilkan tampilan dengan detail video
    }

    // Menampilkan form untuk mengedit video
    public function edit($id)
    {
        $video = Video::findOrFail($id); // Ambil video berdasarkan ID
        return view('admin.videos.edit', compact('video')); // Tampilkan form edit video
    }

    // Memperbarui video
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'link' => 'required|url', // Validasi link video
        ]);

        $video = Video::findOrFail($id); // Ambil video berdasarkan ID
        $video->name = $request->name;
        $video->link = $request->link;

        $video->save(); // Simpan perubahan

        return redirect()->route('videos.index')->with('success', 'Video updated successfully.');
    }

    // Menghapus video
    public function destroy($id)
    {
        $video = Video::findOrFail($id); // Ambil video berdasarkan ID
        $video->delete(); // Hapus video

        return redirect()->route('videos.index')->with('success', 'Video deleted successfully.');
    }
}
