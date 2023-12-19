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
								@foreach($order as $item)
                                <tr>
                                    <td> {{ $item->id }} </td>
                                    <td> {{ $item->id_user}}</td>
                                    <td> {{ $item->note}}</td>
                                    <td> {{ $item->status}}</td>
									<td> {{ $item->order_date}}
                                    <td> 
								</tr>
                            @endforeach
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
