<?php
include 'db.php';

// Check if user is logged in (You need to implement proper authentication)

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $contentId = $_GET["id"];

    // Delete content from the website_content table
    $deleteQuery = "DELETE FROM website_content WHERE id = $contentId";
    if (mysqli_query($conn, $deleteQuery)) {
        header("Location: content.php");
        exit();
    } else {
        echo "Error deleting content: " . mysqli_error($conn);
    }
}
?>
