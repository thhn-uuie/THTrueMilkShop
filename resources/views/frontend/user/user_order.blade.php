<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Tài khoản của tôi</title>
    @include('frontend.component.head')
    <link href="{{ asset('/public/frontend/css/user_style.css') }}" rel="stylesheet">


</head>

<body id="page-top" class="index header-14-style home-14-style footer-7-style layout-full_width">
<button onclick="topFunction()" id="back-top">
    <i class="fa fa-angle-double-up"></i>
</button>

<div class="tw">
    <div class="menu-header" id="navbar">
        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-fixed-top">
            @include('frontend.component.navbar')
            <!-- /.container-fluid -->
        </nav>
    </div>

    <div class="context">
        <div class="container">
            <span class="item"><a href="#">Người dùng > </a></span>
            <span class="item">Tài khoản > Quản lý đơn hàng</span>
        </div>
    </div>

    <!-- làm tiếp ở đây nẻ -->
    <div class="account">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12"></div>
                <div class="col-lg-3 col-md-3 order-1 col-left-sidebar">
                    <div class="sidebar sidebar-main">
                        <div class="welcome">
                            <label>Xin chào</label>
                            <div class="name">Test</div>
                        </div>
                        @include('frontend.component.sidebar')
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 order-1 col-right-main">
                    <div class="column main">
                        <div class="block-title">
                            <strong>Quản lý đơn hàng</strong>
                        </div>
                        <!-- <button class="action checkout" onclick="clearUserOrders()">Clear</button> -->
                        <div class="block-content order-content">
                            @foreach($order as $ord)
                                <div class="order-container"><strong>Order: #{{$ord->id}}</strong>
                                    @foreach($ord->order_detail() as $item)
                                        <div class="order-item">
                                            <img
                                                src="{{ url('public/admin/img/product') . '/' . $item->product->image[0]->image}}"
                                                class="product-image">
                                            <div class="info">
                                                <div class="product-name">{{$item->product->name_product}}</div>
                                                <div class="product-price">{{$item->price}} đồng</div>
                                                <div class="product-quantity">Số lượng: {{$item->number_product}}</div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>

                                <div class="total-price"><span>Tổng tiền: </span><span id="totalPrice">{{$ord->cost() + 25}} đồng</span>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--  -->

        <div class="footer">
            @include('frontend.component.footer')
        </div>

    </div>

    @include('frontend.component.script')
    <script type="text/javascript">
        let mybutton = document.getElementById("back-top");

        // When the user scrolls down 20px from the top of the document, show the button
        window.onscroll = function () {
            scrollFunction()
        };

        function scrollFunction() {
            if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
                mybutton.style.display = "block";
            } else {
                mybutton.style.display = "none";
            }
        }

        // When the user clicks on the button, scroll to the top of the document
        function topFunction() {
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        }


    </script>
</div>

</body>


</html>
