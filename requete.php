 <?php  
 include 'connexion.php';
 session_start();
 if(isset($_POST['Mail'])){
  Class Head extends Base{
    private $user_name;
    private $user_pass;
    private $check_user;

    public function main(){
      $this->headlog();
      $this->sql();
    }

    public function headlog(){
      $this->user_name = $_POST['Mail'];
      $this->user_pass = hash('ripemd160', $_POST['Password']);
    }
    public function sql(){
      $this->check_user=$this->conn->query("SELECT * from user WHERE mail='".$this->user_name."' AND password='".$this->user_pass."'");
      $row = $this->check_user->fetch();
      if($row['password'] == $this->user_pass && $row['mail'] == $this-<user_name){
        $_SESSION['login'] = $this->user_name;
        $_SESSION['active'] = $row['active'];
        echo "<script>window.open('accueil.php','_self')</script>";  
      }
      else{  
        echo "<script>alert('User name or password is incorrect!')</script>";
        echo "<script>window.open('index.php','_self')</script>";  

      }
    }
  }
  $connex = new Head();
  $connex->main();
}
?>