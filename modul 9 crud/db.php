<?php
$host = 'localhost'; // server
$user = 'root';
$pass = "";
$database = 'crudphp'; //Database Name
// establishing connection
$conn = mysqli_connect($host, $user, $pass, $database);
// for displaying an error msg in case the connection is
$established = "some_value";
echo $established;

if (!$conn) {
die("Connection failed: " . mysqli_connect_error());
}