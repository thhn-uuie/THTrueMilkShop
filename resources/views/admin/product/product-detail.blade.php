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
    @include('admin.component.sidebar')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid my-2">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <a href="{{ url('/admin/product/update',['id' => $product_item->id]) }}" id="sua"
                           class="btn btn-primary">Sửa</a>
                        <a href="{{ route('admin.product.delete', ['id' => $product_item->id]) }}"
                           class="btn btn-primary">Xóa</a>
                    </div>
                    <div class="col-sm-6 text-right">
                        <a href="{{ url('/admin/product') }}" class="btn btn-primary">Back</a>
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
                                        <h1 class="h4 mb-3" id="product-name">{{ $product_item->name_product }}</h1>
                                    </div>
                                    <div class="col-sm-3">
                                        <!-- <div class="card mb-3"> -->
                                        <!-- <div class="card-body"> -->
                                        <h5>Image</h5>
                                        <div id="image">
                                            <img src="{{ url('public/admin/img/product/'). '/' .$product_item->image }}"
                                                 width="80%">
                                            <!-- </div> -->
                                            <!-- </div> -->
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <h5>Thông tin</h5>

                                        <p id="id">ID: {{ $product_item->id }}</p>
                                        <p id="price">Price: ${{ $product_item->price }}</p>
                                        <p id="category">Category: {{$product_item->category->name_category}}</p>
                                        <p id="description">Description: {!! $product_item->description  !!} </p>
                                    </div>
                                    <div class="col-sm-3">
                                        <h5>Status</h5>
                                        <div class="mb-3" id="status">
                                            <select name="status" id="status" class="form-control">
                                                <option value="">{{ $product_item->status }}</option>
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

@include('admin.component.script');
<!-- Summernote -->
<script src="{{ asset('/public/admin/plugins/summernote/summernote-bs4.min.js') }}"></script>
{{--<script src="{{ asset('/public/admin/js/custom.js') }}"></script>--}}

{{--<script>--}}
{{--    // Lấy tham chiếu đến phần tử <a> có id là "sua"--}}
{{--    const suaLink = document.querySelector('#sua');--}}

{{--    // Lấy tham chiếu đến phần tử <div> có id là "s_product"--}}
{{--    const sProductDiv = document.querySelector('#s_product');--}}

{{--    // Gán sự kiện click cho phần tử <a>--}}
{{--    suaLink.addEventListener('click', () => {--}}
{{--        // Trượt xuống phần tử <div> s_product--}}
{{--        sProductDiv.scrollIntoView({behavior: 'smooth'});--}}
{{--    });--}}

{{--</script>--}}
</body>

</html>
