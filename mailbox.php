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
</div>
<?php

Class Recu extends Base{
	private $sql;
	private $reception;
	private $iddest;

	public function main(){
		$this->donnee();
		$this->sql();
	}

	public function donnee(){
		$this->reception = $this->conn->query("SELECT * FROM user where mail = '".$_SESSION['mail']."' ");
		$row = $this->reception->fetch();
		$this->iddest = $row['id'];
	}


	public function sql(){
		$this->sql = $this->conn->query("SELECT DISTINCT user.prenom as prenom,user.nom as nom, user.pseudo as pseudo, user.id as id from messages LEFT OUTER JOIN user on messages.id_destinataire = user.id where  messages.id_destinataire = '".$this->iddest."' or  messages.id_auteur ='".$this->iddest."' ");
		echo "<h2>Messages reçus :</h2>";
		while($resultrecu = $this->sql->fetch()){
			if($resultrecu['id'] != $this->iddest){
				echo "<div class='conversation'>";
				echo "<a href='conversation.php?user=".$resultrecu['id']."'>Conversation avec ".$resultrecu['prenom'] ." ". $resultrecu['nom']. " alias ".$resultrecu['pseudo']."</a>";
				echo "</div>";

			}
			
		}
		

	}
}
$read = new Recu();
$read->main();


?>

</body>
</html>