<?php

include 'head.php';
?>

<div class="container-fluid">
	<a class="btn btn-primary" href='compte.php'>Mon compte</a>
	<a class="btn btn-primary" href="recherche.php">Recherche</a>
	<a class="btn btn-primary" href="mailbox.php">Mes messages</a>
	<a class="btn btn-primary" href="accueil.php">Retourner à l'accueil</a>
</div>
<?php

if($_SESSION['active'] == '0'){
	echo "<script>window.open('inactive.php','_self')</script>";
}

if(isset($_POST['changemail'])){
	Class Suppr extends Base{
		private $sql;
		private $mail;

		public function main(){
			$this->sql();
		}

		public function sql() {
			$this->mail = $_POST['mail'];
			$this->sql=$this->conn->query("UPDATE user SET mail = '".$this->mail."', active = '0' WHERE mail ='".$_SESSION['mail']."'");
			session_start(); 
			session_destroy();  
			header("Location: login.php");
		}
	}
	$del = new Suppr();
	$del->main();
}

if(isset($_POST['changepass'])){
	Class Suppr extends Base{
		private $sql;
		private $password;

		public function main(){
			$this->sql();
		}

		public function sql() {
			$this->password = hash('ripemd160',$_POST['pass']);
			$this->sql=$this->conn->query("UPDATE user SET password = '".$this->password."' WHERE mail ='".$_SESSION['mail']."'");
			session_start(); 
			session_destroy();  
			header("Location: login.php");
		}
	}
	$del = new Suppr();
	$del->main();
}


if(isset($_POST['delete'])){
	Class Suppr extends Base{
		private $sql;

		public function main(){
			$this->sql();
		}

		public function sql() {
			$this->sql=$this->conn->query("UPDATE user SET active = '0' WHERE mail ='".$_SESSION['mail']."'");
			$_SESSION['active'] = '0';
		}
	}
	$del = new Suppr();
	$del->main();
}

if(isset($_POST['date'])){
	Class Edit extends Base{
		private $sql;
		private $datenaissance;
		private $age;

		public function main(){
			$this->info();
			$this->sql();

		}

		public function info(){
			$this->datenaissance = $_POST['date_de_naissance'];
			$birthDate = explode("-", $this->datenaissance);
			$this->age = (date("md", date("U", mktime(0, 0, 0, $birthDate[2], $birthDate[1], $birthDate[0]))) > date("md")
				? ((date("Y") - $birthDate[0]) - 1)
				: (date("Y") - $birthDate[0]));
		}

		public function sql() {
			$this->sql=$this->conn->query("UPDATE user SET date_de_naissance ='".$this->datenaissance."', age = '".$this->age."' WHERE mail ='".$_SESSION['mail']."'");
		}
	}
	$edi = new Edit();
	$edi->main();
}
if(isset($_POST['ville'])){
	Class Edit extends Base{
		private $sql;
		private $ville;

		public function main(){
			$this->info();
			$this->sql();

		}

		public function info(){
			$this->ville = $_POST['Ville'];
		}

		public function sql() {
			$this->sql=$this->conn->query("UPDATE user SET ville ='".$this->ville."' WHERE mail ='".$_SESSION['mail']."'");
		}
	}
	$edi = new Edit();
	$edi->main();
}

if(isset($_POST['departement'])){
	Class Edit extends Base{
		private $sql;
		private $departement;

		public function main(){
			$this->info();
			$this->sql();

		}

		public function info(){
			$this->departement = $_POST['Departement'];
		}

		public function sql() {
			$this->sql=$this->conn->query("UPDATE user SET departement ='".$this->departement."' WHERE mail ='".$_SESSION['mail']."'");
		}
	}
	$edi = new Edit();
	$edi->main();
}
if(isset($_POST['region'])){
	Class Edit extends Base{
		private $sql;
		private $region;

		public function main(){
			$this->info();
			$this->sql();

		}

		public function info(){
			$this->region = $_POST['Region'];
		}

		public function sql() {
			$this->sql=$this->conn->query("UPDATE user SET region ='".$this->region."' WHERE mail ='".$_SESSION['mail']."'");
		}
	}
	$edi = new Edit();
	$edi->main();
}

