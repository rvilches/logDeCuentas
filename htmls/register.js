var accountsArray =["AAA","AEE","ATT","CABLE","EDUCACION","Gastos Generales"];
var inputFlag =0;
var accountDoesExist=0;

function populateAccountsDp () {
	var accountsDp= document.getElementById('accountsDp');
	
	for(var i =0; i<accountsArray.length; i++)
	{
		refreshAccountList(String(accountsArray[i]));
	}
}

function addAccount()
{

	if(inputFlag==0)
	{
		var newAccountName= document.createElement("input");
		newAccountName.type="text";
		newAccountName.name="newAccount";
		newAccountName.setAttribute("placeholder","Nombre de cuenta");
		newAccountName.setAttribute("id","theNewAccount");
		var submit= document.createElement("input");
		submit.setAttribute("id", "submitButton");
		submit.type="submit";
		submit.name="submitButton";
		submit.setAttribute("onCLick","addToArray()");
		document.getElementById('otraCuenta').appendChild( newAccountName);
		document.getElementById('otraCuenta').appendChild(submit);
		inputFlag=1;
	}
	
}

function addToArray()
{
	
	var theNewAccount = String(document.getElementById('theNewAccount').value);
	if(theNewAccount.length<=0)
	{
		alert("La cuenta debe tener un nombre");
		return 0;
	}
	for(var i=0; i<=accountsArray.length-1;i++)
	{
		if(accountsArray[i]===theNewAccount)
		{
			accountDoesExist = 1;
		}
	}
	if(accountDoesExist==0)
		{
		accountsArray.push(theNewAccount);
		refreshAccountList(String(accountsArray[accountsArray.length-1]));
		document.getElementById('theNewAccount').value='';

		}
	else
		{
			alert("La cuenta "+ theNewAccount.toUpperCase() +" ya existe");
		}
}

function refreshAccountList(aNewAccount)
{
		var accountName = aNewAccount.toUpperCase();
		var listElement = document.createElement("li");
		var option = document.createElement("input");
		option.type = "radio";
		option.name = accountName;
		option.value = accountName;
		listElement.appendChild(option);
		listElement.appendChild(document.createTextNode(accountName));
		accountsDp.appendChild(listElement);
		

}
