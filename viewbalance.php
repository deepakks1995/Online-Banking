<html>
<head>
<script>
function validate(){
	var x = document.forms["form"]["no"].value;
	if(x<=0){
		alert("Account number must be positive");
		return false;
		}
}
</script>
</head>
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
<center>
<h4>
<center>Enter the details...</center>
</h4>

<center>

<form name="form" onsubmit="return validate()" action="process3.php" method="post">

Account No 
<input type="number" name="no" required/>
</br></br>
<input type="submit" />
</form>
</center>
</body>
</html>
