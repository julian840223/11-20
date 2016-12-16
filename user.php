<html>
	<head>
		<meta content="text/html;charset=utf-8" />
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha.5/css/bootstrap-flex.css" />
	<style>
		body{
			text-align:center;
		}
	</style>
	</head>
<body>

<?php
	session_start();
	require("dbconnect.php");
	$userName = $_SESSION['Name'];
	$sql = "select * from User WHERE Name = '$userName';";
	$result=mysqli_query($conn,$sql) or die("DB Error: Cannot retrieve message.");
	$row = mysqli_fetch_assoc($result);
	$_SESSION['ID'] = $row['UID'];
	$picture = $row['Picture'];
	
	$sql3 = "SELECT count(*) FROM `stand` WHERE UID = 1";
	$result3=mysqli_query($conn,$sql3) or die("DB Error: Cannot retrieve message.");
	$row3 = mysqli_fetch_assoc($result3);
	echo "<h1>Name : " . $userName . "</h1><br>";
	echo "<h1>Money : " . $row['Money'] . "</h1><br>";
	echo "<h1>Store : " . $row3['count(*)'] . "</h1><br>";
	
?>
	<img src = "<?php echo $picture; ?>" align = "left" alt="Smiley face" height="400" width="400">
	<form method="post">
		<td><input type="submit" name="Submit" class="btn btn-success" value="Open store" /></td>
	</form>
<?php

	if( isset($_POST['Submit'])){
		$UID = $row['UID'];
		$sql_in = "INSERT INTO stand (UID) values ('$UID')";
		mysqli_query($conn,$sql_in);
		$tmp=$row['Money']-300;
		$sql_up = "update User set Money='$tmp' where Name = '$userName';";
		$result=mysqli_query($conn,$sql_up) or die("DB Error: Cannot retrieve message.");
		
		$sql = "select max(SID) maxsid from stand where UID = $UID;";
		$result=mysqli_query($conn,$sql) or die("DB Error: Cannot retrieve message.");
		$row = mysqli_fetch_assoc($result);
		//echo $row['maxsid'];
		$sid=$row['maxsid'];
		$sql = "INSERT INTO `item`(`SID`, Thing,`Volumn`) VALUES ($sid,'甲',0);";
		$result=mysqli_query($conn,$sql) or die("DB Error: Cannot retrieve message.");
		$sql = "Insert INTO item (SID,Thing,Volumn) Value ($sid,'乙',0);";
		$result=mysqli_query($conn,$sql) or die("DB Error: Cannot retrieve message.");
		$sql = "Insert INTO item (SID,Thing,Volumn) Value ($sid,'丙',0);";
		$result=mysqli_query($conn,$sql) or die("DB Error: Cannot retrieve message.");
		
		echo '<script>alert("開店成功");</script>';
		echo '<script>location.replace("user.php");</script>';
	}
?>

<?php
	$sql2 = "select * from company ;";
	$result2=mysqli_query($conn,$sql2) or die("DB Error: Cannot retrieve message.");
	$row2 = mysqli_fetch_assoc($result2);
?>
	<form method="post" action="liststore.php">
		<td><input type="submit" class="btn btn-success" name="Submit" value="Go to store" /></td>
	</form>
	
	<p align="center" ><font size="10" color="red">總公司庫存 </font></p>
	<table width="500"  style="border:10px #FF8000 dashed;" cellpadding="10" align="center" >
	
	<tr>
		<td  bgcolor="#66B3FF" >甲 : 庫存 <?php echo $row2['A']; ?> 單位</td>
		<td  bgcolor="#66B3FF" >乙 : 庫存 <?php echo $row2['B']; ?> 單位</td>
		<td  bgcolor="#66B3FF" >丙 : 庫存 <?php echo $row2['C']; ?> 單位</td>
	</tr>
	</table>'

	
</body>
</html>
