<html>
<head>
<script>
function validate(){
	var x= document.forms["form"]["mins"].value;
	if(x<=0)
	{
		alert("Amount must be positive");
		return false;
	}
}
</script>
</head>
<body>
<form action="main.php" method="post">
<input  type="submit" value="SIGN OUT"/>
</form>
<center>
<form action="empform.php" method="post">
<input type="submit" value="HOME"/>
</form></center>
</br><center>
<center>
<form name="form" onsubmit="return validate()" action="modmins1.php" method="post">
Enter amount<input type="number" name="mins" required/>
<input type="submit" value="Submit"/>
</form>
<form action="mod.php" method="post">
<input type="submit" value="BACK"/>
</form>
</body>
</html>
