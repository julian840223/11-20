<!DOCTYPE html>

<html>
	<head>
		<meta charset="UTF-8"><!--<meta content="text/html;charset=utf-8" />-->
        <title>Mr.16 Bakery</title>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha.5/css/bootstrap-flex.css" />
	<style type="text/css">
        body{
            text-align:left;
            
        }
        #back{
           background-image:url(1.jpg);width:1366px;height:768px;
           background-repeat:no-repeat;
           background-size:100%;
           background-attachment: fixed;
           background-position: center;
           opacity: 0.9; //透明度設為 0.5
            filter: alpha(opacity=50); // IE8 與更早的版本
        }
        #bottom{
            text-align:left;
            font-family: Microsoft JhengHei;
        }
	</style>
	</head>
<body>

<div id="back">
<h1 style="text-align:center;font-family:Gungsuh">
Mr.16 Home
</h1>

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
	echo "<h1>玩家名稱 : " . $userName . "</h1><br>";
	echo "<h1>金幣 : " . $row['Money'] . "</h1><br>";
	echo "<h1>分店數 : " . $row3['count(*)'] . "</h1><br>";
	
?>
	<!--<img src = "<?php echo $picture; ?>" align = "left" alt="Smiley face" height="400" width="400">-->
	<form method="post">
		<td><input type="submit" name="Submit" class="btn btn-success" value="Open store"  style="border:3px white double;"/></td>
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
		<td><input type="submit" class="btn btn-success" name="Submit" value="Go to store" style="border:3px white double;"/></td>
	</form>
	<div id="bottom">
	<p ><font size="10" color="#D2691E">總店庫存 </font></p>
	<table width="450" cellpadding="5"  >
	
	<tr>
		<td  bgcolor="#DDDDDD" >波蘿 : 剩餘 <?php echo $row2['A']; ?> 個</td>
		<td  bgcolor="#AAAAAA" >可頌 : 剩餘 <?php echo $row2['B']; ?> 個</td>
		<td  bgcolor="#888888" >蛋塔 : 剩餘 <?php echo $row2['C']; ?> 個</td>
	</tr>
	</table>'
    </div>
	
</div>
</body>
</html>
