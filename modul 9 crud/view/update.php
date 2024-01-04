<?php include "../header.php"; ?>

<?php
// Checking if the variable is set or not, and if set, adding the set data value to the variable $userid
if (isset($_GET['user_id'])) {
    $userid = $_GET['user_id'];
}

// SQL query to select all the data from the table where id = $userid
$query = "SELECT * FROM crudphp WHERE ID = $userid ";
$view_users = mysqli_query($conn, $query);

// Check if there are any rows returned
if ($row = mysqli_fetch_assoc($view_users)) {
    $id = $row['ID'];
    $user = $row['username'];
    $email = $row['email'];
    $pass = $row['password'];
}

// Processing form data when the form is submitted
if (isset($_POST['update'])) {
    $user = $_POST['user'];
    $email = $_POST['email'];
    $pass = $_POST['pass'];

    // SQL query to update the data in the user table where the id = $userid
    $query = "UPDATE crudphp SET username = '{$user}' , email = '{$email}' , password = '{$pass}' WHERE id = $userid";
    $update_user = mysqli_query($conn, $query);

    // Check if the query executed perfectly or not
    if (!$update_user) {
        echo "Something went wrong: " . mysqli_error($conn);
    } else {
        echo "<script type='text/javascript'>alert('User data updated successfully!')</script>";
    }
}
?>

<h1 class="text-center">Update User Details</h1>
<div class="container">
    <form action="" method="post">

        <div class="form-group">
            <label for="user">Username</label>
            <input type="text" name="user" class="form-control" value="<?php echo $user ?>">
        </div>
        <div class="form-group">
            <label for="email">Email ID</label>
            <input type="text" name="email" class="form-control" value="<?php echo $email ?>">
        </div>
        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        <div class="form-group">
            <label for="pass">Password</label>
            <input type="password" name="pass" class="form-control" value="<?php echo $pass ?>">
        </div>
        <div class="form-group">
            <input type="submit" name="update" class="btn btn-primary mt-2" value="Update">
        </div>
    </form>
</div>

<!-- A BACK button to go to the home page -->
<div class="container text-center mt-5">
    <a href="home.php" class="btn btn-warning mt-5">Back</a>
</div>

<!-- Footer -->
<?php include "../footer.php"; ?>
