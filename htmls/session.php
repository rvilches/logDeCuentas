<?php

function formPostController()
{
    $GLOBALS['loginErr']="";
if(isset($_POST['controller']))
{
    switch($_POST['controller']) 
    {
        case 'loginController':
        {
            if(empty($_POST['username'])||empty($_POST['password']))
            {
                $GLOBALS['loginErr']="Invalid username or password";   
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
$consonante="loginController";
switch($controller)
{
    case 'loginController':
        {
        try{
    
            $conn = new PDO( "sqlsrv:Server= $server ; Database = $db ", $user, $pwd);
            $conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION ); 
            $stmt=$conn->prepare("loginHere @login=$login, @password=$pass");
            $stmt->execute();
            $userdb= $stmt->fetch();

            if(count($userdb)>1)
            {
             $_SESSION['login_user']=$userdb['username'];
                header('Location: http://logdecuentas.azurewebsites.net/htmls/paymentslogs.php');
        
            }
            else
            {
             $GLOBALS['loginErr']="Invalid username or password";
            }
           
            }
    
        catch(Exception $e)
            {
            die(print_r($e));
            }
            break;
        }
    case 'signUpController':
        {
            $firstName=$_POST['firstname'];
            $username=$_POST['username'];
            $password=$_POST['password'];
            $lastName=$_POST['lastname'];
            $secondLastName=$_POST['secondLastname'];
            $email= string $_POST['email'];
            
            try
            {
            $conn = new PDO( "sqlsrv:Server= $server ; Database = $db ", $user, $pwd);
            $conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
            $stmt=$conn->prepare("signUpToLogDeCuentas @firstName=$firstName, @lastName=$lastName, @secondLastName=$secondLastName, @email= $email, @password=$password, @username=$username");
            $stmt->execute();

           
            }
    
        catch(Exception $e)
            {
            die(print_r($e));
            }
            break;
        }

}
}
function signUpControllerManager()
 {

     $GLOBALS['firstnameErr']=$GLOBALS['lastnameErr']=$GLOBALS['usernameErr']=$GLOBALS['passwordErr']=$GLOBALS['emailErr']="";
     $firstnameBool=$lasnameBool=$secondlastnameBool=$usernameBool=$passwordBool=$emailBool=FALSE;
     $controller = $_POST['controller'];

             if (empty($_POST["firstname"])) 
             {
                 $GLOBALS['firstnameErr'] = "Name is required";
             } 
             else 
             {
                 if (!preg_match("/^[a-zA-Z ]*$/",$_POST["firstname"])) 
                 {
                 $GLOBALS['firstnameErr'] = "Only letters and white space allowed"; 
                 }
                 else
                 {
                 $firstname = test_input($_POST["firstname"]);
                 $firstnameBool=TRUE;
                 }
             }

             if (empty($_POST["email"])) 
             {
                $GLOBALS['emailErr'] = "Email is required";
             } 
             else 
             {
                 $email = test_input($_POST["email"]);
                 if (!filter_var($email, FILTER_VALIDATE_EMAIL)) 
                 {
                 $GLOBALS['emailErr'] = "Invalid email format"; 
                 }
                 else
                 {
                 $emailBool=TRUE;
                 }
                            
             }
             if (empty($_POST["lastname"])) 
             {
                 $GLOBALS['lastnameErr'] = "Lastname is required";
             } 
             else 
             {
                 if (!preg_match("/^[a-zA-Z ]*$/",$lastname)) 
                 {
                 $GLOBALS['lastnameErr'] = "Only letters and white space allowed"; 
                 }
                 else
                 {
                 $lastnameBool=TRUE;
                 $lastname= test_input($_POST["lastname"]);
                 }
            
             }
             if (empty($_POST["password"])) 
             {
                $GLOBALS['passwordErr'] = "Password is required";
             } 
             else 
             {
             $passwordBool=TRUE;
             $password = test_input($_POST["password"]);
             }
             if (empty($_POST["username"])) 
             {
                $GLOBALS['usernameErr'] = "username is Required";
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
     connectToDb($firstname,$password,$controller);
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