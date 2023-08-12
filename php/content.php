<?php
include 'db.php';

// Check if user is logged in (You need to implement proper authentication)

// Fetch website content
$contentQuery = "SELECT * FROM website_content";
$contentResult = mysqli_query($conn, $contentQuery);

?>

<!DOCTYPE html>
<html>
<head>
    <title>Content Management</title>
</head>
<body>
    <?php include 'header.php'; ?>
    <h1>Content Management</h1>
    <table>
        <tr>
            <th>ID</th>
            <th>Title</th>
            <th>Content</th>
            <th>Actions</th>
        </tr>
        <?php while ($row = mysqli_fetch_assoc($contentResult)) : ?>
            <tr>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo $row['title']; ?></td>
                <td><?php echo $row['content']; ?></td>
                <td>
                    <a href="edit_content.php?id=<?php echo $row['id']; ?>">Edit</a>
                    <a href="delete_content.php?id=<?php echo $row['id']; ?>">Delete</a>
                </td>
            </tr>
        <?php endwhile; ?>
    </table>
    <?php include 'footer.php'; ?>
</body>
</html>
