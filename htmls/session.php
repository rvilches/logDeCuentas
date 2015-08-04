<?php
$server = "tcp:cszcc1h0ac.database.windows.net,1433";
$user = "kindergame";
$pwd = "baconPancakes#12345";
$db = "lodDeCuentas_db";
//loginIndex.php connection to db
echo "SESSION START";
if($_SERVER["REQUEST_METHOD"]=="POST")
        {
            if (isset($_POST['action'])) 
            {
                switch($_POST['action']) 
                {
                    case 'login':
                    {
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

function signupForm()
{
$firstname=$lastname=$secondlastname=$username=$password=$email="";
     $firstnameErr=$lastnameErr=$secondlastnameErr=$usernameErr=$passwordErr=$emailErr="";
    $firstnameBool=$lasnameBool=$secondlastnameBool=$usernameBool=$passwordBool=$emailBool=FALSE;

     if($_SERVER["REQUEST_METHOD"]=="POST")
        {

            if (empty($_POST["firstname"])) 
            {
                $firstnameErr = "Name is required";
            } 
            else 
            {
                if (!preg_match("/^[a-zA-Z ]*$/",$firstname)) 
                {
                $firstnameErr = "Only letters and white space allowed"; 
                }
                else
                {
                $firstname = test_input($_POST["firstname"]);
                $firstnameBool=TRUE;
                }
            }

            if (empty($_POST["email"])) 
            {
                $emailErr = "Email is required";
            } 
            else 
            {
                $email = test_input($_POST["email"]);
                if (!filter_var($email, FILTER_VALIDATE_EMAIL)) 
                {
                $emailErr = "Invalid email format"; 
                }
                else
                {
                $emailBool=TRUE;
                }
                            
            }
            if (empty($_POST["lastname"])) 
            {
                $lastnameErr = "Lastname is required";
            } 
            else 
            {
                if (!preg_match("/^[a-zA-Z ]*$/",$lastname)) 
                {
                $lastnameErr = "Only letters and white space allowed"; 
                }
                else
                {
                $lastnameBool=TRUE;
                $lastname= test_input($_POST["lastname"]);
                }
            
            }
            if (empty($_POST["password"])) 
            {
                $passwordErr = "Password is required";
            } 
            else 
            {
            $passwordBool=TRUE;
            $password = test_input($_POST["password"]);
            }
            if (empty($_POST["username"])) 
            {
                $usernameErr = "username is Required";
            } 
            else 
            {
            $usernameBool=TRUE;
            $username = test_input($_POST["username"]);
            }

    $secondlastnameBool=TRUE;
    $secondlastname = test_input($_POST["secondLastname"]);
     if($firstnameBool==TRUE and $lastnameBool==TRUE and $secondlastnameBool==TRUE and $emailBool==TRUE and $passwordBool==TRUE
    and $usernameBool==TRUE)
  
    {
    connectToDb($firstname,$lastname,$secondlastname,$email,$password,$username);
    }

}

}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>