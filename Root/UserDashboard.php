<?php

include "./includes/NavBar.php";
include('./includes/Connection.php');
require_once "./includes/UserClass.php"; 

if (!isset($_SESSION['usertype'])) {
    // Redirect to login if not logged in or not a user or admin
    header("Location: ./authentication/login.php");
    exit();
}

// Fetch user info
$userID = $_SESSION['UserID'];
$user = User::getUserById($userID);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>User Dashboard</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>

<div class="dashboard">
    <h1>Welcome, <?php echo htmlspecialchars($user['username']); ?>!</h1>

    <div class="dashboard-sections">
        <!-- Navigation Links to Different Sections -->
        <a href="./Pages/quizzez.php" class="dashboard-link">📋 Take a Quiz</a>
        <a href="./Pages/progress.php" class="dashboard-link">📈 View Progress</a>
        <a href="./Pages/forum.php" class="dashboard-link">💬 Go to Forum</a>
        <a href="./Pages/ViewProfile.php" class="dashboard-link">👤 Profile</a>
    </div>

    <!-- Optional: Display Quick Stats -->
    <div class="dashboard-summary">
        <h2>Quick Stats</h2>
        <ul>
            <li><strong>Total Quizzes Taken:</strong> <?php echo User::countUserQuizzes($userID); ?></li>
            <li><strong>Progress Level:</strong> <?php echo User::getUserProgress($userID); ?></li>
        </ul>
    </div>

    <!-- Logout Button -->
    <div class="logout">
        <a href="../authentication/signout.php" class="logout-button">🚪 Logout</a>
    </div>
</div>

</body>
</html>
