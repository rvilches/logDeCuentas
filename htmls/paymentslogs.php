<?php
include 'login.php';

//global $conexion;
//echo "Hola $conexion";

?>

<!DOCTYPE html>
<html lang = "en">
<head>
	<title>Home</title>
	<meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="../css/home.css">
    <script src="http://neue.cc/linq.min.js"></script>
</head>
<body onload="start()">
	
  <h1>
    <img src="../images/carla.jpg" name="profilePic" alt="Profile Picture" style="width:128px;height:128px;">Carmen 
    <nav id="topNavigation">
      <ul> 
        <li class ="topLinkList"> <a class="topLinks" href="paymentRegistry.html" >Pagar</a>  
        <span class="topLinkStick">/</span> </li>
        
        <li class ="topLinkList"> <a class="topLinks" href="">Estados </a> 
        <span class="topLinkStick">/</span> </li>
        <li class ="topLinkList" > <a class="topLinks"  href="resgister.html">Registrar Cuentas</a> </li> 
      </ul> 
    </nav>
	</h1>
	
	<h3 id="header">ESTADOS DE CUENTA</h3>

	<section id="monthDetail">
		
		<select id="months">
		<option value="0">Enero</option>
  		<option value="1">Febrero</option>
  		<option value="2">Marzo</option>
  		<option value="3">Abril</option>
  		<option value="4">Mayo</option>
  		<option value="5">Junio</option>
  		<option value="6">Julio</option>
  		<option value="7">Agosto</option>
  		<option value="8">Septiembre</option>
  		<option value="9">Octubre</option>
  		<option value="10">Noviembre</option>
  		<option value="11">Diciembre</option>
		</select>

		
		<br />

		<article id="weekDetail">
			<br />

            <label id="ingresoLbl">Ingreso: <input type="number" id="totalSueldoInput" style="width:100px" onchange="updateBalanceLbl(this)"/></label>
            
            <label id="balanceLbl"> Balance: <label id="Label1">$0.00</label></label>
                <br /><br />

                <table id="pagosTable" class="weekTable">
                    <tr>
                        <th id="cuenta">Cuenta</th>
                        <th id="pago">Fecha</th>
                        <th id="Th1">Pago</th>
                    </tr>
                    <!-- <tr>
                        <td> <select id="cuentaCell"> <option id=0 value="0">AEE</option> </select> </td>
                        <td> <input style="width:75px;" type="date" id="fechaPago" max="2015-01-01" placeholder="MM-DD-YYY" > 
                        <br /> <label id="formatLbls">MM-DD-YYYY</label>  </td>
                        <td> <input id="cantPago" type ="number" style=" width:100px" onChange="updateBalanceLbl(this)"/></td>
                    </tr> -->

                </table>


            <br /><br />
            <div id="totalInfoDiv">
                Total de Gastos: <label id="totalGastosLbl">$0.00</label>

            </div>
      <br />

    </article>
		
		


	</section>


<script type="text/javascript" src="home.js"></script>
</body>
</html>