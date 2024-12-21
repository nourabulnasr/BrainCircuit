<?php
session_start();
if(isset($_SESSION["email"])){
session_destroy();
}
include_once 'dbConnection.php';
$ref=@$_GET['q'];
$email = $_POST['email'];
$password = $_POST['password'];

$email = stripslashes($email);
$email = addslashes($email);
$password = stripslashes($password); 
$password = addslashes($password);
$password=md5($password); 
$result = mysqli_query($con,"SELECT name FROM user WHERE email = '$email' and password = '$password'") or die('Error');
$count=mysqli_num_rows($result);
if($count==1){
while($row = mysqli_fetch_array($result)) {
	$name = $row['name'];
}
$_SESSION["name"] = $name;
$_SESSION["email"] = $email;
header("location:account.php?q=1");
}
else
header("location:$ref?w=Wrong Username or Password");


?>
<!-- 
Purpose:
Authenticates regular users and starts a session.
How It Works:
Accepts email and password via POST.
Hashes the password with MD5 (a less secure choice; better alternatives include bcrypt).
Checks the user table for matching credentials.
If successful:
Starts a session and redirects the user to their dashboard (account.php?q=1).
If unsuccessful:
Redirects to the referring page with an error (Wrong Username or Password). -->