<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Tài khoản của tôi</title>
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
            <span class="item">Tài khoản</span>
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
                            <div class="account-form form-wrap">
                                <?php $checkProfile = \App\Models\Profile::where('id_user', \Illuminate\Support\Facades\Auth::user()->id)->get()->first(); ?>

{{--                                <form action="{{ $checkProfile==null ? route('user.user_account_create') : route('user.user_account_update', ['id'=>$id]) }}" method="post">--}}

{{--                                    @csrf--}}

                                    @if($checkProfile == null)

                                        <div class="row mb-4">
                                            <div class="form-group col-12 col-md-6 col-lg-4">
                                                <label>Họ tên</label>
                                                <div class="data">Chưa có thông tin</div>
                                            </div>
                                            <div class="form-group col-12 col-md-6 col-lg-4">
                                                <label>Số điện thoại</label>
                                                <div class="data">Chưa có thông tin</div>
                                            </div>
                                            <div class="form-group col-12 col-md-6 col-lg-4">
                                                <label>Email</label>
                                                    <?php $user = \App\Models\User::find(\Illuminate\Support\Facades\Auth::$user->id); ?>
                                                <div class="data">{{ $user->email }}</div>
                                            </div>
                                            <div class="form-group col-12 col-md-6 col-lg-4">
                                                <label>Giới tính</label>
                                                <div class="data">Chưa có thông tin</div>
                                            </div>
                                            <div class="form-group col-12 col-md-6 col-lg-4">
                                                <label>Ngày sinh</label>
                                                <div class="data">Chưa có thông tin</div>
                                            </div>

                                            <div class="form-group col-12 col-md-6 col-lg-4">
                                                <label>Địa chỉ</label>
                                                <div class="data">Chưa có thông tin</div>
                                            </div>
                                        </div>
                                    @else
                                        <div class="row mb-4">
                                            <div class="form-group col-12 col-md-6 col-lg-4">
                                                <label>Họ tên</label>
                                                <div class="data">{{ $checkProfile->name }}</div>
                                            </div>
                                            <div class="form-group col-12 col-md-6 col-lg-4">
                                                <label>Số điện thoại</label>
                                                <div class="data">{{ $checkProfile->phone }}</div>
                                            </div>
                                            <div class="form-group col-12 col-md-6 col-lg-4">
                                                <label>Email</label>
                                                    <?php $user = \App\Models\User::find(\Illuminate\Support\Facades\Auth::user()->id); ?>
                                                <div class="data">{{ $user->email }}</div>
                                            </div>
                                            <div class="form-group col-12 col-md-6 col-lg-4">
                                                <label>Giới tính</label>
                                                <div class="data">{{ $checkProfile->gender }}</div>
                                            </div>
                                            <div class="form-group col-12 col-md-6 col-lg-4">
                                                <label>Ngày sinh</label>
                                                <div class="data">{{ $checkProfile->birthday }}</div>
                                            </div>

                                            <div class="form-group col-12 col-md-6 col-lg-4">
                                                <label>Địa chỉ</label>
                                                <div class="data">{{ $checkProfile->address }}</div>
                                            </div>
                                        </div>
                                    @endif

                                    <div class="btn-edit">

                                            <a class="action edit" href="{{route('user.user_account_update')}}">
                                                <span>Sửa thông tin</span>
                                            </a>

                                    </div>
{{--                                </form>--}}
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
