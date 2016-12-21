<html>
	<head>
		<meta content = "UTF-8"> <!--"text/html;charset=utf-8" />-->
		<title>Mr.16 Bakery </title>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha.5/css/bootstrap-flex.css" />
	<style type = "text/css">
	body{
		text-algin:left;
		font-family:Microsoft JhengHei;
	}
	#back2{
		background-image:url(tart1.jpg);
		background-repeat:repeat;
		background-size:100% 100%;
		background-attachment:scroll;
		background-position:center;
		opacity:0.9;
		filter:alpha(opacity=50);
	}

	</style>
	</head>
<body>

<div id="back2">
<h1 style = "text-algin:center;font-family:Gungsuh">Mr.16 Bakery</h1>

<?php
	session_start();
	require("dbconnect.php");
	if(isset($_POST['enter']))
	{
		$id = $_POST['id'];
		$itemA=0;
		$itemB=0;
		$itemC=0;
		
		if(isset($_POST['good-a']))
			$itemA = $_POST['good-a'];
		if(isset($_POST['good-b']))
			$itemB = $_POST['good-b'];
		if(isset($_POST['good-c']))
			$itemC = $_POST['good-c'];
		
		//echo $cost;
		$sql = "UPDATE `company` SET `A`=A-$itemA,`B`=B-$itemB,`C`=C-$itemC";
		$result=mysqli_query($conn,$sql) or die("DB Error: Cannot retrieve message.1");
		
		$sql = "UPDATE `item` SET `Volumn`=Volumn+$itemA where SID=$id and Thing='菠蘿'" ;
		$result=mysqli_query($conn,$sql) or die("DB Error: Cannot retrieve message.2");
		$sql = "UPDATE `item` SET `Volumn`=Volumn+$itemB where SID=$id and Thing='可頌'" ;
		$result=mysqli_query($conn,$sql) or die("DB Error: Cannot retrieve message.3");
		$sql = "UPDATE `item` SET `Volumn`=Volumn+$itemC where SID=$id and Thing='蛋塔'" ;
		$result=mysqli_query($conn,$sql) or die("DB Error: Cannot retrieve message.4");
		//$sql = "UPDATE `user` SET `Money`=Money-$cost" ;
		//$result=mysqli_query($conn,$sql) or die("DB Error: Cannot retrieve message.4");
		echo '<script>location.replace("liststore.php");</script>';
		
	}
	$sql = "SELECT Money FROM `user`";
	$result=mysqli_query($conn,$sql) or die("DB Error: Cannot retrieve message.");
	$row = mysqli_fetch_assoc($result);
	echo "<h3>你現有的錢". $row['Money']." </h3>";
	
	$sql = "SELECT DISTINCT SID FROM `item`";
	$result=mysqli_query($conn,$sql) or die("DB Error: Cannot retrieve message.");
	
	while($row = mysqli_fetch_assoc($result))
	{
	
?>
	<table width="300" border="1"  >
	<tr><td colspan="3" align="center"> <?php echo "神奇" . $row['SID'] . "號商店" ;?> </td></tr>
	<td align="center">商品</td>
	<td align="center">目前庫存</td>
	<td align="center">庫存上限</td>
		
<?php
	$tmp=$row['SID'];
	$sql = "SELECT * FROM `item` where SID=$tmp";
	$result1=mysqli_query($conn,$sql) or die("DB Error: Cannot retrieve message.");
	while($row2=mysqli_fetch_assoc($result1))
	{
	echo "<tr><td>" . $row2['Thing'] . "</td>";
	echo "<td>" . $row2['Volumn']  . "</td>";
	if($row2['Thing']== "菠蘿")
		echo "<td>" . 50 . "</td></tr>";
	if($row2['Thing']== "可頌")
		echo "<td>" . 70 . "</td></tr>";
	if($row2['Thing']== "蛋塔")
		echo "<td>" . 20 . "</td></tr>";
	}
?>	
	<br>
	</table>
	<form method="post" style="float:left" action="sell.php">
		<td><input type="submit" name="call_item" value="叫貨-<?php echo $tmp;?>" /></td>
	</form>	
	<form method="post"  class="form-inline" action="close.php">
			<td><input type="submit" name="call_store" value="關閉-<?php echo $tmp;?>" /></td>
	</form>
<?php
	}
	$sql2 = "select * from company ;";
	$result2=mysqli_query($conn,$sql2) or die("DB Error: Cannot retrieve message.");
	$row2 = mysqli_fetch_assoc($result2);

	echo "<a href='user.php'>返回主畫面</a>";
?>
	<p><h1 style="font-family:Gungsuh">
		<font size="10" color="#D2691E">總店庫存 </font>
	</h1></p>
	<table width="500" border="1">
	<tr>
		<td bgcolor="#DDDDDD">菠蘿 : 剩餘 <?php echo $row2['A']; ?> 個</td>
		<td bgcolor="#AAAAAA">可頌 : 剩餘 <?php echo $row2['B']; ?> 個</td>
		<td bgcolor="#888888">蛋塔 : 剩餘 <?php echo $row2['C']; ?> 個</td>
	</tr>
	
<script>
	setTimeout(
	function(){
		console.log('aa')
		window.location='buy.php';
	}
	,Math.floor(Math.random()*5+5)*1000)
</script>
</body>
</html>