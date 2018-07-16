<?php

include 'connexion.php';
?>

<!DOCTYPE html>
<html>
<head>
	<title>My Meetic - Welcome</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
	<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
	<script src="script.js"></script>
	<div class="navbar navbar-default navbar-fixed-top">
		<div class="container">
			<div id="title">
				<h1>My Meetic</h1>
			</div>
			<div class="row justify-content-md-center">
				<div class="col-lg-8">
					<p>Déjà enregistré ?</p>
					<a class="btn btn-primary" href="login.php">LOGIN</a>
				</div>
				<div class="col-lg-4">
					<p>Pas encore enregistré ?</p>
					<a class="btn btn-primary" href="register.php">REGISTER</a>
				</div>
			</div>
		</div>
	</div>
</body>
</html>