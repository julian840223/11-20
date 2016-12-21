<?php
	require("dbconnect.php");
	if(isset($_POST['thingA']))
	{
	$thing = $_POST['thingA'];
	$nexttime =10;

	$sql_up = "update company set amountA='$thing',callA='$nexttime';";
	$result=mysqli_query($conn,$sql_up) or die("DB Error: Cannot retrieve message.");
	
	}
	if(isset($_POST['thingB']))
	{
	$thing = $_POST['thingB'];
	$nexttime =20;
	$sql_up = "update company set amountB='$thing',callB='$nexttime'";
	$result=mysqli_query($conn,$sql_up) or die("DB Error: Cannot retrieve message.");
	}
	if(isset($_POST['thingC']))
	{
	$thing = $_POST['thingC'];
	$nexttime =30;
	$sql_up = "update company set amountC='$thing',callC='$nexttime';";
	$result=mysqli_query($conn,$sql_up) or die("DB Error: Cannot retrieve message.");
	}
	echo '<script>location.replace("user.php");</script>';
?>

