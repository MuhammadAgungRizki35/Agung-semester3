<?php
session_start();

if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit();
}




include 'config.php';

$query = "SELECT * FROM catatan";
$result = mysqli_query($conn, $query);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lihat Catatan</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <style>
        body {
            background: url('images/hearder.jpg') no-repeat center center fixed;
            background-size: cover;
            height: 100vh;
            margin: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #ffffff; /* Memberikan warna teks agar kontras dengan background */
        }

        .custom-card {
            border: 1px solid #ffffff;
            border-radius: 10px;
            margin-top: 15px;
            position: relative; /* Add position relative for positioning date */
            padding: 15px; /* Add padding for better spacing */
            background: rgba(255, 255, 255, 0.2);
        }

        h2 {
            color: #fbca47;
        }

        .card-title {
            font-size: 35px; /* Adjust the font size of the title */
            font-weight: bold; /* Make the title bold */
        }

        .date-info {
            position: absolute;
            bottom: 0;
            right: 0;
            font-size: 15px; /* Adjust the font size of the date info */
            color: #ffffff; /* Set the color to white for better visibility */
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <h2>Lihat Catatan</h2>
        <?php
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<div class='custom-card'>";
            echo "<div class='card-body'>";
            echo "<h5 class='card-title'>{$row['judul']}</h5>";
            echo "<p class='card-text'>{$row['isi']}</p>";
            
            // Check whether the catatan has been updated
            $isUpdated = ($row['tgl_diperbarui'] != null);

            // Display the appropriate date based on the condition
            if ($isUpdated) {
                $updatedDate = date('d F Y H:i:s', strtotime($row['tgl_diperbarui']));
                echo "<p class='date-info'>{$updatedDate}</p>";
            } else {
                $createdDate = date('d F Y H:i:s', strtotime($row['tgl_dibuat']));
                echo "<p class='date-info'> {$createdDate}</p>";
            }
            
            echo "<a href='update.php?id={$row['id']}' class='btn btn-warning'>Perbarui</a>";
            echo "<a href='delete.php?id={$row['id']}' class='btn btn-danger'>Hapus</a>";
            echo "<a href='export_pdf.php?id={$row['id']}' class='btn btn-success'>Ekspor ke PDF</a>";?>
           <?php
            echo "</div>";
            echo "</div>";
        }
        ?>
        <div class="mt-3">
            <a href="dashboard.php" class="btn btn-warning">Kembali ke Dashboard</a>
        
        <button onclick="printStruk()" class=" btn btn-info" data-bs-toggle="modal" data-bs-target=""><i
              class="bi bi-cash-coin"></i>
            Cetak Struk</button>
            </div>
    </div>

    

    <!-- CETAK STRUK -->

  <div id="strukContent" class="d-none">
    <style>
      #struk {
        font-size: 12px;
        font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
        max-width: 500px;
        /* border: 1px solid #ccc; */
        padding: 10px;
        width: 60mm;

      }

      #struk h2 {
        text-align: center;
        color: #333;
        line-height: 2px;
      }

      #struk p {
        margin: 5px 0;
      }

      #struk table {
        font-size: 12px;
        border-collapse: collapse;
        margin-top: 10px;
        width: 100%;
      }

      #struk th,
      #struk td {
        border: 1px solid #ddd;
        padding: 8px;
        text-align: left;
      }

      #struk .total {
        font-weight: bold;
      }

      #struk .harga {
        text-align: right;

      }
    </style>


    <div id="struk">

      <h2>CATATAN</h2>
      
      <hr>
      <hr>
  

      <table>
        <thead>
          <tr>
            <th>judul</th>
            <th>isi</th>
            <th>tgl_dibuat</th>
            <th>tgl_diperbarui</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $Total = 0;
          foreach ($result as $row) { ?>
            <tr>
           
              <td>
                <?php echo $row['judul']?>
              </td>
              <td>
                <?php echo $row['isi'] ?>
              </td>
              <td>
                <?php echo $row['tgl_dibuat'] ?>
              </td>

              <td >
                <?php echo $row['tgl_diperbarui'] ?>
              </td>

            </tr>
            <?php
          } ?>
        </tbody>
      </table>
      <hr>
    </div>
  </div>

  <script>
    function printStruk() {
      var strukContent = document.getElementById("strukContent").innerHTML;
      var printFrame = document.createElement("iframe");
      printFrame.style.display = "none";
      document.body.appendChild(printFrame);
      printFrame.contentDocument.write(strukContent);
      printFrame.contentWindow.print();
      document.body.removeChild(printFrame);
    }
  </script>

  <!-- akhirCETAK STRUK -->


</body>
</html>
