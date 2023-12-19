<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Tài khoản của tôi</title>
  <link rel="icon" href="https://www.thmilk.vn/wp-content/themes/wp-th/favicon.png" type="image/png">

  <!-- Bootstrap Core CSS - Uses Bootswatch Flatly Theme: http://bootswatch.com/flatly/ -->
  <link href="../css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom CSS -->
  <link href="../css/style.css" rel="stylesheet">
  <link href="user_style.css" rel="stylesheet">

  <!-- Custom Fonts -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link href="http://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
  <link href="http://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css">

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
              <img src="https://www.thmilk.vn/wp-content/themes/wp-th/assets/images/logo.png?>" alt="logo">
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
                <a href="">CÂU CHUYỆN THẬT TH</a>
              </li>
              <li class="page-scroll has-children">
                <a href="#">SẢN PHẨM</a>


              </li>
              </li>

              <li class="page-scroll">
                <a href="#">Khuyến mãi</a>
              </li>
              <li class="page-scroll">
                <a href="#">Cửa hàng</a>
              </li>
              <li class="page-scroll has-children">
                <a href="#">Truyền thông</a>
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
              <div class="block account-nav">
                <div class="title account-nav-title"></div>
                <div class="content account-nav-content">
                  <ul class="nav items">
                    <li class="nav item">
                      <a href="user_account.html">Thông tin tài khoản</a>
                    </li>
                    <li class="nav item">
                      <a href="user_order.html">Quản lý đơn hàng</a>
                    </li>
                    <li class="nav item">
                      <a href="https://www.thtruemart.vn/customer/address/">Địa chỉ giao hàng</a>
                    </li>
                    <li class="nav item">
                      <a href="https://www.thtruemart.vn/customer/account/passwordforgot/">Đổi mật khẩu</a>
                    </li>
                    <li class="nav item">
                      <a href="https://www.thtruemart.vn/customer/account/logout/">Đăng xuất</a>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-md-3 order-1 col-right-main">
            <div class="column main">
              <div class="block-title">
                <strong>Quản lý đơn hàng</strong>
              </div>
              <!-- <button class="action checkout" onclick="clearUserOrders()">Clear</button> -->
              <div class="block-content order-content">
                <div class="order-container"><strong>Order: #1702984966195</strong>
                  <div class="order-item"><img
                      src="https://www.thmilk.vn/wp-content/uploads/2019/11/UHT-it-duong-1L_275x186.png"
                      class="product-image">
                    <div class="info">
                      <div class="product-name">Sữa Tươi Tiệt Trùng Ít Đường 1 L</div>
                      <div class="product-price">37200 ₫</div>
                      <div class="product-quantity">Số lượng: 2</div>
                    </div>
                  </div>
                </div>
                <div class="total-price"><span>Tổng tiền: </span><span id="totalPrice">74400 ₫</span>
                </div>
                <div class="order-container"><strong>Order: #1702989160851</strong>
                  <div class="order-item"><img
                      src="https://www.thmilk.vn/wp-content/uploads/2019/11/UHT-it-duong-1L_275x186.png"
                      class="product-image">
                    <div class="info">
                      <div class="product-name">Sữa Tươi Tiệt Trùng Ít Đường 1 L</div>
                      <div class="product-price">37200 ₫</div>
                      <div class="product-quantity">Số lượng: 1</div>
                    </div>
                  </div>
                  <div class="order-item"><img
                      src="https://www.thmilk.vn/wp-content/uploads/2019/11/UHT-co-duong-1L_275x186.png"
                      class="product-image">
                    <div class="info">
                      <div class="product-name">Sữa Tươi Tiệt Trùng Có Đường 1 L</div>
                      <div class="product-price">37200 ₫</div>
                      <div class="product-quantity">Số lượng: 1</div>
                    </div>
                  </div>
                </div>
                <div class="total-price"><span>Tổng tiền: </span><span id="totalPrice">74400 ₫</span>
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
                <li><a href="/cham-soc-khach-hang/?csrt=4143374691117170324">Chăm sóc khách hàng</a></li>
              </ul>
            </div>

            <div class="col-xs-4">
              <ul class="c-footer">
                <li><a href="/dich-vu-giao-hang-tan-nha/?csrt=4143374691117170324">Dịch vụ giao hàng tận nhà</a></li>
                <li><a href="/chinh-sach-quy-dinh-chung/?csrt=4143374691117170324">Chính sách &amp; Quy định chung</a>
                </li>
              </ul>
            </div>
            <div class="col-xs-4 end">
              <ul class="c-footer">
                <li>Tải Ứng Dụng</li>
                <li>
                  <ul class="child">
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


  </script>

  <script src="../js/app.js"></script>
  <!-- <script src="../js/user_order.js"></script> -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

</body>

</html>