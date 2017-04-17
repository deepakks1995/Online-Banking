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
<form name="form1" onsubmit="return validateform()" action="epacctransfer.php" method="post">

Debit from Account: 
<input type="number" name="dno" required/>
</br>

Credit to Account: 
<input type="number" name="cno" required/>
</br>

Amount:
<input type="number" name="amount" required/>
</br>

<input type="submit" value="Submit"/>
</form>
</center>
</body>
</html>
