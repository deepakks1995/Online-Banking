<html>
<body>
<form action="main.php" method="post">
<input  type="submit" value="SIGN OUT"/>
</form>
<center>
<form action="empform.php" method="post">
<input type="submit" value="HOME"/>
</form></center>
</br>
<center>
<?php
	$username="root";
	$pass="deepak";
	$db="banks";
	$conn=mysql_connect( "localhost", $username, $pass);
	if(!$conn)
		die("Unable to connect ");
	
	mysql_select_db($db);
	$no=$_POST['no'];
	$amount=$_POST['amount'];

	$sql="SELECT * FROM details WHERE accno=\"$no\"";

	$result=mysql_query($sql);
	$row=mysql_fetch_array($result);
	if($row==NULL)
		die("Account does not exist");
	$balance_left=$row['balance']+$amount;
	$acctype=$row['acctype'];
	$transtype="Credit";
	$query="UPDATE details SET balance=\"$balance_left\" where accno=\"$no\"";
	$query1="INSERT INTO log (accno, amount, acctype, transtype, timestamp) VALUES ('$no','$amount','$acctype','$transtype',NOW())";
	mysql_query($query1);	
	if(mysql_query($query) ){
		echo '<div align="center">'."Record updated successfully".'</div>';
	}else {
		echo "Error updating record";
	}
	mysql_close();
	?>
<form action="etrans.php" method="post">
<input type="submit" value="BACK"/>
</form>
	</body>
	</html>

