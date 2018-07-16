<?php
include 'connexion.php';

?>
<?php
Class Formulaire extends Base{
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
	private $age;
	private $sqlcheckmail;
	private $sqlcheckpseudo;

	public function main(){
		$this->donnee();
		$this->sqlcheckmail = $this->conn->query("SELECT * FROM user where mail = '".$this->mail."' ");
		$this->sqlcheckpseudo = $this->conn->query("SELECT * FROM user where pseudo = '".$this->pseudo."' ");
		$rowmail = $this->sqlcheckmail->fetch();
		$rowpseudo = $this->sqlcheckpseudo->fetch();
		if($rowmail == true && $rowpseudo == true){
			echo "<p>Pseudo et Mail déjà utilisé</p>
			<a href='index.php'>Retour à l'accueil</a>";
		}else if ($rowmail == false && $rowpseudo == true){
			echo "<p>Pseudo déjà utilisé</p>
			<a href='index.php'>Retour à l'accueil</a>";
		}else if ($rowmail == true && $rowpseudo == false){
			echo "<p>Mail déjà utilisé</p>
			<a href='index.php'>Retour à l'accueil</a>";
		}else if ($rowmail == false && $rowpseudo == false){

			$this->sql();
		}
	}

	public function donnee(){
		$this->pseudo = $_POST['pseudo'];
		$this->nom = $_POST['nom'] ;
		$this->prenom = $_POST['prenom'] ;
		$this->datenaissance = $_POST['datenaissance'];
		$this->sexe = $_POST['sexe'];
		$this->ville = $_POST['ville'];
		$this->departement = $_POST['departement'];
		$this->region = $_POST['region'];
		$this->pays = $_POST['pays'];
		$this->mail = $_POST['mail'];
		$this->motdepasse = $_POST['motdepasse'] ;
		$this->motdepasseha = hash('ripemd160',$this->motdepasse);
		$this->cle = md5(microtime(TRUE)*100000);
		$birthDate = explode("-", $this->datenaissance);
		$this->age = (date("md", date("U", mktime(0, 0, 0, $birthDate[2], $birthDate[1], $birthDate[0]))) > date("md")
			? ((date("Y") - $birthDate[0]) - 1)
			: (date("Y") - $birthDate[0]));
		
	}

	public function sql(){
		if($this->age > 17){
			if($this->pseudo =="" ||$this->nom =="" ||$this->prenom =="" ||$this->datenaissance == ""||$this->ville =="" ||$this->departement =="" ||$this->region =="" ||$this->pays =="" ||$this->mail =="" ||$this->motdepasse =="" ){
				echo "<!DOCTYPE html>
				<html>
				<head>
				<title>Meetic - Register success</title>
				</head>
				<body>
				<p>Veuillez remplir TOUS les champs.</p>
				<a href='index.php'>Retour à l'accueil</a>
				</body>
				</html>";
			}else{
				$this->sql= $this->conn->query("INSERT INTO user (pseudo, nom, prenom, date_de_naissance, sexe, ville, departement, region , pays, mail, password, cle, age) VALUES ('".$this->pseudo."', '".$this->nom."', '".$this->prenom."', '".$this->datenaissance."', '".$this->sexe."', '".$this->ville."', '".$this->departement."', '".$this->region."', '".$this->pays."', '".$this->mail."', '".$this->motdepasseha."', '".$this->cle."', '".$this->age."')");
				require 'vendor/autoload.php';


				$transport = (new Swift_SmtpTransport('smtp.gmail.com', 587,'tls'))
				->setUsername('mymeebapt@gmail.com')
				->setPassword('')
				;



				$mailer = new Swift_Mailer($transport);


				$message = (new Swift_Message('Confirmation de votre mail - My Meetic'))
				->setFrom(['bellsan02@gmail.com' => 'My_Meetic'])
				->setTo([$this->mail => $this->pseudo])
				->setBody("Bonjour ".$this->prenom."!<br>Merci pour votre inscription sur My_Meetic<br> Veuillez confirmer votre adresse mail en cliquant sur <a href='http://localhost/Index/PHP_my_meetic/mail.php?link=".$this->cle."&pseudo=".$this->pseudo."' target='_blank' rel='noopener noreferrer'>ce lien</a><br>Si le lien précédent ne s'affiche pas, veuillez copier le lien suivant et le lancer dans la barre de votre navigateur: http://localhost/Index/PHP_my_meetic/mail.php?link=".$this->cle."&pseudo=".$this->pseudo." ", "text/html")
				;

				$mailer->send($message);
				echo "<!DOCTYPE html>
				<html>
				<head>
				<title>Meetic - Register success</title>
				</head>
				<body>
				<p>Vous êtes bien enregistré !</p>
				<p>Un mail de confirmation a été envoyé.</p>
				<p>Veuillez confirmer votre adresse mail</p>
				<a href='index.php'>Retour à l'accueil</a>
				</body>
				</html>";
			}
		}
		else{
			echo "<!DOCTYPE html>
			<html>
			<head>
			<title>Meetic - PEGI 18</title>
			</head>
			<body>
			<p>EH!</p>
			<p>Ce site est interdit au moins de 18 ans.</p>
			<p>Veuillez reesayer .. plus tard.</p>
			<a href='index.php'>Retour à l'accueil</a>
			</body>
			</html>";
		}
	}

}
$form = new Formulaire();
$form->main();
?>
