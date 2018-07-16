<?php
include 'head.php';
if($_SESSION['active'] == '1'){
	echo "<script>window.open('accueil.php','_self')</script>";
}
?>

<?php
Class Mail extends Base{
	private $pseudo;
	private $nom;
	private $prenom;
	private $datenaissance;
	private $sexe;
	private $ville;
	private $departement;
	private $region;
	private $pays;
	private $mail;
	private $motdepasse;
	private $motdepasseha;
	private $sql;
	private $cle;
	private $requete;

	public function main(){
		$this->donnee();
		$this->sql();
	}

	public function donnee(){
		$this->requete = $this->conn->query("SELECT * FROM user where mail = '".$_SESSION['mail']."'");
		$row = $this->requete->fetch();
		$this->prenom = $row['prenom'];
		$this->mail = $row['mail'];
		$this->pseudo = $row['pseudo'];
		$this->cle = md5(microtime(TRUE)*100000);
	}



	public function sql(){
		$this->sql= $this->conn->query("UPDATE user SET active = '0' , cle = '".$this->cle."' WHERE mail ='".$this->mail."' ");
		require 'vendor/autoload.php';


		$transport = (new Swift_SmtpTransport('smtp.gmail.com', 587,'tls'))
		->setUsername('mymeebapt@gmail.com')
		->setPassword('meetmeet')
		;



		$mailer = new Swift_Mailer($transport);


		$message = (new Swift_Message('Activation de votre compte - My Meetic'))
		->setFrom(['bellsan02@gmail.com' => 'My_Meetic'])
		->setTo([$this->mail => $this->pseudo])
		->setBody("Bonjour ".$this->prenom."!<br>Vous avez récemment fait une demande d'activation / réactivation de votre compte.<br> Veuillez confirmer votre adresse mail en cliquant sur <a href='http://localhost/Index/PHP_my_meetic/mail.php?link=".$this->cle."&pseudo=".$this->pseudo."' target='_blank' rel='noopener noreferrer'>ce lien</a><br>Si le lien précédent ne s'affiche pas, veuillez copier le lien suivant et le lancer dans la barre de votre navigateur: http://localhost/Index/PHP_my_meetic/mail.php?link=".$this->cle."&pseudo=".$this->pseudo." ", "text/html")
		;

		$mailer->send($message);
	}

}
$form = new Mail();
$form->main();

?>
<p>Afin d'activer / réactiver votre compte, un mail a été envoyé à l'adresse suivante: <?php echo $_SESSION['mail']; ?> </p>
<a href="index.php">Retour à l'accueil</a>

</body>
</html>