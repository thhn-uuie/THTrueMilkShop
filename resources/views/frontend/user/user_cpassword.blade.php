<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Đổi mật khẩu</title>
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
        <span class="item">Tài khoản > Đổi mật khẩu</span>
            </div>
        </div>

        <!-- làm tiếp ở đây nẻ -->
        <div class="account">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12"></div>
                    <div class="col-lg-3 col-md-3 order-1 col-left-sidebar">
                        <div class="sidebar sidebar-main">
                            @include('frontend.component.sidebar')
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 order-1 col-right-main">
                        <div class="column main">
                            <div class="block-title">
                                <strong>Vui lòng nhập mật khẩu mới của bạn</strong>
                            </div>
                            <div class="block-content">
                                <form method = 'POST' action="{{route('user.changepass')}}" id="form_shange_pass">
                                    @csrf
                                    <div class="account-form form-wrap">
                                        <div class="row mb-4">
                                            <div class="form-group col-12 col-md-6 col-lg-6">
                                                <label>NHẬP MẬT KHẨU HIỆN TẠI <i style="color: red;">*</i></label>
                                                <div class="data">
                                                    <input type="password" name="password" required>
                                                </div>
                                            </div>
                                            <div class="form-group col-12 col-md-6 col-lg-6">
                                                <label>MẬT KHẨU MỚI <i style="color: red;">*</i></label>
                                                <div class="data">
                                                    <input type="password" name="new_password" required>
                                                </div>
                                            </div>

                                        </div>
                                        <button class="btn-edit submit">

                                                Đổi mật khẩu

                                        </button>
                                    </div>
                                </form>
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


</body>

</html>
