<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use \App\Models\Product;

class Gallery extends Model
{
    use HasFactory;
    protected $table = 'gallery';
    public $timestamps = false;
    protected $fillable = ['id_product','image'];

    public function product()
    {
        return $this->belongsTo(Product::class, 'id_product');
    }
}
