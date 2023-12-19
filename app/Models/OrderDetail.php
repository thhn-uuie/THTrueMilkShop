<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    use HasFactory;
    protected $table = 'oder_detail';
    public $timestamps = false;
    protected $fillable = ['id_order', 'id_product', 'price', 'id_order', 'number_product'];
}
