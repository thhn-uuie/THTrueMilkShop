<!DOCTYPE html>
<html lang="en">
	<head>
		@include('admin.component.head')
	</head>
	<body class="hold-transition login-page">
		<div class="login-box">
			<!-- /.login-logo -->
			<div class="card card-outline card-primary">
			  	<div class="card-header text-center">
					<a class="h3">Administrative Panel</a>
			  	</div>
			  	<div class="card-body">
					<p class="login-box-msg">Sign in to start your session</p>
                    <form method="POST" action="">
                        @csrf
				  		<div class="input-group mb-3">
							<input type="email" class="form-control" placeholder="Email" name="email">
							<div class="input-group-append">
					  			<div class="input-group-text">
									<span class="fas fa-envelope"></span>
					  			</div>
							</div>
                        </div>
                            @if($errors->has('email'))
                                <div class="error-message">
                                    * {{ $errors->first('email') }}
                                </div>
                            @endif

				  		<div class="input-group mb-3">
							<input type="password" class="form-control" placeholder="Password" name="password">
							<div class="input-group-append">
					  			<div class="input-group-text">
									<span class="fas fa-lock"></span>
					  			</div>
							</div>

				  		</div>
                        @if($errors->has('password'))
                            <div class="error-message">
                                * {{ $errors->first('password') }}
                            </div>
                        @endif
                        @if ($message = Session::get('error'))

                            <div class="alert alert-success alert-block">
							<i class="fa fa-exclamation-triangle" aria-hidden="true"></i>

                                <button type="button" class="close" data-dismiss="alert">×</button>

                                <strong>{{ $message }}</strong>

                            </div>

                        @endif
				  		<div class="row">
							<!-- /.col -->
							<div class="col-4">
					  			<button type="submit" class="btn btn-primary btn-block">Login</button>
							</div>
							<!-- /.col -->
				  		</div>
					</form>
			  	</div>
			  	<!-- /.card-body -->
			</div>
			<!-- /.card -->
		</div>
		<!-- ./wrapper -->
		<!-- jQuery -->

	</body>
</html>
