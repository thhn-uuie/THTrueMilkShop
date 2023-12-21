<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Category;
use App\Models\Gallery;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class SiteController extends Controller
{
    public function story()
    {
        return view('frontend.trang_chu.cau_chuyen_that_th');
    }

    public function product()
    {
//        $products = Product::all();
        $category = Category::all();
        return view('frontend.trang_chu.san_pham', compact('category'));
    }

    public function promotion()
    {
        return view('frontend.trang_chu.khuyen_mai');
    }

    public function media()
    {
        return view('frontend.trang_chu.truyen_thong');
    }

//    public function checkout()
//    {
//        return view('frontend.user.checkout');
//
//    }

    public function show()
    {
        return view('frontend.trang_chu.product_detail');
    }

    public function viewCart()
    {
        $total = DB::table('gio_hang')
            ->where('id_user', Auth::user()->id)
            ->selectRaw('SUM(qty * price) as total')
            ->value('total');
//        dd($total);
        $count = Cart::where('id_user', Auth::user()->id)->get();
        $galleries = collect();
        $qty = collect();
        foreach ($count as $item) {
            $qty->push(['id'=>$item->id, 'id_product'=>$item->id_product, 'qty'=>$item->qty]);
//            echo $qty;
            $idProducts = Gallery::where('id_product', $item->id_product)
                ->distinct('id_product')
                ->pluck('id_product');
            foreach ($idProducts as $idProduct) {
//                echo $idProduct;
                $gallery = Gallery::where('id_product', $idProduct)->first();
                $galleries->push($gallery);
            }

        }
//        echo $qty;
        return view('frontend.trang_chu.view_cart', compact('total', 'galleries', 'qty'));
    }
}
