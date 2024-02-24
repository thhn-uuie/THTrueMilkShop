<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Kích hoạt tài khoản</title>
    @include('frontend.component.head')
    <link href="{{ asset('/public/frontend/css/user_style.css') }}" rel="stylesheet">
</head>
@include('frontend.component.script')
<body>
<div class="container">
    <div class="row">
        <div class="auth-box col-md-4 col-md-push-4 col-xs-10 col-xs-push-1 col-sm-8 col-sm-push-2">
            <div class="card-title">
                <p>Xác nhận tài khoản</p>
            </div>
            <div class="card-text">
                <form method="POST" action="{{route('verify')}}" enctype="multipart/form-data">
                    @csrf
                    <p style="font-style: italic">Kiểm tra email bạn đã đăng ký để lấy mã xác nhận tài khoản.</p>

                    <div class="in-group password">
                        <label for="password">Mã xác nhận<i style="color: red;">*</i></label>
                        <input type="text" name="token_input" placeholder="Nhập mã xác nhận">
                        <input type="hidden" name="name" value="{{$name}}">
                        <input type="hidden" name="password" value="{{$password}}">
                        <input type="hidden" name="token" value="{{$token}}">
                    </div>
                    <div class="in-group">
                        <button type="submit" class="btn btn-primary btn-block" name="action" value="login">Đăng nhập
                        </button>
                        <button type="submit" class="btn btn-primary btn-block non-active" name="action" value="refesh">
                            Lấy lại mã
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</body>
</html>
