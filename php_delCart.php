<?php
$id = $_POST["id"];
setcookie("cart[$id]", "", time() - 3600, "/");
header("location: form_cartMe.php");
?>