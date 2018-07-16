<?php
include 'connexion.php';

?>
<?php
if($_SESSION['active'] == '1'){
	echo "<script>window.open('accueil.php','_self')</script>";
}

Class MailConfirm extends Base{
	private $sql;
	private $lien;
	private $pseudo;
	private $mailconfirmé;
	private $verif;
	private $already;

	public function main(){
		$this->lien();
		$this->verif();
		if($this->already['active'] == 1){
			echo "<p>Votre compte est déjà activé.</p><a href='index.php'>Retour à l'accueil</a></body></html>";
		}else{
			$this->sql();
			$this->confirmation();
		}
		
	}

	public function lien(){
		$this->lien = $_GET['link'];
		$this->pseudo = $_GET['pseudo'];
	}

	public function verif(){
		$this->verif= $this->conn->query("SELECT * FROM user where pseudo ='".$this->pseudo."'");
		$this->already = $this->verif->fetch();
	}

	public function sql(){
		$this->sql= $this->conn->query("UPDATE user set active = '1' where cle = '".$this->lien."' AND pseudo='".$this->pseudo."' ");
	}
	public function confirmation(){
		$this->mailconfirmé = $this->conn->query("SELECT * FROM user where pseudo ='".$this->pseudo."'");
		$row = $this->mailconfirmé->fetch();
		if($row['active'] == '1'){
			echo "<p>Mail confirmé</p><br>
			<a href='index.php'>Retour à l'accueil pour se connecter</a>";
		}
		else{
			echo "<p>Une erreur est survenue lors de l'activation de votre compte</p><br><a href='reactive.php'>Reactiver mon compte</a><br>
			<a href='index.php'>Retour à l'accueil</a>";
		}
	}
}
$confirm = new MailConfirm();
$confirm->main();
?>

</body>
</html>