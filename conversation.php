<?php

include 'head.php';
if($_SESSION['active'] == '0'){
	echo "<script>window.open('inactive.php','_self')</script>";
}
?>
<a class="btn btn-primary" href="compte.php"> Mon compte</a>
<a class="btn btn-primary" href="recherche.php">Recherche</a>
<a class="btn btn-primary" href="mailbox.php">Mes messages</a>
<a class="btn btn-primary" href="accueil.php">Retour à l'accueil</a>

<div class="container">

	<?php
	echo "<div class='messaging center-block'>
	<div class='row'>
	<div class='col-md-12'>
	<div class='input-group'>
	
	<form action='conversation.php?user=".$_GET['user']."' method='POST'>
	<input type='text' class='form-control' name='message'>
	<button class='btn btn-default' type='submit' name='button'>Envoyer message</button>
	</form>
	
	</div>
	</div>
	</div>
	</div>";
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
		}
		public function donnee(){
			$this->id = $_GET['user'];
			$this->message = str_replace("'", "''", $_POST['message']);
		}
		public function sql(){
			$this->sql = $this->conn->query("INSERT INTO messages (id_auteur, message, id_destinataire) VALUES ('".$this->dest."', '".$this->message."', '".$this->id."')");
		}
	}
	$ctc = new Contact();
	$ctc->main();
	if(isset($_POST['button']) && $_POST['message'] != ""){
		$ctc->sql();
	}

	Class myMessage extends Base{
		private $sql;
		private $destid;
		private $nom;
		private $prenom;

		public function main(){
			$this->donnee();
			$this->sqlenvoie();
		}

		public function donnee(){
			$this->destid = $_GET['user'];
			$this->nom = $this->conn->query("SELECT * FROM user WHERE id = $this->destid");
			$rownom = $this->nom->fetch();

			echo "<h2 class='text-center'> Conversation avec ".$rownom['prenom']."</h2>";
			$this->prenom = $rownom['prenom'];
		}
		public function sqlenvoie(){
			$this->sql = $this->conn->query("SELECT DISTINCT messages.message, messages.id_auteur, messages.id_destinataire, messages.date from messages left outer join user on messages.id_destinataire = user.id where (messages.id_auteur = ".$_SESSION['id']." or messages.id_destinataire = ".$_SESSION['id'].") and (messages.id_destinataire= $this->destid or messages.id_auteur = $this->destid) ORDER BY messages.date DESC LIMIT 15 ;
");
			while ($row = $this->sql->fetch()){
				if($row['id_destinataire'] == $this->destid){

					echo '<div class="message-candidate center-block conv">
					<div class="row">
					<div class="col-xs-8 col-md-6">
					<h4 class="message-name">VOUS</h4>
					</div>
					<div class="col-xs-4 col-md-6 text-right message-date">Envoyé - '.$row['date'].'</div>
					</div>
					<div class="row message-text">
					'.$row['message'].' 
					</div>
					</div>';
				}
				else if($row['id_auteur'] == $this->destid){
					echo '<div class="message-hiring-manager center-block">
					<div class="row">
					<div class="col-xs-8 col-md-6">
					<h4 class="message-name">'.$this->prenom.'</h4>
					</div>
					<div class="col-xs-4 col-md-6 text-right message-date">Recu - '.$row['date'].'</div>
					</div>
					<div class="row message-text ">
					'.$row['message'].' 
					</div>
					</div>';
				}
			}
		}
	}

	$message = new MyMessage();
	$message->main();
	

	
	?>
</div>
</body>
</html>