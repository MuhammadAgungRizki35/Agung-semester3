<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Catatan PDF</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        h1 {
            color: #333;
        }
        h2 {
            color: #555;
        }
        p {
            color: #777;
        }
        hr {
            border: 1px solid #ccc;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <?php
    session_start();

    include 'config.php';

    $id = $_GET['id'];
    $query = "SELECT * FROM catatan WHERE id=$id";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);
    ?>

    <h1>Data Catatan</h1>
    <h2><?php echo $row['judul']; ?></h2>
    <p><?php echo $row['isi']; ?></p>
    <hr>

    <!-- Tombol untuk Download PDF -->
    <button id="downloadBtn">Download PDF</button>

    <!-- Skrip JavaScript untuk Download PDF -->
    <script>
        document.getElementById('downloadBtn').addEventListener('click', function() {
            // Mengarahkan ke script yang menghasilkan PDF
            window.location.href = 'generate_pdf.php?id=<?php echo $row['id']; ?>';
        });
    </script>

</body>
</html>
