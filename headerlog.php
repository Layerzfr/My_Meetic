<?php
include "requete.php";

?>
<?php
$_SESSION['time'] = time(); 
if (isset($_SESSION['time']) && (time() - $_SESSION['time'] > 1800)) {
	echo "<script>alert('Your session has expired')</script>";
	session_unset();    
	session_destroy();   
}

if($_SESSION['mail']){
	$sql = $link->query("SELECT * FROM users where mail='".$_SESSION['mail']."'");
	$row = $sql->fetch();
	echo '<a class="btn btn-primary" href="logout.php" role="button" id="tweet">Logout</a>';


}
?>