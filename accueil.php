<?php
include 'head.php';
if($_SESSION['active'] == '0'){
	echo "<script>window.open('inactive.php','_self')</script>";
}
?>
<div class="container-fluid">
	<a class="btn btn-primary" href='compte.php'>Mon compte</a>
	<a class="btn btn-primary" href="recherche.php">Recherche</a>
	<a class="btn btn-primary" href="mailbox.php">Mes messages</a>
</div>
</body>
</html>