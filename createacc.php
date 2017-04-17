<html>
<head>
<script>
function validate(){
	var x= document.forms["form"]["custid"].value;
	if(x<=0){
		alert("Customer ID must be positive");
		return false;
	}
	var y= document.forms["form"]["fname"].value;
	var regex=/^[a-zA-Z]+$/;
	if(!y.match(regex)){
		alert("First Name should contains only alphabets");
		return false;
	}
	var z= document.forms["form"]["lname"].value;
	if(!z.match(regex)){
		alert("Last Name should contains only alphabets");
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
<center>
<form name="form" onsubmit="return validate()" action="cacc.php" method="post">
Customer ID: <input type="number" name="custid" required/>
</br>
First Name: <input type="text" name="fname" required/>
</br>
Last Name: <input type="text" name="lname" required/>
</br>
Account Type </br><input type="radio" name="acctype" value="Savings"/>Savings</br><input type="radio" name="acctype" value="Current"/>Current</br>
<input type="submit" value="Submit Form"/>
</center>
</body>
</html>
