<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>EMail verification</title>
</head>
<body>
<h1>Welcome to Laravel Mailable, {{ $user->name }}!</h1>
	<p class="lead">
	
	<h1>To verify the email click <a href="{{ route('sendEmailDone', ["email" => $user->email, "verifyToken" => $user->verifyToken]) }}">here</a></h1>
	</p>
	<h3>
		For more info about this, visit <a href="www.igenero.com!">www.igenero.com!</a>
	</h3>
	{{-- <img src="a.jpg" class="img-responsive" alt="igenero"> --}}
	<h2>
		Thanks!
		</h2>
		<h2>
		Igenero Team.
	</h2>
	<p>@igenero</p>
</body>
</html>