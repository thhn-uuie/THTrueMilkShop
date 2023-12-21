<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $table = 'order';
    public $timestamps = false;
    protected $fillable = ['id_user', 'note', 'order_date', 'status', 'name', 'tel', 'add'];

    public function order_detail()
    {
        return OrderDetail::where('id_order',$this->id)->get();
    }

    public function cost()
    {
        $order = OrderDetail::where('id_order',$this->id)->get();
        $sum = 0;
        foreach($order as $ord) {
            $sum = $sum +  $ord->number_product * $ord->price;
        }
        return $sum;
    
    }

}
