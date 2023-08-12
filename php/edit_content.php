<?php
include 'db.php';

// Check if user is logged in (You need to implement proper authentication)

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $contentId = $_GET["id"];

    // Fetch content by ID
    $contentQuery = "SELECT * FROM website_content WHERE id = $contentId";
    $contentResult = mysqli_query($conn, $contentQuery);

    if (mysqli_num_rows($contentResult) > 0) {
        $content = mysqli_fetch_assoc($contentResult);
    }
}

// Handle content update (form submission)
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $contentId = $_POST["id"];
    $newTitle = $_POST["new_title"];
    $newContent = $_POST["new_content"];

    // Update content in the website_content table
    $updateQuery = "UPDATE website_content SET title = '$newTitle', content = '$newContent' WHERE id = $contentId";
    if (mysqli_query($conn, $updateQuery)) {
        header("Location: content.php");
        exit();
    } else {
        echo "Error updating content: " . mysqli_error($conn);
    }
}
?>

<!-- Create a form to edit content -->
<!DOCTYPE html>
<html>
<head>
    <title>Edit Content</title>
</head>
<body>
    <?php include 'header.php'; ?>
    <h1>Edit Content</h1>
    <form action="edit_content.php" method="post">
        <input type="hidden" name="id" value="<?php echo $content['id']; ?>">
        <label for="new_title">New Title:</label>
        <input type="text" name="new_title" value="<?php echo $content['title']; ?>"><br>
        <label for="new_content">New Content:</label>
        <textarea name="new_content"><?php echo $content['content']; ?></textarea><br>
        <input type="submit" value="Update">
    </form>
    <?php include 'footer.php'; ?>
</body>
</html>
