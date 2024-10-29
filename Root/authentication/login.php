<?php

session_start();

if(isset($_SESSION["UserID"]) && $_SESSION["Loggedin"]===true)
{
	error_log("User already logged in");
	header("Location:../index.php");
}

if(isset($_POST['submit'])){
	
	include('../includes/Connection.php');

	include_once "../includes/UserClass.php";

	
	$UserName=$_POST["UserName"];
	$Password=$_POST["Password"];

	$UserObject=User::login($UserName,$Password);
	if ($UserObject)
	{	
		$_SESSION["UserID"]=$UserObject->ID;
        $_SESSION["Loggedin"] = true;
        $_SESSION["UserName"] = $UserName;

		if($_SESSION["usertype"] == 0)
		{
			header("Location:../Admin.php");
		}
		else if(($_SESSION["usertype"] == 1))
		{
			header("Location:../UserDashboard.php");
		}
	}
	else
	{
		echo '<span style="color: red;"> Invalid Password</span>';
	}
}
?>
<h1>Login</h1>
<form action="" method="post">
UserName<input type="text" name="UserName" ><br><br>
Password<input type="password" name="Password" ><br><br>
<span id="valida" style="color: red;"></span>
<?php 


?>
<input type="submit" name='submit' >
</form>

<!-- // if($UserObject === NULL)
// {
// 	echo `<span style="color: red;">Invalid Password</span>	`;
// } -->
