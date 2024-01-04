<?php include "../header.php"; 
?>

<?php
// Assuming $conn is your database connection variable, make sure it's defined and connected properly

if (isset($_GET['delete'])) {
    // Sanitize user input to prevent SQL injection
    $userid = mysqli_real_escape_string($conn, $_GET['delete']);

    // SQL query to delete data from the users table where id = $userid
    $query = "DELETE FROM crudphp WHERE id = {$userid}";
    
    // Execute the delete query
    $delete_query = mysqli_query($conn, $query);

    // Check if the query executed perfectly or not
    if (!$delete_query) {
        echo "Something went wrong: " . mysqli_error($conn);
    } else {
        // Redirect to the home page after successful deletion
        header("Location: home.php");
        exit(); // Ensure that the script stops executing after the header redirect
    }
}
?>

<!-- Footer -->
<?php include "../footer.php"; ?>
