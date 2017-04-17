<html>
<body>
<form action="main.php" method="post">
<input type="submit" value="MAIN PAGE"/>
</form>
<center>
<?php

		$conn=mysql_connect("localhost","root","deepak");
		if(!$conn)
			die("Could not connect to MySQL");
		$conn1=mysql_select_db("banks");
		if(!$conn)
			die("could not connect to database");
		$uname=$_POST['id'];
		$pass=$_POST['pass'];

		$query="SELECT * FROM cust_id where id=\"$uname\"";
		$result=mysql_query($query);
		$row=mysql_fetch_array($result);	

		if($row['pass']!=$pass)
		echo "Customer Id not found";
		else{
echo "Login Successfully";
?>
<form action="custform.php" method="post"></br>
<input type="submit" value="Click to Continue"/>
</form>
<?php
}
?>
</body>
</html>
