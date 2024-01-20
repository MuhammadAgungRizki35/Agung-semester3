<?php
session_start();

if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit();
}

include 'config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $judul = $_POST['judul'];
    $isi = $_POST['isi'];

    $query = "INSERT INTO catatan (judul, isi) VALUES ('$judul', '$isi')";
    $result = mysqli_query($conn, $query);

    if ($result) {
        header("Location: read.php");
        exit();
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buat Catatan</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<style>
    body {
        background: url('images/hearder.jpg') no-repeat center center fixed;
        background-size: cover;
        height: 100vh;
        margin: 0;
        display: flex;
        align-items: center;
        justify-content: center;
        color: #fbca47; /* Memberikan warna teks agar kontras dengan background */
    }

    /* Change text color to black for the labels */
    label {
        color: black;
    }
</style>
<body>
   
    <div class="container mt-5">
    <h2>Buat catatan</h2>
        <div class="card">
            <div class="card-body">
                <form method="post">
                    <div class="form-group">
                        <label for="judul">Judul:</label>
                        <input type="text" class="form-control" name="judul" required>
                    </div>
                    <div class="form-group">
                        <label for="isi">Isi Catatan:</label>
                        <textarea class="form-control" name="isi" rows="5" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-warning">Submit</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
