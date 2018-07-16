<?php
include "loginrequete.php";

?>
<?php


Class HeadPo{
	private $autotime;
	public function main(){
		$this->donnee();
		if(isset($this->autotime) && (time() - $this->autotime >1800)){
			$this->expire();
		}
		if($_SESSION['mail']){
			$this->logactive();
		}
		if(!$_SESSION['mail']){
			$this->loginactive();
		}
	}
	public function donnee(){
		$this->autotime = $_SESSION['time'] = time();
	}
	public function expire(){
		echo "<script>alert('Your session has expired')</script>";
		session_unset();    
		session_destroy();
	}
	public function logactive(){
		echo '<div class="container-fluid"> <p>Compte:'.$_SESSION['pseudo'].'</p><a class="btn btn-primary" href="logout.php" role="button" id="tweet">Logout</a></div>';	
	}
	public function loginactive(){
		header("Location: index.php");
	}
}
$check = new HeadPo();
$check->main();
?>
