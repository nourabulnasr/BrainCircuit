<?php
include_once 'dbConnection.php';
$ref=@$_GET['q'];
$email = $_POST['uname'];
$password = $_POST['password'];

$email = stripslashes($email);
$email = addslashes($email);
$password = stripslashes($password); 
$password = addslashes($password);
$result = mysqli_query($con,"SELECT email FROM admin WHERE email = '$email' and password = '$password'") or die('Error');
$count=mysqli_num_rows($result);
if($count==1){
session_start();
if(isset($_SESSION['email'])){
session_unset();}
$_SESSION["name"] = 'Nour';
$_SESSION["key"] ='Nour';
$_SESSION["email"] = $email;
header("location:dash.php?q=0");
}
else header("location:$ref?w=Warning : Access denied");
?>
<!-- 
Purpose:

Authenticates admin users.
Redirects to the admin dashboard (dash.php) upon successful login.
How It Works:

Takes uname (username) and password from a POST request.
Checks the admin table in the database for matching credentials.
If successful:
Creates a session with admin credentials.
Redirects to dash.php?q=0.
If unsuccessful:
Redirects back to the referring page with an error (Warning: Access denied). -->