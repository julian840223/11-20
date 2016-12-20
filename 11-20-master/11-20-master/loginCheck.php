<?php
session_start();
require("dbconnect.php");
$userName = $_POST['name']; //$_POST['id'];
$passWord = $_POST['pwd'];


$userName = mysqli_real_escape_string($conn,$userName);

$sql = "SELECT * FROM User WHERE Name='$userName'"; 

if ( $result = mysqli_query($conn,$sql) ) {

	if ( $row = mysqli_fetch_assoc($result) ) {
		if ($row['Password'] == $passWord) {
			echo "success!";
				$_SESSION['Name'] = $row['Name']; //row SQL to php   SESSION php to php
				//provide a link to the message list UI
			if($row['Name'] == $userName)
				echo "<a href='user.php'>go</a>";
 
		}
		else {
			//print error message
			echo "2 Invalid Username or Password - Please try again <br />";
		}
	}
	else {
		//print error message
		echo "3Invalid Username or Password - Please try again <br />";
	}
}
header("Location: user.php");
?>
