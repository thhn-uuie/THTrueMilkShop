<?php

namespace App\Models;

use App\Http\Controllers\CartController;
use App\Http\Controllers\ProductController;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;
    protected $table = 'gio_hang';
    public $timestamps = false;
    protected $fillable = ['id_product', 'price'];
    public function product()
    {
        return $this->belongsTo(ProductController::class, 'id_product');
    }
}
