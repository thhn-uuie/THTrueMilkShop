<!DOCTYPE html>
<html lang="en">
<head>
    <title>Đăng nhập</title>
    @include('admin.component.head')
</head>
<body class="hold-transition login-page">
<div class="login-box">
    <!-- /.login-logo -->
    <div class="card card-outline card-primary">
        <div class="card-header text-center">
            <a class="h3">Administrative Panel</a>
        </div>
        <div class="card-body">
            <p class="login-box-msg">Đăng ký tài khoản quản lý</p>
            <form method="POST" action="{{ route('admin.register') }}">
                @csrf
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Username" name="name">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                        </div>
                    </div>
                </div>
                @if($errors->has('name'))
                    <div class="error-message-signup">
                        * {{ $errors->first('name') }}
                    </div>
                @endif
                <div class="input-group mb-3">
                    <input type="email" class="form-control" placeholder="Email" name="email">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                        </div>
                    </div>
                </div>
                @if($errors->has('email'))
                    <div class="error-message">
                        * {{ $errors->first('email') }}
                    </div>
                @endif

                <div class="input-group mb-3">
                    <input type="password" class="form-control" placeholder="Password" name="password">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>

                </div>
                @if($errors->has('password'))
                    <div class="error-message">
                        * {{ $errors->first('password') }}
                    </div>
                @endif
                @if ($message = Session::get('error'))

                    <div class="alert alert-success alert-block">
                        <i class="fa fa-exclamation-triangle" aria-hidden="true"></i>
                        <button type="button" class="close" data-dismiss="alert" onclick="hideError(this)">×</button>
                        <strong>{{ $message }}</strong>
                    </div>

                @endif
                <div class="row">
                    <!-- /.col -->
                    <div class="col-4">
                        <button type="submit" class="btn btn-primary btn-block">Đăng ký</button>
                    </div>
                    <!-- /.col -->
                <input type="hidden" name="id_role" value="1">
                </div>
                <div class="signup">
                                <span class="signup">Bạn đã có tài khoản?
                                    <label for="check"><a href="{{ route('admin.login') }}">Đăng nhập</a></label>
                                </span>
                </div>
            </form>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
</div>
<!-- ./wrapper -->
<!-- jQuery -->

</body>
</html>
<script>
    function hideError(button) {
        var inputElement = button.parentNode;
        inputElement.parentNode.removeChild(inputElement);
    }
</script>
<style>
    .error-message-signup {
        color: red;
        font-size: 12px;
        font-style: italic;
    }
</style>
