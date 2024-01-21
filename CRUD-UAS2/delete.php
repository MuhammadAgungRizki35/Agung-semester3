<?php
session_start();

if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit();
}

include 'config.php';

$id = $_GET['id'];
$query = "DELETE FROM catatan WHERE id=$id";
$result = mysqli_query($conn, $query);

if ($result) {
    header("Location: read.php");
    exit();
} else {
    echo "Error: " . mysqli_error($conn);
}
?>
