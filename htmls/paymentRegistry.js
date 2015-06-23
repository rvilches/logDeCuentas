 var ingreso = document.getElementById('totalSueldoInput').value;
var totalDePagos = Number(0);
//var totalDePagos= Number(document.getElementById('cantPago').value);
var pagoDeCuenta=
{
     nombreDeCuenta:"",
     idDeCuenta:0,
     cantidadDePago:0,
     fechaDePago:"",
}

var cuentasArreglo=["AEE","AAA","BESt BUY","TRANSPORTE","SALUD"];
var count = 0;
function getDate()
{
    var d = new Date();

    var curr_date = d.getDate();

    var curr_month = d.getMonth();

    var curr_year = d.getFullYear();

    document.getElementById('fechaPago').value = curr_month + "-" + curr_date + "-" + curr_year;
}

function addNewPayment() {
    count++;
    var table = document.getElementById("pagosTable");
    var row = table.insertRow(-1);
    var cuentaCell = row.insertCell(0);
    var fechaCell = row.insertCell(1);
    var pagoCell = row.insertCell(2);
    var cuenta = document.createElement("select");
    for(var i = 0; i< cuentasArreglo.length;i++)
    {
    
    var option = document.createElement("option");
    option.innerHTML = cuentasArreglo[i];
    cuenta.appendChild(option);
    
    }
    cuentaCell.appendChild(cuenta);
    // cuentaCell.innerHTML = "<select id=\"cuentasDp"+count+"\"> <option value=\"0\">AEE</option> </select>";
    fechaCell.innerHTML = "<input style=\"width:75px;\" type=\"date\" id=\"fechaPago" + count + "\" max=\"2015-01-01\" placeholder=\"MM-DD-YYYY\" > ";
    pagoCell.innerHTML = "<input id=cantPago2 type=number style=\" width:100px\" onChange=\"updateBalanceLbl(this)\"/>"
    
    console.log("lalala"+typeof(pagoCell.innerHTML.id));
    // totalDePagos += document.getElementById("cantPago"+count).value;
}

function updateBalanceLbl(cuenta)
{
    var ingreso = document.getElementById('totalSueldoInput').value;
    totalDePagos= Number(totalDePagos) + Number(cuenta.value);
    var balance = (ingreso-totalDePagos);
    document.getElementById('totalGastosLbl').innerHTML="$"+totalDePagos+".00";
    document.getElementById('balanceLbl').innerHTML="Balance: $"+balance+".00";
}

// function updateGastos(pago)
// {
//     var gastosTotales+=pago;

// }
