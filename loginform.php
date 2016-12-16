<?php
session_start();
require("dbconnect.php");

//set the login mark to empty
$_SESSION['Name'] = "";

?>
<h1>Login Form</h1><hr />
<form method="post" action="loginCheck.php">
	User Name: <input type="text" name="name"><br />
	Password : <input type="password" name="pwd"><br />

	<input type="submit">
</form>