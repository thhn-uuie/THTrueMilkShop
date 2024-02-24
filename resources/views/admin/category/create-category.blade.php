<!DOCTYPE html>
<html lang="en">

<head>
    <title> Thêm danh mục</title>
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
                        <h1>Create Category</h1>
                    </div>
                    <div class="col-sm-6 text-right">
                        <a href="{{ asset('/admin/category') }}" class="btn btn-primary">Back</a>
                    </div>
                </div>
            </div>
            <!-- /.container-fluid -->
        </section>
        <!-- Main content -->
        <section class="content">
            <!-- Default box -->

            <form method="POST" action="{{ route('admin.category.create-category') }}" enctype="multipart/form-data">
                @csrf
                @if ($message = Session::get('success'))

                    <div class="alert alert-success alert-block">
                    <i class="fa fa-check-circle" aria-hidden="true"></i>
                        <button type="button" class="close" data-dismiss="alert">×</button>

                        <strong>{{ $message }}</strong>

                    </div>
                @endif
                <div class="container-fluid">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label for="name">Image</label>
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
                                        <button type="button" onclick="defaultBtnActive()" id="custom-btn">Choose a
                                            file
                                        </button>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="mb-3">
                                        <label for="name">Name Category<i style="color: red;">*</i></label>
                                        <input type="text" name="name_category" id="name" class="form-control"
                                               placeholder="Name" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="pb-5 pt-3">
                        <button type="submit" class="btn btn-primary">Create</button>
                        <a href="{{ asset('/admin/category') }}" class="btn btn-outline-dark ml-3">Cancel</a>
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
@include('admin.component.script')
<script src="{{ asset('public/admin/js/custom.js') }}"></script>
</body>

</html>
