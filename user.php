<?php
include 'head.php';
if($_SESSION['active'] == '0'){
	echo "<script>window.open('inactive.php','_self')</script>";
}
?>
<a class="btn btn-primary" href="compte.php"> Mon compte</a>
<a class="btn btn-primary" href="recherche.php">Recherche</a>
<a class="btn btn-primary" href="mailbox.php">Mes messages</a>
<a class="btn btn-primary" href="accueil.php">Retourner à l'accueil</a>
<?php

Class profile extends Base{
	private $sql;
	private $id;

	public function main(){
		$this->donnee();
		$this->sql();
	}
	public function donnee(){
		$this->id = $_GET['id'];
	}
	public function sql(){
		$this->sql = $this->conn->query("SELECT * FROM user where id = '".$this->id."' ");

		$row = $this->sql->fetch();
		if($row == false){
			echo "<p>User not found</p>";
		}
		else{
			echo "<p>Pseudo: " . $row['pseudo'] . "</p>". PHP_EOL;
			echo "<p>Nom: ".$row['nom'] ."</p>". PHP_EOL;
			echo "<p>Prenom: ".$row['prenom']. "</p>" . PHP_EOL;
			echo "<p>Date de naissance: " .$row['date_de_naissance']."</p>" . PHP_EOL;
			echo "<p>Age: " . $row['age'] . "ans</p>" . PHP_EOL;
			echo "<p>Sexe: " . $row['sexe'] ."</p>". PHP_EOL;
			echo "<p>Ville: " .$row['ville'] ."</p>". PHP_EOL;
			echo "<p>Departement: " .$row['departement'] ."</p>". PHP_EOL;
			echo "<p>Region: " .$row['region'] ."</p>". PHP_EOL;
			echo "<p>Pays: " .$row['pays'] ."</p>". PHP_EOL;
			echo "<p>Mail: " .$row['mail'] ."</p>". PHP_EOL;
			echo "<a href='contact.php?id=".$row['id']."'>Contacter ".$row['prenom']."</a><br>";
		}
	}

}
$prof = new profile();
$prof->main();

?>

<a href="recherche.php">Retour sur la page de recherche</a>

</body>
</html>