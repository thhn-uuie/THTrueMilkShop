<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function story() {
        return view('frontend.trang_chu.cau_chuyen_that_th');
    }

    public function product() {
        return view('frontend.trang_chu.san_pham');
    }

    public function promotion() {
        return view('frontend.trang_chu.khuyen_mai');
    }

    public function media() {
        return view('frontend.trang_chu.truyen_thong');
    }
}
