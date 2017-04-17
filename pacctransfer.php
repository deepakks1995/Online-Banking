<html>
<body background="10.jpg">
<font color="magenta">
<form action="main.php" method="post">
<input  type="submit" value="SIGN OUT"/>
</form>
<center>
<form action="custform.php" method="post">
<input type="submit" value="HOME"/>
</form></center>
</br><center>

<?php
	$username="root";
	$pass="deepak";
	$db="banks";
	$conn=mysql_connect("localhost" , $username, $pass);
	if(!$conn)
		die("Unable to connect to MySQL");		
		
	mysql_select_db($db);	
	$dno=$_POST['dno'];
	$cno=$_POST['cno'];
	$amount=$_POST['amount'];

	$sql="SELECT * FROM details WHERE accno=\"$dno\"";
	$result=mysql_query($sql);
	$row=mysql_fetch_array($result);
	if($row==NULL)
		die("Debit Account not found");
	$sql1="SELECT * FROM details WHERE accno=\"$cno\"";
	$result1=mysql_query($sql1);
	$row1=mysql_fetch_array($result1);
	if($row1==NULL)
		die("Credit Account not found");
	$acctype1=$row['acctype'];
	$transtype1="Debit";
	$transtype2="Credit";
	if($row['acctype']=="Current")
	{
		
		$balance_left=$row['balance']-$amount;
		$sq="SELECT * FROM minbalance WHERE acctype=\"$acctype1\"";
		$r=mysql_query($sq);
		$rw=mysql_fetch_array($r);	   	 
		 if($balance_left<$rw['min'])
			die("Balance too low");
		$query="UPDATE details SET balance=\"$balance_left\" where accno=\"$dno\"";
		if(!mysql_query($query))
			die("Unable to debit from account");


		$balance_left1=$row1['balance']+$amount;

		$acctype2=$row1['acctype'];
		$query1="UPDATE details SET balance=\"$balance_left1\" where accno=\"$cno\"";
		if(mysql_query($query1))
			echo '<div align="center">'."Record updated successfully".'</div>';
		else die("Record cannot be updated");
		$s="INSERT INTO log(accno,amount,acctype,transtype,timestamp) VALUES('$dno','$amount','$acctype1','$transtype1',NOW())";
		$s2="INSERT INTO log(accno,amount,acctype,transtype,timestamp) VALUES('$cno','$amount','$acctype2','$transtype2',NOW())";
		mysql_query($s);
		mysql_query($s2);
	}
	else 
	{
		$balance_left=$row['balance']-$amount;
		$sq1="SELECT * FROM minbalance WHERE acctype=\"$acctype1\"";
		$r1=mysql_query($sq1);
		$rw1=mysql_fetch_array($r1);	   	 
	        if($balance_left<$rw1['min'])
			die("Balance too low");
		$query="UPDATE details SET balance=\"$balance_left\" where accno=\"$dno\"";
		if(!mysql_query($query))
			die("Unable to debit from account");
	
		$balance_left1=$row1['balance']+$amount;

		$acctype2=$row1['acctype'];	
		$query1="UPDATE details SET balance=\"$balance_left1\" where accno=\"$cno\"";
		if(mysql_query($query1))
				echo '<div align="center">'."Record updated successfully".'</div>';
		else die("Record cannot be updated");
		$s3="INSERT INTO log(accno,amount,acctype,transtype,timestamp) VALUES('$dno','$amount','$acctype1','$transtype1',NOW())";
		$s4="INSERT INTO log(accno,amount,acctype,transtype,timestamp) VALUES('$cno','$amount','$acctype2','$transtype2',NOW())";
		mysql_query($s3);
		mysql_query($s4);
	}
	mysql_close();
?></font>
</body>
</html>
