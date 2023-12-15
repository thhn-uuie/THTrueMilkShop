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
    <link rel="stylesheet" href="../../../public/admin/plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../../../public/admin/css/adminlte.min.css">
    <link rel="stylesheet" href="../../../public/admin/plugins/summernote/summernote-bs4.min.css">
    <link rel="stylesheet" href="../../../public/admin/plugins/dropzone/dropzone.css">
    <link rel="stylesheet" href="../../../public/admin/css/custom.css">
</head>

<body class="sidebar-mini" style="height: auto;">
    <!-- Site wrapper -->
    <div class="wrapper">
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Right navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
            </ul>
            <div class="navbar-nav pl-2">
                <ol class="breadcrumb p-0 m-0 bg-white">
                    <li class="breadcrumb-item active">Dashboard</li>
                </ol>
            </div>

            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                        <i class="fas fa-expand-arrows-alt"></i>
                    </a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link p-0 pr-3" data-toggle="dropdown" href="#">
                        <img src="../../../public/admin/img/avatar5.png" class="img-circle elevation-2" width="40" height="40" alt="">
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right p-3">
                        <h4 class="h4 mb-0"><strong>Mohit Singh</strong></h4>
                        <div class="mb-3">example@example.com</div>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <i class="fas fa-user-cog mr-2"></i> Settings
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <i class="fas fa-lock mr-2"></i> Change Password
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item text-danger">
                            <i class="fas fa-sign-out-alt mr-2"></i> Logout
                        </a>
                    </div>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->
        <!-- Main Sidebar Container -->
        <aside class="main-sidebar elevation-4">
            <!-- Brand Logo -->
            <a href="#" class="brand-link">
                <!-- <img src="https://www.thmilk.vn/wp-content/themes/wp-th/assets/images/logo.png?>" alt="logo"> -->
                <span class="brand-text">TH True Milk</span>
            </a>
            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user (optional) -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class
								with font-awesome or any other icon font library -->
                        <li class="nav-item">
                            <a href="dashboard.html" class="nav-link">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>Dashboard</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="categories.html" class="nav-link">
                                <i class="nav-icon fas fa-file-alt"></i>
                                <p>Category</p>
                            </a>
                        </li>


                        <li class="nav-item">
                            <a href="products.html" class="nav-link">
                                <i class="nav-icon fas fa-tag"></i>
                                <p>Products</p>
                            </a>
                        </li>


                        <li class="nav-item">
                            <a href="orders.html" class="nav-link">
                                <i class="nav-icon fas fa-shopping-bag"></i>
                                <p>Orders</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="users.html" class="nav-link">
                                <i class="nav-icon  fas fa-users"></i>
                                <p>Users</p>
                            </a>
                        </li>

                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid my-2">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <a id="sua" class="btn btn-primary">Sửa</a>
                            <a href="users.html" class="btn btn-primary">Xóa</a>
                        </div>
                        <div class="col-sm-6 text-right">
                            <a href="users.html" class="btn btn-primary">Back</a>
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
                                            <h1 class="h4 mb-3" id="product-name">DTH</h1>
                                        </div>
                                        <div class="col-sm-3">
                                            <!-- <div class="card mb-3"> -->
                                            <!-- <div class="card-body"> -->
                                            <h5>Image</h5>
                                            <div id="image">
                                                <img src="../../../public/admin/img/product-1.jpg" width="80%">
                                                <!-- </div> -->
                                                <!-- </div> -->
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <h5>Thông tin</h5>

                                            <p id="id">ID: 1</p>
                                            <p id="email">Email: abc@gmai.com</p>
											<p id="address">Address: bcjwet diewuh ửiquwhscwui </p>
                                            <p id="phone">Phone: 029387372</p>
                                        </div>
                                        <div class="col-sm-3">
                                            <h5>Gender</h5>
                                            <div class="mb-3" id="gender">
                                                <select name="gender" id="gender" class="form-control">
                                                    <option value="">Female</option>
                                                </select>
                                            </div>
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

                    <form action="">
                        <div class="row" id="s_user">
                            <div class="col-md-8">
                                <div class="card mb-3">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="mb-3">
                                                    <label for="title">Name<i style="color: red;">*</i></label>
                                                    <input type="text" name="name" id="name" class="form-control"
                                                        placeholder="Name" required>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="mb-3">
                                                    <label for="price">Email<i style="color: red;">*</i></label>
                                                    <input type="email" name="email" id="email" class="form-control"
                                                        placeholder="Email" required>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="mb-3">
                                                    <label for="description">Phone<i style="color: red;">*</i></label>
                                                    <input type="tel" name="phone" id="phone" class="form-control"
                                                        placeholder="Phone" required>
                                                </div>
                                            </div>

											<div class="col-md-12">
                                                <div class="mb-3">
                                                    <label for="description">Address<i style="color: red;">*</i></label>
                                                    <input type="text" name="address" id="address" class="form-control"
                                                        placeholder="Address" required>
                                                </div>
                                            </div>
											<div class="col-sm-12">
                                            <div class="mb-3" id="s_gender">
												<label for="gender">Gender</label>
                                                <select name="s_gender" id="s_gender" class="form-control">
                                                    <option value="">Female</option>
													<option value="">Male</option>
                                                </select>
                                            </div>
											</div>

                                        </div>
                                    </div>
                                </div>
                                <div class="">
                                    <button type="submit" class="btn btn-primary">Sửa</button>
                                </div>


                            </div>
                            <div class="col-md-4">
                                <div class="card mb-3">
									<div class="card-body">
										<h5>Image</h5>
										<div id="u_image" class="dropzone dz-clickable">
											<div class="dz-message needsclick">
												<br>Drop files here or click to upload.<br><br>
											</div>
										</div>
									</div>
								</div>
                                
                                
								<div class="card">
                                    <div class="card-body">
                                        <h5>Status</h5>
                                        <div class="mb-3">
                                            <select name="s_status" id="s_status" class="form-control">
                                                <option value="">Active</option>
                                                <option value="">Block</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>


                            </div>

                        </div>


                    </form>
                </div>
                <!-- /.card -->
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

    </div>

    <script src="../../../public/admin/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="../../../public/admin/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../../../public/admin/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <!-- Summernote -->
    <script src="../../../public/admin/plugins/summernote/summernote-bs4.min.js"></script>
    <script src="../../../public/admin/plugins/dropzone/dropzone.js"></script>
    <script src="../../../public/admin/js/demo.js"></script>

    <script>
        // Lấy tham chiếu đến phần tử <a> có id là "sua"
        const suaLink = document.querySelector('#sua');

        // Lấy tham chiếu đến phần tử <div> có id là "s_product"
        const sProductDiv = document.querySelector('#s_user');

        // Gán sự kiện click cho phần tử <a>
        suaLink.addEventListener('click', () => {
            // Trượt xuống phần tử <div> s_product
            sProductDiv.scrollIntoView({ behavior: 'smooth' });
        });
        Dropzone.autoDiscover = false;
        $(document).ready(function () {
            $('.summernote').summernote({
                height: '260px'
            });

            const dropzone = $("#u_image").dropzone({
                url: "user-detail.html",
                maxFiles: 1,
                addRemoveLinks: true,
                acceptedFiles: "image/jpeg,image/png,image/gif",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                }, success: function (file, response) {
                    $("#image_id").val(response.id);
                }
            });

        });
    </script>
</body>

</html>