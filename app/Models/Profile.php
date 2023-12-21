<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;
    protected $table = 'profile';
    public $timestamps = false;
    protected $fillable = ['name', 'birthday', 'gender', 'phone', 'address', 'id_user', 'image'];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }
}
