<?php session_start();
if (!$_SESSION["email"]){
	header("location:form-login.php"); 
}else { ?>

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
	<h1>เพิ่มสินค้า</h1>
	<form action="php-addProduct.php" method="post">
		ชื่อสินค้า : <input type="text" name="name"> <br>
		จำนวน : <input type="text" name="amount"> <br>
		<input type="submit" value="ยืนยัน">
	</form>
</body>
</html>
<?php } ?>