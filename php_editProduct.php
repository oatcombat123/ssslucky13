<?php
include("connectdb.php");
$id = $_POST["id"];
$name = $_POST["name"];
$amount = $_POST["amount"];

$sql = "UPDATE stock SET name='".$name."', amount='".$amount."' WHERE id='".$id."' ";

if ($conn->query($sql) === TRUE) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . $conn->error;
}
$conn->close();
?>
</body>
</html>