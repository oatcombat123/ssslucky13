<?php 
$id = $_POST["id"];

if(isset($_COOKIE["cart"])) {
	if(array_key_exists($id,$_COOKIE["cart"])) {
		$num = $_COOKIE["cart"][$id] + 1;
		setcookie("cart[$id]", $num, time() + 86400, "/");
	} else {
		setcookie("cart[$id]", 1, time() + 86400, "/");
	}
} else {
	setcookie("cart[$id]", 1, time() + 86400, "/");
}
header("location: form_cartMe.php");
?>