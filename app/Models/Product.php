<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table = 'product';
    public $timestamps = false;
    protected $fillable = ['name_product', 'image', 'description', 'price', 'id_category', 'status'];

    public function category()
    {
        return $this->belongsTo(Category::class, 'id_category');
    }
}
