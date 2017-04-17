<html>
<body background="6.jpg">
<font color="yellow">
<form action="main.php" method="post">
<input  type="submit" value="SIGN OUT"/>
</form>
<center>
<form action="custform.php" method="post">
<input type="submit" value="HOME"/>
</form></center>
</br>
<?php
	$username="root";
	$pass="deepak";
	$db="banks";
	$conn = mysql_connect("localhost",$username,$pass);
	if(!$conn)
		die("Could not connect to MySQL");
	mysql_select_db($db);

	$no=$_POST['no'];
	$sql="SELECT * FROM details WHERE accno=\"$no\"";
	$result=mysql_query($sql);
	$row=mysql_fetch_array($result);
	if($row==NULL)
		die("Account not found");
	echo nl2br ('<div align="center">'."Account  No: " .$row['accno'].'</div>'."\n");
	echo nl2br ('<div align="center">'."Available Balance: " .$row['balance'].'</div>'."\n");

	mysql_close();
?>
</body>
</html>
