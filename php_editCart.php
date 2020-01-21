<?php 
$index = $_POST["index"];
$new = $_POST["new-amount"];

setcookie("cart[$index]", $new, time() + 86400, "/");

header("location: form_cartMe.php");
?>