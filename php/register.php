<?php
$host = "127.0.0.1"; //  database host
$username = "root"; //  database username
$password = "1234"; //  database password
$dbname = "Final_project"; //  database name

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT); // Hash the password

    // Check if email is already registered
    $checkEmailQuery = "SELECT id FROM admin_data WHERE email = '$email'";
    $emailResult = mysqli_query($conn, $checkEmailQuery);
    if (mysqli_num_rows($emailResult) > 0) {
        echo "Email address is already registered.";
    } else {
        // Handle image upload
        $targetDir = "images/";
        $targetFile = $targetDir . basename($_FILES["profile_image"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

        // Check if image file is a actual image or fake image
        $check = getimagesize($_FILES["profile_image"]["tmp_name"]);
        if ($check !== false) {
            $uploadOk = 1;
        } else {
            echo "File is not an image.";
            $uploadOk = 0;
        }

        if ($uploadOk == 1) {
            if (move_uploaded_file($_FILES["profile_image"]["tmp_name"], $targetFile)) {
                // Insert user data into the admin_data table
                $insertQuery = "INSERT INTO admin_data (username, email, password, profile_image) VALUES ('$username', '$email', '$hashedPassword', '$targetFile')";
                if (mysqli_query($conn, $insertQuery)) {
                    echo "Registration successful!";
                } else {
                    echo "Error: " . mysqli_error($conn);
                }
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        }
    }
}

$conn->close();
?>
