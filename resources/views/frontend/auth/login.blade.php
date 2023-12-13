<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Đăng nhập – TH true MILK</title>
    <link rel="icon" href="https://www.thmilk.vn/wp-content/themes/wp-th/favicon.png" type="image/png">

    <!-- Bootstrap Core CSS - Uses Bootswatch Flatly Theme: http://bootswatch.com/flatly/ -->
    <link href="public/frontend/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="public/frontend/css/style.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="http://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet"
        type="text/css">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>

<body id="page-top" class="index">
    @if (session('error'))
        <div class="alert alert-primary">
            {{ session('error') }}
        </div>
    @endif
    <form method="POST" action="{{ route('frontend.auth.login') }}">
    @csrf
        <div class="container">
            <div class="row">
                <div class="auth-box col-md-4 col-md-push-4">
                    <div class="card-title">
                        <p>Đăng nhập</p>
                    </div>
                    <div class="card-text">
                        <form action="">
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
                                <input type="text" name="name" id="name" required
                                    placeholder="Nhập username">
                            </div>

                            <div class="in-group password">
                                <label for="password">Mật khẩu<i style="color: red;">*</i></label>
                                <input type="password" name="password" id="password" required placeholder="Nhập mật khẩu">
                            </div>


                            <!-- /.col -->
                            <div class="in-group">
                                <button type="submit" class="btn btn-primary btn-block">Đăng nhập</button>
                                <!-- /.col -->
                                <a href="signup.php" class="btn btn-primary btn-block non-active">Đăng ký</a>
                            </div>
                            <div class="f-password">
                                <a href="fpassword.php">Quên mật khẩu?</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</body>

</html>
