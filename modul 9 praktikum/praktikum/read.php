<?php
include 'db.php';

$query = "SELECT * FROM survei_data";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Read Data</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2>Read Data</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>Icon/Logo</th>
                    <th>Judul Survei</th>
                    <th>Link</th>
                </tr>
            </thead>
            <tbody>
                <?php
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>{$row['icon']}</td>";
                    echo "<td>{$row['judul_survei']}</td>";
                    echo "<td>{$row['link']}</td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>
