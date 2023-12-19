<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Thanh toán</title>
    <link rel="icon" href="https://www.thmilk.vn/wp-content/themes/wp-th/favicon.png" type="image/png">

    <!-- Bootstrap Core CSS - Uses Bootswatch Flatly Theme: http://bootswatch.com/flatly/ -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../css/style.css" rel="stylesheet">
    <link href="user_style.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="http://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet"
        type="text/css">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="../css/owl.carousel.min.css">
    <link rel="stylesheet" href="../css/owl.theme.default.min.css">
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css"> -->
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
      <![endif]-->

</head>

<body id="page-top" class="index header-14-style home-14-style footer-7-style layout-full_width">
    <button onclick="topFunction()" id="back-top">
        <i class="fa fa-angle-double-up"></i>
    </button>

    <div class="tw">
        <div class="menu-header" id="navbar">
            <!-- Navigation -->
            <nav class="navbar navbar-default navbar-fixed-top">
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
                        <a href="https://www.thmilk.vn?csrt=15241662763942268889" id="logo" class="l">
                            <img src="https://www.thmilk.vn/wp-content/themes/wp-th/assets/images/logo.png?>"
                                alt="logo">
                        </a>
                    </div>

                    <!-- Shopping cart tạm thế đã -->
                    <div class="navbar-nav navbar-right">
                        <div class="login">
                            <div class="icon-login">
                                <i class="fa fa-solid fa-user fa-lg"></i>
                                <a href="../auth/login.html">
                                    <span class="lg">Đăng nhập</span>
                                    <span>Tài khoản</span>
                                </a>
                            </div>
                        </div>
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
                    </div>

                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                        <ul class="nav navbar-nav navbar-right">
                            <li class="hidden">
                                <a href="#page-top"></a>
                            </li>
                            <li class="page-scroll">
                                <a href="shop.html">CÂU CHUYỆN THẬT TH</a>
                            </li>
                            <li class="page-scroll">
                                <a href="#">SẢN PHẨM</a>

                            </li>
                            </li>

                            <li class="page-scroll">
                                <a href="#">Khuyến mãi</a>
                            </li>
                            <li class="page-scroll">
                                <a href="#">Cửa hàng</a>
                            </li>
                            <li class="page-scroll">
                                <a href="#">Truyền thông</a>

                            </li>
                            </li>
                            <li class="page-scroll">
                                <a href="#">Tuyển dụng</a>
                            </li>
                        </ul>
                    </div>
                    <!-- /.navbar-collapse -->
                </div>
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
                            <form action="" id="checkout">
                                <div class="block-title h3">
                                    <span style="font-weight: 600;">ĐỊA CHỈ GIAO HÀNG</span>
                                    <div class="item" >
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
                                    <p class="h3" style="font-weight: 600; text-transform: uppercase;">Phương thức thanh toán</p>
                                    <div class="shp">
                                        <input type="radio" value="thanhtoan" name="thanhtoan" id="thanhtoan">
                                        <label for="thanhtoan">Thanh toán khi nhận hàng</label>
                                    </div>
                                  </div>

                                  <div class="submit">
                                    <button type="submit">Thanh toán</button>
                                  </div>
                              </div>
                            </form>
                    </div>

                    <div class="col-lg-4 col-md-4 col-sm-12 order-1 right-shipping">
                        <div class="column main">
                            <div class="block-title h3">Tóm tắt đơn hàng</div>

                            <div class="block-content shipping-content">
                                <div class="total-price">
                                    <span>Tổng tiền</span>
                                    <p class="price">98.200 đ</p>
                                </div>

                                <div class="total-ship">
                                    <span>Phí giao hàng</span>
                                    <p class="price-ship">25.000 đ</p>
                                </div>

                                <div class="total-grand">
                                    <span>Phí giao hàng</span>
                                    <p class="amount">123.200 đ</p>
                                </div>
                            </div>

                            <a href="#sp_cart" class="btn btn-info" data-toggle="collapse">
                                <span class="h4">2 Sản phẩm trong giỏ </span>
                                <i class="fa fa-angle-down" aria-hidden="true"></i>
                            </a>
                            <div id="sp_cart" class="collapse">
                                <div class="product">
                                    <div class="row">
                                        <div class="col-lg-4 col-xs-12">
                                            <img src="https://www.thtruemart.vn/media/catalog/product/cache/033f609347571ebd72d8644cf9057fec/l/o/loc-sua-tuoi-tiet-trung-th-true-milk-light-meal.jpg" width="78" height="78" alt="Lốc sữa tươi tiệt trùng bổ sung ngũ cốc dạng hạt TH true MILK LIGHT MEAL 180ml x 4 hộp" title="Lốc sữa tươi tiệt trùng bổ sung ngũ cốc dạng hạt TH true MILK LIGHT MEAL 180ml x 4 hộp">
                                        </div>
                                        <div class="col-lg-5 col-xs-12">
                                            <div class="product-item-name-block">
                                                <p class="product-item-name"">Lốc sữa tươi tiệt trùng bổ sung ngũ cốc dạng hạt TH true MILK LIGHT MEAL 180ml x 4 hộp</p>
                                                <div class="details-qty">
                                                    <span>Số lượng</span>
                                                    <span class="value">2</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-xs-12">
                                            <span class="cart-price">
                                                98.200 đ
                                            </span>
                                        </div>
                                    </div>
                                </div>

                                <div class="product">
                                    <div class="row">
                                        <div class="col-lg-4 col-xs-12">
                                            <img src="https://www.thtruemart.vn/media/catalog/product/cache/033f609347571ebd72d8644cf9057fec/u/n/untitled-1_copy.jpg" width="78" height="78" alt="Lốc sữa tươi tiệt trùng bổ sung ngũ cốc dạng hạt TH true MILK LIGHT MEAL 180ml x 4 hộp" title="Lốc sữa tươi tiệt trùng bổ sung ngũ cốc dạng hạt TH true MILK LIGHT MEAL 180ml x 4 hộp">
                                        </div>
                                        <div class="col-lg-5 col-xs-12">
                                            <div class="product-item-name-block">
                                                <p class="product-item-name"">Lốc sữa tươi tiệt trùng bổ sung ngũ cốc dạng hạt TH true MILK LIGHT MEAL 180ml x 4 hộp</p>
                                                <div class="details-qty">
                                                    <span>Số lượng</span>
                                                    <span class="value">2</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-xs-12">
                                            <span class="cart-price">
                                                98.200 đ
                                            </span>
                                        </div>
                                    </div>
                                </div>
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
                                    <ul class="child"">
                <li>
                  <a href=" https://apps.apple.com/vn/app/th-elife/id1547918408">
                                        <img src="https://www.thmilk.vn/wp-content/themes/wp-th/assets/images/index/img-app.svg"
                                            alt="img-app.svg">
                                        </a>
                                </li>

                                <li>
                                    <a href="https://play.google.com/store/apps/details?id=com.thelite.production">
                                        <img src="https://www.thmilk.vn/wp-content/themes/wp-th/assets/images/index/img-google.svg"
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

    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script type="text/javascript"
        src="https://owlcarousel2.github.io/OwlCarousel2/assets/owlcarousel/owl.carousel.js"></script>
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

                // Lắng nghe sự kiện nhập liệu vào trường input
        const nameInput = document.getElementById('name');
        const phoneInput = document.getElementById('tel');
        const addrInput = document.getElementById('addr');


nameInput.addEventListener('input', function(event) {
  // Cập nhật nội dung của div dựa trên giá trị đã nhập
  $('.name').html("Họ và tên: " + event.target.value);
});

phoneInput.addEventListener('input', function(event) {
  // Cập nhật nội dung của div dựa trên giá trị đã nhập
  $('.phone').html("Số điện thoại: " + event.target.value);
});

addrInput.addEventListener('input', function(event) {
  // Cập nhật nội dung của div dựa trên giá trị đã nhập
  $('.addr').html("Địa chỉ: " + event.target.value);
});

    </script>

    <script src="../js/app.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <!-- Font Awesome -->
</body>

</html>