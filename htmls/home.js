

//Objetos Globales

var arregloDeSemanas = []
var arregloDePagos = [];





//Clases

function pagoDeCuenta(id, semanaId, nombreDeCuenta, idDeCuenta, fechaDePago, cantidad, createdDate, userId) {
    this.id = id;
    this.semanaId = semanaId;
    this.name = nombreDeCuenta;
    this.accountId = idDeCuenta;
    this.date = fechaDePago;
    this.quantity = cantidad;
    this.createdDate = createdDate;
    this.userId = userId;

}

function semana(id, ingreso, balance, totalDeGastos, createdDate, userId) {
    this.id = id;
    this.ingreso = ingreso;
    this.balance = balance;
    this.totalDeGastos = totalDeGastos;
    this.createdDate = createdDate;
    this.userId;
 

}

function start() {

   

    //Inicialización de Semanas (Sustituir por data real)
    var pago1 = new pagoDeCuenta(1, 1, "AAA", 1, new Date("06/24/2015"), "100.00", new Date("06/15/2015"), 1);
    var pago2 = new pagoDeCuenta(2, 1, "Carro", 2, new Date("06/23/2015"), "100.00",  new Date("06/15/2015"), 1);
    var pago3 = new pagoDeCuenta(3, 1, "AEE", 3, new Date("05/30/2015"), "100.00", new Date("06/15/2015"), 1);
    var pago4 = new pagoDeCuenta(4, 2,  "AAA", 4, new Date("05/24/2015"), "100.00", new Date("06/30/2015"), 1);
    var pago5 = new pagoDeCuenta(5, 2, "Carro", 5, new Date("04/21/2015"), "200.00",  new Date("06/30/2015"), 1);
    var pago6 = new pagoDeCuenta(6, 2, "AEE", 6, new Date("06/22/2015"), "100.00", new Date("06/30/2015"), 1);

    arregloDePagos.push(pago1);
    arregloDePagos.push(pago2);
    arregloDePagos.push(pago3);
    arregloDePagos.push(pago4);
    arregloDePagos.push(pago5);
    arregloDePagos.push(pago6);


    //obtengo arreglo de las semanas del mes!! (MODIFICAR)
    //Inicialización de Pagos (Sustituir por data real)
    var semana1 = new semana(1, 600, 300, 300, new Date("06/15/2015"), 1);
    var semana2 = new semana(2, 800, 400, 400, new Date("06/30/2015"), 1);
  
    arregloDeSemanas.push(semana1);
    arregloDeSemanas.push(semana2);



    console.log("Semanas: " + arregloDeSemanas.length);
    console.log("PagosPorSemana: " + arregloDePagos.length);

    //Por cada semana
    for (var i = 0; i < arregloDeSemanas.length ; i++)
    {
      

        //busco los pagos
        for (var j = 0; j < arregloDePagos.length; j++)
        {
         
            if (arregloDePagos[j].semanaId == arregloDeSemanas[i].id)
            {

                //Creo fila
                var table = document.getElementById("pagosTable");
                var row = table.insertRow(-1);
                var cuentaCell = row.insertCell(0);
                var fechaCell = row.insertCell(1);
                var pagoCell = row.insertCell(2);


                //Creo labels
                var cuentaLBL = document.createElement("label");
                var fechaLBL = document.createElement("label");
                var cantPagoLBL = document.createElement("label");

                //Coloco los valores
                cuentaLBL.id = "cuentaLBL" + j;
                cuentaLBL.innerText = arregloDePagos[j].name;

                fechaLBL.id = "fechaLBL" + j;
                fechaLBL.innerText = arregloDePagos[j].createdDate;

                cantPagoLBL.id = "cantPago" + j;
                cantPagoLBL.innerText = arregloDePagos[j].quantity;


                //Para mostralos
                cuentaCell.appendChild(cuentaLBL);
                fechaCell.appendChild(fechaLBL);
                var dollarSign = document.createTextNode("$ ");
                pagoCell.appendChild(dollarSign);
                pagoCell.appendChild(cantPagoLBL);
                //Agrego las filas a la tabla si el pago es de esa semana (semananaId)
            }
        }

    }
    



 
 



}
