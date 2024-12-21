<?php
include "./includes/NavBar.php";
// Include database connection, permissions, and user class
include('./includes/Connection.php');
//   $con = mysqli_connect("localhost", "root", "","learningplatform3");
//require_once "./includes/Permissions.php"; // Handles permissions for admin-only access
require_once "./includes/UserClass.php"; // Handles user-related logic

// Check if the user is logged in and has admin access
if ($_SESSION["Loggedin"] === false) {
    header("Location: authentication/login.php"); // Redirect to login if not logged in
    exit();
}

$user_id = $_SESSION['UserID'];

// Prepare the statement
$stmt = $con->prepare("SELECT usertype FROM users WHERE id = ?");
$stmt->bind_param("i", $user_id); // Bind the parameter as an integer

// Execute the statement
$stmt->execute();

// Fetch the user data
$result = $stmt->get_result();
$user = $result->fetch_assoc();

if (!$user || $user['usertype'] != 0) { // Check if user is not found or not an admin
    echo "<h1>Access denied: Admins only.</h1>";
    exit();
}

// Proceed with the rest of your code for admin users


// Include navbar (if relevant for layout)

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="css/style.css"> <!-- Link to CSS for styling -->
</head>

<body>
    <h2>Admin Dashboard - User Management</h2>

    <form action="./Crud/create_quiz.php" method="POST">
    <h3>Quiz Title</h3>
    <input type="text" name="title" required />
    
    <h3>Quiz Subject</h3>
    <input type="text" name="subject" required />
    <button type="submit">Add Quiz</button>
    </form>s

    <table>
        <tr>
            <th>User ID</th>
            <th>Username</th>
            <th>User Type</th>
        </tr>
        <?php

        $stmt = $con->prepare("SELECT id, username, usertype FROM users");
        $stmt->execute();


        $result = $stmt->get_result();
        //$users = $result->fetch_assoc();
        while ($user = mysqli_fetch_assoc($result)) {?>
            <tr>
                <td><?php echo htmlspecialchars($user['id']); ?></td>
                <td><?php echo htmlspecialchars($user['username']); ?></td>
                <td><?php echo $user['usertype'] == 0 ? 'Admin' : 'User'; ?></td>
            </tr>
        <?php } ?>
    </table>
</body>

</html>