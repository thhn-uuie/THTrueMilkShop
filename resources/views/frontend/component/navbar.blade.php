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
        <a href="landing.html" id="logo" class="l">
            <img src="https://www.thmilk.vn/wp-content/themes/wp-th/assets/images/logo.png?>" alt="logo">
        </a>
    </div>


    <!-- Shopping cart tạm thế đã -->
    <div class="navbar-nav navbar-right">
        <!-- <div class="cart"> -->
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
            <!-- </div> -->

            <!-- <div class="login">
              <i class="fa fa-user"></i>
            </div> -->
        </div>


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
            <li class="page-scroll">
                <a href="#">Tuyển dụng</a>
            </li>
        </ul>
    </div>
    <!-- /.navbar-collapse -->
</div>
