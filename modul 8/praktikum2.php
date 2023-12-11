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
    $dbname = "database_prak";
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Cek koneksi
    if ($conn->connect_error) {
        die("Koneksi gagal: " . $conn->connect_error);
    }

    // Proses saat form disubmit
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Cek apakah semua field terisi
        if (empty($_POST["name"]) || empty($_POST["email"]) || empty($_POST["website"]) || empty($_POST["gender"])) {
            echo "Mohon isi semua field!";
        } else {
            // Ambil data dari form
            $name = $_POST["name"];
            $email = $_POST["email"];
            $website = $_POST["website"];
            $gender = $_POST["gender"];

            // Simpan data ke dalam database
            $sql = "INSERT INTO users (name, email, website, gender) VALUES ('$name', '$email', '$website', '$gender')";
            if ($conn->query($sql) === TRUE) {
                echo "Data berhasil disimpan!";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        }
    }
    ?>

    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <label for="name">Name:</label>
        <input type="text" name="name" required><br><br>

        <label for="email">E-mail:</label>
        <input type="email" name="email" required><br><br>

        <label for="website">Website:</label>
        <input type="text" name="website" required><br><br>

        <label for="comment">Comment:</label>
        <textarea name="comment"></textarea><br><br>

        <label for="gender">Gender:</label>
        <input type="radio" name="gender" value="female" required> Female
        <input type="radio" name="gender" value="male" required> Male<br><br>

        <input type="submit" name="submit" value="Submit">
    </form>

    <h2>Data yang sudah disimpan:</h2>

    <?php
    // Tampilkan data yang sudah disimpan di database
    $sql = "SELECT * FROM users";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "Name: " . $row["name"] . "<br>";
            echo "E-mail: " . $row["email"] . "<br>";
            echo "Website: " . $row["website"] . "<br>";
            echo "Gender: " . $row["gender"] . "<br><br>";
        }
    } else {
        echo "Belum ada data yang disimpan.";
    }

    // Tutup koneksi ke database
    $conn->close();
    ?>

</body>
</html>