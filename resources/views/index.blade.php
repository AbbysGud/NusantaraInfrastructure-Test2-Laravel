<!doctype html>
<html lang="en">
<head>
  	<title>Halaman Login</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

	<link rel="stylesheet" href="{{ asset('global/assets/css/login') }}/style.css">
</head>

<body>
	<section class="ftco-section">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-7 col-lg-5">
					<div class="wrap">
						<div class="login-wrap p-4 p-md-5">
			      	        <div class="d-flex">
			      		        <div class="w-100">
			      			        <h3 class="mb-4">Sign In</h3>
			      		        </div>
			      	        </div>
					        <form action="{{ route ('aksilogin') }}" class="signin-form" method="POST">
                                @csrf
                                @if ($errors->any())
                                    <p class="text-center" style="margin-bottom:10%">Username or Password is incorrect!</p>
                                @endif
                                @if(session('success'))
                                    <div class="alert alert-success" role="alert" style="margin-bottom:11%">
                                        {{ session('success') }}
                                    </div>
                                @endif
                                <div class="form-group mt-3">
                                    <input type="text" name="username" class="form-control" required>
                                    <label class="form-control-placeholder" for="username">Username</label>
                                </div>
                                <div class="form-group" style="margin-top:11%;">
                                    <input id="password-field" name="password" type="password" class="form-control" required>
                                    <label class="form-control-placeholder" for="password">Password</label>
                                    <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                                </div>
                                <div class="form-group">
                                    <button type="submit" name="submit" class="form-control btn btn-primary rounded submit px-3">Sign In</button>
                                </div>
                            </form>
		                    <p class="text-center">Don't have an account? <a href="{{ route('register') }}">Register Now!</a></p>
		                </div>
		            </div>
		        </div>
	        </div>
        </div>
    </section>

	<script src="{{ asset('global/assets/js/login') }}/jquery.min.js"></script>
    <script src="{{ asset('global/assets/js/login') }}/popper.js"></script>
    <script src="{{ asset('global/assets/js/login') }}/bootstrap.min.js"></script>
    <script src="{{ asset('global/assets/js/login') }}/main.js"></script>
</body>
</html>
