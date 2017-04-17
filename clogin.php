<html>
<head>
<script>
function validate(){
	x = document.forms["form"]["id"].value;
	if(x<=0)
	{
		alert("Customer ID must be positive");
		return false;
	}
}
</script>
</head>
<center>
<body background="2.jpg">
<font color="White">
<form name="form" action="clog.php" onsubmit="return validate()" method="post">
Enter Customer ID: <input type="number" name="id" required/></br>
Enter Password: <input type="password" name="pass" required/>
<input type="submit" value="Login"/></font>
</form>
</body>
</html>


