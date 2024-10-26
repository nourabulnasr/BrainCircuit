<?php
if(isset($_POST['submit'])){
	include_once "UserClass.php";
	$UserName=$_POST["UserName"];
	$Password=$_POST["Password"];

	$UserObject=User::login($UserName,$Password);
	if ($UserObject!==NULL)
	{	
		session_start();
		$_SESSION["UserID"]=$UserObject->ID;
        $_SESSION["Loggedin"] = true;
        $_SESSION["UserName"] = $UserName;
		header("Location:index.php");
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
