<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Sản phẩm – TH true MILK</title>
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
            <span class="item"><a href="https://www.thmilk.vn?csrt=4143374691117170324">Trang chủ > </a></span>
            <span class="item">Sản phẩm</span>
        </div>
    </div>

    <div class="nd1">
        <div class="container">
        <div class="owl-sp">
            <div class="owl-carousel owl-theme" id="owl-carousel1">
                @foreach($category as $item)
                <div class="item">
                    <div class="c-listitem1__card1">
                        <a class="c-listitem1__link1"
                           href="">
                            <div class="c-listitem1__img1">
                                <img src="{{ url('/public/admin/img/category') . '/' . $item->image }}"
                                     alt="ic-suatietrung">
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
    </div>

    <!-- làm tiếp ở đây nẻ -->
    <!-- <div class="container">
        <div class="p-product2">
            <div class="p-product2__box1" id="suatuoitiettrung">

                <h2 class="p-product2__title1">sữa tươi tiệt trùng</h2>
            </div>

            <div class="p-product2__box1" id="suachua">

                <h2 class="p-product2__title1">Sữa chua tự nhiên</h2>
            </div>
        </div>
    </div> -->
    <!--  -->

    <!-- code nè -->
    <div class="container">
      <div class="p-product2">
        <div class="p-product2__box1" id="suatuoitiettrung">
          
          <h2 class="p-product2__title1">sữa tươi tiệt trùng</h2>
          <div class="c-listitem3-root1">
            <div class="c-listitem3">
              <div class="c-listitem3__card1 item1-js">
                <div class="c-listitem3__img1">
                  <img src="https://www.thmilk.vn/wp-content/uploads/2019/11/UHT-nguyen-chat-1L_275x186.png" alt="uht-nguyen-chat-1l_275x186"> 
                </div>
                <article class="c-listitem3__content1">
                  <h4 class="title1">Sữa Tươi Tiệt Trùng Nguyên Chất 1 L</h4>
                  <div class="info1">
                    <span class="info1__price1">37.200 ₫</span>
                    <i class="fa fa-solid fa-cart-shopping fa-lg"></i>
                  </div>
                </article>
              </div>
              <div class="c-listitem3__card1 item1-js">
                <div class="c-listitem3__img1">
                  <img src="https://www.thmilk.vn/wp-content/uploads/2019/11/UHT-it-duong-1L_275x186.png" alt="uht-it-duong-1l_275x186"> 
                </div>
                <article class="c-listitem3__content1">
                  <h4 class="title1">Sữa Tươi Tiệt Trùng Ít Đường 1 L</h4>
                  <div class="info1">
                    <span class="info1__price1">37.200 ₫</span>
                    <i class="fa fa-solid fa-cart-shopping fa-lg"></i>
                  </div>
                </article>
              </div>
              <div class="c-listitem3__card1 item1-js">
                <div class="c-listitem3__img1">
                  <img src="https://www.thmilk.vn/wp-content/uploads/2019/11/UHT-co-duong-1L_275x186.png" alt="uht-co-duong-1l_275x186"> 
                </div>
                <article class="c-listitem3__content1">
                  <h4 class="title1">Sữa Tươi Tiệt Trùng Có Đường 1 L</h4>
                  <div class="info1">
                    <span class="info1__price1">37.200 ₫</span>
                    <i class="fa fa-solid fa-cart-shopping fa-lg"></i>
                  </div>
                </article>
              </div>
            </div>
          </div>
        </div>

        <div class="p-product2__box1" id="suachua">
          
          <h2 class="p-product2__title1">Sữa chua tự nhiên</h2>
          <div class="c-listitem3-root1">
            <div class="c-listitem3">
              <div class="c-listitem3__card1 item1-js">
                <div class="c-listitem3__img1">
                  <img src="https://www.thmilk.vn/wp-content/uploads/2021/04/SCA-It-duong_275x186.png" alt="sca-it-duong_275x186">
                </div>
                <article class="c-listitem3__content1">
                  <h4 class="title1">Sữa Chua Ăn Ít Đường</h4>
                  <div class="info1">
                    <span class="info1__price1">27.800 ₫</span>
                    <i class="fa fa-solid fa-cart-shopping fa-lg"></i>
                  </div>
                </article>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!--  -->

    <div class="footer">
        <div class="container">
            <p class="text-center">
                <img src="https://www.thmilk.vn/wp-content/themes/wp-th/assets/images/logo.png" alt="logo">
            </p>

            <section class="c-footer_box">
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
                                <ul class="child"
                                ">
                            <li>
                                <a href=" https://apps.apple.com/vn/app/th-elife/id1547918408">
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
            </section>
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
</script>

</body>

</html>
