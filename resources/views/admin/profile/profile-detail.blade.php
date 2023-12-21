<!DOCTYPE html>
<html lang="en">

<head>
    @include('admin.component.head')
    <link rel="stylesheet" href="{{ asset('/public/admin/plugins/summernote/summernote-bs4.min.css') }}">
</head>

<body class="sidebar-mini" style="height: auto;">
<!-- Site wrapper -->
<div class="wrapper">
    <!-- Navbar -->
    @include('admin.component.navbar')
    <!-- /.navbar -->
    <!-- Main Sidebar Container -->
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
                        {{--                        <a href="{{ url('/admin/product/update',['id' => $profile->id]) }}" id="sua"--}}
                        {{--                           class="btn btn-primary">Cập nhật</a>--}}
                        <a href="{{ route('admin.profile.delete', ['id' => $profile->id]) }}"
                           class="btn btn-primary">Xóa</a>
                    </div>
                    <div class="col-sm-6 text-right">
                        <a href="{{ url('/admin/profile') }}" class="btn btn-primary">Back</a>
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
                            <div class="card-header">
                                <div class="row product-info">

                                    <div class="col-sm-4">
                                        <div id="image">
                                            <img
                                                src="{{ url('public/admin/img/product/657d6e10cf493_image_default.jpg') }}">
                                            <!-- </div> -->
                                            <!-- </div> -->
                                        </div>
                                    </div>
                                    <div class="col-sm-8">
                                        <h1 class="h2" id="product-name">{{ $profile->name }}</h1>
                                        <div class="row">
                                            <div class="col-sm-6 sub-info">
                                                <p class="tittle">Email</p>
                                                <p id="description">{{ \App\Models\Profile::find($profile->id)->user->email }} </p>
                                            </div>
                                            <div class="col-sm-6 sub-info">
                                                <p class="tittle">Điện thoại</p>
                                                <p id="price">{{ $profile->phone }}</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-6 sub-info">
                                                <p class="tittle">Ngày sinh</p>
                                                <p id="category">{{$profile->birthday}}</p>
                                            </div>
                                            <div class="col-sm-6 sub-info">
                                                <p class="tittle">Giới tính</p>
                                                <p id="category">{{$profile->gender}}</p>
                                            </div>
                                        </div>
                                        <div class="sub-info">
                                            <p class="tittle">Địa chỉ</p>
                                            <p id="category">{{$profile->address}}</p>
                                        </div>

                                        {{--                                        <div class="sub-info">--}}
                                        {{--                                            <p class="tittle">Trạng thái</p>--}}
                                        {{--                                            @if( $profile->status == 1)--}}
                                        {{--                                                <p id="status">Hoạt động</p>--}}
                                        {{--                                            @else--}}
                                        {{--                                                <p id="status">Không hoạt động</p>--}}
                                        {{--                                            @endif--}}
                                        {{--                                        </div>--}}
                                    </div>

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
