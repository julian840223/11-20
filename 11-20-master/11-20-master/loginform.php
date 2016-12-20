<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html >
<head>
<meta charset="UTF-8" />
<title>Mr.16 Bakery</title>
<style type="text/css">

#f1 {
width:400px;
border:20px groove orange;
margin:50px auto;
padding:30px;
font-size:30px;


}

html{
cursor: url(cur1028.ani),default;
background-image: url( 'bread.jpg ' );
background-size: 100% 130% ;
background-repeat:no-repeat;
}
input{
cursor: url(cur1028.ani),default;
}
h1{
text-align:center;
font-size:50px;
}

</style>
<script type="text/javascript">
<?php
session_start();
require("dbconnect.php");

//set the login mark to empty
$_SESSION['Name'] = "";

?>
</script>
</head>
<body>

<h1>Login</h1>
<div id="f1" >
<table >



<form method="post" action="loginCheck.php">
	<tr><th>UserName : <input type="text" name="name"></th></tr>
	<tr><th>Password : <input type="password" name="pwd"></th></tr>
	<tr><th><input type="submit"></th></tr>
    
</form>
</table>
</div>

</body>
<html>
