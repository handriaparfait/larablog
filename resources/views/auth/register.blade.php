<!DOCTYPE html>
<html>
<head>
	<title>ZOMBIE REGISTER</title>

	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link rel="stylesheet" href="design2.css">
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.5/css/materialize.min.css">
</head>

<body class="grey darken-3">
<div class="section"></div>
<main>
	<center>


		<div class="section"></div>

		<div class="container">
			<div class="z-depth-1 grey darken-4" style="width: 600px; display: inline-block; padding: 32px 48px 0px 48px;">
				<h5 class="red-text">Créer votre compte pour pouvour TROCKER ☼</h5>
				{!! Form::open() !!}
					<div class='row'>
						<div class='col s12'>
						</div>
					</div>

					<div class='row'>
						<div class='input-field col s12'>
							<input class='validate' type='text' name='name' id='name' />
							<label for='name'>Votre nom</label>
						</div>
					</div>
					<div class='row'>
						<div class='input-field col s12'>
							<input class='validate' type='email' name='email' id='email' />
							<label for='email'>Votre Email</label>
						</div>
					</div>
					<div class='row'>
						<div class='input-field col s12'>
							<input class='validate' type='password' name='password' id='password' />
							<label for='password'>Votre mot de passe</label>
						</div>

						<div class='input-field col s12'>
							<input class='validate' type='password' name='password_confirmation' id='password_confirmation' />
							<label for='password_confirmation'>Confirmer votre mot de passe</label>
						</div>

						<label style='float: right;'>
							<a class='red-text' href='#!'><b>Already have an account?</b></a>
						</label>
					</div>

					<br />
					<center>
						<div class='row'>
							<button type='submit' name='btn_login' class='col s12 btn btn-large waves-effect red'>Register</button>
						</div>
					</center>
				{!! Form::close() !!}
			</div>
		</div>
		<a href="{{ route('login') }}" class="green-text">Login</a>
	</center>

	<div class="section"></div>
	<div class="section"></div>
</main>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.1/jquery.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.5/js/materialize.min.js"></script>
</body>

</html>