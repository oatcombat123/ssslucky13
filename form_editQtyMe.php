<?php session_start();
if (!$_SESSION["email"]){
	header("location:form_login.php"); 
}else { 

include("connectdb.php");
$id = $_POST["id"];
$old = $_POST["old"];
	
$sql = "SELECT * FROM stock WHERE id='".$id."'";
$result = $conn->query($sql);
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>
	<style>
		body, input{
			text-align: center;
			margin-bottom: 1%;
		}
	</style>
<body>
	<h1>แก้ไขจำนวน</h1>
	<?php 
	if ($result->num_rows > 0) {
    	while($row = $result->fetch_assoc()) {
	?>
	<form action="php_editCart.php" method="post">
		ชื่อสินค้า : <input type="text" name="name" value="<?php echo $row["name"]; ?>" readonly> <br>
		จำนวนเก่า : <input type="text" name="old-amount" value="<?php echo $old ?>" readonly> <br>
		<!-- ตำแหน่งของสินค้า --><input type="hidden" name="index" value="<?php echo $id ?>">
		จำนวนใหม่ : <input type="text" name="new-amount"> <br>
		<input type="submit" value="ยืนยัน">
	</form>
	<?php }
	} else {
    	echo "0 results";	 
	}?>
</body>
</html>
<?php $conn->close(); } ?>



