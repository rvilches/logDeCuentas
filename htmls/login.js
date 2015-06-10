"use strict"
function loggedUser(username,password)
{
	this.username = username;
	this.password = password;
}

function getLoggedUser()
{
	loggedUser = new loggedUser();
	loggedUser.username = document.getElementById('username').value;
	loggedUser.password = document.getElementById('passwordinput').value;
	
}