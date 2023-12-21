<?php

use Illuminate\Support\Facades\Auth;
use App\Models\Cart;
use App\Models\Gallery;

?>
<div class="container">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header page-scroll">
        <button type="button" class="navbar-toggle" data-toggle="collapse"
                data-target="#bs-example-navbar-collapse-1">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a href="{{ asset('/') }}" id="logo" class="l">
            <img src="https://www.thmilk.vn/wp-content/themes/wp-th/assets/images/logo.png?>" alt="logo">
        </a>
    </div>

    <?php $authCheck = Auth::check(); ?>
        <!-- Shopping cart tạm thế đã -->
    <div class="navbar-nav navbar-right">
        <div class="login">
            

                @if($authCheck == false)
                <div class="icon-login">
                <i class="fa fa-solid fa-user fa-lg"></i>
                    <a href="{{ route('frontend.auth.login') }}">
                        <span class="log">Đăng nhập</span>
                        <span>Tài khoản</span>
                    </a>
                    </div>
                @else
                <div class="icon-login active">
                <i class="fa fa-solid fa-user fa-lg"></i>
                    <a class="act1" style="font-size: 14px">{{ Auth::user()->name }}</a>
                    <a class="act2" href="{{ route('frontend.auth.logout') }}">Logout</a>
                    </div>
                @endif
        </div>

        @if($authCheck == false)
            <div class="cart">
                <div class="icon-cart" onclick="toggleCartDropdown()">
                    <i class="fa fa-solid fa-cart-shopping fa-lg"></i>
                    <span>0</span>
                </div>

                <div class="cart-dropdown">
                    <div class="header">
                        Thông tin giỏ hàng
                    </div>
                    <div class="product-info">
                        <!-- Dynamic content will be added here -->
                    </div>
                    <div class="total-price">
                        <span class="label">Tổng tiền: </span>
                        <span id="totalPrice">0 ₫</span>
                    </div>
                    <div class="actions">
                        <div class="action viewcart">Xem giỏ hàng</div>
                        <div class="action checkout">Thanh toán</div>
                    </div>
                </div>
            </div>
        @else
                <?php $count = Cart::where('id_user', Auth::user()->id)->get(); ?>
            <div class="cart">
                <div class="icon-cart" onclick="toggleCartDropdown()">
                    <i class="fa fa-solid fa-cart-shopping fa-lg"></i>
                    @if($count -> isNotEmpty())
                        <span>{{ $count->count() }}</span>
                    @else
                        <span>0</span>
                    @endif
                </div>

                        <div class="cart-dropdown">
                            <div class="header">
                                Thông tin giỏ hàng
                            </div>

                            <div class="product-info">
                            @foreach($count as $item)
                                <?php
                                    $idProducts = Gallery::where('id_product', $item->id_product)
                                        ->distinct('id_product')
                                        ->pluck('id_product');

                                    $galleries = collect();

                                    foreach ($idProducts as $idProduct) {
                                        $gallery = Gallery::where('id_product', $idProduct)->first();
                                        $galleries->push($gallery);
                                    }
                                    ?>

                                @foreach($galleries as $gallery)
                                <div class="cart-item">
                                    <img
                                        src="{{ url('public/admin/img/product') . '/' . $gallery->image}}">
                                    <div class="close-icon">
                                        <svg class="svg-inline--fa fa-circle-xmark" aria-hidden="true" focusable="false"
                                             data-prefix="fas" data-icon="circle-xmark" role="img"
                                             xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg="">
                                            <path fill="currentColor"
                                                  d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM175 175c9.4-9.4 24.6-9.4 33.9 0l47 47 47-47c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9l-47 47 47 47c9.4 9.4 9.4 24.6 0 33.9s-24.6 9.4-33.9 0l-47-47-47 47c-9.4 9.4-24.6 9.4-33.9 0s-9.4-24.6 0-33.9l47-47-47-47c-9.4-9.4-9.4-24.6 0-33.9z"></path>
                                        </svg><!-- <i class="fas fa-times-circle"></i> Font Awesome fontawesome.com -->
                                    </div>
                                    <div class="info">
                                        <div class="product-name">{{ $gallery->product->name_product }}</div>
                                        <div class="product-price">{{$gallery->product->price}}₫</div>
                                        
                                        <div class="product-quantity">Số lượng: {{$item->qty}}</div>
                                    </div>
                                </div>
                                @endforeach
                                @endforeach
                            </div>
                           

                            <div class="total-price">
                                <?php $total = DB::table('gio_hang')
                                    ->where('id_user', Auth::user()->id)
                                    ->selectRaw('SUM(qty * price) as total')
                                    ->value('total');
                                ?>
                                <span class="label">Tổng tiền:  </span>
                                <span id="totalPrice">{{ $total }} ₫</span>
                            </div>
                            <div class="actions">
                                <div class="action viewcart">Xem giỏ hàng</div>
                                <div class="action checkout">Thanh toán</div>
                            </div>
                        </div>


            </div>
        @endif
    </div>
    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav navbar-right">
            <li class="hidden">
                <a href="#page-top"></a>
            </li>
            <li class="page-scroll">
                <a href="{{ route('cau_chuyen_that_th') }}" class="click">CÂU CHUYỆN THẬT TH</a>
            </li>
            <li class="page-scroll">
                <a href="{{ route('san_pham') }}">SẢN PHẨM</a>

            </li>

            </li>

            <li class="page-scroll">
                <a href="{{ route('khuyen_mai') }}">Khuyến mãi</a>
            </li>
            <li class="page-scroll">
                <a href="#">Cửa hàng</a>
            </li>
            <li class="page-scroll">
                <a href="{{ route('truyen_thong') }}">Truyền thông</a>

            </li>

            </li>
            <!-- <li class="page-scroll">
                <a href="#">Tuyển dụng</a>
            </li> -->
        </ul>
    </div>
    <!-- /.navbar-collapse -->
</div>
<script src="{{ asset('/public/frontend/js/app.js') }}"></script>
