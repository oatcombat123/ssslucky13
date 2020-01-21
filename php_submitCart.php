<?php
foreach($_COOKIE["cart"] as $index => $valus) {
	setcookie("cart[$index]", "", time() - 3600, "/");
}
header("location: form_shop.php");
?>