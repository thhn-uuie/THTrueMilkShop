<!DOCTYPE html>
<html lang="en">

<head>
	@include('admin.component.head')
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
			@include('admin.component.sidebar')
		</aside>
	
		<!-- Content Wrapper. Contains page content -->
		<div class="content-wrapper">
			<!-- Content Header (Page header) -->
			<section class="content-header">
				<div class="container-fluid my-2">
					<div class="row mb-2">
						<div class="col-sm-6">
							<h1>Order: #{{$order_details['0']->id_order}}</h1>
						</div>
						<div class="col-sm-6 text-right">
							<a href="#" class="btn btn-primary">Xóa</a>
							<a href="#" class="btn btn-primary">Xửa</a>
							<a href="orders.html" class="btn btn-primary">Back</a>
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
						<div class="col-md-9">
							<div class="card">
								<div class="card-header pt-3">
									<div class="row invoice-info">
										<div class="col-sm-4 invoice-col">
											<h1 class="h5 mb-3">Shipping Address</h1>
											<address>
												<strong>Tên khách hàng: </strong> {{$user->name}}<br>
												<strong>SDT: </strong> {{$user->phone}}<br>
												<strong>Địa chỉ: </strong> {{$user->address}}<br>
											</address>
										</div>



										<div class="col-sm-4 invoice-col">
			
											<b>Order ID: #</b> {{$order_details['0']->id_order}} <br>
											<b>Total:</b> ${{$allCost}}<br>
											<b>Status:</b> <span class="text-success">Delivered</span>
											<br>
										</div>
									</div>
								</div>
								<div class="card-body table-responsive p-3">
									<table class="table table-striped">
										<thead>
											<tr>
												<th>Product</th>
												<th width="100">Price</th>
												<th width="100">Qty</th>
												<th width="100">Total</th>
											</tr>
										</thead>
										<tbody>
											@foreach($order_details as $item)
                                <tr>
									<td> {{$item->product->name_product ?? ''}}</td>
                                    <td> ${{$item->price}}</td>
                                    <td> {{$item->number_product}}</td>
									<td> ${{$item->price * $item->number_product}}
								</tr>	
                            @endforeach
										</tbody>
									</table>
								</div>
							</div>
						</div>
						<div class="col-md-3">
							<div class="card">
								<div class="card-body">
									<h2 class="h4 mb-3">Order Status</h2>
									<div class="mb-3">
										<select name="status" id="status" class="form-control">
											<option value="1">Pending</option>
											<option value="2">Shipped</option>
											<option value="3">Delivered</option>
											<option value="4">Cancelled</option>
										</select>
									</div>
									<div class="mb-3">
										<button class="btn btn-primary">Update</button>
									</div>
								</div>
							</div>
							<div class="card">
								<div class="card-body">
									<h2 class="h4 mb-3">Send Inovice Email</h2>
									<div class="mb-3">
										<select name="status" id="status" class="form-control">
											<option value="">Customer</option>
											<option value="">Admin</option>
										</select>
									</div>
									<div class="mb-3">
										<button class="btn btn-primary">Send</button>
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
	@include('admin.component.script')
</body>

</html>
