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
	<link rel="stylesheet" href="../../public/admin/plugins/fontawesome-free/css/all.min.css">
	<!-- Theme style -->
	<link rel="stylesheet" href="../../public/admin/css/adminlte.min.css">
	<link rel="stylesheet" href="../../public/admin/css/custom.css">
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
                <form method="POST" action="{{ route('admin.category.create-category') }}">
                    @csrf
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
		
												<input type="file" id="l_image" name="image" hidden>
												<button type="button" onclick="defaultBtnActive()" id="custom-btn">Choose a file</button>
		
											</div>
									</div>
									<div class="col-md-8">
										<div class="mb-3">
											<label for="name">Name Category<i style="color: red;">*</i></label>
											<input type="text" name="name" id="name" class="form-control"
												placeholder="Name" required>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="pb-5 pt-3">
							<button type="submit" class="btn btn-primary">Create</button>
							<a href="brands.html" class="btn btn-outline-dark ml-3">Cancel</a>
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
	<script src="../../public/admin/plugins/jquery/jquery.min.js"></script>
	<!-- Bootstrap 4 -->
	<script src="../../public/admin/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
	<!-- AdminLTE App -->
	<script src="../../public/admin/js/adminlte.min.js"></script>
	<!-- AdminLTE for demo purposes -->
	<script src="../../public/admin/js/demo.js"></script>
	<script src="../../public/admin/js/custom.js"></script>
</body>

</html>
