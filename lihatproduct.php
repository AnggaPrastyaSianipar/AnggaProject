<?php
session_start();
if (!isset($_SESSION['username']) || $_SESSION['role'] != 'user') {
    header('Location: index.php');
    exit();
}
?>

<!DOCTYPE html>
<html>

<head>
  <!-- Basic -->
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <!-- Mobile Metas -->
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <!-- Site Metas -->
  <meta name="keywords" content="" />
  <meta name="description" content="" />
  <meta name="author" content="" />

  <title>BuahSegar</title>

  <!-- bootstrap core css -->
  <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />

  <link href="https://fonts.googleapis.com/css?family=Poppins:400,700&display=swap" rel="stylesheet">
  <!-- Custom styles for this template -->
  <link href="css/style.css" rel="stylesheet" />
  <!-- responsive style -->
  <link href="css/responsive.css" rel="stylesheet" />
</head>

<body class="sub_page">
<div class="hero_area">
    <!-- header section strats -->
    <header class="header_section">
      <div class="container-fluid">
        <nav class="navbar navbar-expand-lg custom_nav-container">
          <a class="navbar-brand" href="index.html">
            <img src="images/logo.png" alt="" />
            <span>
            <?php echo $_SESSION['role']; ?>, <?php echo $_SESSION['username']; ?>
            </span>
          </a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>

          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav  ">
              <li class="nav-item active">
                <a class="nav-link" href="dashboard_user.php">Beranda <span class="sr-only">(current)</span></a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="lihatproduct.php">Lihat Produk</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="bayar.php">Bayar Pesanan</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="history.php">History Pesanan </a>
              </li>
            </ul>
            <div class="user_option">
              <a href="profile.php">
                <span>
                  Profile
                </span>
              </a>
              
             
              <form class="form-inline my-2 my-lg-0 ml-0 ml-lg-4 mb-3 mb-lg-0">
              <a href="logout.php">
                <span>
                  Log Out
            </div>
          </div>
          <div>
            <div class="custom_menu-btn ">
              <button>
                <span class=" s-1">

                </span>
                <span class="s-2">

                </span>
                <span class="s-3">

                </span>
              </button>
            </div>
          </div>

        </nav>
      </div>
    </header>
    <!-- end header section -->
  </div>

  <!-- category section -->

  <!DOCTYPE html>
<html lang="en">
<head>

<style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }
        h1 {
            text-align: center;
            color: #333;
        }
        .products {
            display: grid;
            grid-template-columns: repeat(3, 1fr); /* 3 kolom */
            gap: 20px;
        }
        .product {
            background-color: #fff;
            padding: 15px;
            border-radius: 8px;
            box-shadow: 0px 0px 5px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease;
        }
        .product:hover {
            transform: translateY(-5px);
            box-shadow: 0px 5px 15px rgba(0, 0, 0, 0.1);
        }
        .product img {
            max-width: 100%;
            border-radius: 8px;
        }
        .product h2 {
            font-size: 1.5rem;
            margin-top: 10px;
            margin-bottom: 5px;
            color: #333;
        }
        .product p {
            font-size: 1.2rem;
            color: #666;
            margin-bottom: 10px;
        }
        .product form {
            margin-top: 10px;
        }
        .product form input[type='hidden'],
        .product form button {
            padding: 8px 15px;
            font-size: 1rem;
            border-radius: 5px;
            cursor: pointer;
        }
        .product form button {
            background-color: #007bff;
            color: #fff;
            border: none;
            transition: background-color 0.3s ease;
        }
        .product form button:hover {
            background-color: #0056b3;
        }
    </style>
   
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Produk Buah</title>
</head>
<body>
    <div class="container">
        <h1>Daftar Produk Buah</h1>
        <div class="products">
            <?php
            include 'db/config.php';

            $sql = "SELECT * FROM produk";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "
                    <div class='product'>
                        <img src='{$row['gambar']}' alt='{$row['nama']}'>
                        <h2>{$row['nama']}</h2>
                        <p>Harga: Rp " . number_format($row['harga'], 0, ',', '.') . "</p>
                        <!-- products.php -->
<form action='beli.php' method='post'>
    <input type='hidden' name='nama' value='{$row['nama']}'>
    <input type='hidden' name='harga' value='{$row['harga']}'>
    <button type='submit'>Beli</button>
</form>

                    </div>
                    ";
                }
            } else {
                echo "Tidak ada produk yang tersedia.";
            }

            $conn->close();
            ?>
        </div>
        
    </div>
</body>
</html>


  
  

  <script src="js/jquery-3.4.1.min.js"></script>
  <script src="js/bootstrap.js"></script>
  <script src="js/custom.js"></script>

</body>
</body>

</html>