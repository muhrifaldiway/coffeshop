<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ItemCategory extends Model
{
    // Nama tabel yang terkait dengan model ini
    protected $table = 'item_category';

    // Atribut yang dapat diisi secara massal
    protected $fillable = ['item_id', 'category_id'];

    // Jika Anda ingin mengatur timestamp ke false (jika tabel Anda tidak menggunakan timestamp)
    public $timestamps = true; // Atur ke false jika tidak menggunakan timestamp

    // Mendefinisikan relasi dengan model Item
    public function item()
    {
        return $this->belongsTo(Item::class, 'item_id');
    }

    // Mendefinisikan relasi dengan model Category
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
}
