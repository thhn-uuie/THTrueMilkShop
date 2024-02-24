<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $table = 'category';
    public $timestamps = false;
    protected $fillable = ['name_category', 'image', 'status', 'created_at', 'created_by'];

    public function products()
    {
        return $this->hasMany(Product::class, 'id_category', 'id');
    }


}
