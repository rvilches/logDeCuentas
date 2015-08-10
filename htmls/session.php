<?php

function formPostController()
{
if(isset($_POST['controller']))
{
    switch($_POST['controller']) 
    {
        case 'login':
        {
            if(empty($_POST['username'])||empty($_POST['password']))
            {
                $error="Invalid username or password";
                echo $error;
            }
            else
            {
                $username=$_POST['username'];
                $password=$_POST['password'];
                connectTodb($username,$password);
                
            }
            break;
        }
        default:
        echo "error on controller chooser";
        
    }            
}

}

function connectTodb($login,$pass)
{
    
$server = "tcp:cszcc1h0ac.database.windows.net,1433";
$user = "kindergame";
$pwd = "baconPancakes#12345";
$db = "lodDeCuentas_db";
try{
    
    $conn = new PDO( "sqlsrv:Server= $server ; Database = $db ", $user, $pwd);
    $conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
    $_SESSION['conexion']=$conn;
    $stmt=$conn->prepare("SELECT * FROM users WHERE username='$login' AND password='$pass'");
    $stmt->execute();
    $userdb= $stmt->fetch();

    if(count($userdb)>1)
    {
        $_SESSION['login_user']=$userdb['username'];
        header('Location: http://logdecuentas.azurewebsites.net/htmls/paymentslogs.php');
        
    }
    else
    {
        echo "Invalid username or password";
    }
    

    }
catch(Exception $e)
    {
    die(print_r($e));
    }
}

?>