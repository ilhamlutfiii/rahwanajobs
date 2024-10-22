<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    // Menampilkan daftar pengguna
    public function index()
    {
        $users = User::all(); // Ambil semua pengguna
        $settings = Setting::all();
        return view('admin.users.index', compact('users', 'settings')); // Tampilkan tampilan dengan daftar pengguna
    }

    // Menampilkan form untuk membuat pengguna baru
    public function create()
    {
        return view('admin.users.create'); // Tampilkan form pembuatan pengguna baru
    }

    // Menyimpan pengguna baru
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8',
            'role' => 'required|in:admin,user',
        ]);

        // Hash password sebelum menyimpannya
        $validatedData['password'] = Hash::make($validatedData['password']);

        User::create($validatedData);

        return redirect()->route('users.index')->with('success', 'User created successfully.');
    }


    // Menampilkan detail pengguna
    public function show($id)
    {
        $user = User::findOrFail($id); // Ambil pengguna berdasarkan ID
        return view('admin.users.show', compact('user')); // Tampilkan tampilan dengan detail pengguna
    }

    // Menampilkan form untuk mengedit pengguna
    public function edit($id)
    {
        $user = User::findOrFail($id); // Ambil pengguna berdasarkan ID
        return view('admin.users.edit', compact('user')); // Tampilkan form edit pengguna
    }

    // Memperbarui pengguna
    public function update(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $id,
            'role' => 'required|in:admin,user',
            'password' => 'nullable|string|min:8|confirmed',
        ]);

        $user = User::findOrFail($id); // Ambil pengguna berdasarkan ID
        $user->name = $request->name;
        $user->email = $request->email;
        $user->role = $request->role;

        if ($request->filled('password')) {
            $user->password = Hash::make($request->password); // Hash password jika diisi
        }

        $user->save(); // Simpan perubahan

        return redirect()->route('users.index')->with('success', 'User updated successfully.');
    }

    // Menghapus pengguna
    public function destroy($id)
    {
        $user = User::findOrFail($id); // Ambil pengguna berdasarkan ID
        $user->delete(); // Hapus pengguna

        return redirect()->route('users.index')->with('success', 'User deleted successfully.');
    }
}
