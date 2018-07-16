<?php
include 'head.php';
if($_SESSION['active'] == '0'){
	echo "<script>window.open('inactive.php','_self')</script>";
}
?>
<div class="container-fluid">
	<a class="btn btn-primary" href="compte.php"> Mon compte</a>
	<a class="btn btn-primary" href="recherche.php">Recherche</a>
	<a class="btn btn-primary" href="mailbox.php">Mes messages</a>
	<a class="btn btn-primary" href="accueil.php">Retourner à l'accueil</a>

	<form action="recherche.php" method="POST">
		<p>Genre:</p>
		<select name="genre">
			<option value="Homme">Homme</option>
			<option value="Femme">Femme</option>
			<option value="Autre">Autre</option>
		</select>
		<p>Tranche d'âge</p>
		<select name="age">
			<option value="18/25">18/25 ans</option>
			<option value="25/35">25/35 ans</option>
			<option value="35/45">35/45 ans</option>
			<option value="45+">45+</option>
		</select>
		<p>Lieu:</p>
		<input type="text" name="localisation">
		<button type="submit" name="submit" >Rechercher</button>
	</form>
</div>


<?php
if(isset($_POST['submit'])){
	Class recherche extends Base{
		private $sql;
		private $genre;
		private $age;
		private $lieu;
		private $limite;

		public function main(){
			$this->donnee();
			$this->sql();
		}
		public function donnee(){
			$this->genre = $_POST['genre'];
			$this->age = $_POST['age'];
			$this->lieu = $_POST['localisation'];
			if($this->age == "45+"){
				$this->limite = explode("+", $this->age);
			}else{
				$this->limite = explode("/", $this->age);
			}
		}
		


		public function sql(){
			if($this->limite[0] == "45"){
				$this->sql = $this->conn->query("SELECT * FROM user where sexe like '".$this->genre."' and age >= '".$this->limite[0]."' and (ville like '".$this->lieu."' or departement like '".$this->lieu."' or region like '".$this->lieu."' or pays like '".$this->lieu."') and not mail = '".$_SESSION['mail']."' and active = '1' ");
				while($row = $this->sql->fetch()){
					
					echo "<div class='container-fluid'>";
					echo "<p>Nom: ".$row['nom']." </p>";
					echo "<p>Prenom: ".$row['prenom']." </p>";
					echo "<p>Age: ".$row['age']." </p>";
					echo "<p>Ville: ".$row['ville']." </p>";
					echo "<a href='user.php?id=".$row['id']."'>Voir le profil de ".$row['prenom']."</a>";
					echo "</div>";
					
				}

			}else{
				$this->sql = $this->conn->query("SELECT * FROM user where sexe like '".$this->genre."' and age >= '".$this->limite[0]."' and age <= '".$this->limite[1]."' and (ville like '".$this->lieu."' or departement like '".$this->lieu."' or region like '".$this->lieu."' or pays like '".$this->lieu."') and not mail = '".$_SESSION['mail']."' and active = '1' ");
				while($row = $this->sql->fetch()){
					
					echo "<div class='container-fluid'>";
					echo "<p>Nom: ".$row['nom']." </p>";
					echo "<p>Prenom: ".$row['prenom']." </p>";
					echo "<p>Age: ".$row['age']." </p>";
					echo "<p>Ville: ".$row['ville']." </p>";
					echo "<a href='user.php?id=".$row['id']."'>Voir le profil de ".$row['prenom']."</a>";
					echo "</div>";
					
				}
			}
		}
	}
	$research = new recherche();
	$research->main();
}

?>
</body>
</html>