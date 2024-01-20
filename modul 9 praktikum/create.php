

<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $judul_survei = $_POST['judul_survei'];
    $link = $_POST['link'];

    // Mengelola unggahan file
    $icon = $_FILES['icon']['name'];
    $icon_temp = $_FILES['icon']['tmp_name'];
    $icon_destination = "uploads/" . $icon;

    move_uploaded_file($icon_temp, $icon_destination);

    $query = "INSERT INTO survei_data (icon, judul_survei, link) VALUES ('$icon', '$judul_survei', '$link')";
    $result = mysqli_query($conn, $query);

    if ($result) {
        header("Location: read.php");
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Data</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2>Create Data</h2>
        <form method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="icon">Choose/ Browse File (Icon/Logo):</label>
                <input type="file" class="form-control-file" name="icon" accept="image/*" required>
            </div>
            <div class="form-group">
                <label for="judul_survei">Judul Survei:</label>
                <input type="text" class="form-control" name="judul_survei" required>
            </div>
            <div class="form-group">
                <label for="link">Link:</label>
                <input type="text" class="form-control" name="link" required>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</body>
</html>