<?php
session_start();

if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit();
}

include 'config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $judul = $_POST['judul'];
    $isi = $_POST['isi'];

    $query = "UPDATE catatan SET judul='$judul', isi='$isi' WHERE id=$id";
    $result = mysqli_query($conn, $query);

    if ($result) {
        header("Location: read.php");
        exit();
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}

$id = $_GET['id'];
$query = "SELECT * FROM catatan WHERE id=$id";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Catatan</title>
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
            color: #000000; /* Memberikan warna teks agar kontras dengan background */
        }
</style>
<body>
    <div class="container mt-9">
        <h2>Update Catatan</h2>
        <div class="card">
            <div class="card-body">
                <form method="post">
                    <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                    <div class="form-group">
                        <label for="judul">Judul:</label>
                        <input type="text" class="form-control" name="judul" value="<?php echo$row['judul']; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="isi">Isi Catatan:</label>
                        <textarea class="form-control" name="isi" rows="5" required><?php echo $row['isi']; ?></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
                <div class="mt-3">
                    <a href="read.php" class="btn btn-secondary">Kembali ke Lihat Catatan</a>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
