<?php
include("connect.php");
$name = $_POST["name"];
$amount = $_POST["amount"];

$sql = "INSERT INTO stock (name, amount)
VALUES ('".$name."', '".$amount."')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
$conn->close();
?>