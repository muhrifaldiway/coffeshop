<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    // Menampilkan daftar pengguna
    public function index()
    {
        $users = User::all(); // Mengambil semua data pengguna
        return view('users', [
            'title' => 'Users Page',
            'users' => $users,
        ]);
    }

    // Memperbarui pengguna
    public function update(Request $request, User $user)
    {
        // Validasi input
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'password' => 'nullable|string|min:8|confirmed', // Password opsional
        ]);

        // Memperbarui data pengguna
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->filled('password') ? Hash::make($request->password) : $user->password,
        ]);

        return redirect()->route('users.index')->with('success', 'Pengguna berhasil diperbarui.');
    }

    // Menghapus pengguna
    public function destroy(User $user)
    {
        $user->delete(); // Menghapus pengguna dari database

        return redirect()->route('users.index')->with('success', 'Pengguna berhasil dihapus.');
    }
}
