<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Category;
use App\Models\ItemCategory;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ItemCategoryController extends Controller
{
    // Menampilkan daftar semua item_category
    public function index()
    {
        $itemCategories = ItemCategory::all();
        $items = Item::all();
        $categories = Category::all();
        return view('itemCategories', [
            'title' => 'Item Categories Page',
            'itemCategories' => $itemCategories,
            'items' => $items,
            'categories' => $categories,
        ]);
    }

    // Menambahkan item_category baru
    public function store(Request $request)
    {
        $request->validate([
            'item_id' => 'required|exists:items,id',
            'category_id' => 'required|exists:categories,id',
        ]);

        $itemCategory = ItemCategory::create($request->all());

        return redirect()->route('item-categories.index')->with('success', 'Item Category created successfully.');
    }

    // Mengupdate item_category tertentu
    public function update(Request $request, $id)
    {
        $request->validate([
            'item_id' => 'required|exists:items,id',
            'category_id' => 'required|exists:categories,id',
        ]);

        $itemCategory = ItemCategory::findOrFail($id);
        $itemCategory->update($request->all());

        return redirect()->route('item-categories.index')->with('success', 'Item Category updated successfully.');
    }

    // Menghapus item_category tertentu
    public function destroy($id)
    {
        $itemCategory = ItemCategory::findOrFail($id);
        $itemCategory->delete();

        return redirect()->route('item-categories.index')->with('success', 'Item Category deleted successfully.');
    }
}
