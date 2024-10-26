<?php 
$servername = 'localhost';
$password = '';
$username = 'root';
try{ 
    $con = new PDO(dsn:"mysql:host=$servername;dbname=learningplatform", $username, $password);
    $con->setAttribute(attribute:PDO::ATTR_ERRMODE, value:PDO::ERRMODE_EXCEPTION);

} catch(\Exception $e){
    $error_message = $e->getMessage();
}




?>