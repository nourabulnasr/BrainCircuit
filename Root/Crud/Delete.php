<?php
session_start();
include_once "includes/dbh.inc.php";
$sql = "delete from users where ID = " . $_SESSION['ID'];
$result = mysqli_query($conn,$sql);
if($result)
{
    session_unset();
    session_destroy();
    header("Location:index.php");
}
?>