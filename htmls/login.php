<?php
$conexion="";

function connectTodb()
{
	
$server = "tcp:cszcc1h0ac.database.windows.net,1433";
$user = "kindergame";
$pwd = "baconPancakes#12345";
$db = "lodDeCuentas_db";
global $username;
global $password;
try{
	
    $conn = new PDO( "sqlsrv:Server= $server ; Database = $db ", $user, $pwd);
    $conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
    $_SESSION['conexion']=$conn;
   	$stmt=$conn->prepare("SELECT * FROM users WHERE username='$username' AND password='$password'");
    $stmt->execute();
	$userdb= $stmt->fetch();

    if(count($userdb)>1)
    {
    	header('Location: http://logdecuentas.azurewebsites.net/htmls/paymentslogs.php');
    	$_SESSION['login_user']=$userdb['username'];
    
    }
    else
    {
    	echo "sorry you are not an customer";
    }


}
catch(Exception $e)
	{
    die(print_r($e));
	}



}
?>