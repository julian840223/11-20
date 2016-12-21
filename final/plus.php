<?php
	require("dbconnect.php");
	if($_POST['name']=="A")
	{
		$sql_up = "select amountA from company ";
		$result=mysqli_query($conn,$sql_up) or die("DB Error: Cannot retrieve message.");
		$row = mysqli_fetch_assoc($result);
		$amount=$row['amountA'];
		$timeA=$_POST['timeA'];
		$timeB=$_POST['timeB'];
		$timeC=$_POST['timeC'];
		$cost = rand(30,50)*$amount;
		$sql="update company set A =A+'$amount',callA=0,amountA='0', callB=$timeB,callC=$timeC";
		$result=mysqli_query($conn,$sql) or die("DB Error: Cannot retrieve message.");
		$sql="update user set Money=Money-'$cost'  ";
		$result=mysqli_query($conn,$sql) or die("DB Error: Cannot retrieve message.");
		echo 1;
	}
	else if($_POST['name']=="B")
	{
		$sql_up = "select amountB,callB from company ";
		$result=mysqli_query($conn,$sql_up) or die("DB Error: Cannot retrieve message.");
		$row = mysqli_fetch_assoc($result);
		$amount=$row['amountB'];
		$timeA=$_POST['timeA'];
		$timeB=$_POST['timeB'];
		$timeC=$_POST['timeC'];
		$cost = rand(50,70)*$amount;
		$sql="update company set B =B+$amount ,callB=0,amountB=0 ,callA=$timeA,callC=$timeC";
		$result=mysqli_query($conn,$sql) or die("DB Error: Cannot retrieve message.");
		$sql="update user set Money =Money-$cost  ";
		$result=mysqli_query($conn,$sql) or die("DB Error: Cannot retrieve message.");
		echo 1;
	}
	else if($_POST['name']=="C")
	{
		$sql_up = "select amountC,callC from company ";
		$result=mysqli_query($conn,$sql_up) or die("DB Error: Cannot retrieve message.");
		$row = mysqli_fetch_assoc($result);
		$amount=$row['amountC'];
		$timeA=$_POST['timeA'];
		$timeB=$_POST['timeB'];
		$timeC=$_POST['timeC'];
		$cost = rand(70,90)*$amount;
		$sql="update company set C =C+$amount ,callC=0,amountC=0 ,callB=$timeB,callA=$timeA";
		$result=mysqli_query($conn,$sql) or die("DB Error: Cannot retrieve message.");
		$sql="update user set Money =Money-$cost  ";
		$result=mysqli_query($conn,$sql) or die("DB Error: Cannot retrieve message.");
		echo 1;
	}
	
?>