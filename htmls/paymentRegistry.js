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

function pagoDeCuenta(id,nombreDeCuenta, idDeCuenta,fechaDePago,cantidad,ingreso)
{
    this.id = id;
    this.name=nombreDeCuenta;
    this.accountId=idDeCuenta;
    this.date = fechaDePago;
    this.quantity=cantidad;
    this.ingreso = ingreso;

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
    if(arregleDeCuentas.length==1)
    {
        saveAndDisablePayedAccounts();
        document.getElementById('addButton').style.visibility = "hidden";
        document.getElementById('doneButton').style.visibility = "visible";
        return 0;
    }
    var table = document.getElementById("pagosTable");
    var row = table.insertRow(-1);
    var cuentaCell = row.insertCell(0);
    var fechaCell = row.insertCell(1);
    var pagoCell = row.insertCell(2);
    var selects = setSelectsForCells();
    
    if(count > 0)
    {
        saveAndDisablePayedAccounts();
    }
    for(var i = 0; i< arregleDeCuentas.length;i++)
    {
        var option = document.createElement("option");
        option.setAttribute.id=arregleDeCuentas[i].id;
        option.value=  arregleDeCuentas[i].name;
        option.innerHTML=arregleDeCuentas[i].name;
        selects[0].appendChild(option); 
        
    }
       
    cuentaCell.appendChild(selects[0]);
    fechaCell.appendChild(selects[1]);
    var dollarSign=document.createTextNode("$ ");
    pagoCell.appendChild(dollarSign);
    pagoCell.appendChild(selects[2]);
    count++;
    
}

function updateBalanceLbl()
{
   var ingreso = Number(document.getElementById('totalSueldoInput').value);
  
    var balance = ingreso;
    document.getElementById('totalGastosLbl').innerHTML="$"+totalDePagos;
    document.getElementById('balanceLbl').innerHTML="Balance: $"+(balance - totalDePagos);
}

function setSelectsForCells()
{
    var selectCuenta = document.createElement("select");
    var selectFecha = document.createElement("input");
    var selectCantPago = document.createElement("input");

    selectCuenta.id="selectCuenta"+count;

    selectFecha.type= "date";
    selectFecha.style.width= 115;
    selectFecha.id="fechaPago"+count;
    selectFecha.value = getDate();
    
    
    selectCantPago.type ="number";
    selectCantPago.id ="cantPago"+count;
    selectCantPago.placeholder="$ 0.00";

    return [selectCuenta,selectFecha,selectCantPago];
}

function saveAndDisablePayedAccounts()
{
     var previousAccountCell = document.getElementById('selectCuenta'+(count-1));
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

function paymentsDone()
{
    var weekPaySummary = saveWeekPayment();
    console.log(weekPaySummary[0]);
    console.log(weekPaySummary[1]);
    console.log(weekPaySummary[2]);
    var myWindow = window.open("http://logdecuentas.azurewebsites.net/htmls/home.html", "_self");

}

function saveWeekPayment()
{

    var ingresoDeSemana = document.getElementById('totalSueldoInput').value;
    var totalDeGastos = totalDePagos;
    var balanceDeSemana = ingresoDeSemana-totalDeGastos;
    
    return [ingresoDeSemana,balanceDeSemana,totalDeGastos];
}
