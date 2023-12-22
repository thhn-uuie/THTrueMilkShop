
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
                                    <div class="col-12">
                                    <h1 class="h5 mb-3">Thông tin đơn hàng</h1>
                                    </div>
                                    <div class="col-sm-6 invoice-col">
                                        
                                        <address>
                                            <strong>Tên khách hàng: </strong> {{$order_item->name}}<br>
                                            <strong>Số điện thoại: </strong> {{$order_item->tel}}<br>
                                            <strong>Địa chỉ: </strong> {{$order_item->add}}<br>
                                        </address>
                                    </div>


                                    <div class="col-sm-6 invoice-col">
                                        <b>Tổng tiền:</b> {{$allCost+25000}}đ<br>
                                        <?php
                                        $statuses = [
                                            0 => "Đã xác nhận",
                                            1 => "Đang vận chuyển",
                                            2 => "Giao thành công",
                                        ];

                                        ?>


                                        <b>Trạng thái đơn hàng:</b> <span class="text-success">{{ $statuses[$order_item->status] }}</span>
                                        <br>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body table-responsive p-3">
                                <table class="table table-striped">
                                    <thead>
                                    <tr>
                                        <th>Sản phẩm</th>
                                        <th width="100">Giá tiền</th>
                                        <th width="100">Số lượng</th>
                                        <th width="100">Tổng</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($order_details as $item)
                                        <tr>
                                            <td> {{$item->product->name_product ?? ''}}</td>
                                            <td> {{$item->price}}đ</td>
                                            <td> {{$item->number_product}}</td>
                                            <td> {{$item->price * $item->number_product}}đ</td>
                                        </tr>
                                    @endforeach
                                    <tr>
                                        <th colspan="3" class="text-right">Tổng tiền hàng:</th>
                                        <td>{{$allCost}}đ</td>
                                    </tr>
                                    <tr>
                                        <th colspan="3" class="text-right">Phí vận chuyển:</th>
                                        <td>25000đ</td>
                                    </tr>
                                    <tr>
                                        <th colspan="3" class="text-right">Tổng tiền:</th>
                                        <td>{{$allCost + 25000}}đ</td>
                                    </tr>
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
