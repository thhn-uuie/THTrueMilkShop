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
							<h1>Create User</h1>
						</div>
						<div class="col-sm-6 text-right">
							<a href="{{ asset('/admin/user') }}" class="btn btn-primary">Back</a>
						</div>
					</div>
				</div>
				<!-- /.container-fluid -->
			</section>
			<!-- Main content -->
			<section class="content">
				<!-- Default box -->
                <form method="POST" action="{{ route('admin.user.create-user') }}" enctype="multipart/form-data">
                    @csrf
                    @if ($message = Session::get('success'))

                        <div class="alert alert-success alert-block">

                            <button type="button" class="close" data-dismiss="alert">×</button>

                            <strong>{{ $message }}</strong>

                        </div>
                    @endif
					<div class="container-fluid">
						<div class="card">
							<div class="card-body">
								<div class="row">

									<div class="col-md-6">
										<div class="mb-3">
											<label for="name">Username<i style="color: red;">*</i></label>
											<input type="text" name="name" id="name" class="form-control"
												placeholder="Name" required>
										</div>
									</div>
									<div class="col-md-6">
										<div class="mb-3">
											<label for="email">Email<i style="color: red;">*</i></label>
											<input type="text" name="email" id="email" class="form-control"
												placeholder="Email" required>
										</div>
									</div>
									<div class="col-md-6">
										<div class="mb-3">
											<label for="phone">Password<i style="color: red;">*</i></label>
											<input type="password" name="password" id="password" class="form-control"
												placeholder="Password" required>
										</div>
									</div>
{{--									<div class="col-md-6">--}}
{{--										<div class="mb-3">--}}
{{--											<label for="phone">Phone<i style="color: red;">*</i></label>--}}
{{--											<input type="text" name="phone" id="phone" class="form-control"--}}
{{--												placeholder="Phone" required>--}}
{{--										</div>--}}
{{--									</div>--}}
{{--									<div class="col-md-12">--}}
{{--										<div class="mb-3">--}}
{{--											<label for="phone">Address<i style="color: red;">*</i></label>--}}
{{--											<textarea name="address" id="address" class="form-control" cols="30"--}}
{{--												rows="5"></textarea>--}}
{{--										</div>--}}
{{--									</div>--}}
								</div>
							</div>
						</div>
						<div class="pb-5 pt-3">
							<button type="submit" class="btn btn-primary">Create</button>
							<a href="users.html" class="btn btn-outline-dark ml-3">Cancel</a>
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
</body>

</html>
