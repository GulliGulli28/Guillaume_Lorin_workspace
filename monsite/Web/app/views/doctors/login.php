<!DOCTYPE html>
<html>
<head>
	<title>Page de connexion</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

	<!-- <link rel="stylesheet" href="../../../public/css/style_login.css"> -->
		
		
	</style>
</head>
<body>
	<h1>Page de connexion</h1>
	<form action="/" method="post" >
		<label for="email" class = "form-label">Email</label>
		<input type="text" id="email" name="email" class = "form-controll d-flex flex-column">

		<label for="password" class = "form-label">Mot de passe</label>
		<input type="password" id="password" name="password" class = "form-controll mb-3 d-flex flex-column" >

		<input type="submit" value="Se connecter" class = "btn btn-primary btn-sm">

		<div class="forgot-password">
			<a href="#">Mot de passe oublié ?</a>
		</div>

		<div class="error-message">
			<?php
				//var_dump($data);
				if(isset($data['email_error'])) {
					echo $data['email_error'];
				}
				if(isset($data['password_error'])) {
					echo $data['password_error'];
				}
				?>
		</div>
	</form>
</body>
</html>
