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
                <form method="POST" action="{{ route('admin.product.product-update', ['id'=>$product->id]) }}"
                      enctype="multipart/form-data">
                    @csrf
                    @if ($message = Session::get('success'))

                        <div class="alert alert-success alert-block">
                        <i class="fa fa-check" aria-hidden="true"></i>
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
                                        <div class="col-md-12">
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
                                    <div class="img_multiple">
                                    <input type="file" class="form-control" id="product_images" name="product_images[]"
                                           multiple="">
                                           <div class="img_show"></div></div>
                                    <div>
                                        <form action="" method="post">
                                            <button class="btn text-danger " style="display: none;">x</button>
                                            @csrf
                                        </form>
                                        <img src=""
                                             style="width: 100px; height: 100px; display:none">
                                    </div>
                                    <ul class="list_img">
                                    @if($product['image'] !== null)
                                        @foreach ($product['image'] as $img)
                                            <li class="delete_img" data-image-id="{{ $img->id }}">
                                                <form action="{{ route('deleteimage', ['id'=>$img->id]) }}"
                                                      method="post">
                                                    <button class="btn text-danger delete-button">X</button>
                                                    @csrf
                                                </form>
                                                <img src="{{ url('public/admin/img/product/'.$img->image) }}"
                                                     style="width: 100px!important; height: 100px!important">
                                            </li>
                                        @endforeach
                                    @endif
                                    </ul>
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


                        </div>

                    </div>

                </form>
            </section>
        </section>
    </div>

</div>
<!-- Summernote -->
<script src="{{ asset('/public/admin/plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('/public/admin/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('/public/admin/js/adminlte.min.js') }}"></script>
<script src="{{ asset('/public/admin/plugins/summernote/summernote-bs4.min.js') }}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('/public/admin/js/demo.js') }}"></script>

<script>
    // Đảm bảo rằng mã JavaScript được thực thi sau khi tài liệu HTML đã được tải
    $(document).ready(function() {
        $('.summernote').summernote({
            height: '100px'
        });
        // Multiple images preview in browser
        var imagesPreview = function(input, placeToInsertImagePreview) {
            $(placeToInsertImagePreview).empty(); // Xóa bỏ các ảnh hiện tại

            if (input.files) {
                var filesAmount = input.files.length;

                for (i = 0; i < filesAmount; i++) {
                    var reader = new FileReader();

                    reader.onload = function(event) {
                        $($.parseHTML('<img>')).attr('src', event.target.result).appendTo(placeToInsertImagePreview);
                    }

                    reader.readAsDataURL(input.files[i]);
                }
            }
        };

        $('#product_images').on('change', function() {
            imagesPreview(this, 'div.img_show');
        });

    });

</script>
</body>
</html>
