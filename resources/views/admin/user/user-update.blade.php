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
                        <a href="{{ asset('admin/user') }}" class="btn btn-primary">Back</a>
                    </div>
                </div>
            </div>
            <!-- /.container-fluid -->
        </section>
        <!-- Main content -->
        <section class="content">
            <!-- Default box -->
            <form action="" method="POST">
                @csrf
                @if ($message = Session::get('success'))

                    <div class="alert alert-success alert-block">
                    <i class="fa fa-check" aria-hidden="true"></i>
                        <button type="button" class="close" data-dismiss="alert">×</button>

                        <strong>{{ $message }}</strong>

                    </div>
                @endif
                <div class="row" id="s_user">
                    <div class="col-md-8">
                        <div class="card mb-3">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label for="title">Username<i style="color: red;">*</i></label>
                                            @if($user->name !== null)
                                                <input type="text" name="name" id="name" class="form-control"
                                                       placeholder="Name"  value="{{ $user->name }}">
                                            @else
                                                <input type="text" name="name" id="name" class="form-control"
                                                       placeholder="Name">

                                            @endif
                                            @if($errors->has('name'))
                                                <div class="error-message" style="margin-top:10px">
                                                    * {{ $errors->first('name') }}
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label for="price">Email<i style="color: red;">*</i></label>
                                            @if($user->email !== null)
                                                <input type="email" name="email" id="email" class="form-control"
                                                       placeholder="Email" value="{{ $user->email }}">
                                            @else
                                                <input type="email" name="email" id="email" class="form-control"
                                                       placeholder="Email">
                                            @endif
                                            @if($errors->has('email'))
                                                <div class="error-message" style="margin-top:10px">
                                                    * {{ $errors->first('email') }}
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label for="password">Password<i style="color: red;">*</i></label>
                                            @if($user->password !==null)
                                            <input type="password" name="password" id="password" class="form-control"
                                                   placeholder="new password"  value="{{ $user->password }}">
                                            @else
                                                <input type="password" name="password" id="password" class="form-control"
                                                       placeholder="new password"  >

                                            @endif
                                        </div>
                                    </div>

                                    {{--                                    <div class="col-md-12">--}}
                                    {{--                                        <div class="mb-3">--}}
                                    {{--                                            <label for="description">Address<i style="color: red;">*</i></label>--}}
                                    {{--                                            <input type="text" name="address" id="address" class="form-control"--}}
                                    {{--                                                   placeholder="Address" required>--}}
                                    {{--                                        </div>--}}
                                    {{--                                    </div>--}}
                                    {{--                                    <div class="col-sm-12">--}}
                                    {{--                                        <div class="mb-3" id="s_gender">--}}
                                    {{--                                            <label for="gender">Gender</label>--}}
                                    {{--                                            <select name="s_gender" id="s_gender" class="form-control">--}}
                                    {{--                                                <option value="">Female</option>--}}
                                    {{--                                                <option value="">Male</option>--}}
                                    {{--                                            </select>--}}
                                    {{--                                        </div>--}}
                                    {{--                                    </div>--}}

                                </div>
                            </div>
                        </div>
                        <div class="">
                            <button type="submit" class="btn btn-primary">Sửa</button>
                        </div>


                    </div>
                    <div class="col-md-4">
                        {{--                        <div class="card mb-3">--}}
                        {{--                            <div class="card-body">--}}
                        {{--                                <h5>Image</h5>--}}
                        {{--                                <div class="wrapp" id="wrapper">--}}
                        {{--                                    <div class="image">--}}
                        {{--                                        <img src="" alt="" id="img">--}}
                        {{--                                    </div>--}}
                        {{--                                    <div class="content">--}}
                        {{--                                        <div class="icon"><i class="fa fa-cloud-upload-alt"></i></div>--}}
                        {{--                                        <div class="text">No file chosen, yet!</div>--}}
                        {{--                                    </div>--}}
                        {{--                                    <div class="file-name">File name here</div>--}}
                        {{--                                </div>--}}

                        {{--                                <input type="file" id="l_image" name="image" hidden>--}}
                        {{--                                <button type="button" onclick="defaultBtnActive()" id="custom-btn">Choose a file--}}
                        {{--                                </button>--}}

                        {{--                            </div>--}}
                        {{--                        </div>--}}

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
