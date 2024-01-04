<?php include '../header.php'; ?>

<h1 class="text-center">User Details</h1>
<div class="container">
    <table class="table table-striped table-bordered table-hover">
        <thead class="table-dark">
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Username</th>
                <th scope="col">Email</th>
                <th scope="col">Password</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Check if the user_id parameter is set
            if (isset($_GET['user_id'])) {
                $userid = $_GET['user_id'];

                // SQL query to fetch the data where id = $userid
                $query = "SELECT * FROM crudphp WHERE ID = {$userid} ";
                $view_users = mysqli_query($conn, $query);

                // Check if there are any rows returned
                if (mysqli_num_rows($view_users) > 0) {
                    while ($row = mysqli_fetch_assoc($view_users)) {
                        $id = $row['ID'];
                        $user = $row['username'];
                        $email = $row['email'];
                        $pass = $row['password'];

                        // Output each user detail in a table row
                        echo "<tr>";
                        echo "<td>{$id}</td>";
                        echo "<td>{$user}</td>";
                        echo "<td>{$email}</td>";
                        echo "<td>{$pass}</td>";
                        echo "</tr>";
                    }
                } else {
                    // Handle the case where no user is found
                    echo "<tr><td colspan='4' class='text-center'>No user found with ID: {$userid}</td></tr>";
                }
            }
            ?>
        </tbody>
    </table>
</div>

<!-- A BACK Button to go to the previous page -->
<div class="container text-center mt-5">
    <a href="home.php" class="btn btn-warning mt-5">Back</a>
</div>

<!-- Footer -->
<?php include "../footer.php"; ?>
