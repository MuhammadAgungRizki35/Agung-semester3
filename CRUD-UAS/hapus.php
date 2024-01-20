<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $id = $_GET["id"];

    // Delete the note
    $sql = "DELETE FROM notes WHERE id=$id";
    $result = $conn->query($sql);

    header("Location: index.php");
}
?>;
