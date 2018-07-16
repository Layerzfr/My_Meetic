<?php

include 'connexion.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title>Meetic - Register</title>
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
		<a class="btn btn-primary" href="login.php">Me connecter</a>

		<p>Pensez à remplir tous les champs !</p>
		<form action="registersuccess.php" method="POST">
			<p>Pseudo:</p>
			<input type="text" name="pseudo" placeholder="Pseudo">
			<p>Nom:</p>
			<input type="text" name="nom" placeholder="Nom">
			<p>Prenom:</p>
			<input type="text" name="prenom" placeholder="Prenom">
			<p>Date de naissance:</p>
			<input type="text" id="datepicker" name="datenaissance">
			<p>Sexe:</p>
			<select name="sexe">
				<option value="Homme">Homme</option>
				<option value="Femme">Femme</option>
				<option value="Autre">Autre</option>
			</select>
			<p>Ville:</p>
			<input type="text" name="ville" placeholder="ville">
			<p>Département:</p>
			<input type="text" name="departement" placeholder="departement">
			<p>Region:</p>
			<input type="text" name="region" placeholder="region">
			<p>Pays:</p>
			<input type="text" name="pays" placeholder="pays">
			<p>E-Mail:</p>
			<input type="email" name="mail" placeholder="Email">
			<p>Mot de passe:</p>
			<input type="password" name="motdepasse" placeholder="Mot de passe">
			<button class="btn btn-success" type="submit">M'inscrire</button>
		</form>
	</div>
</body>
</html>