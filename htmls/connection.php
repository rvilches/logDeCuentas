 <?php
$servername = "cszcc1h0ac.database.windows";
$username = "kindergame";
$password = "baconPancakes#12345";
$myDB = "lodDeCuentas_db";

try {
    $conn = new PDO("sqlsrv:server=$servername;Database=$myDB", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected successfully";
    }
catch(PDOException $e)
    {
    echo "Connection failed: " . $e->getMessage();
    }
?> 

