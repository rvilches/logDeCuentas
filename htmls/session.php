<?php
$firstname=$lastname=$secondlastname=$username=$password=$email="";
$firstnameErr=$lastnameErr=$secondlastnameErr=$usernameErr=$passwordErr=$emailErr="";
$firstnameBool=$lasnameBool=$secondlastnameBool=$usernameBool=$passwordBool=$emailBool=FALSE;
function formPostController()
{
if(isset($_POST['controller']))
{
    switch($_POST['controller']) 
    {
        case 'loginController':
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
                $controller = $_POST['controller'];
                connectTodb($username,$password,$controller);
                
            }
            break;
        }
        case 'signUpController':
        {
            signUpControllerManager();
            $controller = $_POST['controller'];
            
            break;
        }
        default:
        echo "error on controller chooser";
        
    }            
}

}

function connectTodb($login,$pass,$controller)
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

function signUpControllerManager()
 {
    
     
     $controller = $_POST['controller'];

             if (empty($_POST["firstname"])) 
             {
                 global $firstnameErr = "Name is required";
             } 
             else 
             {
                 if (!preg_match("/^[a-zA-Z ]*$/",$firstname)) 
                 {
                 global $firstnameErr = "Only letters and white space allowed"; 
                 }
                 else
                 {
                 global $firstname = test_input($_POST["firstname"]);
                 global $firstnameBool=TRUE;
                 }
             }

             if (empty($_POST["email"])) 
             {
                 global $emailErr = "Email is required";
             } 
             else 
             {
                 global $email = test_input($_POST["email"]);
                 if (!filter_var($email, FILTER_VALIDATE_EMAIL)) 
                 {
                 global $emailErr = "Invalid email format"; 
                 }
                 else
                 {
                 global $emailBool=TRUE;
                 }
                            
             }
             if (empty($_POST["lastname"])) 
             {
                 global $lastnameErr = "Lastname is required";
             } 
             else 
             {
                 if (!preg_match("/^[a-zA-Z ]*$/",$lastname)) 
                 {
                 global $lastnameErr = "Only letters and white space allowed"; 
                 }
                 else
                 {
                 global $lastnameBool=TRUE;
                 global $lastname= test_input($_POST["lastname"]);
                 }
            
             }
             if (empty($_POST["password"])) 
             {
                 global $passwordErr = "Password is required";
             } 
             else 
             {
             global $passwordBool=TRUE;
             global $password = test_input($_POST["password"]);
             }
             if (empty($_POST["username"])) 
             {
                 global $usernameErr = "username is Required";
             } 
             else 
             {
             global $usernameBool=TRUE;
             global $username = test_input($_POST["username"]);
             }

     global $secondlastnameBool=TRUE;
     global $secondlastname = test_input($_POST["secondLastname"]);
      if(global $firstnameBool==TRUE and global $lastnameBool==TRUE and global $secondlastnameBool==TRUE and global $emailBool==TRUE and global $passwordBool==TRUE
     and global $usernameBool==TRUE)
  
     {
     connectToDb(global $firstname,global $password,$controller);
     }
   
 }


 function test_input($data) 
 {
   $data = trim($data);
   $data = stripslashes($data);
   $data = htmlspecialchars($data);
   return $data;
 }

?>