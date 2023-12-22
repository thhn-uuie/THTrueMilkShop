<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Sữa tươi tiệt trùng – True Happiness</title>

    @include('frontend.component.head')
</head>

<body id="page-top" class="index">
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
                <span class="item"><a href="{{ asset('/') }}">Trang chủ > </a></span>
                <span class="item">Sản phẩm > Sữa tươi tiệt trùng</span>
            </div>
        </div>

        <div class="detail">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-sm-4">
                        <div class="box1">
                            <?php $galleryProduct = \App\Models\Gallery::where('id_product', $product->id)->get();?>
                            <div class="img1">
                                <a href="{{ url('public/admin/img/product') . '/' . $galleryProduct->first()->image }}" target="_blank">
                                    <img role="presentation" alt=""
                                         src="{{ url('public/admin/img/product') . '/' . $galleryProduct->first()->image }}">
                                </a>

                            </div>

                            <div class="owl-img">
                                <div class="owl-carousel owl-theme " id="owl-img">
                                    <?php $items = $galleryProduct->slice(1); ?>
                                    @foreach($items as $i)
                                        <div class="item">
                                            <a href="{{ url('public/admin/img/product') . '/' . $i->image }}" target="_blank">
                                                <img
                                                    src="{{ url('public/admin/img/product') . '/' . $i->image }}"
                                                    alt="">
                                            </a>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xs-12 col-sm-8">
                        <div class="tittle product-name">
                            <h1 class="h3">{{ $product->name_product }}</h1>
                        </div>
                        <div class="p price"><strong>{{ $product->price }} ₫</strong></div>
                        <div class="info_box">

{{--                            <ul class="info_list">--}}
{{--                                <li><img class="icon" src="https://www.thmilk.vn/wp-content/uploads/2019/11/Shape-1.png"--}}
{{--                                        alt="shape-2">--}}
{{--                                    Quy cách đóng gói: lốc 4 chai</li>--}}

{{--                                <li><img class="icon" src="https://www.thmilk.vn/wp-content/uploads/2019/11/drop-2.png"--}}
{{--                                        alt="drop-4">--}}
{{--                                    Dung tích: 180ml/chai</li>--}}
{{--                            </ul>--}}
                        </div>

                        <div class="nd3">
                            <form method="post" action="{{ route('cart.add') }}">
                                @csrf

                                    @guest
                                        <button type="button" onclick="showLoginAlert()" class="btn btn-primary">
                                            <i class="fa fa-shopping-cart"></i>
                                            Thêm vào giỏ hàng
                                        </button>
                                    @else
                                        <button name="id_product" value="{{ $product->id }}"
                                                type="submit" class="btn btn-primary">
                                            <input type="hidden" name="price"
                                                   value="{{ $product->price }}">
                                            <i class="fa fa-shopping-cart"></i>
                                            Thêm vào giỏ hàng
                                        </button>
                                    @endguest

                            </form>

                        </div>

                        <article class="box1">
                            {!! $product->description !!}

                        </article>
                    </div>
                </div>
            </div>
        </div>

        <div class="footer">
            <div class="container">
                <p class="text-center">
                    <img src="https://www.thmilk.vn/wp-content/themes/wp-th/assets/images/logo.png" alt="logo">
                </p>

                <div class="c-footer_box">
                    <div class="row">
                        <div class="col-xs-4 first">
                            <ul class="c-footer">
                                <li><a href="/lien-he/?csrt=4143374691117170324">Liên hệ</a></li>
                                <li><a href="/cham-soc-khach-hang/?csrt=4143374691117170324">Chăm sóc khách hàng</a>
                                </li>
                            </ul>
                        </div>

                        <div class="col-xs-4">
                            <ul class="c-footer">
                                <li><a href="/dich-vu-giao-hang-tan-nha/?csrt=4143374691117170324">Dịch vụ giao hàng tận
                                        nhà</a></li>
                                <li><a href="/chinh-sach-quy-dinh-chung/?csrt=4143374691117170324">Chính sách &amp; Quy
                                        định chung</a>
                                </li>
                            </ul>
                        </div>
                        <div class="col-xs-4 end">
                            <ul class="c-footer">
                                <li>Tải Ứng Dụng</li>
                                <li>
                                    <ul class="child">
                                        <li>
                                            <a href="https://apps.apple.com/vn/app/th-elife/id1547918408">
                                                <img src="https://www.thmilk.vn/wp-content/themes/wp-th/assets/images/index/img-app.svg"
                                                    alt="img-app.svg">
                                            </a>
                                        </li>

                                        <li>
                                            <a
                                                href="https://play.google.com/store/apps/details?id=com.thelite.production">
                                                <img src="https://www.thmilk.vn/wp-content/themes/wp-th/assets/images/index/img-google.svg"
                                                    alt="img-google.svg">
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    @include('frontend.component.script')

    <script type="text/javascript">
        let mybutton = document.getElementById("back-top");

        // When the user scrolls down 20px from the top of the document, show the button
        window.onscroll = function () { scrollFunction() };

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
        $("#owl-img").owlCarousel({
            dots: true,
            nav: false,
            items: 3,
        });
    </script>

</body>

</html>
