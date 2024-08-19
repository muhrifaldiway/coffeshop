<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Models\Item; // Tambahkan ini
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function index()
    {
        $items = Item::all();
        $transactions = Transaction::with('item')->latest()->get();
        return view('transactions', [
            'title' => 'Transactions Page',
            'items' => $items,
            'transactions' => $transactions,
        ]);
    }

    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'item_id' => 'required|exists:items,id',
            'quantity' => 'required|integer|min:1',
        ]);

        // Temukan item terkait
        $item = Item::findOrFail($request->item_id);

        // Hitung total harga
        $total_price = $item->price * $request->quantity;

        // Simpan transaksi
        Transaction::create([
            'item_id' => $request->item_id,
            'quantity' => $request->quantity,
            'total_price' => $total_price,
        ]);

        // Perbarui jumlah item setelah transaksi
        $item->decrement('quantity', $request->quantity);

        return redirect()->route('transactions.index')->with('success', 'Transaction recorded successfully.');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'item_id' => 'required|exists:items,id',
            'quantity' => 'required|integer|min:1',
        ]);

        $transaction = Transaction::findOrFail($id);
        $item = Item::findOrFail($request->item_id);
        $oldItem = Item::findOrFail($transaction->item_id);
        
        // Calculate new total price
        $total_price = $item->price * $request->quantity;
        
        // Update transaction record
        $transaction->update([
            'item_id' => $request->item_id,
            'quantity' => $request->quantity,
            'total_price' => $total_price,
        ]);
        
        // Adjust item quantities
        $item->decrement('quantity', $request->quantity - $transaction->quantity);
        $oldItem->increment('quantity', $transaction->quantity);

        return redirect()->route('transactions.index')->with('success', 'Transaction updated successfully.');
    }
    
    public function destroy($id)
    {
        $transaction = Transaction::findOrFail($id);
        $item = Item::findOrFail($transaction->item_id);

        // Restore item quantity
        $item->increment('quantity', $transaction->quantity);

        // Delete transaction
        $transaction->delete();

        return redirect()->route('transactions.index')->with('success', 'Transaction deleted successfully.');
    }
}
