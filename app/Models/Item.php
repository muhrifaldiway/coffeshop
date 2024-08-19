<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $fillable = [
        'user_id','name', 'image', 'description', 'quantity', 'price',
    ];

    public function itemCategories()
    {
        return $this->hasMany(ItemCategory::class, 'item_id');
    }

    // Relationship with categories (many-to-many)
    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }

    // Relationship with transactions (one-to-many)
    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}

