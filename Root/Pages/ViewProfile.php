<?php
session_start();	
include_once "../includes/UserClass.php";

$UserObject=new User($_SESSION["UserID"]);

echo "<h1>Your Profile</h1>";
echo "UserName: " .   $UserObject->UserName."<br>";
echo "Type: "  .	$UserObject->UserType_obj->UserTypeName."<br>";

echo"<a href='index.php'>Back</a>";

?>