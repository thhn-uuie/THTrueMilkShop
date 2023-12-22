<?php

use App\Models\User;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Database\Query;
use Illuminate\Support\Facades\DB;

?>
<html lang="en" style="height: auto;">
<head>
    @include('admin.component.head')
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/chart.js/dist/chart.umd.min.js"></script>
</head>

<body class="sidebar-mini" style="height: auto;">
<div class="wrapper">
    @include('admin.component.navbar')

    <aside class="main-sidebar elevation-4">
        @include('admin.component.sidebar')
    </aside>

    <div class="content-wrapper" style="min-height: 384.76px; overflow:scroll;">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Dashboard</h1>
                    </div>
                    <div class="col-sm-6">

                    </div>
                </div>
            </div>
            <!-- /.container-fluid -->
        </section>
        <!-- Main content -->
        <section class="content">
            <!-- Default box -->
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-4 col-6">
                        <div class="small-box card">
                            <div class="inner">
                                <?php $count_user = User::count(); ?>
                                <h3>{{$count_user}}</h3>
                                <p>Tổng số người dùng</p>
                                <div class="tp">
                                    <?php
                                    $countAdmins = User::where('id_role', 1)->count();
                                    ?>
                                    <h6 id="u_active" style="font-size: 14px;">Quản trị viên: {{$countAdmins}}</h6>
                                    <h6 id="u_block" style="font-size: 14px;"> Người dùng: {{$count_user-$countAdmins}}</h6>
                                </div>
                            </div>
                            <div class="icon">
                                <i class="ion ion-bag"></i>
                            </div>
                            <a href="{{ route('admin.user.users') }}" class="small-box-footer text-dark">More info <i
                                    class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>

                    <div class="col-lg-4 col-6">
                        <div class="small-box card">
                            <div class="inner">
                                <h3>{{ Product::count() }}</h3>
                                <p>Tổng số sản phẩm</p>
                                <div class="tp">
                                    <h6 id="sp_active" style="font-size: 14px;">Số sản phẩm hoạt
                                        động: {{Product::where('status', 1)->count()}}</h6>
                                    <h6 id="sp_block" style="font-size: 14px;"> Số sản phẩm không hoạt
                                        động: {{Product::where('status', 0)->count()}}</h6>
                                </div>
                            </div>
                            <div class="icon">
                                <i class="ion ion-stats-bars"></i>
                            </div>
                            <a href="{{ route('admin.product.products') }}" class="small-box-footer text-dark">More info
                                <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>

                    <div class="col-lg-4 col-6">
                        <div class="small-box card">
                            <div class="inner">
                                <h3>{{ Category::count() }}</h3>
                                <p>Tổng số danh mục</p>
                                <div class="tp">
                                    <h6 id="c_active" style="font-size: 14px;">Số danh mục hoạt
                                        động: {{Category::where('status', 1)->count()}}</h6>
                                    <h6 id="c_block" style="font-size: 14px;"> Số danh mục không hoạt
                                        động: {{Category::where('status', 0)->count()}}</h6>
                                </div>
                            </div>
                            <div class="icon">
                                <i class="ion ion-person-add"></i>
                            </div>
                            <a href="{{ route('admin.category.categories') }}" class="small-box-footer text-dark">More
                                info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.card -->
        </section>
        <!-- /.content -->
        <section class="content chart-dash">
            <div class="card mb-4">
                <div class="card-header-chart">
                    <p class="h3">Phân loại sản phẩm</p>
                </div>
                <div class="card-body-chart">
                    <div class="chartBox left" >
                        <canvas id="phanloai"></canvas>
                    </div>
                    <div class="chartBox right" >
                        <canvas id="banchay"></canvas>
                    </div>
                </div>

            </div>
        </section>
    </div>
    <!-- /.content-wrapper -->
    <strong>

    </strong>
    <div id="sidebar-overlay"></div>
</div>
</body>

@include('admin.component.script')

<?php
$categories = DB::table('category')->get();
$products = DB::table('product')->get();

// Tính toán tỷ lệ phần trăm cho từng danh mục
$categoryPercentages = [];

foreach ($categories as $category) {
    $productCount = $products->where('id_category', $category->id)->count();

    $categoryPercentages[] = [
        'label' => $category->name_category,
        'data' => $productCount,
    ];
}
//var_dump($categoryPercentages[0]['label']);
$name_cate = [];
$data_cate = [];
foreach ($categoryPercentages as $item) {
    array_push($name_cate, $item['label']);
    array_push($data_cate, $item['data']);
}

?>

<script>
    function generateRandomColors(count) {
        var colors = [];
        for (var i = 0; i < count; i++) {
            var color = 'rgba(' + getRandomInt(50, 255) + ', ' + getRandomInt(70, 255) + ', ' + getRandomInt(20, 255) + ', 0.8)';
            console.log(color);
            colors.push(color);
        }
        return colors;
    }
    function getRandomInt(min, max) {
        min = Math.ceil(min);
        max = Math.floor(max);
        return Math.floor(Math.random() * (max - min + 1)) + min;
    }

    const data = {
        labels: <?php echo json_encode($name_cate) ?>,
        datasets: [{
            label: 'Số lượng:',
            data: <?php echo json_encode($data_cate) ?>,
            backgroundColor: generateRandomColors(<?php echo count($name_cate) ?>),
            hoverOffset: 4
        }]
    };
    const config = {
        type: 'pie',
        data: data,
    };

    const phanloai = new Chart(
        document.getElementById('phanloai'),
        config,
    );
</script>

<?php
$bestSellingProducts = DB::table('order_detail')
    ->select('id_product', DB::raw('SUM(number_product) as total_quantity'))
    ->groupBy('id_product')
    ->orderBy('total_quantity', 'desc')
    ->get();

$bestseller = [];

foreach ($bestSellingProducts as $item) {

    $nameProduct = $products->where('id', $item->id_product)->pluck('name_product')->first();

    $bestseller[] = [
        'label' => $nameProduct,
        'data' => $item->total_quantity,
    ];
}
$name_product = [];
$data_sell = [];
foreach ($bestseller as $item) {
    array_push($name_product, $item['label']);
    array_push($data_sell, $item['data']);
}
?>
<script>
    const labels = <?php echo json_encode($name_product) ?>;
    const databanchay = {
        labels: labels,
        datasets: [{
            label: 'Số lượng:',
            data: <?php echo json_encode($data_sell) ?>,
            backgroundColor: generateRandomColors(<?php echo count($name_product) ?>),
            borderColor: generateRandomColors(<?php echo count($name_product) ?>),
            borderWidth: 1
        }]
    };
    const configBanChay = {
        type: 'line',
        data: databanchay,
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        },
    };
    const banchay = new Chart(
        document.getElementById('banchay'),
        configBanChay,
    );
</script>


</html>

