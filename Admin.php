<?php
session_start();

// Include database connection, permissions, and user class
require_once "includes/Connection.php"; // Connects to the database
require_once "includes/Permissions.php"; // Handles permissions for admin-only access
require_once "includes/UserClass.php"; // Handles user-related logic

// Check if the user is logged in and has admin access
if (!isset($_SESSION['user_id'])) {
    header("Location: authentication/login.php"); // Redirect to login if not logged in
    exit();
}

// Get user info and check if they are an admin
$user_id = $_SESSION['user_id'];
$stmt = $con->prepare("SELECT UserType FROM users WHERE id = ?");
$stmt->execute([$user_id]);
$user = $stmt->fetch();

if ($user['UserType'] != 0) { // UserType 0 means admin
    echo "Access denied: Admins only.";
    exit();
}

// Include navbar (if relevant for layout)
include "includes/NavBar.php";
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
    <table>
        <tr>
            <th>User ID</th>
            <th>Username</th>
            <th>Email</th>
            <th>User Type</th>
            <th>Registered At</th>
        </tr>
        <?php
        // Fetch all users for the admin dashboard table
        $stmt = $con->query("SELECT id, username, email, created_at, UserType FROM users ORDER BY created_at DESC");
        $users = $stmt->fetchAll();

        foreach ($users as $user): ?>
            <tr>
                <td><?php echo htmlspecialchars($user['id']); ?></td>
                <td><?php echo htmlspecialchars($user['username']); ?></td>
                <td><?php echo htmlspecialchars($user['email']); ?></td>
                <td><?php echo $user['UserType'] == 0 ? 'Admin' : 'Student'; ?></td>
                <td><?php echo htmlspecialchars($user['created_at']); ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
