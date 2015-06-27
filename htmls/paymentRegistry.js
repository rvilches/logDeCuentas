var ingreso = document.getElementById('totalSueldoInput').value;
var totalDePagos=0;
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
var arregloDePagos=[];

var count = 0;
function getDate()
{
    var d = new Date();

    var curr_date = d.getDate();

    var curr_month = d.getMonth();

    var curr_year = d.getFullYear();

    var curr_fecha= curr_month + "/" + curr_date + "/"+curr_year;
   
    return curr_fecha;
}

function addNewPayment() 
{
    
    var table = document.getElementById("pagosTable");
    var row = table.insertRow(-1);
    var cuentaCell = row.insertCell(0);
    var fechaCell = row.insertCell(1);
    var pagoCell = row.insertCell(2);
    var selectCuenta = document.createElement("select");
    var selectFecha = document.createElement("input");
    var selectCantPago = document.createElement("input");
    
    selectCuenta.id="cuentaCell"+count;

    selectFecha.type= "date";
    selectFecha.style.width= 115;
    selectFecha.id="fechaPago"+count;
    selectFecha.value = getDate();
    
    
    selectCantPago.type ="number";
    selectCantPago.id ="cantPago"+count;
    selectCantPago.placeholder="$ 0.00";
   
    //for para insertar las diferentes opciones
    if(count > 0)
    {
        var previousAccountCell = document.getElementById('cuentaCell'+(count-1));
        var previousFechaCell = document.getElementById('fechaPago'+(count-1));
        var previousPagoCell = document.getElementById('cantPago'+(count-1));

        for(var i =0; i<previousAccountCell.childNodes.length;i++)
        {
            if(previousAccountCell.childNodes[i].selected==true)
            {
               for(var j=0;j<arregleDeCuentas.length;j++)
               {
                if(arregleDeCuentas[j].name==previousAccountCell.childNodes[i].value)
                    {
                        arregleDeCuentas.splice(j,1);

                    }
               }
            }
        }

        // AQUI ES DONDE UNICO PUEDES SACAR LA INFO COMPLETA
        previousAccountCell.disabled = "disabled";
        previousFechaCell.disabled = "disabled";
        previousPagoCell.disabled = "disabled";
        totalDePagos=Number(previousPagoCell.value)+totalDePagos;
        var pago = new pagoDeCuenta(previousAccountCell.id,previousAccountCell.value,previousAccountCell.id,previousFechaCell.value,previousPagoCell.value);
        updateBalanceLbl();
        arregloDePagos.push(pago);

    }
    for(var i = 0; i< arregleDeCuentas.length;i++)
    {
        var option = document.createElement("option");
        option.setAttribute.id=arregleDeCuentas[i].id;
        option.value=  arregleDeCuentas[i].name;
        option.innerHTML=arregleDeCuentas[i].name;
        selectCuenta.appendChild(option); 
    }
       
    cuentaCell.appendChild(selectCuenta);
    fechaCell.appendChild(selectFecha);
    var dollarSign=document.createTextNode("$ ");
    pagoCell.appendChild(dollarSign);
    pagoCell.appendChild(selectCantPago);

    
   
    // cuentaCell.innerHTML = "<select id=\"cuentasDp"+count+"\"> <option value=\"0\">AEE</option> </select>";
    //fechaCell.innerHTML = "<input style=\"width:115px;\" type=\"date\" id=\"fechaPago"+count+"\" value=curr_fecha placeholder=\"MM-DD-YYYY\" > ";
    //pagoCell.innerHTML = "<input id=cantPago2 type=number style=\" width:100px\" onChange=\"updateBalanceLbl(this)\"/>";
    count++;
   
    if(count >=3)
    {

        for(var i=0;i<arregloDePagos.length;i++)
        {
            console.log(arregloDePagos[i]);
        }
    }
    // totalDePagos += document.getElementById("cantPago"+count).value;
}

function updateBalanceLbl()
{
   var ingreso = Number(document.getElementById('totalSueldoInput').value);
  
    var balance = ingreso;
    document.getElementById('totalGastosLbl').innerHTML="$"+totalDePagos;
    document.getElementById('balanceLbl').innerHTML="Balance: $"+(balance - totalDePagos)+".00";
}

// function updateIngreso()
// {
//     var ingreso = document.getElementById('totalSueldoInput').value;
//   var balance=ingreso;
//   document.getElementById('balanceLbl').innerHTML="Balance: $"+balance+".00";
//   console.log("CaMBIEEE");
// }

// function updateGastos(pago)
// {
//     var gastosTotales+=pago;

// }
