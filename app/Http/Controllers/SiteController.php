<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SiteController extends Controller
{
    public function story() {
        return view('frontend.trang_chu.cau_chuyen_that_th');
    }

    public function product() {
//        $products = Product::all();
        $category = Category::all();
        return view('frontend.trang_chu.san_pham', compact('category'));
    }

    public function promotion() {
        return view('frontend.trang_chu.khuyen_mai');
    }

    public function media() {
        return view('frontend.trang_chu.truyen_thong');
    }

    public function getCategory() {

    }
}
