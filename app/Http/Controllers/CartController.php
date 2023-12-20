<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class CartController extends Controller
{

    public function addToCart(Request $request)
    {
// Lấy thông tin sản phẩm từ request
        $product = $request->id_product;
        $price = $request->price;
//        dd($request);
        $qty = 1;
        $id_user = Auth::user()->id;

        // Kiểm tra xem sản phẩm đã tồn tại trong giỏ hàng chưa
        $existingCartItem = Cart::where('id_product', $product)
            ->where('id_user', $id_user)
            ->first();

        if ($existingCartItem) {
            // Cập nhật số lượng nếu sản phẩm đã tồn tại trong giỏ hàng
            $existingCartItem->qty += $qty;
            $existingCartItem->save();
        } else {
            // Thêm sản phẩm vào giỏ hàng nếu chưa tồn tại
            $gioHang = new Cart();
            $gioHang->id_product = $product;
            $gioHang->qty = $qty;
            $gioHang->id_user = $id_user;
            $gioHang->price = $price;
            $gioHang->save();
        }

        return redirect()->route('san_pham');
    }

    public function delete($id) {
        $cart = Cart::find($id);

        $cart->delete();
        return back();
    }
}
