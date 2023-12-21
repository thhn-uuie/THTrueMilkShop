<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table = 'product';
    public $timestamps = false;
    protected $fillable = ['name_product', 'description', 'price', 'id_category', 'status'];

    public function category()
    {
        return $this->belongsTo(Category::class, 'id_category');
    }

    public function image()
    {
        return $this->hasMany('App\Models\Gallery', 'id_product');
    }

    public function orders()
    {
        return $this->hasMany(OrderDetail::class, 'id_product', 'id');
    }
}
