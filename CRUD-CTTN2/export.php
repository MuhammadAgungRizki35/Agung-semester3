<?php
session_start();

if (!isset($_SESSION['admin'])) {
    header("Location: export.php");
    exit();
}

require_once __DIR__ . '/vendor/autoload.php';
use Mpdf\Mpdf;

include 'config.php';

$mpdf = new Mpdf();
$mpdf->WriteHTML('<h1>Data Catatan</h1>');

$query = "SELECT * FROM catatan";
$result = mysqli_query($conn, $query);

while ($row = mysqli_fetch_assoc($result)) {
    $mpdf->WriteHTML('<h2>' . $row['judul'] . '</h2>');
    $mpdf->WriteHTML('<p>' . $row['isi'] . '</p>');
    $mpdf->WriteHTML('<hr>');
}

$mpdf->Output('Data_Catatan.pdf', 'D');
?>
