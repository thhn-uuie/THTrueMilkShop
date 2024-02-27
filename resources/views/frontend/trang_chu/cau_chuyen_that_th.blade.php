<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Câu chuyện thật TH – TH true MILK</title>
    @include('frontend.component.head')
</head>

<body id="page-top" class="index">
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
            <span class="item"><a href="{{ asset('/') }}">Trang chủ > </a></span>
            <span class="item">Câu chuyện thật TH</span>
        </div>
    </div>

    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-sm-12 col-xs-12">
                    <div class="card c-first">
                        <img src="https://www.thmilk.vn/wp-content/uploads/2019/12/Cau-chuyen-that-truebook.jpg"
                             alt="cau-chuyen-that-truebook-3">
                        <div class="card-body">
                            <h5 class="card-title">True book</h5>
                            <p class="card-text">Mọi câu chuyện đều có một khởi đầu. Với TH, chúng tôi bắt đầu câu
                                chuyện của mình
                                bằng khao khát vươn lên mang tên tầm vóc Việt</p>
                            <a href="{{ route('truebook') }}" class="btn btn-primary">Chi tiết</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-12 col-xs-12">
                    <div class="card">
                        <img src="https://www.thmilk.vn/wp-content/uploads/2019/11/Cau-chuyen-that-quy-trinh.jpg"
                             alt="cau-chuyen-that-quy-trinh">
                        <div class="card-body">
                            <h5 class="card-title">QUI TRÌNH SẢN XUẤT SỮA TƯƠI SẠCH</h5>
                            <p class="card-text">Tìm hiểu qui trình sản xuất sữa sạch TH true MILK</p>
                            <a href="{{ route('quytrinh') }}" class="btn btn-primary">Chi tiết</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-12 col-xs-12 c-end">
                    <div class="card">
                        <img src="https://www.thmilk.vn/wp-content/uploads/2019/11/Cau-chuyen-that-Trang-trai.jpg"
                             alt="cau-chuyen-that-trang-trai">
                        <div class="card-body">
                            <h5 class="card-title">TRANG TRẠI TH</h5>
                            <p class="card-text">Tham quan trang trại ứng dụng công nghệ cao lớn nhất Châu Á</p>
                            <a href="{{ route('trangtrai') }}" class="btn btn-primary">Chi tiết</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

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
