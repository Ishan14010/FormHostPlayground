<?php
$host = "127.0.0.1"; //  database host
$username = "root"; //  database username
$password = "1234"; //  database password
$dbname = "Final_project"; //  database name

$conn = mysqli_connect($host, $username, $password, $database);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
