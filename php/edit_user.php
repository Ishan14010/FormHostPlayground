<?php
include 'db.php';

// Check if user is logged in (You need to implement proper authentication)

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $userId = $_GET["id"];

    // Fetch user data by ID
    $userQuery = "SELECT * FROM admin_data WHERE id = $userId";
    $userResult = mysqli_query($conn, $userQuery);

    if (mysqli_num_rows($userResult) > 0) {
        $user = mysqli_fetch_assoc($userResult);
    }
}

// Handle user data update (form submission)
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $userId = $_POST["id"];
    $newUsername = $_POST["new_username"];
    $newEmail = $_POST["new_email"];

    // Update user data in the admin_data table
    $updateQuery = "UPDATE admin_data SET username = '$newUsername', email = '$newEmail' WHERE id = $userId";
    if (mysqli_query($conn, $updateQuery)) {
        header("Location: users.php");
        exit();
    } else {
        echo "Error updating user: " . mysqli_error($conn);
    }
}
?>

<!-- Create a form to edit user data -->
<!DOCTYPE html>
<html>
<head>
    <title>Edit User</title>
</head>
<body>
    <?php include 'header.php'; ?>
    <h1>Edit User</h1>
    <form action="edit_user.php" method="post">
        <input type="hidden" name="id" value="<?php echo $user['id']; ?>">
        <label for="new_username">New Username:</label>
        <input type="text" name="new_username" value="<?php echo $user['username']; ?>"><br>
        <label for="new_email">New Email:</label>
        <input type="email" name="new_email" value="<?php echo $user['email']; ?>"><br>
        <input type="submit" value="Update">
    </form>
    <?php include 'footer.php'; ?>
</body>
</html>
