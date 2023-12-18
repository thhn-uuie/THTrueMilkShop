<!DOCTYPE html>
<html lang="en">

<head>
    @include('admin.component.head')
    <link rel="stylesheet" href="{{ asset('/public/admin/plugins/summernote/summernote-bs4.min.css') }}">
</head>
<body class="sidebar-mini" style="height: auto;">
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
                        <h1>Update Product</h1>
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
            <section class="content">
                <form method="POST" action="" enctype="multipart/form-data">
                    @csrf
                    @if ($message = Session::get('success'))

                        <div class="alert alert-success alert-block">

                            <button type="button" class="close" data-dismiss="alert">×</button>

                            <strong>{{ $message }}</strong>

                        </div>
                    @endif
                    <div class="row" id="s_product">
                        <div class="col-md-8">
                            <div class="card mb-3">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="mb-3">
                                                <label for="title">Name Product<i style="color: red;">*</i></label>
                                                <input type="text" name="title" id="title" class="form-control"
                                                       placeholder="Title" value="{{ $product->name_product }}"
                                                       required>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="mb-3">
                                                <label for="price">Price<i style="color: red;">*</i></label>
                                                <input type="text" name="price" id="price" class="form-control"
                                                       placeholder="Price" value="{{ $product->price }}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="mb-3">
                                                <label for="description">Description</label>
                                                <br>
                                                <textarea name="description" id="description" cols="30" rows="10"
                                                          class="summernote" placeholder="Description"
                                                          style="width: 100%;">{!! $product->description  !!}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="">
                                <button type="submit" class="btn btn-primary">Cập nhật</button>
                            </div>

                        </div>
                        <div class="col-md-4">
                            <div class="card mb-3">
                                <div class="card-body">
                                    <h5>Image</h5>
                                    <div class="wrapp" id="wrapper">
                                        <div class="image">
                                            @if($product->image !== null)
                                                <img src="{{url('/public/admin/img/product') .'/'. $product->image }}"
                                                     alt="" id="img">
                                            @else
                                                <img src="" id="img">
                                            @endif
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
                                    <h5>Product status</h5>
                                    <div class="mb-3">
                                        <select name="status" id="s_status" class="form-control">
                                            <?php $selectedStatus = $product->status ?>
                                            @if($selectedStatus == 1)
                                                <option value="{{ $selectedStatus }}"> Active</option>
                                                <option value="0"> Block</option>
                                            @else
                                                <option value="{{ $selectedStatus }}"> Block</option>
                                                <option value="1"> Active</option>
                                            @endif

                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-body">
                                    <h5>Product category</h5>
                                    <div class="mb-3">
                                        <select name="category" id="category" class="form-control">
                                            <?php $categories = DB::table('category')->get(); ?>
                                            <?php $selectedCategoryId = $product->id_category; ?>

                                            <?php $selectedCategory = $categories->where('id', $selectedCategoryId)->first(); ?>
                                            @if($selectedCategory)
                                                <option
                                                    value="{{ $selectedCategory->id }}">{{ $selectedCategory->name_category }}</option>
                                            @endif

                                            @foreach($categories as $item)
                                                @if($item->id !== $selectedCategoryId)
                                                    <option value="{{ $item->id }}">{{ $item->name_category }}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>

                </form>
            </section>
    </div>

</div>
</body>
@include('admin.component.script');
<!-- Summernote -->
<script src="{{ asset('/public/admin/plugins/summernote/summernote-bs4.min.js') }}"></script>
<script src="{{ asset('public/admin/js/custom.js') }}"></script>
</html>
