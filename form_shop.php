<?php session_start();
if (!$_SESSION["email"]){
	header("location:form_login.php"); 
}else { 

include("connectdb.php");
$sql = "SELECT * FROM stock";
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
			margin-bottom: 3%;
		}
		table, td, th{
			border: 1px solid black;
		}
	</style>
<body>
	<!-- ออกจากระบบ -->
	<form action="php_logout.php" method="post"><input type="submit" value="ออกจากระบบ"></form>
	
	<!-- เมนูรายการ -->
	<table align="center">
		<tr>
			<th>
				<form action="form_showMember.php" method="post">
					<input type="submit" value="รายชื่อสมาชิก">
				</form>
			</th>
			<th>
				<form action="form_cartMe.php" method="post">
					<input type="submit" value="ตะกร้าของฉัน">
				</form>
			</th>
			<th>
				<form action="form_addProduct.php" method="post" target="_blank">
					<input type="submit" value="เพิ่มสินค้า">
				</form>
			</th>
		</tr>
	</table>
	
	<!-- ตารางสินค้าและค้นหา -->
	<h2>รายการสินค้า</h2>
	ค้นหา : <input type="text" id="myInput" onkeyup="myFunction()" placeholder="ค้นหาชื่อสินค้น ..." title="Type in a name">
	<table align="center" id="myTable">
  		<tr class="header">
			<th>รหัสสินค้า</th>
    		<th>ชื่อสินค้า</th>
    		<th>จำนวน</th>
			<th colspan="3">เลือกรายการ</th>
  		</tr>
		<?php 
		if ($result->num_rows > 0) {
    		while($row = $result->fetch_assoc()) {
		?>
  		<tr>
			<td><?php echo $row["id"]; ?></td>
    		<td><?php echo $row["name"]; ?></td>
			<td><?php echo $row["amount"]; ?></td>
			<td>
				<form action="form_editProduct.php" method="post" target="_blank">
					<button type="submit" name="id" value="<?php echo $row["id"]; ?>">แก้ไขสินค้า</button>
				</form>
			</td>
			<td>
				<form action="php_delProduct.php" method="post" target="_blank">
					<button type="submit" name="id" value="<?php echo $row["id"]; ?>">ลบสินค้า</button>
				</form>
			</td>
			<td>
				<form action="php_addToCart.php" method="post">
					<button type="submit" name="id" value="<?php echo $row["id"]; ?>">สั่งซื้อ</button>
				</form>
			</td>	
  		</tr>
		<?php }
			} else {
    			echo "0 results";
		} ?>
	</table>
	
	<!-- เงื่อนไขการค้นหา -->
	<script>
		function myFunction() {
  			var input, filter, table, tr, td, i, txtValue;
  			input = document.getElementById("myInput");
  			filter = input.value.toUpperCase();
  			table = document.getElementById("myTable");
  			tr = table.getElementsByTagName("tr");
  			for (i = 0; i < tr.length; i++) {
				td = tr[i].getElementsByTagName("td")[1];
    			if (td) {
      				txtValue = td.textContent || td.innerText;
      				if (txtValue.toUpperCase().indexOf(filter) > -1) {
        				tr[i].style.display = "";
      				} else {
        				tr[i].style.display = "none";
      				}
    			}       
  			}
		}
	</script>
</body>
</html>
<?php $conn->close(); } ?>