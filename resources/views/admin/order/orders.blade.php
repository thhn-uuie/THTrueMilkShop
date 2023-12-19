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
										<th width="100px">Action</th>
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
										<a href="{{ route('admin.order.detail', ['id' => $item->id]) }}">
											<svg class="filament-link-icon w-4 h-4 mr-1"
												xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
												fill="currentColor" aria-hidden="true">
												<path d="M10 12a2 2 0 100-4 2 2 0 000 4z"/>
												<path fill-rule="evenodd"
													d="M19.707 9.293a1 1 0 010 1.414l-9 9a1 1 0 01-1.414 0l-9-9a1 1 0 111.414-1.414L10 16.586l8.293-8.293a1 1 0 011.414 0z"
													clip-rule="evenodd"/>
											</svg>
										</a>
										<a href="{{ route('admin.order.delete', ['id' => $item->id]) }}"
											class="text-danger w-4 h-4 mr-1">
											<svg wire:loading.remove.delay="" wire:target=""
												class="filament-link-icon w-4 h-4 mr-1"
												xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
												fill="currentColor" aria-hidden="true">
													<path ath fill-rule="evenodd"
														  d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
														  clip-rule="evenodd"></path>
												</svg>
											</a>		
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
