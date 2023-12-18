<!DOCTYPE html>
<html lang="en">

<head>
	@include('admin.component.head')
</head>

<body class="sidebar-mini" style="height: auto;">
	<!-- Site wrapper -->
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
							<h1>Orders</h1>
						</div>
						<div class="col-sm-6 text-right">
						</div>
					</div>
				</div>
				<!-- /.container-fluid -->
			</section>
			<!-- Main content -->
			<section class="content">
				<!-- Default box -->
				<div class="container-fluid">
					<div class="card">
						<div class="card-header">
							<div class="card-tools">
								<div class="input-group input-group" style="width: 250px;">
									<input type="text" name="table_search" class="form-control float-right"
										placeholder="Search">

									<div class="input-group-append">
										<button type="submit" class="btn btn-default">
											<i class="fas fa-search"></i>
										</button>
									</div>
								</div>
							</div>
						</div>
						<div class="card-body table-responsive p-0">
							<table class="table table-hover text-nowrap">
								<thead>
									<tr>
										<th>ID</th>
										<th>ID Customer</th>
										<th>Note</th>
										<th>Status</th>
										<th>Date Purchased</th>
										<th width="100">Action</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td>1</td>
										<td>366</td>
										<td>example@example.com</td>
										<td>
											<span class="badge bg-success">Delivered</span>
										</td>
										<td>Nov 20, 2022</td>
										<td style="text-align: center;">
											<a href="order-detail.html">
												<svg class="filament-link-icon w-4 h-4 mr-1"
													xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
													fill="currentColor" aria-hidden="true">
													<path
														d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z">
													</path>
												</svg>
											</a>
										</td>
									</tr>
									<tr>
										<td>2</td>
										<td>366</td>
										<td>example@example.com</td>
										<td>
											<span class="badge bg-success">Delivered</span>
										</td>
										<td>Nov 20, 2022</td>
										<td style="text-align: center;">
											<a href="order-detail.html">
												<svg class="filament-link-icon w-4 h-4 mr-1"
													xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
													fill="currentColor" aria-hidden="true">
													<path
														d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z">
													</path>
												</svg>
											</a>
										</td>
									</tr>
									<tr>
										<td>3</td>
										<td>366</td>
										<td>example@example.com</td>
										<td>
											<span class="badge bg-success">Delivered</span>
										</td>
										<td>Nov 20, 2022</td>
										<td style="text-align: center;">
											<a href="order-detail.html">
												<svg class="filament-link-icon w-4 h-4 mr-1"
													xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
													fill="currentColor" aria-hidden="true">
													<path
														d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z">
													</path>
												</svg>
											</a>
										</td>
									</tr>
									<tr>
										<td>4</td>
										<td>366</td>
										<td>example@example.com</td>
										<td>
											<span class="badge bg-success">Delivered</span>
										</td>
										<td>Nov 20, 2022</td>
										<td style="text-align: center;">
											<a href="order-detail.html">
												<svg class="filament-link-icon w-4 h-4 mr-1"
													xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
													fill="currentColor" aria-hidden="true">
													<path
														d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z">
													</path>
												</svg>
											</a>
										</td>
									</tr>
									<tr>
										<td>5</td>
										<td>366</td>
										<td>example@example.com</td>
										<td>
											<span class="badge bg-success">Delivered</span>
										</td>
										<td>Nov 20, 2022</td>
										<td style="text-align: center;">
											<a href="order-detail.html">
												<svg class="filament-link-icon w-4 h-4 mr-1"
													xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
													fill="currentColor" aria-hidden="true">
													<path
														d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z">
													</path>
												</svg>
											</a>
										</td>
									</tr>
									<tr>
										<td>6</td>
										<td>366</td>
										<td>example@example.com</td>
										<td>
											<span class="badge bg-success">Delivered</span>
										</td>
										<td>Nov 20, 2022</td>
										<td style="text-align: center;">
											<a href="order-detail.html">
												<svg class="filament-link-icon w-4 h-4 mr-1"
													xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
													fill="currentColor" aria-hidden="true">
													<path
														d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z">
													</path>
												</svg>
											</a>
										</td>
									</tr>
								</tbody>
							</table>
						</div>
						<div class="card-footer clearfix">
							<ul class="pagination pagination m-0 float-right">
								<li class="page-item"><a class="page-link" href="#">«</a></li>
								<li class="page-item"><a class="page-link" href="#">1</a></li>
								<li class="page-item"><a class="page-link" href="#">2</a></li>
								<li class="page-item"><a class="page-link" href="#">3</a></li>
								<li class="page-item"><a class="page-link" href="#">»</a></li>
							</ul>
						</div>
					</div>
				</div>
				<!-- /.card -->
			</section>
			<!-- /.content -->
		</div>
		<!-- /.content-wrapper -->

	</div>
	<!-- ./wrapper -->
	<!-- jQuery -->
</body>
@include('admin.component.script')
</html>
