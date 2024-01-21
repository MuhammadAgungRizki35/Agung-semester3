 
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
             align-items: center;
            justify-content: center;
            color: #fbca47; /* Memberikan warna teks agar kontras dengan background */
        }

        .card{

            background: rgba(255, 255, 255, 0.2);
            border: 1px solid #ffffff;
        }

        .h5{
            color:white;
        }
        
    </style>

    <div class="mt-3 ms-auto" style="margin-left: 93.5%;">
        <a href="logout.php" class="btn btn-danger">Logout</a>
    </div>

    <div class="container mt-5">
        <h2>History</h2>
        <div class="row mt-3">
            
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title text-light">Lihat Catatan</h5>
                        <p class="card-text text-light">Lihat catatan yang sudah dibuat.</p>
                        <a href="read.php" class="btn btn-warning">Lihat Catatan</a>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
</body>
</html>