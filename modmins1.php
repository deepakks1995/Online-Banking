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
	$conn=mysql_connect("localhost",$username,$pass);
	$conn1=mysql_select_db("banks");
	if(!$conn)
		die("Could not connect to mysql");
	if(!$conn1)
		die("could not connect to database");
	$mins=$_POST['mins'];
	$acctype="Savings";

	$sql="SELECT * FROM minbalance WHERE acctype=\"$acctype\"";
	$res=mysql_query($sql);
	$row=mysql_fetch_array($res);
	if($row==NULL)
	{
		$sql1="INSERT INTO minbalance (acctype, min) VALUES ('$acctype', '$mins')";
		if(mysql_query($sql1))
			echo "Minimum Amount for Savings Account modified successfully";
		else echo "Error";
	}else {
		$sql2="UPDATE minbalance SET min=\"$mins\" WHERE acctype=\"$acctype\"";
		if(mysql_query($sql2))
			echo "Minimum Amount for Savings Account modified successfully";
		else echo "Error";
	}
?>
<form action="mod.php" method="post">
<input type="submit" value="BACK"/>
</form>
</body>
</html>

