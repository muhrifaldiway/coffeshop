<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\User;
use App\Models\Category;
use App\Models\Transaction;
use App\Models\ItemCategory;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
    
        $users = User::count();
        $items = Item::count();
        $itemCategory = ItemCategory::count();
        $category = Category::count();
        $transactions = Transaction::count();

        return view('admin', [
            'title'             => 'Admin Dashboard',
            'users'             => $users,
            'items'             => $items,
            'itemCategory'      => $itemCategory,
            'category'          => $category,
            'transactions'      => $transactions,
        ]);
        }
}
