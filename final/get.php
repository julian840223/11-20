<html>
	<head>
		<meta content="text/html;charset=utf-8" />
	</head>
<body>
<?php
	session_start();
	require("dbconnect.php");
	$storeID = $_POST["call_item"];
	$tmp = strpos($storeID,"-");
	$true_store_ID = substr($storeID,$tmp+1);
	echo $true_store_ID . "號店叫貨" . "<br>";
	
	$sql = "select * from item WHERE SID = '$true_store_ID'";
	$result=mysqli_query($conn,$sql) or die("DB Error: Cannot retrieve message.");
?>
	<form method="post" action = "liststore.php">
<?php	
	while($row = mysqli_fetch_assoc($result))
	{
		$thing = $row['Thing'];
		if($thing =="菠蘿")
			$x = "a";
		else if($thing =="可頌")
			$x = "b";
		else if($thing =="蛋塔")
			$x = "c";
		echo $thing;
?>
	<input type="text" name="good-<?php echo $x ;?>" placeholder="請輸入數量" /><br>
	
<?php
	}
?>
		<td><input type="submit" name="enter" value="輸入" /></td>
	</form>
	
	</body>
</html>