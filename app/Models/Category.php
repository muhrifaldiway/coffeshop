<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'name',
    ];

    // Relationship with items (many-to-many)
    public function items()
    {
        return $this->belongsToMany(Item::class);
    }

    public function itemCategories()
    {
        return $this->hasMany(ItemCategory::class, 'category_id');
    }
}

