<?php session_start();
if (!$_SESSION["email"]){
	header("location:form_login.php"); 
}else { 

include("connectdb.php");	   
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>
	<style>
		body{
			text-align: center;
		}
		table, td, th{
			border: 1px solid black;
			margin-bottom: 2%;
		}
	</style>
<body>
	<h2>ตะกร้าของฉัน</h2>
	<table align="center">
		<tr>
			<th>ชื่อสินค้า</th>
			<th>จำนวน</th>
			<th colspan="2">เลือกรายการ</th>
		</tr>
		<?php 
		if(isset($_COOKIE["cart"])) {
			foreach($_COOKIE["cart"] as $index => $valus) {
				$sql = "SELECT * FROM stock WHERE id='".$index."'";
				$result = $conn->query($sql);
				if ($result->num_rows > 0) {
    				while($row = $result->fetch_assoc()) {
		?>	
		<tr>
    		<td><?php echo $row["name"]; ?></td>
			<td><?php echo $valus; ?></td>
			<td>
				<form action="form_editQtyMe.php" method="post">
					<!-- ค่าจำนวนสินค้าตัวเก่า --><input type="hidden" name="old" value="<?php echo $valus; ?>">
					<button type="submit" name="id" value="<?php echo $index; ?>">แก้ไขจำนวน</button>
				</form>
			</td>
			<td>
				<form  action="php_delCart.php" method="post">
					<button type="submit" name="id" value="<?php echo $index; ?>">ลบสินค้า</button>
				</form>
			</td>
  		</tr>
		<?php 		}
				} 
			}
		}
		?>
	</table>
	
	
	<a href="form_shop.php">ย้อนกลับ</a> <br><br>
	<form action="php_submitCart.php" method="post"><input type="submit" value="ยืนยันการสั่งซื้อ"></form>
</body>
</html>
<?php  $conn->close(); } ?>


