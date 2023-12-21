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
                    <div class="col-sm-6 d-flex">
                        <a href="{{ route('admin.user.user-update', ['id'=>$user_item->id]) }}" id="sua"
                           class="btn btn-primary mr-2">Cập nhật</a>
                        @if($user_item->id_role == 2)
                            <form method="POST" action="{{ route('admin.user.delete', ['id'=>$user_item->id]) }}"
                                  onsubmit="return confirm('Bạn chắc chắn muốn xóa?')">
                                @csrf
                                <button type="submit" class="btn btn-primary">Xóa</button>
                            </form>
                        @endif
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
                                    <div class="col-sm-6">
                                        @if($user_item->id_role ==1)
                                            <h5>Admin</h5>
                                        @else
                                            <h5>User</h5>
                                        @endif
                                        <p id="id"> Username: {{ $user_item->name }}</p>
                                        <p id="email">Email: {{ $user_item->email }}</p>
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
