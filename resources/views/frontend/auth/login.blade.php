<!DOCTYPE html>
<html lang="en">

<head>
    @include('frontend.component.head')
</head>

<body id="page-top" class="index">
<div class="container">
    <div class="row">
        <div class="auth-box col-md-4 col-md-push-4 col-xs-8 col-xs-push-2 col-sm-8 col-sm-push-2">
            <div class="card-title">
                <p>Đăng nhập</p>
            </div>
            <div class="card-text">
                <form method="POST" action="{{route('frontend.auth.login')}}">
                    @csrf
                    <!-- <div class="in-group username">
                                <label for="username">Username<i style="color: red;">*</i></label>
                                <input type="text" name="username" id="username" required>
                            </div>

                            <div class="in-group email">
                                <label for="email">Email<i style="color: red;">*</i></label>
                                <input type="email" name="email" id="email" required>
                            </div> -->

                    <div class="in-group tel">
                        <label for="text">Username<i style="color: red;">*</i></label>
                        <input type="text" name="name" id="name"
                               placeholder="Nhập username">

                        @if($errors->has('name'))
                            <div class="error-message-signup">
                                * {{ $errors->first('name') }}
                            </div>
                        @endif
                    </div>

                    <div class="in-group password">
                        <label for="password">Mật khẩu<i style="color: red;">*</i></label>
                        <input type="password" name="password" id="password" placeholder="Nhập mật khẩu">

                        @if($errors->has('password'))
                            <div class="error-message-signup">
                                * {{ $errors->first('password') }}
                            </div>
                        @endif

                    </div>

                    @if ($message = Session::get('error'))

                        <div class="alert alert-success alert-block">
                            <i class="fa fa-exclamation-triangle" aria-hidden="true"></i>
                            <button type="button" class="close" data-dismiss="alert">×</button>

                            <span>{{ $message }}</span>

                        </div>

                    @endif
                    <!-- /.col -->
                    <div class="in-group">
                        <button type="submit" class="btn btn-primary btn-block">Đăng nhập</button>
                        <!-- /.col -->
                        <a href="{{route('frontend.auth.signup')}}" class="btn btn-primary btn-block non-active">Đăng
                            ký</a>
                    </div>
                    <div class="f-password">
                        <a href="{{route('fpassword')}}">Quên mật khẩu?</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@include('frontend.component.script')
</body>
<style>
    .error-message-signup{
        color:red;
        font-size: 12px;
        font-style: italic;
    }
</style>
</html>
