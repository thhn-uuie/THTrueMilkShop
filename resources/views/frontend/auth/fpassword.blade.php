<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Quên mật khẩu – TH true MILK</title>
    @include('frontend.component.head')
</head>

<body id="page-top" class="index">
<div class="container">
    <div class="row">
        <div class="auth-box col-md-4 col-md-push-4 col-xs-10 col-xs-push-1 col-sm-8 col-sm-push-2">
            <div class="card-title">
                <p>Quên mật khẩu</p>
            </div>
            <div class="card-text">
                <form method="POST" action="{{route('fpassword')}}" id="form-fpw">
                    @csrf
                    @if ($hasAuth == null)
                        <div class="in-group tel">
                            <label for="email">Email<i style="color: red;">*</i></label>
                            <input type="email" name="email" id="email" required placeholder="Nhập email">
                        </div>

                        <div class="in-group">
                            <button type="submit" class="btn btn-primary btn-block" name="action" value="enter">Nhận
                                mã xác nhận
                            </button>
                        </div>
                        @if (isset($error))
                            <div class="alert alert-success alert-block">
                                <i class="fa fa-exclamation-triangle" aria-hidden="true"></i>
                                <button type="button" class="close" data-dismiss="alert">×</button>
                                <span>{{ $error }}</span>
                            </div>
                        @endif
                    @else
                        <div class="in-group password">
                            <label>Mã xác nhận<i style="color: red;">*</i></label>
                            <input type="text" name="token" id="token" required placeholder="Nhập mã xác nhận">
                            <input type="hidden" name="email" id="email" value="{{$email}}">
                        </div>
                        <div class="in-group password">
                            <label for="password">Mật khẩu mới<i style="color: red;">*</i></label>
                            <input type="password" name="password" id="password" required
                                   placeholder="Nhập mật khẩu mới">
                        </div>

                        <div class="in-group c_password">
                            <label for="password">Nhập lại mật khẩu<i style="color: red;">*</i></label>
                            <input type="password" name="c_password" id="c_password" required
                                   placeholder="Nhập lại mật khẩu">
                        </div>
                        <div class="in-group">
                            <button type="submit" class="btn btn-primary btn-block" name="action"
                                    value="change">Đổi mật khẩu
                            </button>
                        </div>
                    @endif

                </form>
            </div>
        </div>
    </div>

</div>

<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script> -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</body>

</html>
