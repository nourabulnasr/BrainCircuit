<?php
//all the variables defined here are accessible in all the files that include this one
$con= new mysqli('localhost','root','','exam')or die("Could not connect to mysql".mysqli_error($con));

?>
<!-- 
Purpose:
Establishes a connection to the MySQL database using PHP's mysqli.
How It Works:
Defines a mysqli connection object ($con).
All files that include dbConnection.php can use $con for database queries. -->