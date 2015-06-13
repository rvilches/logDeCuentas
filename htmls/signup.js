
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
	if(newUser.firstName.length>0 && newUser.firstLastname.length>0
	&& newUser.secondLastname.length>0 && newUser.username.length>0
	&& newUser.password.length>0 && (validateEmail(newUser.email))== true)
	{
		document.getElementById('submit').disabled = "";
	}
	else
	{
		document.getElementById('submit').disabled = "disabled"
	}
	
}

function validateEmail (email)
{
	if(email.length>0)
	{
		var validEmail = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
    	if(validEmail.test(email) == false)
    	{
    		document.getElementById('incEmail').style.color="red";
    		return false;
    	}
    	else
    	{
    		document.getElementById('incEmail').style.color="transparent";
    		return true;
    	}
	}
	else
	{
		return true;
	}
}
