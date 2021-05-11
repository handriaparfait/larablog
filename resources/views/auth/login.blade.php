<!DOCTYPE html>
<html>
<head>
	<title>Zombie Login</title>

	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link rel="stylesheet" href="design1.css">
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.5/css/materialize.min.css">
</head>

<body class=" grey darken-3">
<div class="section"></div>
<main>
	<center>


		<div class="section"></div>

		<div class="container">
			<div class="z-depth-1 grey darken-4" style="width: 600px; display: inline-block; padding: 32px 48px 0px 48px;">
				<h5 class="red-text">Please, login into your account</h5>
				{!! Form::open() !!}
					<div class='row'>
						<div class='col s12'>
						</div>
					</div>

					<div class='row'>
						<div class='input-field col s12'>
							<input class='validate' type='email' name='email' id='email' />
							<label for='email'>Enter your email</label>
						</div>
					</div>

					<div class='row'>
						<div class='input-field col s12'>
							<input class='validate' type='password' name='password' id='password' />
							<label for='password'>Enter your password</label>
						</div>
						<label style='float: right;'>
							<a class='red-text' href='{{ url('password/reset') }}'><b>Forgot Password?</b></a>
						</label>
					</div>

				<div class="row">
					<div class="input-field col s12 m12 l12  login-text">
						<input type="checkbox" id="remember-me" />
						<label for="remember-me">Remember me</label>
					</div>
				</div>

					<br />
					<center>
						<div class='row'>
							<button type='submit' name='btn_login' class='col s12 btn btn-large waves-effect red'>Login</button>
						</div>
					</center>
				{!! Form::close() !!}
			</div>
		</div>
		<a href="#!" class="green-text">Create account</a>
	</center>

	<div class="section"></div>
	<div class="section"></div>
</main>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.1/jquery.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.5/js/materialize.min.js"></script>
</body>

</body>
</html>