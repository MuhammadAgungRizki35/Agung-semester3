<?php
// Include 'db.php' instead of 'config.php'
include 'db.php';

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
        header("Location: edit.php");
        exit();
    }
}

// Check if the form is submitted via POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST["id"];
    $title = htmlspecialchars($_POST["title"]);
    $content = htmlspecialchars($_POST["content"]);
    $completed = isset($_POST["completed"]) ? 1 : 0;

    // Update the note
    $sql = "UPDATE notes SET title='$title', content='$content', completed=$completed WHERE id=$id";
    $result = $conn->query($sql);

    // Redirect to index.php after updating
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Note</title>
</head>
<body>
    <h2>Edit Note</h2>
    <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post">
        <input type="hidden" name="id" value="<?php echo $row["id"]; ?>">
        <label for="title">Title:</label>
        <input type="text" name="title" value="<?php echo $row["title"]; ?>" required><br>
        <label for="content">Content:</label>
        <textarea name="content" rows="4" required><?php echo $row["content"]; ?></textarea><br>
        <label for="completed">Completed:</label>
        <input type="checkbox" name="completed" <?php echo ($row["completed"] ? 'checked' : ''); ?>>
        <input type="submit" value="Save">
    </form>
    <a href="edit.php">Back to Notes List</a>
</body>
</html>
