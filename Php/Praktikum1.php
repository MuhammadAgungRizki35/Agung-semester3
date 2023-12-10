<!DOCTYPE html>
<html lang="en">
<head>
    <title>Praktikum 1</title>
</head>
<body>
    <?php
    // Menyimpan nama-nama dosen dalam variabel array
    $namaDosen = array("Indar kurniawan", "Faiq abror", "Kresna aji");

    // Loop melalui setiap nama
    foreach ($namaDosen as $nama) {




        // Menampilkan nama
        echo "<h2>Dosen: $nama</h2>";

        // Menghitung jumlah kata dan jumlah huruf
        $jumlahKata = str_word_count($nama);
        $jumlahHuruf = strlen($nama);

        // Menampilkan hasil
        echo "<p>Jumlah kata: $jumlahKata</p>";
        echo "<p>Jumlah huruf: $jumlahHuruf</p>";

        // Menampilkan kebalikan dari nama
        $kebalikanNama = strrev($nama);
        echo "<p>Kebalikan Nama: $kebalikanNama</p>";

        // Menampilkan garis pemisah antar dosen
        echo "<hr>";
    }
    ?>
</body>
</html>
