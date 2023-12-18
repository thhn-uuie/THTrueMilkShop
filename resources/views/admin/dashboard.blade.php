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
                                    <h3>150</h3>
                                    <p>Tổng số người dùng</p>
                                    <div class="tp">
                                        <h6 id="u_active" style="font-size: 14px;">Số danh mục hoạt động: 50</h6>
                                        <h6 id="u_block" style="font-size: 14px;"> Số danh mục đã xóa: 10</h6>
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
                                    <h3>50</h3>
                                    <p>Tổng số sản phẩm</p>
                                    <div class="tp">
                                        <h6 id="sp_active" style="font-size: 14px;">Số sản phẩm hoạt động: 40</h6>
                                        <h6 id="sp_block" style="font-size: 14px;"> Số sản phẩm đã xóa: 10</h6>
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
                                    <h3>10</h3>
                                    <p>Tổng số danh mục</p>
                                    <div class="tp">
                                        <h6 id="c_active" style="font-size: 14px;">Số danh mục hoạt động: 50</h6>
                                        <h6 id="c_block" style="font-size: 14px;"> Số danh mục đã xóa: 10</h6>
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
