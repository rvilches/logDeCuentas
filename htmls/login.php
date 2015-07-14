<?php

session_start();
$error='';
if($_SERVER["REQUEST_METHOD"]=="POST")
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
}

function connectTodb()
{
echo "<table style='border: solid 1px black;'>";
echo "<tr><th>Id</th><th>Firstname</th><th>Lastname</th></tr>";

class TableRows extends RecursiveIteratorIterator { 
    function __construct($it) { 
        parent::__construct($it, self::LEAVES_ONLY); 
    }

    function current() {
        return "<td style='width:150px;border:1px solid black;'>" . parent::current(). "</td>";
    }

    function beginChildren() { 
        echo "<tr>"; 
    } 

    function endChildren() { 
        echo "</tr>" . "\n";
    } 
} 
$server = "tcp:cszcc1h0ac.database.windows.net,1433";
$user = "kindergame";
$pwd = "baconPancakes#12345";
$db = "lodDeCuentas_db";
global $username;
global $password;


try{
	
    $conn = new PDO( "sqlsrv:Server= $server ; Database = $db ", $user, $pwd);
    $conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
    $stmt = $conn->prepare("SELECT * FROM users WHERE username='$username' AND password='$password'");
  	$stmt->execute();
  	$result = $stmt->setFetchMode(PDO::FETCH_ASSOC); 
  	foreach(new TableRows(new RecursiveArrayIterator($stmt->fetchAll())) as $k=>$v) 
  	{ 
        echo $v;
    }
}
$conn->close();
    
	}
catch(Exception $e)
	{
    die(print_r($e));
	}



}
?>