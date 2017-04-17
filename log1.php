<html>
<body>
<form action="main.php" method="post">
<input type="submit" value="SIGN OUT"/>
</form><center>
<form action="custform.php" method="post">
<input type="submit" value="HOME"/>
</form>
</br>
<h3> Transaction Log</h3></br></br>
<?php
	$accno1=$_POST['accno'];
	echo nl2br("Account Number: ". $accno1. "\n");
	?>
	</br>
<table>	
	<tr>
		<td>Transaction_ID</td><td> Customer_ID</td><td>Amount</td><td>Account_Type</td><td>Transaction_Type</td><td>TimeStamp</td>
		</tr>
<?php
	$username="root";
	$pass="deepak";
	$conn=mysql_connect("localhost", $username, $pass);
	if(!$conn)
		die("Unable to connect to MySQL");
	mysql_select_db("banks");

	$accno=$_POST['accno'];

	$sql="SELECT * FROM log where accno=\"$accno\"";
	$sql2="select * from details where accno=\"$accno\"";
	$res=mysql_query($sql2);
	$row1=mysql_fetch_array($res);
	$custid=$row1['custid'];
	$result=mysql_query($sql);



	while($row=mysql_fetch_array($result))
	{
		echo "<tr>";
			echo "<td>".$row['id']."</td><td>".$custid."</td><td>".$row['amount']."</td><td>".$row['acctype']."</td><td>".$row['transtype']."</td><td>".$row['timestamp']."</td>";
			echo "</tr>";
	}
	mysql_close();
	?>
	</body>
	</html>

