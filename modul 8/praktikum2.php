<!DOCTYPE html>
<html>
<head>
    <title>Form Submission</title>
</head>
<body>
    <h1>Form Submission</h1>

    <?php
    // Koneksi ke database
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "db-prak";
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Cek koneksi
    if ($conn->connect_error) {
        die("Koneksi gagal: " . $conn->connect_error);
    }

    // Proses saat form disubmit
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Cek apakah semua field terisi
        if (empty($_POST["nama"]) || empty($_POST["gmail"]) || empty($_POST["website"]) || empty($_POST["gender"])) {
            echo "Mohon isi semua field!";
        } else {
            // Ambil data dari form
            $nama = $_POST["nama"];
            $email = $_POST["gmail"];
            $website = $_POST["website"];
            $gender = $_POST["gender"];
            $coment = $_POST["coment"];

            // Simpan data ke dalam database (using prepared statement)
            $stmt = $conn->prepare("INSERT INTO form (nama, email, website, gender, coment) VALUES ($nama, $email, $website, $gender, $coment)");
            $stmt->bind_param("sssss", $nama, $email, $website, $gender, $coment);
            if ($stmt->execute()) {
                echo "Data berhasil disimpan!";
            } else {
                echo "Error: " . $stmt->error;
            }
            $stmt->close();
        }
    }
    ?>

    <form method="post" action="">
        <label for="nama">Name:</label>
        <input type="text" name="nama" required><br><br>

        <label for="gmail">E-mail:</label>
        <input type="email" name="gmail" required><br><br>

        <label for="website">Website:</label>
        <input type="text" name="website" required><br><br>

        <label for="coment">Comment:</label>
        <textarea name="coment"></textarea><br><br>

        <label for="gender">Gender:</label>
        <input type="radio" name="gender" value="female" required> Female
        <input type="radio" name="gender" value="male" required> Male<br><br>

        <input type="submit" name="submit" value="Submit">
    </form>
</body>
</html>
