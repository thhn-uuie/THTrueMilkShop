
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
{{--                        <form method="POST" action="{{ route('admin.order.delete', ['id' => $order_details['0']->id_order]) }}" onsubmit="return confirm('Bạn chắc chắn muốn xóa?')">--}}
{{--                            @csrf--}}
{{--                            <button type="submit" class="btn btn-primary">Xóa</button>--}}
{{--                        </form>--}}
                        <a href="{{ asset('admin/order') }}" class="btn btn-primary">Back</a>
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
                                        <?php
                                        $statuses = [
                                            0 => "Đã xác nhận",
                                            1 => "Đang vận chuyển",
                                            2 => "Giao thành công",
                                        ];

                                        ?>


                                        <b>Status:</b> <span class="text-success">{{ $statuses[$order_item->status] }}</span>
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
                            <form method="POST" action="{{ route('update-status') }}">
                                @csrf
                                <div class="card-body">
                                    <h2 class="h4 mb-3">Order Status</h2>
                                    <div class="mb-3">
                                        <input type="hidden" name="id" value="{{ $order_details['0']->id_order }}">
                                        <select name="status" id="status" class="form-control">
                                            <option value="0">Đã xác nhận</option>
                                            <option value="1">Đang vận chuyển</option>
                                            <option value="2">Giao thành công</option>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <button class="btn btn-primary">Update</button>
                                    </div>
                                </div>
                            </form>
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
