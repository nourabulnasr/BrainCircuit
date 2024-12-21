<?php 
session_start();
if(isset($_SESSION['email'])){
session_destroy();}
$ref= @$_GET['q'];
header("location:$ref");
?>

<!-- Purpose:
Logs the user out by destroying the session.
How It Works:
Checks if the session is active.
Destroys the session and redirects to the referring page. -->
