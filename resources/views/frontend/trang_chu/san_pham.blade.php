<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Sản phẩm – TH true MILK</title>
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
            <span class="item"><a href="{{asset('/')}}">Trang chủ > </a></span>
            <span class="item">Sản phẩm</span>
        </div>
    </div>

    <div class="nd1">
        <div class="container">
            <div class="owl-sp">
                <div class="owl-carousel owl-theme" id="owl-carousel1">
                    @foreach($category as $item)
                        <div class="item">
                            <div class="c-listitem1__card1">
                                <a class="c-listitem1__link1"
                                   href="{{asset('/san-pham')}}">
                                    <div class="c-listitem1__img1">
                                        <img src="{{ url('/public/admin/img/category') . '/' . $item->image }}"
                                             alt="ic-suatietrung"
                                             style="width: 60px!important; height: 60px!important;">
                                    </div>
                                    <article class="c-listitem1__content1">
                                        <h4 class="title1">{{ $item->name_category }}</h4>
                                    </article>
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="p-product2">
            @foreach($category as $item)
                    <?php $products = \App\Models\Product::where('id_category', $item->id)->where('status', 1)->get(); ?>
                @if($products->isNotEmpty())
                    <div class="p-product2__box1" id="">
                        <h2 class="p-product2__title1">{{ $item->name_category }}</h2>
                        <div class="c-listitem3-root1">
                            <div class="c-listitem3">

                                @foreach($products as $product)
                                    <div class="c-listitem3__card1 item1-js">
                                        <div class="c-listitem3__img1">
                                                <?php $galleryProduct = \App\Models\Gallery::where('id_product', $product->id)->get(); ?>
                                            {{--                                            {{dd($galleryProduct->first()->image )}}--}}
                                            <img style="width: 150px!important; height: 150px!important;"
                                                 src="{{ url('public/admin/img/product') . '/' . $galleryProduct->first()->image }}"
                                                 alt="{{$product->name_product}}">

                                        </div>
                                        <article class="c-listitem3__content1">
                                            <form method="post" action="{{ route('cart.add') }}">
                                                @csrf
                                                <h4 class="title1">{{ $product->name_product }}</h4>
                                                <div class="info1">
                                                    <span class="info1__price1">{{ $product->price }}</span>
                                                    @guest
                                                        <button type="button" onclick="showLoginAlert()">
                                                            <i class="fa fa-solid fa-cart-shopping fa-lg"></i>
                                                        </button>
                                                    @else
                                                        <button name="id_product" value="{{ $product->id }}"
                                                                type="submit">
                                                            <input type="hidden" name="price"
                                                                   value="{{ $product->price }}">
                                                            <i class="fa fa-solid fa-cart-shopping fa-lg"></i>
                                                        </button>
                                                    @endguest
                                                </div>
                                            </form>


                                        </article>
                                    </div>
                                @endforeach

                            </div>

                        </div>

                    </div>
                @endif

            @endforeach
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

    $("#owl-carousel1").owlCarousel({
        dots: false,
        nav: true,
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 4
            },
            900: {
                items: 6
            },
            1100: {
                items: 9
            }
        }
    });
</script>

<script>
    function showLoginAlert() {
        alert('Vui lòng đăng nhập để thêm sản phẩm vào giỏ hàng.');
        // Redirect to login page if needed

    }
</script>
</body>

</html>
