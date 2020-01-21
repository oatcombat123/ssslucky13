<?php
include("connectdb.php");
$user = $_POST["user"];
$sql = "DELETE FROM login WHERE email='".$user."'";

if ($conn->query($sql) === TRUE) {
    echo "Record deleted successfully";
} else {
    echo "Error deleting record: " . $conn->error;
}
$conn->close();
?>
