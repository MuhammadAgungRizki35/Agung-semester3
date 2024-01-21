<?php
$host = "localhost"; // Sesuaikan dengan host phpMyAdmin Anda
$username = "root"; // Sesuaikan dengan username phpMyAdmin Anda
$password = ""; // Sesuaikan dengan password phpMyAdmin Anda
$db_name = "CTTN3"; // Sesuaikan dengan nama database Anda

$conn = new mysqli($host, $username, $password, $db_name);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
