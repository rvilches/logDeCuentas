<?php

echo "HELLO WORLD";
$server = "tcp:cszcc1h0ac.database.windows.net,1433";
$user = "kindergame";
$pwd = "baconPancakes#12345";
$db = "lodDeCuentas_db";
//loginIndex.php connection to db



if($_SERVER["REQUEST_METHOD"]=="POST")
        {
            switch($_POST['action']) 
                {
                    case 'login':
                    
                        if(empty($_POST['username'])||empty($_POST['password']))
                        {
                            $error="Username or password is invalid";
                            echo "$error";
                        }
                        else
                        {
                            $username=$_POST['username'];
                            $password=$_POST['password'];
                            connectTodb();
                        }
                        break;
                }            
        }



function connectTodb()
{
global $username;
global $password;
try{
    
    $conn = new PDO( "sqlsrv:Server= global $server ; Database = global $db ",global $user,global $pwd);
    $conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
    $_SESSION['conexion']=$conn;
    $stmt=$conn->prepare("SELECT * FROM users WHERE username='$username' AND password='$password'");
    $stmt->execute();
    $userdb= $stmt->fetch();

    if(count($userdb)>1)
    {
        $_SESSION['login_user']=$userdb['username'];
        header('Location: http://logdecuentas.azurewebsites.net/htmls/paymentslogs.php');
        
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