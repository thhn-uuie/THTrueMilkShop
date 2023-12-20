<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{

    public function addToCart(Request $request)
    {
//        dd(Auth::user()->id);
        // Lấy thông tin sản phẩm từ request
        $product = $request->id_product;
        $qty = 1;
        $id_user = Auth::user()->id;

        // Thêm sản phẩm vào giỏ hàng
        $gioHang = new Cart();
        $gioHang->id_product = $product;
        $gioHang->qty = $qty;
        $gioHang->id_user = $id_user;
        $gioHang->save();

        return redirect()->route('san_pham');

    }
}
