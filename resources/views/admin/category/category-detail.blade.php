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
                        <a href="{{ url('/admin/category/update',['id' => $category_item->id]) }}" id="sua"
                           class="btn btn-primary">Cập nhật</a>
                        <a href="{{ route('admin.category.delete', ['id' => $category_item->id]) }}"
                           class="btn btn-primary">Xóa</a>
                    </div>
                    <div class="col-sm-6 text-right">
                        <a href="{{ url('/admin/category') }}" class="btn btn-primary">Back</a>
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
                                            <?php $image_current = url('/public/admin/img/category') . '/' . $category_item->image ?>
                                            <img src="{{ $image_current }}" >
                                            <!-- </div> -->
                                            <!-- </div> -->
                                        </div>
                                    </div>
                                    <div class="col-sm-8">
                                    <h1 id="product-name" class="h2">{{ $category_item->name_category }}</h1>

                                        <div class="sub-info">
                                        <p class="tittle">Trạng thái</p>

                                        @if( $category_item->status == 1)
                                        <p id="status">Hoạt động</p>
                                            @else
                                            <p id="status">Không hoạt động</p>
                                            @endif
                                        </div>

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

<!-- Summernote -->

@include('admin.component.script')
</body>

</html>
