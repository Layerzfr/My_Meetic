<?php
include "loginrequete.php";

?>
<?php
$_SESSION['time'] = time(); 
if (isset($_SESSION['time']) && (time() - $_SESSION['time'] > 1800)) {
	echo "<script>alert('Your session has expired')</script>";
	session_unset();    
	session_destroy();   
}

if($_SESSION['mail']){
	$sql = $conn->query("SELECT * FROM user where mail='".$_SESSION['mail']."'");
	$row = $sql->fetch();
	echo '<a class="btn btn-primary" href="logout.php" role="button" id="tweet">Logout</a>';


}
if(!$_SESSION['mail'])  
{
	echo "<div class='login-panel panel panel-primary'>
	<div class='panel-heading'>
	<h3 class='panel-title'>Log-in</h3> 
	</div>
	<form role='form' method='post' action='welcome.php'>   
	<div class='panel-body'>
	<div class='form-group'>
	<input class='form-control' placeholder='User name' name='user' type='text'> 
	</div>
	<div class='form-group'> 
	<input class='form-control' placeholder='Password' name='pass' type='password' value=''>  
	</div>
	<div class='form-group'>
	<input type='submit' value='Login' name='login' class='btn btn-lg btn-block btn-primary' >
	</div>
	</div>
	</form>
	</div>";
}
?>