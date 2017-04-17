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


<?php
	$username="root";
	$pass="deepak";
	$conn=mysql_connect("localhost",$username,$pass);
	if(!$conn)
		die("Could not connect to database");
	$conn1=mysql_select_db("banks");
	if(!$conn1)
		die("Could not select database");
	
	$id=$_POST['custid'];
	$fname=$_POST['fname'];
	$lname=$_POST['lname'];
	$acctype=$_POST['acctype'];

	$query="SELECT * FROM cust_id WHERE id=\"$id\"";
	$re=mysql_query($query);
	$rw=mysql_fetch_array($re);

	if($rw['id']==NULL)
	die("Customer Id not found. Create Customer first");

	$sql1="SELECT * FROM minbalance where acctype=\"$acctype\"";
	$res=mysql_query($sql1);
	
	$row=mysql_fetch_array($res);
	$balance=$row['min'];
		
	$sql="INSERT INTO details (custid, fname, lname, acctype, balance) VALUES ('$id','$fname','$lname','$acctype','$balance')";
	$r=mysql_query("SELECT `auto_increment` FROM INFORMATION_SCHEMA.TABLES
WHERE table_name = 'details'");
	$rw=mysql_fetch_array($r);
	$accno=$rw['auto_increment'];
	if(mysql_query($sql))
	{

	echo nl2br ('<div align="center">'."Account created successfully ".'</div>'    . "\n");
	 echo nl2br ('<div align="center">'."Account No: "  .$accno .'</div>'    . "\n");
}
	else echo "Error in adding Account";
	?>
	<body>
	</html>
