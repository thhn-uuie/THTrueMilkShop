<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Thông tin tài khoản</title>
    @include('frontend.component.head')
    <link href="{{ asset('/public/admin/css/custom.css') }}" rel="stylesheet">
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
            <span class="item">Tài khoản > Cập nhật</span>
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
                            <strong>Thông tin tài khoản</strong>
                        </div>
                        <div class="block-content">
                            <form action="{{ route('user.user_account_update') }}"
                                  method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="account-form form-wrap">
                                    <div class="row mb-4">
                                        <div class="form-group col-12 col-sm-12 col-lg-12">
                                            <div class="row">
                                                <div class="card mb-3 col-sm-5">
                                                    <div class="card-body">
                                                        <h2 class="h4 mb-3"><label>Avatar</label></h2>
                                                        <div class="wrapp" id="wrapper">
                                                            <div class="image">

                                                                    <img src="{{url('/public/frontend/img/profile') .'/'. $customer->image }}"
                                                                         alt="" id="img">
                                                            </div>
                                                            <div class="content">
                                                                <div class="icon"><i class="fa fa-cloud-upload-alt"></i></div>
                                                                <div class="text">No file chosen, yet!</div>
                                                            </div>
                                                        </div>

                                                        <input type="file" id="l_image" name="file_upload"
                                                               style="display: none;">
                                                        <button type="button" onclick="defaultBtnActive()"
                                                                id="custom-btn">Choose a file
                                                        </button>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group col-12 col-sm-6 col-lg-6">
                                            <label>Họ tên</label>
                                            <div class="data"><input type="text" name="name"
                                                                     value="{{$customer->name}}"></div>
                                        </div>
                                        <div class="form-group col-12 col-sm-6 col-lg-6">
                                            <label>Số điện thoại</label>
                                            <div class="data"><input type="tel" name="phone"
                                                                     value="{{$customer->phone}}"></div>
                                        </div>
                                        <div class="form-group col-12 col-sm-6 col-lg-6">
                                            <label>Email</label>
                                            <?php $customerEmail = \App\Models\User::find($customer->id_user) ?>
                                            <div class="data"><input type="email" name="email"
                                                                     value="{{$customerEmail->email}}" readonly></div>
                                        </div>
                                        <div class="form-group col-12 col-sm-6 col-lg-6">
                                            <label>Giới tính</label>
                                            <div class="data">
                                                <label class="radio-inline">
                                                    <input type="radio" name="gender" value="male">Nam
                                                </label>
                                                <label class="radio-inline">
                                                    <input type="radio" name="gender" value="female">Nữ
                                                </label>
                                            </div>
                                        </div>
                                        <div class="form-group col-12 col-sm-6 col-lg-6">
                                            <label>Ngày sinh</label>
                                            <div class="data">
                                                <input type="date" name="birthday" value="{{$customer->birthday}}">
                                            </div>
                                        </div>
                                        <div class="form-group col-12 col-sm-6 col-lg-6">
                                            <label>Địa chỉ</label>
                                            <div class="data"><input type="text" name="address"
                                                                     value="{{$customer->address}}"></div>
                                        </div>
                                    </div>
                                    <div class="btn-edit">
                                        <button type="submit" class="btn btn-primary">
                                            Sửa thông tin
                                        </button>
                                    </div>
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
    <script src="{{asset('/public/admin/js/custom.js')}}"></script>

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

        const image = $('.wrapp .image img');
        if (!image.attr('src') == '') {
            console.log(image.attr('src'));
            // Nếu thuộc tính src khác null hoặc trống, thêm lớp 'active'
            $('.wrapp').addClass('active');
            $('.wrapp .content').css("display", "none");
        }
    </script>

</body>

</html>
