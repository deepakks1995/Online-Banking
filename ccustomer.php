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
	if(!$conn)
		die("Could not connect to database");
	$conn1=mysql_select_db("banks");
	if(!$conn1)
		die("Could not select database");
	
	$id=$_POST['custid'];
	$pass=$_POST['pass'];

	$sql="INSERT INTO cust_id (id,pass) VALUES ('$id','$pass')";
	if(mysql_query($sql))
		echo "Customer added Successfully";
	else echo "Error in adding Customer";
	?>
	<body>
	</html>
