{{-- <!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Registration | Let'Shop</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/simple-line-icons/2.4.1/css/simple-line-icons.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('global/css') }}/style_registrasi.css">
</head>
<body>
    <div class="registration-form">
        <form action="{{ route('aksiregister') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
			<h5>Input Your Full Name</h5>
                <input type="text" name="name" class="form-control item" placeholder="Name">
            </div>
            <div class="form-group">
				<h5>Input Your Username</h5>
                <input type="text" name="username" class="form-control item" placeholder="Username">
            </div>
            <div class="form-group">
				<h5>Input Your Password</h5>
                <input type="password" name="password" class="form-control item" placeholder="Password">
            </div>
            <div class="form-group">
				<h5>Input Your Email Address</h5>
                <input type="email" name="email" class="form-control item" placeholder="Email">
            </div>
            <div class="form-group">
				<h5>Input Your Phone Number</h5>
                <input type="text" name="telepon" class="form-control item" placeholder="Phone Number">
            </div>
            <div class="form-group">
				<h5>Input Your Address</h5>
                <input type="text" name="alamat" class="form-control item" placeholder="Address">
            </div>
            <h5>Set your profil picture</h5>
            <input type="file" name="image" class="input-control" required>
            <input type="submit" name="submit" value="Register" class="btn btn-block create-account">
            <h6 style="padding-top:10px;text-align:center;">Klik
				<a href="{{ route('login') }}" style="color:#fab2d3;">disini</a> untuk kembali
			</h6>
        </form>
    </div>
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
    <script src="{{ asset('global/js') }}/script.js"></script>
</body>
</html> --}}

<!doctype html>
<html lang="en">
<head>
  	<title>Halaman Registrasi</title>
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
			      			        <h3 class="mb-4">Register</h3>
			      		        </div>
			      	        </div>
					        <form action="{{ route('aksiregister') }}" class="signin-form" method="POST" enctype="multipart/form-data">
                                @csrf
                                @if ($errors->any())
                                    <div class="alert alert-danger" role="alert" style="margin-bottom:11%">
                                        @foreach($errors->all() as $item)
                                            <li>{{ $item }}</li>
                                        @endforeach
                                    </div>
                                @endif
                                <div class="form-group mt-3">
                                    <input type="text" name="name" class="form-control" required>
                                    <label class="form-control-placeholder" for="name">Full name</label>
                                </div>
                                <div class="form-group" style="margin-top:11%;">
                                    <input type="text" name="username" class="form-control" required>
                                    <label class="form-control-placeholder" for="username">Username</label>
                                </div>
                                <div class="form-group" style="margin-top:11%;">
                                    <input id="password-field" name="password" type="password" class="form-control" required>
                                    <label class="form-control-placeholder" for="password">Password</label>
                                    <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                                </div>
                                <div class="form-group" style="margin-top:11%;">
                                    <input type="text" name="email" class="form-control" required>
                                    <label class="form-control-placeholder" for="email">Email</label>
                                </div>
                                <div class="form-group" style="margin-top:11%;">
                                    <input type="text" name="telepon" class="form-control" required>
                                    <label class="form-control-placeholder" for="telepon">Phone Number</label>
                                </div>
                                <div class="form-group" style="margin-top:11%;">
                                    <input type="text" name="alamat" class="form-control" required>
                                    <label class="form-control-placeholder" for="alamat">Address</label>
                                </div>
                                <div class="form-group">
                                    <button type="submit" name="submit" class="form-control btn btn-primary rounded submit px-3">Register</button>
                                </div>
                            </form>
		                    <p class="text-center">Already have an account? <a href="{{ route('login') }}">Login</a></p>
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
