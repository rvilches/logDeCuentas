

function getDate()
{
	var date= new Date();
	document.getElementById('date').innerHTML = date.toDateString()+ " :";
}