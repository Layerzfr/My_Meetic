 <!DOCTYPE html>
 <html>
 <head>
   <title>My Meetic</title>
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
   <link rel="stylesheet" type="text/css" href="style.css">
   <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script src="script.js"></script>
 </head>
 <body>
 

 <?php  
 include "connexion.php";
 session_start();

 Class login extends Base{
  private $login;
  private $user_pass;
  private $sql;

  public function main(){
    $this->donnee();
    $this->Connexion();
  }

  public function donnee(){
    $this->login = $_POST['Mail'];
    $this->user_pass = hash('ripemd160',$_POST['Password']);
  }

  public function Connexion(){

    if(isset($this->login)){
      $this->sql=$this->conn->query("SELECT * from user WHERE mail='".$this->login."' AND password='".$this->user_pass."'");
      $row = $this->sql->fetch();
      if($row['password'] == $this->user_pass && $row['mail'] == $this->login){
        if($row['active'] == '1'){
          $_SESSION['mail'] = $this->login;
          $_SESSION['pseudo'] = $row['pseudo'];
          $_SESSION['active'] = $row['active'];
          $_SESSION['id'] = $row['id'];
          header("Location: accueil.php");
        }else if ($row['active'] == '0'){
          $_SESSION['mail'] = $this->login;
          $_SESSION['pseudo'] = $row['pseudo'];
          $_SESSION['active'] = $row['active'];
          $_SESSION['id'] = $row['id'];
          echo "<p>Veuillez activer votre compte en cliquant sur le lien envoyé par mail.</p><br><a href='reactive.php'>Renvoyer le mail de confirmation</a><br><a href='index.php'>Retour à l'accueil</a>";
        }
      }
      else{  
        echo "<script>alert('User name or password is incorrect!')</script>";
        echo "<script>window.open('login.php','_self')</script>";  

      }
    }
  }
}
$log = new login();
$log->main();
?>