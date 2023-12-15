<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Đăng ký – TH true MILK</title>
    <link rel="icon" href="https://www.thmilk.vn/wp-content/themes/wp-th/favicon.png" type="image/png">

    <!-- Bootstrap Core CSS - Uses Bootswatch Flatly Theme: http://bootswatch.com/flatly/ -->
    <link href="public/frontend/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="public/frontend/css/style.css" rel="stylesheet">
    <link href="public/frontend/css/custom.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="http://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet"
          type="text/css">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
          integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>
</head>

<body id="page-top" class="index">
<div class="container">
    <div class="row">
        <div class="auth-box col-md-4 col-md-push-4">
            <div class="card-title">
                <p>Đăng ký</p>
            </div>
            <div class="card-text">
                <form method="POST" action="" id="form-signup">
                    @csrf
                    @if (session('success'))
                        <div class="alert alert-primary">
                            {{ session('success') }}
                        </div>
                    @endif
                    <div class="in-group username">
                        <label for="name">Username<i style="color: red;">*</i></label>
                        <input type="text" name="name" id="name" placeholder="Nhập tên ">

                        @if($errors->has('name'))
                            <div class="error-message">
                                * {{ $errors->first('name') }}
                            </div>
                        @endif
                    </div>

                    <div class="in-group email">
                        <label for="email">Email<i style="color: red;">*</i></label>
                        <input type="email" name="email" id="email" placeholder="Nhap email">

                        @if($errors->has('email'))
                            <div class="error-message">
                                * {{ $errors->first('email') }}
                            </div>
                        @endif
                    </div>

                    {{--                        <div class="in-group tel">--}}
                    {{--                            <label for="tel">Số điện thoại<i style="color: red;">*</i></label>--}}
                    {{--                            <input type="tel" name="tel" id="tel" required placeholder="Nhập số điện thoại">--}}
                    {{--                        </div>--}}

                    <div class="in-group password">
                        <label for="password">Mật khẩu<i style="color: red;">*</i></label>
                        <input type="password" name="password" id="password" placeholder="Nhập mật khẩu">

                        @if($errors->has('password'))
                            <div class="error-message">
                                * {{ $errors->first('password') }}
                            </div>
                        @endif
                    </div>

                    <!-- <div class="in-group email">
                        <label for="password">Nhập lại mật khẩu<i style="color: red;">*</i></label>
                        <input type="password" name="c-password" id="c-password" required placeholder="Nhập lại mật khẩu">
                    </div> -->

                    <!-- /.col -->
                    <div class="in-group">
                        <button type="submit" class="btn btn-primary btn-block">Đăng ký</button>
                        <!-- /.col -->
                        <a href="{{ route('frontend.auth.login') }}" class="btn btn-primary btn-block non-active">Đăng
                            nhập</a>
                    </div>
                    <div class="f-password">
                        <a href="fpassword.php">Quên mật khẩu?</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- đang lỗi huhu -->
<!-- Bao gồm thư viện jQuery Validate -->
<!-- <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>

<script>

    $(document).ready(function () {
        $.validator.addMethod(
            "phoneFormat",
            function (value, element) {
                // Kiểm tra số điện thoại chỉ chứa chữ số và dấu "+"
                return this.optional(element) || /^[0-9+]+$/.test(value);
            },
            "Số điện thoại không hợp lệ."
        );
        $("#form-sigup").validate({
            rules: {
                username: {
                    required: true,
                },
                password: {
                    required: true,
                },
                tel: {
                    required: true,
                    phoneFormat: true,
                }
            },
            messages: {
                username: {
                    required: "Vui lòng nhập giá tiền"
                },
                password: {
                    required: "Vui lòng nhập password"
                },
                tel: {
                    required: "Vui lòng nhập số điện thoại",
                    digits: "Số điện thoại chỉ được chứa chữ số"
                }
            }
        });
    });
</script> -->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</body>

</html>
