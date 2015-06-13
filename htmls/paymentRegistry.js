

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
    cuentaCell.innerHTML = "<select id=\"cuentasDp"+count+"\"> <option value=\"0\">AEE</option> </select>";
    fechaCell.innerHTML = "<input style=\"width:75px;\" type=\"date\" id=\"fechaPago" + count + "\" max=\"2015-01-01\" placeholder=\"MM-DD-YYYY\" > ";
    pagoCell.innerHTML = "<input id=\"cantPago" + count + "\" style=\" width:100px\" />"

}
