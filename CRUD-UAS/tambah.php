<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Note</title>
</head>
<body>
    <h2>Edit Note</h2>
    
    <?php
    // Check if ID is provided in the URL
    if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["id"])) {
        $id = $_GET["id"];

        // Get a note by ID
        $sql = "SELECT * FROM notes WHERE id=$id";

        // Check if the connection is successful
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $result = $conn->query($sql);

        if ($result && $result->num_rows == 1) {
            $row = $result->fetch_assoc();
        } else {
            // Redirect to index.php if the note is not found
            header("Location: index.php");
            exit();
        }
    } else {
        // Redirect to index.php if ID is not provided
        header("Location: index.php");
        exit();
    }
    ?>

    <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post">
        <input type="hidden" name="id" value="<?php echo $row["id"]; ?>">
        
        <label for="title">Title:</label>
        <input type="text" name="title" value="<?php echo isset($row["title"]) ? $row["title"] : ''; ?>" required><br>
        
        <label for="content">Content:</label>
        <textarea name="content" rows="4" required><?php echo isset($row["content"]) ? $row["content"] : ''; ?></textarea><br>
        
        <label for="completed">Completed:</label>
        <input type="checkbox" name="completed" <?php echo (isset($row["completed"]) && $row["completed"] ? 'checked' : ''); ?>>
        
        <input type="submit" value="Save">
    </form>
    
    <a href="index.php">Back to Notes List</a>
</body>
</html>
