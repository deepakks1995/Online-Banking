
<html>
<head>
<script>
function validateform(){
	x = document.forms["form1"]["custid"].value;
	if(x == null || x==""  || x<=0){
		alert("Incorrect ID type");
		return false;
	}
	y=document.forms["form1"]["pass"].value;
	if(y == null || y=="")
	{
		alert("Type a Password");
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
</br>
<center><h2>Online Banking System</h2>
<form name="form1" action="ccustomer.php" onsubmit="return validateform()" method="post">
Customer ID: <input type="number" name="custid" required/>
</br>
Password: <input type="password" name="pass" required/>
</br>
<input type="submit" value="Submit Form"/>
</center>
</body>
</html>
