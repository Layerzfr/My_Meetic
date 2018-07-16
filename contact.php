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

Class Contact extends Base{
	private $sql;
	private $id;
	private $message;
	private $destsql;
	private $dest;
	private $tosql;
	private $to;

	public function main(){
		$this->donnee();
		$this->auteur();
		$this->destinataire();
	}
	public function auteur(){
		$this->destsql = $this->conn->query("SELECT * FROM user where mail = '".$_SESSION['mail']."' ");
		$row = $this->destsql->fetch();
		$this->dest = $row['id'];
	}
	public function destinataire(){
		$this->tosql = $this->conn->query("SELECT * FROM user where id = '".$this->id."' ");
		$result = $this->tosql->fetch();
		$this->to = $result['prenom'];	
		echo "<p>Envoyer un message à ".$this->to."</p>";
	}
	public function donnee(){
		$this->id = $_GET['id'];
		$this->message = $_POST['message'];
	}
	public function sql(){
		$this->sql = $this->conn->query("INSERT INTO messages (id_auteur, message, id_destinataire) VALUES ('".$this->dest."', '".$this->message."', '".$this->id."')");
	}
}
$ctc = new Contact();
$ctc->main();
if(isset($_POST['button'])){
	$ctc->sql();
	header("Location: conversation.php?user=".$_GET['id']);
}


echo "<form action='contact.php?id=".$_GET['id']."' method='POST'>
<textarea name='message'></textarea>
<button type='submit' name='button'>Envoyer message</button>
</form>";

?>

<a href="accueil.php">Retour à la page d'accueil</a>

</body>
</html>