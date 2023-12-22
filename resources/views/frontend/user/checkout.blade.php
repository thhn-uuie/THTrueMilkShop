<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Thanh toán</title>
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
            <span class="item">Tài khoản > Thanh toán</span>
        </div>
    </div>

    <!-- làm tiếp ở đây nẻ -->
    <div class="container">
        <div class="account shipping">
            <div class="row">
                <div class="col-lg-12 col-md-12"></div>

                <div class="col-lg-8 col-md-8 order-1">
                    <div class="column main">
                        <form method="POST" action="{{ route('user.order.create') }}" enctype="multipart/form-data" id="checkout">
                                @csrf
                            <div class="block-title h3">
                                <span style="font-weight: 600;">ĐỊA CHỈ GIAO HÀNG</span>
                                <div class="item">
                                    <div class="address">
                                        <div class="name">

                                        </div>
                                        <div class="phone">

                                        </div>
                                        <div class="addr">

                                        </div>
                                        <div class="btns">
                                            <a href="#address" data-toggle="collapse"> <i class="fa fa-lg fa-edit"></i></a>
                                        </div>

                                    </div>
                                </div>
                            </div>

                            <a class="btn btn-primary" href="#address" data-toggle="collapse">Tạo địa chỉ</a>

                            <div class="form-address collapse" id="address">
                                <!-- <form action=""> -->
                                <div class="row">
                                    <div class="col-xs-6">
                                        <label for="name">Họ và tên <i style="color: red;">*</i></label>
                                        <input type="text" name="name" id="name" required>
                                    </div>

                                    <div class="col-xs-6">
                                        <label for="tel">Số điện thoại <i style="color: red;">*</i></label>
                                        <input type="tel" name="tel" id="tel" required>
                                    </div>

                                    <div class="col-xs-6">
                                        <label for="addr">Địa chỉ <i style="color: red;">*</i></label>
                                        <input type="text" name="addr" id="addr" required>
                                    </div>

                                    <!-- <div class="col-xs-12">
                                        <button type="submit">Lưu địa chỉ</button>
                                    </div> -->
                                </div>
                                <!-- </form> -->
                            </div>
                            <!-- <button class="action checkout" onclick="clearUserOrders()">Clear</button> -->
                            <div class="block-content ship-content">
                                <span>Ghi chú</span>
                                <textarea name="note" id="note" cols="15" rows="5"></textarea>
                            </div>

                            <div class="thanh_toan">
                                <p class="h3" style="font-weight: 600; text-transform: uppercase;">Phương thức thanh
                                    toán</p>
                                <div class="shp">
                                    <input type="radio" value="thanhtoan" name="thanhtoan" id="thanhtoan">
                                    <label for="thanhtoan">Thanh toán khi nhận hàng</label>
                                </div>
                            </div>

                            <div class="submit">
                                <button type="submit">Thanh toán</button>
                            </div>


                        </form>

                    </div>
                </div>

                <div class="col-lg-4 col-md-4 col-sm-12 order-1 right-shipping">
                    <div class="column main">
                        <div class="block-title h3">Tóm tắt đơn hàng</div>

                        <div class="block-content shipping-content">
                            <div class="total_price">
                                <span>Tổng tiền</span>
                                <p class="price">{{$total}} đồng</p>
                            </div>

                            <div class="total-ship">
                                <span>Phí giao hàng</span>
                                <p class="price-ship">25.000 đồng</p>
                            </div>

                            <div class="total-grand">
                                <span>Tổng thanh toán</span>
                                <p class="amount">{{$total + 25000}} đồng</p>
                            </div>
                        </div>

                        <a href="#sp_cart" class="btn btn-info" data-toggle="collapse">
                            <span class="h4">{{count($galleries)}} Sản phẩm trong giỏ </span>
                            <i class="fa fa-angle-down" aria-hidden="true"></i>
                        </a>
                        <div id="sp_cart" class="collapse">
                            @foreach($galleries as $item)
                            <div class="product">
                                <div class="row">
                                    
                                    <div class="col-lg-4 col-xs-12">
                                        <img
                                            src="{{ url('public/admin/img/product') . '/' . $item->image}}"
                                            width="78" height="78"
                                            alt="{{$item->product->name_product}}"
                                            title="{{$item->product->name_product}}">
                                    </div>
                                    <div class="col-lg-5 col-xs-12">
                                        <div class="product-item-name-block">
                                            <p class="product-item-name">{{$item->product->name_product}}</p>
                                            <div class="details-qty">
                                                <span>Số lượng</span>
                                                <span class="value">{{$qty->where('id_product', $item->id_product)->pluck('qty')->first()}}</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-xs-12">
                                            <span class="cart-price">
                                                {{$qty->where('id_product', $item->id_product)->pluck('qty')->first() * $item->product->price }}
                                            </span>
                                    </div>
                                </div>
                            </div>
                            @endforeach
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

    // Lắng nghe sự kiện nhập liệu vào trường input
    const nameInput = document.getElementById('name');
    const phoneInput = document.getElementById('tel');
    const addrInput = document.getElementById('addr');


    nameInput.addEventListener('input', function (event) {
        // Cập nhật nội dung của div dựa trên giá trị đã nhập
        $('.name').html("<strong>Họ và tên:</strong> " + event.target.value);
    });

    phoneInput.addEventListener('input', function (event) {
        // Cập nhật nội dung của div dựa trên giá trị đã nhập
        $('.phone').html("<strong>Số điện thoại:</strong> " + event.target.value);
    });

    addrInput.addEventListener('input', function (event) {
        // Cập nhật nội dung của div dựa trên giá trị đã nhập
        $('.addr').html("<strong>Địa chỉ:</strong> " + event.target.value);
    });

</script>

</body>

</html>
