<?php

namespace App\Http\Controllers;

use App\Models\Loker;
use App\Models\Setting;
use Illuminate\Http\Request;

class LokersController extends Controller
{
    public function index()
    {
        $lokers = Loker::all();
        $settings = Setting::all();
        return view('admin.lokers.index', compact('lokers', 'settings'));
    }

    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'bid' => 'required|string|max:255',
            'nampe' => 'required|string|max:255',
            'kual' => 'required|string',
            'job' => 'required|string',
            'dl' => 'required|date',
        ]);

        // Simpan data loker
        Loker::create([
            'bid' => $request->bid,
            'nampe' => $request->nampe,
            'kual' => json_encode(explode(',', $request->kual)), // Ubah menjadi JSON
            'job' => json_encode(explode(',', $request->job)),   // Ubah menjadi JSON
            'dl' => $request->dl,
        ]);

        return redirect()->route('lokers.index')->with('success', 'Loker berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $loker = Loker::findOrFail($id);
        return response()->json($loker); // Mengembalikan data loker untuk keperluan edit
    }
    
    public function update(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            'bid' => 'required|string|max:255',
            'nampe' => 'required|string|max:255',
            'kual' => 'required|string',
            'job' => 'required|string',
            'dl' => 'required|date',
        ]);
    
        // Temukan loker berdasarkan ID
        $loker = Loker::findOrFail($id);
        // Update data loker
        $loker->update([
            'bid' => $request->bid,
            'nampe' => $request->nampe,
            'kual' => json_encode(explode(',', $request->kual)), // Ubah menjadi JSON
            'job' => json_encode(explode(',', $request->job)),   // Ubah menjadi JSON
            'dl' => $request->dl,
        ]);
        
    
        return redirect()->route('lokers.index')->with('success', 'Loker berhasil diperbarui.');
    }
    
    public function destroy($id)
    {
        // Temukan loker berdasarkan ID dan hapus
        $loker = Loker::findOrFail($id);
        $loker->delete();
    
        return redirect()->route('lokers.index')->with('success', 'Loker berhasil dihapus.');
    }
}    

