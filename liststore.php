<html>
	<head>
		<meta content="text/html;charset=utf-8" />
	</head>
<body>



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
		$cost= $itemA*rand(10, 30)+$itemB*rand(30, 50)+$itemC*rand(50, 70);
		//echo $cost;
		$sql = "UPDATE `company` SET `A`=A-$itemA,`B`=B-$itemB,`C`=C-$itemC";
		$result=mysqli_query($conn,$sql) or die("DB Error: Cannot retrieve message.1");
		
		$sql = "UPDATE `item` SET `Volumn`=Volumn+$itemA where SID=$id and Thing='甲'" ;
		$result=mysqli_query($conn,$sql) or die("DB Error: Cannot retrieve message.2");
		$sql = "UPDATE `item` SET `Volumn`=Volumn+$itemB where SID=$id and Thing='乙'" ;
		$result=mysqli_query($conn,$sql) or die("DB Error: Cannot retrieve message.3");
		$sql = "UPDATE `item` SET `Volumn`=Volumn+$itemC where SID=$id and Thing='丙'" ;
		$result=mysqli_query($conn,$sql) or die("DB Error: Cannot retrieve message.4");
		$sql = "UPDATE `user` SET `Money`=Money-$cost" ;
		$result=mysqli_query($conn,$sql) or die("DB Error: Cannot retrieve message.4");
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
	<tr><td colspan="3" align="center"> <?php echo $row['SID'] . "號商店" ;?> </td></tr>
	<td align="center">商品</td>
	<td align="center">目前庫存</td>
	<td align="center">限制庫存</td>
		
<?php
	$tmp=$row['SID'];
	$sql = "SELECT * FROM `item` where SID=$tmp";
	$result1=mysqli_query($conn,$sql) or die("DB Error: Cannot retrieve message.");
	while($row2=mysqli_fetch_assoc($result1))
	{
	echo "<tr><td>" . $row2['Thing'] . "</td>";
	echo "<td>" . $row2['Volumn']  . "</td>";
	if($row2['Thing']== "甲")
		echo "<td>" . 50 . "</td></tr>";
	if($row2['Thing']== "乙")
		echo "<td>" . 70 . "</td></tr>";
	if($row2['Thing']== "丙")
		echo "<td>" . 20 . "</td></tr>";
	}
?>	
	<br>
	</table>
	<form method="post" action="sell.php">
		<td><input type="submit" name="call_item" value="叫貨-<?php echo $tmp;?>" /></td>
	</form>
	
<?php
	}
	$sql2 = "select * from company ;";
	$result2=mysqli_query($conn,$sql2) or die("DB Error: Cannot retrieve message.");
	$row2 = mysqli_fetch_assoc($result2);
	
	echo "<a href='user.php'>返回</a>";
?>
	<p>總公司庫存</p>
	<table width="500" border="1">
	<tr>
		<td>甲 : 庫存 <?php echo $row2['A']; ?> 單位</td>
		<td>乙 : 庫存 <?php echo $row2['B']; ?> 單位</td>
		<td>丙 : 庫存 <?php echo $row2['C']; ?> 單位</td>
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