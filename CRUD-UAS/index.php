<?php
include 'db.php';

// Membaca catatan
$sql = "SELECT * FROM catatan";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- (bagian lainnya) -->
</head>
<body>
    <div class="container mt-5">
        <h2 class="mb-4">Note List</h2>

        <?php
        if ($conn->connect_error) {
            echo '<div class="alert alert-danger">Connection failed: ' . $conn->connect_error . '</div>';
        } else {
            if ($result) {
                if ($result->num_rows > 0) {
                    echo '<ul class="list-group">';
                    while ($row = $result->fetch_assoc()) {
                        echo '<li class="list-group-item d-flex justify-content-between align-items-center">';
                        echo $row["judul"] . " - " . $row["isi"] . " - Done: " . ($row["selesai"] ? 'Yes' : 'No');
                        echo '<div class="btn-group">';
                        echo '<a href="edit.php?id=' . $row["id"] . '" class="btn btn-primary">Edit</a>';
                        echo '<a href="delete.php?id=' . $row["id"] . '" class="btn btn-danger">Delete</a>';
                        echo '</div></li>';
                    }
                    echo '</ul>';
                } else {
                    echo '<div class="alert alert-info">No notes available</div>';
                }
            } else {
                echo '<div class="alert alert-danger">Error in query: ' . $conn->error . '</div>';
            }
        }
        ?>

        <a href="tambah.php" class="btn btn-success mt-3">Add New Note</a>
    </div>

    <!-- (bagian lainnya) -->
</body>
</html>