if(isset($_POST['pays'])){
	Class Edit extends Base{
		private $sql;
		private $pays;

		public function main(){
			$this->info();
			$this->sql();

		}

		public function info(){
			$this->pays = $_POST['Pays'];
		}

		public function sql() {
			$this->sql=$this->conn->query("UPDATE user SET pays ='".$this->pays."' WHERE mail ='".$_SESSION['mail']."'");
		}
	}
	$edi = new Edit();
	$edi->main();
}

if(isset($_POST['button'])){
	Class Edit extends Base{
		private $sql;
		private $datenaissance;
		private $ville;
		private $departement;
		private $region;
		private $pays;

		public function main(){
			$this->info();
			$this->sql();

		}

		public function info(){
			$this->datenaissance = $_POST['date_de_naissance'];
			$this->ville = $_POST['Ville'];
			$this->departement = $_POST['Departement'];
			$this->region = $_POST['Region'];
			$this->pays = $_POST['Pays'];
		}

		public function sql() {
			$this->sql=$this->conn->query("UPDATE user SET date_de_naissance ='".$this->datenaissance."' , ville = '".$this->ville."' WHERE mail ='".$_SESSION['mail']."'");
		}
	}
	$edi = new Edit();
	$edi->main();
}

Class Profil extends Base{

	private $sql;

	public function main(){
		$this->sql();
		$this->info();
	}


	public function Info(){

		$row = $this->sql->fetch();
		echo "<div class ='container'>";
		echo "<div class='col-sm-6'>";
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
		echo "</div>";

	}
	public function sql() {
		$this->sql=$this->conn->query("SELECT * from user WHERE mail='".$_SESSION['mail']."'");
	}
}
$profil = new Profil();
$profil->main();
?>
<div class="col-sm-6">
	<form action="compte.php" method="POST">
		<p>Modifier la date de naissance: </p>
		<input type="text" id="datepicker" name="date_de_naissance">
		<button type="submit" class="btn btn-success" name="date" >Edit</button>
	</form>
	<form action="compte.php" method="POST">
		<p>Modifier la ville: </p>
		<input type="text" name="Ville" placeholder="Ville">
		<button type="submit" class="btn btn-success" name="ville" >Edit</button>
	</form>
	<form action="compte.php" method="POST">
		<p>Modifier le département: </p>
		<input type="text" name="Departement" placeholder="Departement">
		<button type="submit" class="btn btn-success" name="departement" >Edit</button>
	</form>
	<form action="compte.php" method="POST">
		<p>Modifier la région: </p>
		<input type="text" name="Region" placeholder="Region">
		<button class="btn btn-success" type="submit" name="region" >Edit</button>
	</form>
	<form action="compte.php" method="POST">
		<p>Modifier le pays: </p>
		<input type="text" name="Pays" placeholder="Pays">
		<button type="submit" class="btn btn-success" name="pays" >Edit</button>
	</form>
</div>
</div>
<div class="container">
	<div class="col-sm-6" id="del">
		<form action="compte.php" method="POST">
			<p>(reconnexion nécessaire)Modifier l'adresse mail: </p>
			<input type="email" name="mail" placeholder="Mail">
			<button type="submit" class="btn btn-success" name="changemail">Edit</button>
		</form>
		<form action="compte.php" method="POST">
			<p>(reconnexion nécessaire )Modifier le mot de passe: </p>
			<input type="password" name="pass" placeholder="Mot de passe">
			<button type="submit" class="btn btn-success" name="changepass">Edit</button>
		</form>
		<form action="compte.php" method="POST">
			<button type="submit" class="btn btn-danger" name="delete">Desactiver mon compte</button>
		</form>
	</div>
</div>
</body>
</html>