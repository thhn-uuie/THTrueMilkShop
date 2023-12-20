<html lang="en" class="mdl-js">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Tài khoản của tôi</title>
    <link href="{{ asset('/public/frontend/css/user_style.css') }}" rel="stylesheet">
    @include('frontend.component.head')
</head>

<body id="page-top" class="index header-14-style home-14-style footer-7-style layout-full_width"
      cz-shortcut-listen="true">
<button onclick="topFunction()" id="back-top" style="display: block;">
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
            <span class="item"><a href="{{ asset('/') }}">Trang chủ &gt; </a></span>
            <span class="item"><a href="{{ asset('/') }}">Sản phẩm &gt; </a></span>
            <span class="item">Xem giỏ hàng</span>
        </div>
    </div>

    <!-- làm tiếp ở đây nẻ -->
    <div class="account">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <h2 class="page-title">
                        <span>Giỏ hàng</span>
                    </h2>
                    <div class="column main">
                        <div class="cart-container">
                            <div class="cart-summary">
                                <strong class="summary title">Tóm tắt</strong>
                                <div class="cart-total">
                                    <div class="total">
                                        <p>Tổng tiền</p>
                                        <strong><span id="cartViewTotal" class="price">{{$total}} ₫</span></strong>
                                    </div>
                                    <div class="btn-wrap"><a class="btn-continue" href="/user/checkout.html">Thanh
                                            toán</a></div>
                                </div>
                            </div>
                            <div class="form-cart">

                            @foreach($galleries as $item)
                                    <div class="order-item"><img
                                        src="{{ url('public/admin/img/product') . '/' . $item->image}}" style="width: 30%; height:100px;"
                                        class="product-image">
                                    <div class="info">
                                        <div class="product-name" style="font-size:22px; font-weight: 400">{{ $item->product->name_product }}</div>
                                        <div class="product-price">{{ $item->product->price }} ₫</div>
                                        <div class="product-quantity">Số lượng: {{ $qty->where('id_product', $item->id_product)->pluck('qty')->first()}}</div>
                                        <form action="{{ route('cart.delete', ['id'=>$qty->where('id_product', $item->id_product)->pluck('id')->first()]) }}"
                                              method="post">
                                            <button class="trash-icon"><i class="fa-solid fa-trash"></i></button>
                                            @csrf
                                        </form>

                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
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


</body>
</html>
