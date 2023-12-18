<!DOCTYPE html>
<html lang="en">

<head>
    @include('admin.component.head')
</head>

<body class="sidebar-mini" style="height: auto;">
    <!-- Site wrapper -->
    <div class="wrapper">
        <!-- Navbar -->
        @include('admin.component.navbar')
        <aside class="main-sidebar elevation-4">
            @include('admin.component.sidebar')
        </aside>
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid my-2">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <a id="sua" href="{{ route('admin.user.user-update', ['id'=>$user_item->id]) }}" class="btn btn-primary">Sửa</a>
                            <a href="{{ route('admin.user.delete', ['id'=>$user_item->id]) }}" class="btn btn-primary">Xóa</a>
                        </div>
                        <div class="col-sm-6 text-right">
                            <a href="{{ asset('admin/user') }}" class="btn btn-primary">Back</a>
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

                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header pt-3">
                                    <div class="row product-info">
                                        <div class="col-sm-12">
                                            <h1 class="h4 mb-3" id="product-name">Thông tin tài khoản</h1>
                                        </div>
{{--                                        <div class="col-sm-3">--}}
{{--                                            <!-- <div class="card mb-3"> -->--}}
{{--                                            <!-- <div class="card-body"> -->--}}
{{--                                            <h5>Image</h5>--}}
{{--                                            <div id="image">--}}
{{--                                                <img src="img/product-1.jpg" width="80%">--}}
{{--                                                <!-- </div> -->--}}
{{--                                                <!-- </div> -->--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
                                        <div class="col-sm-6">
                                            <h5>Thông tin</h5>

                                            <p id="id"> Username: {{ $user_item->name }}</p>
                                            <p id="email">Email: {{ $user_item->email }}</p>
											<p id="address">Created by: abc </p>
{{--                                            <p id="phone">Phone: 029387372</p>--}}
                                        </div>
{{--                                        <div class="col-sm-3">--}}
{{--                                            <h5>Gender</h5>--}}
{{--                                            <div class="mb-3" id="gender">--}}
{{--                                                <select name="gender" id="gender" class="form-control">--}}
{{--                                                    <option value="">Female</option>--}}
{{--                                                </select>--}}
{{--                                            </div>--}}
{{--											<h5>Status</h5>--}}
{{--                                            <div class="mb-3" id="status">--}}
{{--                                                <select name="status" id="status" class="form-control">--}}
{{--                                                    <option value="">Active</option>--}}
{{--                                                </select>--}}
{{--                                            </div>--}}

{{--                                        </div>--}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>
                <!-- /.card -->
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

    </div>

    @include('admin.component.script');
</body>

</html>
