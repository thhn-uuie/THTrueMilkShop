<?php

use Illuminate\Support\Facades\Auth;
use App\Models\Cart;

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
            <div class="icon-login">
                <i class="fa fa-solid fa-user fa-lg"></i>

                @if($authCheck == false)
                    <a href="{{ asset('/login') }}">
                        <span class="">Đăng nhập</span>
                        <span>Tài khoản</span>
                    </a>

                @else
                    <a style="font-size: 14px">{{ Auth::user()->name }}</a>
                @endif
            </div>
        </div>
{{--        <?php $count = Cart::where('id_user', Auth::user()->id)->get(); ?>--}}

{{--        @if($authCheck == false || ($authCheck==true && $count == null))--}}
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
{{--        @else--}}
            <div class="cart">
                <div class="icon-cart" onclick="toggleCartDropdown()">
                    <i class="fa fa-solid fa-cart-shopping fa-lg"></i>
{{--                    @if($count !== null)--}}
                        {{--                        {{dd('123')}}--}}
{{--                        <span>{{ $count->count() }}</span>--}}
{{--                    @else--}}
                        <span>0</span>
{{--                    @endif--}}
                </div>

                <div class="cart-dropdown">
                    <div class="header">
                        Thông tin giỏ hàng
                    </div>
                    <div class="product-info">
                        <div class="cart-item">
                            <img
                                src="https://www.thmilk.vn/wp-content/uploads/2019/11/UHT-nguyen-chat-1L_275x186.png">
                            <div class="close-icon">
                                <svg class="svg-inline--fa fa-circle-xmark" aria-hidden="true" focusable="false"
                                     data-prefix="fas" data-icon="circle-xmark" role="img"
                                     xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg="">
                                    <path fill="currentColor"
                                          d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM175 175c9.4-9.4 24.6-9.4 33.9 0l47 47 47-47c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9l-47 47 47 47c9.4 9.4 9.4 24.6 0 33.9s-24.6 9.4-33.9 0l-47-47-47 47c-9.4 9.4-24.6 9.4-33.9 0s-9.4-24.6 0-33.9l47-47-47-47c-9.4-9.4-9.4-24.6 0-33.9z"></path>
                                </svg><!-- <i class="fas fa-times-circle"></i> Font Awesome fontawesome.com --></div>
                            <div class="info">
                                <div class="product-name">Sữa Tươi Tiệt Trùng Nguyên Chất 1 L</div>
                                <div class="product-price">37200 ₫</div>
                                <div class="product-quantity">Số lượng: 1</div>
                            </div>
                        </div>
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
{{--        @endif--}}
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
