<?php
include 'db.php';

// Check if user is logged in (You need to implement proper authentication)

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $userId = $_GET["id"];

    // Delete user from the admin_data table
    $deleteQuery = "DELETE FROM admin_data WHERE id = $userId";
    if (mysqli_query($conn, $deleteQuery)) {
        header("Location: users.php");
        exit();
    } else {
        echo "Error deleting user: " . mysqli_error($conn);
    }
}
?>
