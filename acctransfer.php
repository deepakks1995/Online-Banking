<html>
<head>
<script>
function validateform(){
	var x= document.forms["form1"]["dno"].value;
	if(x == null || x == "" || x<=0)
	{
		alert("Incorrrect Debit account number");
		return false;
	}
	var y=document.forms["form1"]["cno"].value;
	if(y == null || y == "" || y<=0) {
		alert("Incorrrect Credit account number");
		return false;
	}
	var z=document.forms["form1"]["amount"].value;
	if(z == null || z=="" || z<=0) {
		alert("Incorrrect amount");
		return false;
	}
}
</script>
</head>
<body background="10.jpg">
<font color="magenta">
<form action="main.php" method="post">
<input  type="submit" value="SIGN OUT"/>
</form>
<center>
<form action="custform.php" method="post">
<input type="submit" value="HOME"/>
</form></center>
</br>

<center>
<form name="form1" action="pacctransfer.php" onsubmit="return validateform()" method="post">

Debit from Account: 
<input type="number" name="dno" required/>
</br>
</br>
Credit to Account: 
<input type="number" name="cno" required/>
</br></br>

Amount:
<input type="number" name="amount" required/>
</br></br>

<input type="submit" value="Submit"/>
</form></font>
</body>
</html>
