<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>
    <style>
        body{
            background: url('images/hearder.jpg') no-repeat center center fixed;
            background-size: cover;
            height: 100vh;
            margin: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #fbca47; /* Memberikan warna teks agar kontras dengan background */
            
        }

        .card{
            background: rgba(255, 255, 255, 0.2);
            border: 1px solid #ffffff;
            width: 90%;
        }

        .custom-card {
            background-color: rgba(255, 255, 255, 0.2);
            border: 1px solid #ffffff;
            border-radius: 10px;
            padding: 20px;
            max-width: 400px; /* Sesuaikan lebar container sesuai kebutuhan */
            margin: auto; /* Memusatkan kotak buat catatan */
        }

        .custom-card h5,
        .custom-card p {
            color: white;
        }

        .custom-card a {
            color: #212529;
            background-color: #fbca47;
            border-color: #fbca47;
        }
    </style>

    <div class="container mt-5">
        <div class="row mt-3">
            <div class="col-md-4 mx-auto"> <!-- Tambahkan kelas mx-auto di sini -->
                <div class="custom-card">
                    <h5 class="card-title">Buat Catatan</h5>
                    <p class="card-text">Tambahkan catatan baru.</p>
                    <a href="create.php" class="btn btn-warning">Buat</a>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
