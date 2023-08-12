<?php
include 'db.php';

// Check if user is logged in (You need to implement proper authentication)

// Fetch all registered users
$usersQuery = "SELECT id, username, email FROM admin_data";
$usersResult = mysqli_query($conn, $usersQuery);

?>

<!DOCTYPE html>
<html>
<head>
    <title>Registered Users</title>
</head>
<body>
    <?php include 'header.php'; ?>
    <h1>Registered Users</h1>
    <table>
        <tr>
            <th>ID</th>
            <th>Username</th>
            <th>Email</th>
            <th>Actions</th>
        </tr>
        <?php while ($row = mysqli_fetch_assoc($usersResult)) : ?>
            <tr>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo $row['username']; ?></td>
                <td><?php echo $row['email']; ?></td>
                <td>
                    <a href="edit_user.php?id=<?php echo $row['id']; ?>">Edit</a>
                    <a href="delete_user.php?id=<?php echo $row['id']; ?>">Delete</a>
                </td>
            </tr>
        <?php endwhile; ?>
    </table>
    <?php include 'footer.php'; ?>
</body>
</html>
