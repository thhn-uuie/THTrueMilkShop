<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>True Book – TH true MILK</title>

    @include('frontend.component.head')
</head>
<body id="page-top" class="index">

<div class="tw">
    <div class="menu-header" id="navbar">
        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-fixed-top">
            @include('frontend.component.navbar')
            <!-- /.container-fluid -->
        </nav>
    </div>
</div>
<div class="context">
    <div class="container">
        <span class="item"><a href="{{ asset('/') }}">Trang chủ > </a></span>
        <span class="item"><a href="{{ route('cau_chuyen_that_th') }}">Câu chuyện thật TH> </a></span>
        <span class="item" style="color: #befffb">True Book</span>
    </div>
</div>
<div class="container">
    <iframe src="https://publuu.com/flip-book/411230/929680/page/1?embed"
            width="100%" height="600" scrolling="no" frameborder="0"
            allowfullscreen="" allow="clipboard-write"
            class="publuuflip">
    </iframe>
</div>
<div class="footer">
    @include('frontend.component.footer')
</div>
</body>

</html>
