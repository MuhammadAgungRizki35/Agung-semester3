<?php
session_start();

include 'config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Validasi input
    $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
    $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);

    // Verifikasi input yang sudah divalidasi
    if (empty($username) || empty($password)) {
        $error_message = "Harap isi semua kolom.";
    } else {
        // Hindari SQL injection menggunakan prepared statement
        $query = "INSERT INTO admin (username, password) VALUES (?, ?)";
        $stmt = mysqli_prepare($conn, $query);

        // Enkripsi password (gunakan metode enkripsi yang lebih aman dalam produksi)
        $hash_password = hash("sha256",$password);

        // Bind parameter
        mysqli_stmt_bind_param($stmt, "ss", $username, $hash_password);

        // Execute statement
        $result = mysqli_stmt_execute($stmt);

        // Check for successful insertion
        if ($result) {
            $_SESSION['admin'] = true;
            header("Location: dashboard.php");
            exit();
        } else {-
            $error_message = "Gagal menyimpan data ke database.";
        }

        // Close statement
        mysqli_stmt_close($stmt);
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
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
            color: #fbca47; /* Memberikan warna teks agar kontras dengan background */
        }

        .container {
            background: rgba(0, 0, 0, 0.5); /* Memberikan transparansi hitam pada container */
            padding: 1px;
            border-radius: 10px;
            text-align: center;
        }

        .container h2 {
            margin-bottom: 20px;
        }

        /* Change text color to black for the input fields */
        .form-control {
            color: black;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
    <h2>Login</h2>
        <div class="card">
            <div class="card-header"></div>
            <div class="card-body">
                <?php if (isset($error_message)): ?>
                    <div class="alert alert-danger" role="alert">
                        <?php echo $error_message; ?>
                    </div>
                <?php endif; ?>
                <form method="post" action="login.php">
                    <div class="form-group">
                        <label for="username">Username:</label>
                        <input type="text" class="form-control" name="username" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Password:</label>
                        <input type="password" class="form-control" name="password" required>
                    </div>
                    <button type="submit" class="btn btn-warning">Login</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
