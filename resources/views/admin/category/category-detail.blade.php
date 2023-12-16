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
    @include('admin.component.sidebar')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid my-2">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <a href="{{ url('/admin/category/update',['id' => $category_item->id]) }}" id="sua"
                           class="btn btn-primary">Sửa</a>
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
                            <div class="card-header pt-3">
                                <div class="row product-info">
                                    <div class="col-sm-12">
                                        <h1 class="h4 mb-3" id="product-name">{{ $category_item->name_category }}</h1>
                                    </div>
                                    <div class="col-sm-3">
                                        <!-- <div class="card mb-3"> -->
                                        <!-- <div class="card-body"> -->
                                        <h5>Image</h5>
                                        <div id="image">
                                            <?php $image_current = url('/public/admin/img/category') . '/' . $category_item->image ?>
                                            <img src="{{ $image_current }}" width="80%">
                                            <!-- </div> -->
                                            <!-- </div> -->
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <h5>Thông tin</h5>

                                        <p id="id">ID: {{ $category_item->id }}</p>

                                    </div>
                                    <div class="col-sm-3">
                                        <h5>Status</h5>
                                        <div class="mb-3" id="status">
                                            <select name="status" id="status" class="form-control">
                                                <option value="">Active</option>
                                            </select>
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
<script src="../../plugins/summernote/summernote-bs4.min.js') }}"></script>

{{--<script src="{{ asset('public/admin/js/custom.js') }}"></script>--}}

{{--<script>--}}
{{--    // Lấy tham chiếu đến phần tử <a> có id là "sua"--}}
{{--    const suaLink = document.querySelector('#sua');--}}

{{--    // Lấy tham chiếu đến phần tử <div> có id là "s_product"--}}
{{--    const sProductDiv = document.querySelector('#s_category');--}}

{{--    // Gán sự kiện click cho phần tử <a>--}}
{{--    suaLink.addEventListener('click', () => {--}}
{{--        // Trượt xuống phần tử <div> s_product--}}
{{--        sProductDiv.scrollIntoView({behavior: 'smooth'});--}}
{{--    });--}}
{{--</script>--}}
</body>

</html>
