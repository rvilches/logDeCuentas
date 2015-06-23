var accountsArray =["AAA","AEE","ATT","CABLE","EDUCACION","Gastos generales"];
var inputFlag =0;



function populateAccountsDp () {
	var accountsDp= document.getElementById('accountsDp');
	
	for(var i =0; i<accountsArray.length; i++)
	{
		refreshAccountList(String(accountsArray[i]));
	}
}
/* funcion para crear el input de añadir una nueva cuenta  y el boton de submit. El inputFlag
 es para que no se añadan mas cuadrados de input si ya existe uno.*/
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

// añade nuevas cuentas al arreglo d ecuentas
function addToArray()
{
	
	var theNewAccount = String(document.getElementById('theNewAccount').value);
	
	if(theNewAccount.length<=0)
	{
		alert("La cuenta debe tener un nombre");
		return 0;
	}
	
	if(accountDoesExist(theNewAccount)==0)
	{
		console.log("Antes tiene"+accountsArray.length);
		accountsArray.push(String(theNewAccount));
		console.log("despues tiene"+accountsArray.length);
		refreshAccountList(String(accountsArray[accountsArray.length-1]));
		document.getElementById('theNewAccount').value='';

	}
	else
	{
		alert("La cuenta "+ theNewAccount.toUpperCase() +" ya existe");
	}
}

//Añade las cuentas a la lista
function refreshAccountList(aNewAccount)
{
		var accountName = String(aNewAccount.toUpperCase());
		var listElement = document.createElement("li");
		var option = document.createElement("input");
		option.type = "radio";
		option.setAttribute("id",accountName);
		option.name = accountName;
		option.value = accountName;
		listElement.appendChild(option);
		listElement.appendChild(document.createTextNode(accountName));
		accountsDp.appendChild(listElement);
}

// verifica si la cuenta de pago que el usuario está tratando de ingresar ya existe.
function accountDoesExist (aNewAccount)
{
	var accountDoesExistBool = 0;
	var theNewAccount=String(aNewAccount).toUpperCase();
	for(var i =0; i<accountsArray.length;i++)
	{	
		if(accountsArray[i].toUpperCase()===theNewAccount)
		{
			return accountDoesExistBool=1;
		}
	}	
	return accountDoesExistBool;
  
}

// Devuelve un arreglo que contiene el nombre de las cuentas que el usuario seleccionó para registrar.
function getUserAccounts()
{
	var selectedUserAccounts=[]
	var accountList = document.getElementById('accountsDp').getElementsByTagName("input");
	for(var i =0;i<accountList.length;i++)
	{
		if(accountList[i].checked===true)
		{
			selectedUserAccounts.push(String(accountList[i].value).toUpperCase());
		}

	}
	alert("cuentas sometidas exitosamente");
}


