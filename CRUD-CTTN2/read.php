<?php
session_start();

if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit();
}

include 'config.php';

$query = "SELECT * FROM catatan";
$result = mysqli_query($conn, $query);
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lihat Catatan</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <style>
        body {
            background: url('images/hearder.jpg') no-repeat center center fixed;
            background-size: cover;
            height: 100vh;
            margin: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #ffffff; /* Memberikan warna teks agar kontras dengan background */
        }

        .custom-card {
            border: 1px solid #ffffff;
            border-radius: 10px;
            margin-top: 15px;
            position: relative; /* Add position relative for positioning date */
            padding: 15px; /* Add padding for better spacing */
        }

        h2 {
            color: #fbca47;
        }

        .card-title {
            font-size: 35px; /* Adjust the font size of the title */
            font-weight: bold; /* Make the title bold */
        }

        .date-info {
            position: absolute;
            bottom: 0;
            right: 0;
            font-size: 15px; /* Adjust the font size of the date info */
            color: #ffffff; /* Set the color to white for better visibility */
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <h2>Lihat Catatan</h2>
        <?php
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<div class='custom-card'>";
            echo "<div class='card-body'>";
            echo "<h5 class='card-title'>{$row['judul']}</h5>";
            echo "<p class='card-text'>{$row['isi']}</p>";
            
            // Format the timestamps for "Tanggal Dibuat" and "Tanggal Diperbarui"
            $createdDate = date('d F Y H:i:s', strtotime($row['tgl_dibuat']));
            $updatedDate = date('d F Y H:i:s', strtotime($row['tgl_diperbarui']));
            
            // Display formatted dates without additional text
            echo "<p class='date-info'>{$createdDate}</p>";
            echo "<p class='date-info'>{$updatedDate}</p>";
            
            echo "<a href='update.php?id={$row['id']}' class='btn btn-warning'>Perbarui</a>";
            echo "<a href='delete.php?id={$row['id']}' class='btn btn-danger'>Hapus</a>";
            echo "<a href='export_pdf.php?id={$row['id']}' class='btn btn-success'>Ekspor ke PDF</a>";
            echo "</div>";
            echo "</div>";
        }
        ?>
        <div class="mt-3">
            <a href="dashboard.php" class="btn btn-warning">Kembali ke Dashboard</a>
        </div>
    </div>
</body>
</html>
