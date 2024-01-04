<?php
// Koneksi ke database
$conn = mysqli_connect("localhost", "root", "", "db-prak");

// Periksa koneksi
if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

// Query untuk mengambil data dari database
$query = "SELECT * FROM form";
$result = mysqli_query($conn, $query);

// Tampilkan data
echo "<h1>Data yang sudah disimpan</h1>";
echo "<table border='1'>";
echo "<tr><th>Username</th><th>Email</th><th>Password</th></tr>";

while ($row = mysqli_fetch_assoc($result)) {
    echo "<tr>";
    echo "<td>" . $row['username'] . "</td>";
    echo "<td>" . $row['email'] . "</td>";
    echo "<td>" . $row['password'] . "</td>";
    echo "</tr>";
}

echo "</table>";

// Tutup koneksi
mysqli_close($conn);
?>
