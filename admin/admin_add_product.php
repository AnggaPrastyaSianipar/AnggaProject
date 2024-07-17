<?php
session_start();
if (!isset($_SESSION['username']) || $_SESSION['role'] != 'admin') {
    header('Location: index.php');
    exit();
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
 <style>


.container {
    background: #fff;
    padding: 2rem;
    border-radius: 10px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    text-align: center;
    width: 100%;
    max-width: 400px;
}

h1 {
    margin-bottom: 1rem;
    color: #fda085;
}

form {
    display: flex;
    flex-direction: column;
}

input[type="text"],
input[type="file"],
input[type="number"] {
    padding: 0.5rem;
    margin-bottom: 1rem;
    border: 1px solid #ccc;
    border-radius: 5px;
}

button {
    padding: 0.75rem;
    border: none;
    border-radius: 5px;
    background: #fda085;
    color: #fff;
    font-size: 1rem;
    cursor: pointer;
    transition: background 0.3s;
}

button:hover {
    background: #f6d365;
}

 </style>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="../css/dashboard.css">
</head>
<body>
<div class="sidebar">
        <div class="sidebar-header">
            <h2>Dashboard</h2>
            <?php echo $_SESSION['role']; ?>, <?php echo $_SESSION['username']; ?>
        </div>
        <ul class="sidebar-menu">
            <li><a href="dashboard_admin.php">Beranda</a></li>
            <li><a href="admin_add_product.php">Tambah Buah</a></li>
            <li><a href="admin.php">Pengiriman Barang</a></li>
            <li><a href="konfirmasiakun.php">Konfirmasi</a></li>
            <li><a href="profile.php">Profile,<?php echo $_SESSION['username']; ?></a></li>
            <li><a href="lihatakun.php">Akun</a></li>
            <li><a href="../logout.php">Logout</a></li>
        </ul>
    </div>
    <div class="main-content">
        <header>
            <h2>
                Dashboard
            </h2>
            <div class="toggle-btn" id="toggle-btn">
                <span></span>
                <span></span>
                <span></span>
            </div>
        </header>
        <main>
        

        <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Produk Buah Baru</title>
   
</head>
<body>
    <div class="container">
        <h1>Tambah Produk Buah Baru</h1>
        <form action="process_add_product.php" method="post" enctype="multipart/form-data">
            <input type="text" name="nama" placeholder="Nama Buah" required>
            <input type="file" name="gambar" required>
            <input type="number" name="harga" placeholder="Harga" required>
            <button type="submit">Tambah Produk</button>
        </form>
    </div>
</body>
</html>

        

        </main>
    </div>

    <script src="assets/dashboard.js"></script>
</body>
<script>
  document.addEventListener('DOMContentLoaded', function() {
    const toggleBtn = document.getElementById('toggle-btn');
    const sidebar = document.querySelector('.sidebar');

    toggleBtn.addEventListener('click', function() {
        sidebar.classList.toggle('active');
    });
});

</script>
</html>
