<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Item;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function index()
    {
        $users = User::all();
        $items = Item::all();
        return view('items', [
            'title' => 'Items Page',
            'users' => $users,
            'items' => $items,
        ]);
    }

    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'user_id'       => 'required|exists:users,id',
            'name'          => 'required|string|max:255',
            'description'   => 'nullable|string',
            'quantity'      => 'required|integer|min:0',
            'price'         => 'required|numeric|min:0',
            'image'         => 'nullable|image|mimes:jpeg,png,jpg|max:4048', // Validasi gambar
        ]);

        // Menangani upload gambar jika ada
        $imagePath = null;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imagePath = $image->store('images', 'public'); // Menyimpan gambar ke folder 'public/images'
        }

        // Membuat item dengan data yang telah divalidasi dan menyertakan path gambar jika ada
        Item::create([
            'user_id' => $request->input('user_id'),
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'quantity' => $request->input('quantity'),
            'price' => $request->input('price'),
            'image' => $imagePath, // Menyimpan path gambar
        ]);

        // Redirect dengan pesan sukses
        return redirect()->route('items.index')->with('success', 'Item created successfully.');
    }


    public function edit(Item $item)
    {
        return view('itemsEdit', compact('item'));
    }

    public function update(Request $request, Item $item)
    {
        // Validasi input dari pengguna
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'quantity' => 'required|integer|min:0',
            'price' => 'required|numeric|min:0',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:4048', // Validasi untuk gambar
        ]);

        // Proses gambar jika ada
        if ($request->hasFile('image')) {
            // Hapus gambar lama dari storage jika ada
            if ($item->image) {
                Storage::delete('public/' . $item->image);
            }

            // Simpan gambar baru dan ambil nama filenya
            $imagePath = $request->file('image')->store('images', 'public');
        } else {
            // Gunakan gambar lama jika tidak ada gambar baru yang diunggah
            $imagePath = $item->image;
        }

        // Update item dengan data baru
        $item->update([
            'user_id' => $request->input('user_id'),
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'quantity' => $request->input('quantity'),
            'price' => $request->input('price'),
            'image' => $imagePath, // Update nama file gambar
        ]);

        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('items.index')->with('success', 'Item updated successfully.');
    }


    public function destroy(Item $item)
    {
        $item->delete();

        return redirect()->route('items.index')->with('success', 'Item deleted successfully.');
    }
}
