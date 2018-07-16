<?php
class Base{
	public $conn;

	public function __CONSTRUCT(){
		$this->conn = new PDO('mysql:host=localhost; dbname=my_meetic', 'root', '');
	}
}
$base = new Base();
$base->conn;
?>