<?php
include("connectdb.php");
$user = $_POST["user"];
$pass = $_POST["pass"];

$sql = "INSERT INTO login (email, password)
VALUES ('".$user."', '".$pass."')";

if ($conn->query($sql) === TRUE) {
    
	echo "<script>alert(' การทำรายการเสร็จสมบูรณ์'); window.location ='form_login.php';</script>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
$conn->close();
?>