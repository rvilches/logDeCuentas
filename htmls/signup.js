
function user(firstName,firstLastname,secondLastname,username,password,email)
{
	this.firstName = firstName;
	this.firstLastname = firstLastname;
	this.secondLastname = secondLastname;
	this.username = username;
	this.password= password;
	this.email = email;
}
var newUser=new user();
function getUser()
{
	
	var tempUser=document.getElementById("userForm");
	var childCount = 2;
	newUser.firstName= tempUser.childNodes[childCount].value;
	childCount +=5;
	newUser.firstLastname = tempUser.childNodes[childCount].value;
	childCount +=5;
	newUser.secondLastname= tempUser.childNodes[childCount].value;
	childCount +=5;
	newUser.username =tempUser.childNodes[childCount].value;
	childCount +=5;
	newUser.password = tempUser.childNodes[childCount].value;
	childCount +=5;
	newUser.email = tempUser.childNodes[childCount].value;
	childCount +=5;
	if(validateUser(newUser.email)==true)
	{
		document.getElementById("submit").disabled="";
	}
	debbuger;
}
function disabledSubmit()
{
	document.getElementById('submit').disabled = "disabled";
}
function validateUser (email)
{
	var validEmail = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
    return validEmail.test(email);
}
