<?php include "../header.php"; ?>

<?php
// Assuming $conn is your database connection variable, make sure it's defined and connected properly

if (isset($_POST['create'])) {
    // Sanitize user inputs to prevent SQL injection
    $user = mysqli_real_escape_string($conn, $_POST['user']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $pass = mysqli_real_escape_string($conn, $_POST['pass']);

    // Use prepared statements to prevent SQL injection
    $query = "INSERT INTO crudphp (username, email, password) VALUES (?, ?, ?)";
    $stmt = mysqli_prepare($conn, $query);

    // Bind parameters
    mysqli_stmt_bind_param($stmt, "sss", $user, $email, $pass);

    // Execute the statement
    $add_user = mysqli_stmt_execute($stmt);

    // Check if the query executed perfectly or not
    if (!$add_user) {
        echo "Something went wrong: " . mysqli_error($conn);
    } else {
        echo "<script type='text/javascript'>alert('User added successfully!')</script>";
    }

    // Close the statement
    mysqli_stmt_close($stmt);
}
?>

<h1 class="text-center">Add User details </h1>
<div class="container">
    <form action="" method="post">
        <div class="form-group">
            <label for="user" class="form-label">Username</label>
            <input type="text" name="user" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="email" class="form-label">Email ID</label>
            <input type="email" name="email" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="pass" class="form-label">Password</label>
            <input type="password" name="pass" class="form-control" required>
        </div>
        <div class="form-group">
            <input type="submit" name="create" class="btn btn-primary mt-2" value="Submit">
        </div>
    </form>
</div>

<!-- A BACK button to go to the home page -->
<div class="container text-center mt-5">
    <a href="home.php" class="btn btn-warning mt-5">Back</a>
</div>

<!-- Footer -->
<?php include "../footer.php"; ?>
