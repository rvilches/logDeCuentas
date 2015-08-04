<?php
$server = "tcp:cszcc1h0ac.database.windows.net,1433";
$user = "kindergame";
$pwd = "baconPancakes#12345";
$db = "lodDeCuentas_db";

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
// catch(Exception $e)
// 	{
//     die(print_r($e));
// 	}

// session_start();// Starting Session
// // Storing Session
// $user_check=$_SESSION['login_user'];
// // SQL Query To Fetch Complete Information Of User
// $ses_sql=mysql_query("select username from login where username='$user_check'", $connection);
// $row = mysql_fetch_assoc($ses_sql);
// $login_session =$row['username'];
// if(!isset($login_session)){
// mysql_close($connection); // Closing Connection
// header('Location: index.php'); // Redirecting To Home Page
}
?>