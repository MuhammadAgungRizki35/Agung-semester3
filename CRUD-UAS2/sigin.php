<?php
session_start();

include 'config.php';

// Check if the user is already logged in
if (isset($_SESSION['admin'])) {
    header("Location: dashboard.php");
    exit();
}

// Check if the registration form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['register'])) {
    $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
    $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);

    // Validate input
    if (empty($username) || empty($password)) {
        $error_message = "Harap isi semua kolom.";
    } else {
        // Check if the username already exists
        $check_query = "SELECT * FROM admin WHERE username = '$username'";
        $check_result = mysqli_query($conn, $check_query);

        if (mysqli_num_rows($check_result) > 0) {
            $error_message = "Username sudah terdaftar. Silakan gunakan username lain.";
        } else {
            // Insert the new user into the database
            $hash_password = hash("sha256", $password);
            $insert_query = "INSERT INTO admin (username, password) VALUES ('$username', '$hash_password')";
            $insert_result = mysqli_query($conn, $insert_query);

            if ($insert_result) {
                $success_message = "Registrasi berhasil! Silakan login.";
            } else {
                $error_message = "Gagal menyimpan data ke database.";
            }
        }
    }
}

// Check if the login form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['login'])) {
    $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
    $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);

    // Validate input
    if (empty($username) || empty($password)) {
        $error_message = "Harap isi semua kolom.";
    } else {
        // Check if the username and password match
        $hash_password = hash("sha256", $password);
        $login_query = "SELECT * FROM admin WHERE username = '$username' AND password = '$hash_password'";
        $login_result = mysqli_query($conn, $login_query);

        if (mysqli_num_rows($login_result) > 0) {
            $_SESSION['admin'] = true;
            header("Location: dashboard.php");
            exit();
        } else {
            $error_message = "Username atau password salah.";
        }
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
        /* Your existing styles here */
    </style>
</head>
<body>
    <div class="container mt-5">
        <h2>Login</h2>
        <?php if (isset($error_message)): ?>
            <div class="alert alert-danger" role="alert">
                <?php echo $error_message; ?>
            </div>
        <?php elseif (isset($success_message)): ?>
            <div class="alert alert-success" role="alert">
                <?php echo $success_message; ?>
            </div>
        <?php endif; ?>
        <?php if (!isset($success_message)): ?>
            <form method="post" action="login.php">
                <!-- Your existing login form -->
                <div class="form-group">
                    <label for="username">Username:</label>
                    <input type="text" class="form-control" name="username" required>
                </div>
                <div class="form-group">
                    <label for="password">Password:</label>
                    <input type="password" class="form-control" name="password" required>
                </div>
                <button type="submit" name="login" class="btn btn-warning">Login</button>
            </form>

            <!-- Registration Form -->
            <hr>
            <h2>Registrasi</h2>
            <form method="post" action="login.php">
                <div class="form-group">
                    <label for="username">Username:</label>
                    <input type="text" class="form-control" name="username" required>
                </div>
                <div class="form-group">
                    <label for="password">Password:</label>
                    <input type="password" class="form-control" name="password" required>
                </div>
                <button type="submit" name="register" class="btn btn-success">Registrasi</button>
            </form>
        <?php endif; ?>
    </div>
</body>
</html>
