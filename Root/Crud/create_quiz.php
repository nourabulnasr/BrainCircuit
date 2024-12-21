<?php

session_start();
if (!isset($_SESSION["UserID"])) {
    header('location: ../authentication/login.php');
}

$_SESSION['table'] = 'quizzes'; 
$user = $_SESSION['UserID'];

$title = $_POST['title'];
$subject = $_POST['subject'];

try {
    include('../includes/Connection.php');

    $command = "INSERT INTO quizzes (quiz_title, subject) 
                VALUES (:quiz_title, :subject)";

    $stmt = $con->prepare($command);
    $stmt->bindParam(':quiz_title', $title);
    $stmt->bindParam(':subject', $subject);
    $stmt->execute();

    // Set the response for success
    $response = [
        'success' => true,
        'message' => "Quiz '{$title}' successfully added to the system."
    ];

} catch (PDOException $e) {
    // Set the response for database-related errors
    $response = [
        'success' => false,
        'message' => 'Error: ' . $e->getMessage()
    ];
} catch (Exception $e) {
    // Set the response for general errors
    $response = [
        'success' => false,
        'message' => $e->getMessage()
    ];
}
$_SESSION['response'] = $response;
header('location: ../Admin.php');

?>