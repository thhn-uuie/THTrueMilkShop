<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Gallery;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Intervention\Image\Colors\Profile;
use PHPUnit\Framework\Exception;
use function Laravel\Prompts\alert;

class CartController extends Controller
{

    public function addToCart(Request $request)
    {
        // Lấy thông tin sản phẩm từ request
        $product = $request->id_product;
        $price = Product::where('id', $product)->pluck('price')->first();
        $price_cart = Cart::where('id_product', $product)->update(['price' => $price]);
//        dd($price_cart);
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

        return redirect()->back();
    }

    public function delete(Request $request, string $id)
    {
        if ($request->isMethod('POST')) {
            $cart = Cart::find($id);
            $cart->delete();
        } else {
//            dd('12');
            return view('errors.405');
        }

        return back();
    }
}
