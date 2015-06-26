var ingreso = document.getElementById('totalSueldoInput').value;
var totalDePagos = Number(0);
var count=0;

var AEE= new cuenta("Carro",1);
var AAA= new cuenta("AAA",2);
var BEST=new cuenta("BEST",3);
var arregleDeCuentas = [];
arregleDeCuentas.push(AEE);
arregleDeCuentas.push(AAA);
arregleDeCuentas.push(BEST);
console.log(arregleDeCuentas[0]);
function cuenta (nombre, id)
{
    this.name = nombre;
    this.id=id;
}

function pagoDeCuenta(id,nombreDeCuenta, idDeCuenta,fechaDePago,cantidad)
{
    this.id = id;
    this.name=nombreDeCuenta;
    this.accountId=idDeCuenta;
    this.date = fechaDePago;
    this.quantity=cantidad;

}

var cuentasArreglo=["AEE","AAA","BESt BUY","TRANSPORTE","SALUD"];
var count = 0;
function getDate()
{
    var d = new Date();

    var curr_date = d.getDate();

    var curr_month = d.getMonth();

    var curr_year = d.getFullYear();

    //document.getElementById('fechaPago').value = curr_month + "-" + curr_date + "-" + curr_year;
}

function addNewPayment() 
{
    
    var table = document.getElementById("pagosTable");
    var row = table.insertRow(-1);
    var cuentaCell = row.insertCell(0);
    var fechaCell = row.insertCell(1);
    var pagoCell = row.insertCell(2);
    var selectAccount = document.createElement("select");
    selectAccount.id="cuentaCell"+count;

    //for para insertar las diferentes opciones
    if(count > 0)
    {
        var previousCell = document.getElementById('cuentaCell'+(count-1));
        for(var i =0; i<previousCell.childNodes.length;i++)
        {
            if(previousCell.childNodes[i].selected==true)
            {
               for(var j=0;j<arregleDeCuentas.length;j++)
               {
                if(arregleDeCuentas[j].name==previousCell.childNodes[i].value)
                    {
                        arregleDeCuentas.splice(j,1);

                    }
               }
            }
        }
        previousCell.disabled = "disabled";
    }
    for(var i = 0; i< arregleDeCuentas.length;i++)
    {
        var option = document.createElement("option");
        option.setAttribute.id=arregleDeCuentas[i].id;
        option.value=  arregleDeCuentas[i].name;
        option.innerHTML=arregleDeCuentas[i].name;
        selectAccount.appendChild(option); 
    }
       
    cuentaCell.appendChild(selectAccount);
    
   
    // cuentaCell.innerHTML = "<select id=\"cuentasDp"+count+"\"> <option value=\"0\">AEE</option> </select>";
    fechaCell.innerHTML = "<input style=\"width:75px;\" type=\"date\" id=\"fechaPago" + count + "\" max=\"2015-01-01\" placeholder=\"MM-DD-YYYY\" > ";
    pagoCell.innerHTML = "<input id=cantPago2 type=number style=\" width:100px\" onChange=\"updateBalanceLbl(this)\"/>";
    count++;
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
