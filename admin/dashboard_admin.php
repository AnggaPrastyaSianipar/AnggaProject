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
            <center><h3>Selamat Datang Di Dashboard</h3>
            <br>
            <p>Toko Online Penjualan Buah.</p></center>
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
