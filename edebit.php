<html>
<head>
<script>
function validate(){
	var x = document.forms["form"]["no"].value;
	if(x<=0)
{	alert("Account Number must be positive");
	return false;}

	var y = document.forms["form"]["amount"].value;
	if(y<=0)
{	alert("Amount must be positive");
	return false;}
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

<center> Enter the details <br><br></center>
<center>
<form name="form" onsubmit="return validate()" action="pdebit.php" method="post">
Account No 
<input type="number" name="no" required/>
</br>

Amount to debit 
<input type="number" name="amount" required/>
</br></br>
<input type="submit" value="Submit"/>
</form>
<form action="etrans.php" method="post">
<input type="submit" value="BACK"/>
</form>
</center>
</body>
</html>
