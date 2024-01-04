<?php
// Koneksi ke database
$conn = mysqli_connect("localhost", "root", "", "db-prak");

// Periksa koneksi
if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

// Tangkap data dari form
$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];

// Query untuk menyimpan data ke database
$query = "INSERT INTO form (username, email, password) VALUES ('$username', '$email', '$password')";

// Eksekusi query
if (mysqli_query($conn, $query)) {
    echo "Data berhasil disimpan";
} else {
    echo "Error: " . $query . "<br>" . mysqli_error($conn);
}

// Tutup koneksi
mysqli_close($conn);
?>
