<?php

session_start();


// Include connection
include_once "includes/dbh.inc.php";

?>
<h1>Edit Profile</h1>

<form action='' method='post'>
	First Name:<br>
	<input type='text' value="<?=$_SESSION['FName']?>" name='FName'><br>
	Last Name:<br>
	<input type='text' value="<?=$_SESSION['LName']?>" name='LName'><br>
	Email:<br>
	<input type='text' value="<?=$_SESSION['Email']?>" name='Email'><br>
	Password:<br>
	<input type='text' value="<?=$_SESSION['Password']?>" name='Password'><br>
	Hobby:<br>
	<input type='text' value="<?=$_SESSION['Hobby']?>" name='Hobby'><br>
	<input type='submit' value='Submit' name='Submit'>
</form>


<?php
if($_SERVER['REQUEST_METHOD']== "POST"){ //check if form was submitted
	//check if form is submitted 
    //if form is submitted, grab data from user if form was submitted and update the user's data on database using update 
	$Fname=$_POST["FName"];
	$Lname=$_POST["LName"];
	$Email=$_POST["Email"];
	$Password=$_POST["Password"];
	$Hobby=$_POST["Hobby"];

	$sql="update  users set FirstName='$Fname', LastName='$Lname', Email='$Email', Password='$Password',Hobby='$Hobby' 
	where ID =".$_SESSION['ID'];
	$result = mysqli_query($conn,$sql);
	if($result)
	{ $_SESSION["FName"] = $Fname;
		$_SESSION["LName"] = $Lname;
		$_SESSION["Email"] = $Email;
		$_SESSION["Password"] = $Password;
		$_SESSION["Hobby"] = $Hobby;
	header("Location:index.php");
	}

	//check if update is successful
	//if update is successful don't forget to update the seesion variables too the redirect to index.php
}
?>