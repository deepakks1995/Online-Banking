<html>
<head>
<script>
function validate() {
	var x = document.forms["form"]["accno"].value;
	if(x<=0) {
		alert("Account number must be positive");
		return false;
	}
}
</script>
</head>
<body background="2.jpg">
<font color="magenta">

<form action="main.php" method="post">
<input type="submit" value="SIGN OUT"/>
</form>
<center>
<form action="custform.php" method="post">
<input type="submit" value="HOME"/>
</form></br></br>
<form name="form" onsubmit="return validate()" action="log1.php" method="post">
Account Number: <input type="number" name="accno" required/>
<input type="submit" value="Submit"/>
</form>
</body>
</html>

