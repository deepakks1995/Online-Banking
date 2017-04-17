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
	$conn = mysql_connect("localhost",$username,$pass);
	if(!$conn)
		die("Could not connect to MySQL");
	mysql_select_db($db);

	$no=$_POST['no'];
	$query="SELECT * FROM details WHERE accno =\"$no\"";
	$result=mysql_query($query);
	$row1=mysql_fetch_array($result);
	if($row1==NULL)
		die("Account not found");
	$res=mysql_query($query);

	while($row = mysql_fetch_array($res)){
		echo nl2br ('<div align="center">'."Account No: "  .$row['accno'] .'</div>'    . "\n");
		echo nl2br ('<div align="center">'."Customer ID: " .$row['custid'].'</div>'. "\n");
		echo nl2br ('<div align="center">'."First Name: "  .$row['fname'].'</div>' . "\n");
		echo nl2br ('<div align="center">'."Last Name: "   .$row['lname']  .'</div>'. "\n");
		echo nl2br ('<div align="center">'."Account Type: ".$row['acctype'] .'</div>'  . "\n");
		echo nl2br ('<div align ="center">'."Balance: "     .$row['balance'].'</div>'. "\n");
	}

	mysql_close();
?>
</body>
</html>
