<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Administrative – TH true MILK</title>
    <link rel="icon" href="https://www.thmilk.vn/wp-content/themes/wp-th/favicon.png" type="image/png">
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('/public/admin/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('/public/admin/css/adminlte.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/public/admin/css/custom.css') }}">
    <link rel="stylesheet" href="{{ asset('/public/admin/plugins/summernote/summernote-bs4.min.css') }}">
</head>

<body class="sidebar-mini" style="height: auto;">
<!-- Site wrapper -->
<div class="wrapper">
    <!-- Navbar -->
    @include('admin.navbar')
    <!-- /.navbar -->
    <!-- Main Sidebar Container -->
    @include('admin.sidebar')
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
                                                <textarea name="description" id="description" cols="30" rows="10"
                                                          class="summernote" placeholder="Description" required
                                                          style="width: 100%;"></textarea>
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
                                    <div class="wrapp" id="wrapper">
                                        <div class="image">
                                            <img src="" alt="" id="img">
                                        </div>
                                        <div class="content">
                                            <div class="icon"><i class="fa fa-cloud-upload-alt"></i></div>
                                            <div class="text">No file chosen, yet!</div>
                                        </div>
                                        <div class="file-name">File name here</div>
                                    </div>
                                    <input type="file" id="l_image" name="file_upload" hidden>
                                    <button type="button" onclick="defaultBtnActive()" id="custom-btn">Choose a file
                                    </button>
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
<script src="{{ asset('/public/admin/plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('/public/admin/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('/public/admin/js/adminlte.min.js') }}"></script>
<!-- AdminLTE for demo purposes -->
<!-- Summernote -->
<script src="{{ asset('/public/admin/plugins/summernote/summernote-bs4.min.js') }}"></script>
<script src="{{ asset('/public/admin/js/demo.js') }}"></script>
<script src="{{ asset('/public/admin/js/custom.js') }}"></script>
</body>

</html>
