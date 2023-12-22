<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>TH true MILK – True Happiness</title>
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
        </nav>
    </div>

    <!-- carousel -->
    <div class="sld">
        <div id="slider1" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#slider1" data-slide-to="0" class="active"></li>
                <li data-target="#slider1" data-slide-to="1"></li>
                <li data-target="#slider1" data-slide-to="2"></li>
                <li data-target="#slider1" data-slide-to="3"></li>
                <li data-target="#slider1" data-slide-to="4"></li>
            </ol>
            <div class="carousel-inner">
                <div class="item active">
                    <img src="https://www.thmilk.vn/wp-content/uploads/2020/09/Banner_TH-MILK-Canh-dong-huong-duong.jpg"
                         alt="banner_th-milk-canh-dong-huong-duong" class="">
                </div>

                <div class="item">
                    <img src="https://www.thmilk.vn/wp-content/uploads/2019/11/Banner-2-1.jpg" alt="banner-2-2">
                </div>

                <div class="item">
                    <img src="https://www.thmilk.vn/wp-content/uploads/2019/11/Banner-3-1.jpg" alt="banner-3-2">
                </div>

                <div class="item">
                    <img src="https://www.thmilk.vn/wp-content/uploads/2023/08/Banner-all-1.jpg" alt="banner-all-1">
                </div>

                <div class="item">
                    <img src="https://www.thmilk.vn/wp-content/uploads/2023/08/Banner-NUT-OAT.jpg" alt="banner-nut-oat">
                </div>
            </div>
            <a class="left carousel-control" href="#slider1" role="button" data-slide="prev">
                <i class="btn-left fa fa-angle-left" aria-hidden="true"></i>
                <!-- <button type="button" role="presentation" class="owl-prev"><span aria-label="Previous">‹</span></button> -->
                <span class="sr-only">Previous</span>
            </a>
            <a class="right carousel-control" href="#slider1" role="button" data-slide="next">
                <i class="btn-right fa fa-angle-right" aria-hidden="true"></i>
                <!-- <button" role="presentation" class="owl-next"><span aria-label="Next">›</span></button> -->
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>
    <!-- end carousel -->

    <!-- sp -->
    <div class="nd1">
        <div class="container">
            <?php $category = \App\Models\Category::where('status', 1)->get(); ?>
            <div class="owl-sp">
                <div class="owl-carousel owl-theme" id="owl-carousel1">
                    @foreach($category as $item)
                        <div class="item">
                            <div class="c-listitem1__card1">
                                <a class="c-listitem1__link1"
                                   href="{{asset('/san-pham')}}">
                                    <div class="c-listitem1__img1">
                                        <img src="{{ url('/public/admin/img/category') . '/' . $item->image }}"
                                             alt="ic-suatietrung"
                                             style="width: 60px!important; height: 60px!important;">
                                    </div>
                                    <article class="c-listitem1__content1">
                                        <h4 class="title1">{{ $item->name_category }}</h4>
                                    </article>
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

        <div class="sp">
            <div class="container">
                <h1 class="ctext">Sản phẩm mới nhất</h1>
                <div class="owl-sp2">

                    <div class="owl-carousel owl-theme " id="owl-carousel2">

                                <?php $products = \App\Models\Product::where('status', 1)
                                    ->orderBy('id', 'desc')
                                    ->limit(5)
                                    ->get(); ?>
                                @foreach($products as $item)
                                        <?php $galleryProduct = \App\Models\Gallery::where('id_product', $item->id)->get(); ?>
                                    <div class="item">
                                        <div class="c-listitem2__card1">
                                            <a class="c-listitem2__link1"
                                               href="{{ route('chi-tiet', ['id' => $item->id]) }}">
                                                <div class="c-listitem2__img1">
                                                    <div class="tRes_100" ">
                                                        <img
                                                             src="{{ url('public/admin/img/product') . '/' . $galleryProduct->first()->image }}"
                                                             alt="{{ $item->name_product }}">
                                                    </div>
                                                </div>
                                                <article class="c-listitem2__content1">
                                                    <h4 class="title1">{{ $item->name_product }}</h4>
                                                </article>
                                            </a>
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

    <div class="nd2">
        <div class="container">
            <div class="owl-sp3">
                <div class="owl-carousel owl-theme" id="owl-carousel3">
                    <div class="item">
                        <a class="c-slider1__link1"
                           href="https://www.thmilk.vn/nhan-the-sticker-vui-quay-so-trung-qua-chat/?csrt=14388090062690665609">
                            <div class="c-slider1__img1">
                                <img src="https://www.thmilk.vn/wp-content/uploads/2023/09/Banner-Home.jpg"
                                     alt="banner-home">
                            </div>
                        </a>
                    </div>

                    <div class="item">
                        <a class="c-slider1__link1"
                           href="https://www.thmilk.vn/thong-tin-chi-tiet-ve-chuong-trinh-thu-gom-vo-hop-lan-toa-song-xanh-2023/?csrt=14388090062690665609">
                            <div class="c-slider1__img1">
                                <img src="https://www.thmilk.vn/wp-content/uploads/2023/08/1170x660.jpg"
                                     alt="1170x660-2">
                            </div>
                        </a>
                    </div>

                    <div class="item">
                        <a class="c-slider1__link1"
                           href="https://www.thmilk.vn/chuong-trinh-khuyen-mai-sua-tuoi-tiet-trung-th-true-milk-hilo-va-sua-tuoi-tiet-trung-th-true-milk-light-meal/?csrt=14388090062690665609">
                            <div class="c-slider1__img1">
                                <img
                                    src="https://www.thmilk.vn/wp-content/uploads/2023/12/KV-HILO-Light-meal_thmilk-main-menu.jpg"
                                    alt="kv-hilo-light-meal_thmilk-main-menu">
                            </div>
                        </a>
                    </div>


                </div>
            </div>
        </div>

        <div class="nd3">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-md-6">
                        <div class="box1">
                            <h3 class="title1">TH true mart</h3>
                            <div class="text1">
                                <p></p>
                                <div style="text-align: justify; color: gray; margin-bottom: 20px; font-size: 16px;">
                                    TH true mart là chuỗi cửa hàng phân phối hiện đại, chuyên cung cấp trực tiếp các sản
                                    phẩm thực phẩm
                                    sạch, an toàn, tươi ngon và bổ dưỡng, đạt chuẩn Quốc tế tới tận tay người tiêu dùng.
                                    <br>
                                </div>
                                <p></p>
                            </div>
                            <div class="list1">

                                <a class="btn btn-primary" href="{{ asset('/san-pham') }}">
                                    Mua hàng trực tuyến <i class="fa fa-shopping-cart"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-md-6">
                        <div class="box2">
                            <div class="img tRes_70">
                                <img src="https://www.thmilk.vn/wp-content/uploads/2019/11/true-mart.png"
                                     alt="true-mart">
                            </div>
                        </div>
                    </div>
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
                            <li><a href="/cham-soc-khach-hang/?csrt=4143374691117170324">Chăm sóc khách hàng</a></li>
                        </ul>
                    </div>

                    <div class="col-xs-4">
                        <ul class="c-footer">
                            <li><a href="/dich-vu-giao-hang-tan-nha/?csrt=4143374691117170324">Dịch vụ giao hàng tận
                                    nhà</a></li>
                            <li><a href="/chinh-sach-quy-dinh-chung/?csrt=4143374691117170324">Chính sách &amp; Quy định
                                    chung</a>
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
                                            <img
                                                src="https://www.thmilk.vn/wp-content/themes/wp-th/assets/images/index/img-app.svg"
                                                alt="img-app.svg">
                                        </a>
                                    </li>

                                    <li>
                                        <a href="https://play.google.com/store/apps/details?id=com.thelite.production">
                                            <img
                                                src="https://www.thmilk.vn/wp-content/themes/wp-th/assets/images/index/img-google.svg"
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

    $("#owl-carousel1").owlCarousel({
        dots: false,
        nav: true,
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 4
            },
            900: {
                items: 6
            },
            1100: {
                items: 9
            }
        }
    });

    $("#owl-carousel2").owlCarousel({
        dots: true,
        nav: false,
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 3
            },
            1100: {
                items: 5
            }
        }
    });

    $("#owl-carousel3").owlCarousel({
        nav: false,
        dots: true,
        items: 1, //10 items above 1000px browser width
    });
</script>


</body>

</html>
