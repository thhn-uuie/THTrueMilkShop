<!DOCTYPE html>
<html lang="en">

<head>
    @include('admin.component.head')
    <script src="https://cdn.ckeditor.com/ckeditor5/40.2.0/classic/ckeditor.js"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">

</head>

<body class="sidebar-mini" style="height: auto;">
<!-- Site wrapper -->
<div class="wrapper">
    <!-- Navbar -->
    @include('admin.component.navbar')
    <!-- /.navbar -->
    <!-- Main Sidebar Container -->
    @
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
                        <h1>Create Product</h1>
                    </div>
                    <div class="col-sm-6 text-right">
                        <a href="{{ asset('/admin/product') }}" class="btn btn-primary">Back</a>
                    </div>
                </div>
            </div>
            <!-- /.container-fluid -->
        </section>
        <!-- Main content -->
        <section class="content">
            <!-- Default box -->
            <form method="POST" action="{{ route('admin.product.create-product') }}" enctype="multipart/form-data">
                @csrf
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="card mb-3">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="mb-3">
                                                <label for="title">Name Product<i style="color: red;">*</i></label>
                                                <input type="text" name="title" id="title" class="form-control"
                                                       placeholder="Title" required>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="mb-3">
                                                <label for="price">Price<i style="color: red;">*</i></label>
                                                <input type="text" name="price" id="price" class="form-control"
                                                       placeholder="Price" required>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="mb-3">
                                                <label for="description">Description<i style="color: red;">*</i></label>
                                                <textarea name="description" id="description"
                                                          placeholder="Description"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="card">
                                                <div class="card-body">
                                                    <h2 class="h4  mb-3">Product category</h2>
                                                    <div class="mb-3">
                                                        <select name="category" id="category" class="form-control">
                                                            <?php $categories = DB::table('category')->get(); ?>
                                                            @foreach($categories as $item)
                                                                <option
                                                                    value="{{ $item->id }}">{{ $item->name_category }}</option>
                                                            @endforeach
                                                        </select>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="col-md-4">
                            <div class="card mb-3">
                                <div class="card-body">
                                    <h2 class="h4 mb-3">Image</h2>
                                    {{--                                    <input type="file" class="form-control" id="product_images" name="product_images[]" multiple="">--}}
                                    <input type="file" class="form-control" id="product_images" name="product_images[]"
                                           multiple="">
                                    <div id="imagePreviewContainer"></div>
{{--                                    ?<p id="fileCount">Số lượng tệp tin: 0</p>--}}


                                    {{--                                    <div class="wrapp" id="wrapper">--}}
                                    {{--                                        <div class="image">--}}
                                    {{--                                            <img src="" alt="" id="img">--}}
                                    {{--                                        </div>--}}
                                    {{--                                        <div class="content">--}}
                                    {{--                                            <div class="icon"><i class="fa fa-cloud-upload-alt"></i></div>--}}
                                    {{--                                            <div class="text">No file chosen, yet!</div>--}}
                                    {{--                                        </div>--}}
                                    {{--                                        <div class="file-name">File name here</div>--}}
                                    {{--                                    </div>--}}
                                    {{--                                    <input type="file" id="l_image" name="file_upload" hidden>--}}
                                    {{--                                    <button type="button" onclick="defaultBtnActive()" id="custom-btn">Choose a file--}}
                                    {{--                                    </button>--}}

                                    {{--                                    <input type="hidden" id="image_id" name="image_id" value="">--}}
                                    {{--                                    <h2 class="h4 mb-3">Image</h2>--}}
                                    {{--                                    <div id="image" class="dropzone dz-clickable">--}}
                                    {{--                                        <div class="dz-message needsclick">--}}
                                    {{--                                            <br> Drop files here or click to upload. <br><br>--}}
                                    {{--                                        </div>--}}
                                    {{--                                    </div>--}}
                                </div>
                            </div>
                            <div class="card mb-3">
                                <div class="card-body">
                                    <h2 class="h4 mb-3">Product status</h2>
                                    <div class="mb-3">
                                        <select name="status" id="status" class="form-control">
                                            <option value="1">Active</option>
                                            <option value="0">Block</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="pb-5 pt-3">
                        <button type="submit" class="btn btn-primary">Create</button>
                        <a href="{{ asset('/admin/product') }}" class="btn btn-outline-dark ml-3">Cancel</a>
                    </div>
                </div>
            </form>
            <!-- /.card -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

</div>
<!-- ./wrapper -->
<!-- jQuery -->
@include('admin.component.script');
<!-- Summernote -->
{{--<script src="{{ asset('/public/admin/js/custom.js') }}"></script>--}}

<script>

    ClassicEditor
        .create(document.querySelector('#description'), {

            height: '300px' // Thay đổi giá trị này để điều chỉnh chiều cao
        })
        .catch(error => {
            console.error(error);
        });



</script>
</body>

</html>
