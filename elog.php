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
		$pass=$_POST['pass'];	

		if($pass!="1234")
		echo "Password Incorrect";
		else
{?>
Login Successfully.....</br>
<form action="empform.php" method="post">
<input type="submit" value="Click to Continue"/>
</form>
<?php
}
?>

</body>
</html>
