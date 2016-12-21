<html>
	<head>
		<meta content="text/html;charset=utf-8" />
	</head>
<body>
<?php
	session_start();
	require("dbconnect.php");
	$storeID = $_POST["call_store"];
	$tmp = strpos($storeID,"-");
	$true_store_ID = substr($storeID,$tmp+1);
	
	
	$sql = "delete from item WHERE SID = '$true_store_ID'";
	$result=mysqli_query($conn,$sql) or die("DB Error: Cannot retrieve message.");

	$sql = "delete from stand WHERE SID = '$true_store_ID'";
	$result=mysqli_query($conn,$sql) or die("DB Error: Cannot retrieve message.");
	
	echo '<script>alert("QQ關店了");</script>';
	echo '<script>location.replace("liststore.php");</script>';

?>
	</body>
</html>