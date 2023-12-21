<?php
use App\Models\User;
use App\Models\Product;
use App\Models\Category;
?>
<html lang="en" style="height: auto;">
<head>
    @include('admin.component.head')
</head>

<body class="sidebar-mini" style="height: auto;">
    <div class="wrapper">
        @include('admin.component.navbar')

        <aside class="main-sidebar elevation-4">
            @include('admin.component.sidebar')
        </aside>

        <div class="content-wrapper" style="min-height: 384.76px;">
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
                                    <?php $count_user = User::count();?>
                                    <h3>{{$count_user}}</h3>
                                    <p>Tổng số người dùng</p>
                                    <div class="tp">
                                        <?php
                                        $countAdmins = User::where('id_role', 1)->count();
                                        ?>
                                        <h6 id="u_active" style="font-size: 14px;">Admin: {{$countAdmins}}</h6>
                                        <h6 id="u_block" style="font-size: 14px;"> User: {{$count_user-$countAdmins}}</h6>
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
                                        <h6 id="sp_active" style="font-size: 14px;">Số sản phẩm hoạt động: {{Product::where('status', 1)->count()}}</h6>
                                        <h6 id="sp_block" style="font-size: 14px;"> Số sản phẩm không hoạt động: {{Product::where('status', 0)->count()}}</h6>
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
                                        <h6 id="c_active" style="font-size: 14px;">Số danh mục hoạt động: {{Category::where('status', 1)->count()}}</h6>
                                        <h6 id="c_block" style="font-size: 14px;"> Số danh mục không hoạt động: {{Category::where('status', 0)->count()}}</h6>
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
        </div>
        <!-- /.content-wrapper -->
        <strong>

        </strong>
        <div id="sidebar-overlay"></div>
    </div>
</body>

@include('admin.component.script')
</html>
