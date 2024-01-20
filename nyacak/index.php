<?php
if (count($_FILES) > 0) {
    if (is_uploaded_file($_FILES['gambar']['tmp_name'])) {
        $koneksi = mysqli_connect("localhost", "root","db_belajar");
        $datagambar = addslashes(file_get_contents($_FILES['gambar']['tmp_name']));
        $propertiesgambar = getimageSize($_FILES['gambar']['tmp_name']);

        $sql = "INSERT INTO tb_images(tipeimage ,dataimage) VALUES('" . $propertiesgambar['mime'] . "', '" . $datagambar . "')";
        mysqli_query($koneksi, $sql) or die("<b>Error:</b> Ada kesalahan<br/>" . mysqli_error($koneksi));

        $lastrecord = "SELECT id FROM tb_images ORDER BY id DESC LIMIT 1";
        $result = mysqli_query($koneksi, $lastrecord) or die("<b>Error:</b> Ada kesalahan<br/>" . mysqli_error($koneksi));
        $getid = mysqli_fetch_array($result);
        if (isset($getid["id"])) {
            $notif = 'Gambar berhasil di simpan, silakan lihat di <a target="_blank" href="view.php?id=' . $getid["id"] . '">sini</a>';
        }
    }
}
?>
<html>
    <head>
        <title>Menyimpan Gambar Di MySQL</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <?php
        if (isset($notif)) {
            echo $notif;
        }
        ?>
        <form name="formupload" enctype="multipart/form-data" action="" method="post">
            <label>Upload Gambar:</label><br />
            <input name="gambar" type="file" />
            <input type="submit" value="Submit" />
        </form>
    </body>
</html>