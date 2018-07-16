<?php
include 'connexion.php'

?>
<!DOCTYPE html>
<html>
<head>
	<title>My Meetic - Log in</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
	<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
	<script src="script.js"></script>
</head>
<body>
	<div class="container">
	<a class="btn btn-primary" href='index.php'>Accueil</a>
	<a class="btn btn-primary" href="register.php">S'enregistrer</a>
	<div class="login-panel panel panel-primary">
		<div class="panel-heading">
			<h3 id="title">Log In</h3>
		</div>
		<div class="panel-body">


			<form action="loginrequete.php" method="POST">
				<fieldset>
					<div class="form-group">
				<p>Mail:</p>
				<input type="text" name="Mail" placeholder="Mail">
			</div>
			<div class="form-group">
				<p>Mot de passe:</p>
				<input type="password" name="Password" placeholder="password">
			</div>
				<button class="btn btn-lg btn-primary btn-block" type="submit">Log</button>

			</fieldset>
			</form>
		</div>
	</div>
</div>
</body>
</html>