<?php
include_once 'dbConnection.php';
$ref = @$_GET['q'];
$name = mysqli_real_escape_string($con, $_POST['name']);
$email = mysqli_real_escape_string($con, $_POST['email']);
$subject = mysqli_real_escape_string($con, $_POST['subject']);
$feedback = mysqli_real_escape_string($con, $_POST['feedback']);
$id = uniqid();
$date = date("Y-m-d");
$time = date("h:i:sa");

$query = "INSERT INTO feedback VALUES ('$id', '$name', '$email', '$subject', '$feedback', '$date', '$time')";
if (mysqli_query($con, $query)) {
    header("location:$ref?q=Thank you for your valuable feedback");
} else {
    die("Error: " . mysqli_error($con));
}
?>

<!-- 
Purpose:
Handles feedback submission from users.
How It Works:
Receives feedback details (name, email, subject, message) via POST.
Inserts the data into the feedback table.
Redirects the user back to the referring page with a success message. -->