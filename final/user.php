<html>
	<head>
		<meta content = "UTF-8"> <!--"text/html;charset=utf-8" />-->
		<title>Mr.16 Bakery </title>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha.5/css/bootstrap-flex.css" />
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	
	<style type = "text/css">
		body{
			text-align:left;
		}
		#back{
			background-image:url(back.jpg);
			width:100%;
			height:100%;
			background-repeat:no-repeat;
			background-size:cover;
			opacity:0.9;
			filter:aplha(opacity=50);
		}
		#bottom{
			text-align:left;
			font-family: Microsoft JhengHei;
		}
		table{
			width:500px;
			display:block;
		}
		tr{
			display:flex;
		}
		td{
			flex:1;
		}
	</style>
	</head>
<body>

<div id = "back">
<h1 style = "text-algin:center;font-family:Gungsuh">Mr.16 Home</h1>

<?php
	session_start();
	require("dbconnect.php");
	$userName = $_SESSION['Name'];
	$sql = "select * from User WHERE Name = '$userName';";
	$result=mysqli_query($conn,$sql) or die("DB Error: Cannot retrieve message.");
	$row = mysqli_fetch_assoc($result);
	$_SESSION['ID'] = $row['UID'];
	$picture = $row['Picture'];
	
	$sql3 = "SELECT count(*) FROM `stand` WHERE UID = 1";
	$result3=mysqli_query($conn,$sql3) or die("DB Error: Cannot retrieve message.");
	$row3 = mysqli_fetch_assoc($result3);
	echo "<h1>Name : " . $userName . "</h1><br>";
	echo "<h1>Money : " . $row['Money'] . "</h1><br>";
	echo "<h1>Store : " . $row3['count(*)'] . "</h1><br>";
?>
	<form method="post">
		<td><input type="submit" name="Submit" class="btn btn-success" value="Open store" style="border:3px while double;"/></td>
	</form>
<?php
	if( isset($_POST['Submit'])){
		$UID = $row['UID'];
		$sql_in = "INSERT INTO stand (UID) values ('$UID')";
		mysqli_query($conn,$sql_in);
		$tmp=$row['Money']-300;
		$sql_up = "update User set Money='$tmp' where Name = '$userName';";
		$result=mysqli_query($conn,$sql_up) or die("DB Error: Cannot retrieve message.");
		
		$sql = "select max(SID) maxsid from stand where UID = $UID;";
		$result=mysqli_query($conn,$sql) or die("DB Error: Cannot retrieve message.");
		$row = mysqli_fetch_assoc($result);
		$sid=$row['maxsid'];
		$sql = "INSERT INTO `item`(`SID`, Thing,`Volumn`) VALUE ($sid,'菠蘿',0);";
		$result=mysqli_query($conn,$sql) or die("DB Error: Cannot retrieve message.");
		$sql = "Insert INTO item (SID,Thing,Volumn) Value ($sid,'可頌',0);";
		$result=mysqli_query($conn,$sql) or die("DB Error: Cannot retrieve message.");
		$sql = "Insert INTO item (SID,Thing,Volumn) Value ($sid,'蛋塔',0);";
		$result=mysqli_query($conn,$sql) or die("DB Error: Cannot retrieve message.");
		
		echo '<script>alert("開店成功");</script>';
		echo '<script>location.replace("user.php");</script>';
	}
?>

<?php
	$sql2 = "select * from company ;";
	$result2=mysqli_query($conn,$sql2) or die("DB Error: Cannot retrieve message.");
	$row2 = mysqli_fetch_assoc($result2);
?>
	<form method="post" action="liststore.php">
		<td><input type="submit" class="btn btn-success" name="Submit" value="Go to store" style="border:3px while double;"/></td>
	</form>
	<div id = "bottom">
	<p><font size = "10" color ="#D2691E">總店庫存 </font></p>
	<table class="table" cellpadding="5">
	
	<tr>
		<td  bgcolor="#DDDDDD" >菠蘿 : 剩餘 <?php echo $row2['A']; ?> 個</td>
		<td  bgcolor="#AAAAAA" >可頌 : 剩餘 <?php echo $row2['B']; ?> 個</td>
		<td  bgcolor="#888888" >蛋塔 : 剩餘 <?php echo $row2['C']; ?> 個</td>
	</tr>
	<tr>
		<td  bgcolor="#66B3FF" >倒數<span class='timer' id='timerA' data-a='A'><?php echo $row2['callA']; ?></span>秒 </td>
		<td  bgcolor="#66B3FF" >倒數<span class='timer' id='timerB' data-a='B'><?php echo $row2['callB']; ?></span>秒 </td>
		<td  bgcolor="#66B3FF" >倒數<span class='timer' id='timerC' data-a='C'><?php echo $row2['callC']; ?></span> 秒</td>
	<tr>
		<td   bgcolor="#66B3FF" ><?php echo $row2['amountA']; ?> </td>
		<td   bgcolor="#66B3FF" ><?php echo $row2['amountB']; ?> </td>
		<td   bgcolor="#66B3FF" > <?php echo $row2['amountC']; ?> </td>
	</tr>
	</tr>

	<tr>
		<form method="post" action="order.php">
		<td>
			<?php if($row2['amountA'] == 0) echo "<input type='number' name = 'thingA' value = 0 min=1 >";?>
			<input type="submit" <?php if($row2['amountA'] != 0) echo "disabled=disabled class='btn btn-danger'"; else echo"class= 'btn btn-success'"?> name="bookA" 
		           value= <?php if($row2['amountA'] == 0) echo "菠蘿訂貨"; else echo "訂貨中"; ?> >
		</td>
		</form>
		<form method="post" action="order.php">
		<td>
			<?php if($row2['amountB'] == 0) echo "<input type='number' name = 'thingB' value = 0 min=1 >";?>
			<input type="submit" <?php if($row2['amountB'] != 0) echo "disabled=disabled class='btn btn-danger'"; else echo"class= 'btn btn-success'"?> name="bookB" 
		           value= <?php if($row2['amountB'] == 0) echo "可頌訂貨"; else echo "訂貨中"; ?> >
		</td>
		</form>
		<form method="post" action="order.php">
		<td>
			<?php if($row2['amountC'] == 0) echo "<input type='number' name = 'thingC' value = 0 min=1 >";?>
			<input type="submit" <?php if($row2['amountC'] != 0) echo "disabled=disabled class='btn btn-danger'"; else echo"class= 'btn btn-success'"?> name="bookC" 
		           value= <?php if($row2['amountC'] == 0) echo "蛋塔訂貨"; else echo "訂貨中"; ?> >
		</td>
		</form>
	</tr>
	</table>
	</div>
</div>


<script>
	setInterval(()=>{
		var timer=$('.timer');
		timer.map(function (){
			let t=$(this)[0]
			if(t.innerText>1)
				t.innerText=t.innerText-1;
			else if(t.innerText==1)
			{
				var m=$(this).data('a')
				timeA=$('#timerA')[0].innerText
				timeB=$('#timerB')[0].innerText
				timeC=$('#timerC')[0].innerText
				console.log(timeA,timeB,timeC)
				$.post("plus.php",
				{
					name:m,
					timeA:timeA,
					timeB:timeB,
					timeC:timeC
					
				},
				function(d){
					if(d==1)
						location.replace("user.php");
				})
				
			}
			
		})
		
		
		
	},1000);


</script>
</body>
</html>