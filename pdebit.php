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
	$transtype="Debit";

	$sql="SELECT * FROM details WHERE accno=\"$no\"";

	$result=mysql_query($sql);
	$row=mysql_fetch_array($result);
	if($row==NULL)
		die("Account does not exist");
	if($row['acctype']=="Current")
	{
		$acctype="Current";
		$balance_left=$row['balance']-$amount;
		$sq="SELECT * FROM minbalance WHERE acctype=\"$acctype\"";
		$re=mysql_query($sq);
		$rw=mysql_fetch_array($re);
		if($balance_left<$rw['min'])
			die("Balance is too low ");
		$s1="INSERT INTO log (accno, amount, acctype, transtype, timestamp) VALUES ('$no','$amount','$acctype','$transtype',NOW())";
		
		$query="UPDATE details SET balance=\"$balance_left\" where accno=\"$no\"";
		if(mysql_query($query) && mysql_query($s1))
		{
			echo '<div align="center">'."Record updated successfully".'</div>';
		}
		else
		{
			echo "Error updating record".mysql_error();
		}
	}
	else 
	{
		$acctype1="Savings";
		$balance_left=$row['balance']-$amount;
		$sq1="SELECT * FROM minbalance WHERE acctype=\"$acctype1\"";
		$re1=mysql_query($sq1);
		$rw1=mysql_fetch_array($re1);
	
		if($balance_left<$rw1['min'])
			die("Balance is too low ");
		$s2="INSERT INTO log (accno, amount, acctype, transtype, timestamp) VALUES ('$no','$amount','$acctype1','$transtype',NOW())";
		$query="UPDATE details SET balance=\"$balance_left\" where accno=\"$no\"";
		if(mysql_query($query) && mysql_query($s2))
		{
			echo '<div align="center">'."Record updated successfully".'</div>';
		}else 
		{
		echo "Error updating record".mysql_error();
		}
	}
	mysql_close();
	?>
<form action="etrans.php" method="post">
<input type="submit" value="BACK"/>
</form>
	</body>
	</html>

