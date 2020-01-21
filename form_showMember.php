<?php session_start();
if (!$_SESSION["email"]){
	header("location:form_login.php"); 
}else { 

include("connectdb.php");
$sql = "SELECT * FROM login";
$result = $conn->query($sql);
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
	<h2>รายชื่อสมาชิก</h2>
	<table align="center">
		<tr>
			<th>ชื่อสมาชิก</th>
			<th>รหัสผ่าน</th>
			<th>ลบสมาชิก</th>
		</tr>
		<?php 
		if ($result->num_rows > 0) {
    		while($row = $result->fetch_assoc()) {
		?>
		<tr>
    		<td><?php echo $row["email"]; ?></td>
			<td><?php echo $row["password"]; ?></td>
			<td>
				<form action="php_deleteMember.php" method="post" target="_blank">
					<button type="submit" value="<?php echo $row["email"]; ?>" name="user">ลบสมาชิก</button>
				</form>
			</td>
  		</tr>
		<?php }
			} else {
    			echo "0 results";
		} ?>
	</table>
</body>
</html>
<?php $conn->close(); } ?>
