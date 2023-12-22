<html lang="en" style="height: auto;">
<head>
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
                        <h1>Categories</h1>
                    </div>
                    <div class="col-sm-6 text-right">
                        <a href=" {{ route('admin.category.create-category') }}" class="btn btn-primary">New
                            Category</a>
                    </div>
                </div>
            </div>
            <!-- /.container-fluid -->
        </section>
        <!-- Main content -->
        @if ($message = Session::get('success'))

            <div class="alert alert-success alert-block">
            <i class="fa fa-check-circle" aria-hidden="true"></i>
                <button type="button" class="close" data-dismiss="alert">×</button>

                <strong>{{ $message }}</strong>

            </div>

        @endif
        @if ($message = Session::get('error'))

            <div class="alert alert-danger alert-block">
            <i class="fa fa-check-circle" aria-hidden="true"></i>
                <button type="button" class="close" data-dismiss="alert">×</button>

                <strong>{{ $message }}</strong>

            </div>

        @endif
        <section class="content">
            <!-- Default box -->
            <form method="POST" action="{{ route('admin.category.create-category') }}">
                @csrf
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
                                    <th width="60">ID</th>
                                    <th>Name</th>
                                    <th>Image</th>
                                    <th width="100">Status</th>
                                    <th width="100">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($categories as $item)
                                    <tr>
                                        <td> {{ $item->id }} </td>
                                        <td> {{ $item->name_category }} </td>
                                        <td> {{ $item->image }} </td>
                                        <td>
                                            @if( $item->status == 1)
                                                <svg class="text-success-500 h-6 w-6 text-success"
                                                     xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                     stroke-width="2" stroke="currentColor" aria-hidden="true">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                          d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                                </svg>
                                            @else
                                                <svg class="text-danger h-6 w-6" xmlns="http://www.w3.org/2000/svg"
                                                     fill="none" viewBox="0 0 24 24" stroke-width="2"
                                                     stroke="currentColor"
                                                     aria-hidden="true">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                          d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z">
                                                    </path>
                                                </svg>
                                            @endif
                                        </td>
                                        <td>
                                            <div class="col-sm-6 d-flex">
                                                <a href="{{ route('admin.category.category-detail', ['id' => $item->id]) }}" class="mr-2">
                                                    <svg class="filament-link-icon w-4 h-4 mr-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                                        <path d="M10 12a2 2 0 100-4 2 2 0 000 4z"/>
                                                        <path fill-rule="evenodd" d="M19.707 9.293a1 1 0 010 1.414l-9 9a1 1 0 01-1.414 0l-9-9a1 1 0 111.414-1.414L10 16.586l8.293-8.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                                                    </svg>
                                                </a>
                                                <a href="{{ route('admin.category.category-update', ['id' => $item->id]) }}" class="mr-2">
                                                    <svg class="filament-link-icon w-4 h-4 mr-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                                        <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z"></path>
                                                    </svg>
                                                </a>
                                                <form action="" method="post">
                                                    <button class="btn text-danger " style="display: none;"></button>
                                                    @csrf
                                                </form>
                                                <form method="POST" action="{{ route('admin.category.delete', ['id' => $item->id]) }}" onsubmit="return confirm('Bạn chắc chắn muốn xóa?')">
                                                    @csrf
                                                    <button type="submit" class="text-danger w-4 h-4 mr-1 bg-transparent  cursor-pointer" style="border:none!important">
                                                        <svg wire:loading.remove.delay="" wire:target=""
                                                             class="filament-link-icon w-4 h-4 mr-1"
                                                             xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                                             fill="currentColor" aria-hidden="true">
                                                            <path fill-rule="evenodd"
                                                                  d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                                                  clip-rule="evenodd"></path>
                                                        </svg>
                                                    </button>
                                                </form>
                                            </div>

                                        </td>
                                    </tr>
                                @endforeach


                                </tbody>
                            </table>
                        </div>
                        <div class="card-footer clearfix">
                            {{ $categories->links() }}
                        </div>
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
