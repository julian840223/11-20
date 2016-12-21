<?php
	session_start();
	require("dbconnect.php");
	
	$sql = "SELECT * FROM item ORDER BY RAND()LIMIT 1";
	$result=mysqli_query($conn,$sql) or die("DB Error: Cannot retrieve message.");
	$row = mysqli_fetch_assoc($result);
	$tid=$row['TID'];
	$k= rand(0, $row['Volumn']);
	$sql = "UPDATE item set Volumn=Volumn-$k where TID =$tid";
	$result=mysqli_query($conn,$sql) or die("DB Error: Cannot retrieve message.");
	
	$sql = "SELECT Thing from item where TID = $tid";
	$result=mysqli_query($conn,$sql) or die("DB Error: Cannot retrieve message.");
	$row = mysqli_fetch_assoc($result);
	if($row['Thing'] == "菠蘿")
		$money = 50*$k;
	if($row['Thing'] == "可頌")
		$money = 70*$k;
	if($row['Thing'] == "蛋塔")
		$money = 90*$k;
	echo $money;
	$sql = "update user set Money = Money+$money";
	$result=mysqli_query($conn,$sql) or die("DB Error: Cannot retrieve message.");
	header('Location:liststore.php');
	
?>