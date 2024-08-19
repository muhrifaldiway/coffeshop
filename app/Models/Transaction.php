<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $fillable = [
        'item_id', 'quantity', 'total_price',
    ];

    protected $casts = [
        'transaction_date' => 'datetime',
    ];

    // Relationship with item (one-to-many)
    public function item()
    {
        return $this->belongsTo(Item::class);
    }
}
