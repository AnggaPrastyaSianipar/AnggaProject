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
    body {
    display: flex;
    height: 100vh;
    font-family: Arial, sans-serif;
    margin: 0;
    background-color: #f4f4f9;
}

.sidebar {
    width: 250px;
    background-color: #333;
    color: #fff;
    transition: all 0.3s;
}

.sidebar.active {
    width: 60px;
}

.sidebar-header {
    padding: 20px;
    background-color: #444;
    text-align: center;
}

.sidebar-header h2 {
    margin: 0;
}

.sidebar-header p {
    margin: 10px 0 0;
    font-size: 14px;
}

.sidebar-menu {
    list-style: none;
    padding: 0;
    margin: 0;
}

.sidebar-menu li {
    padding: 15px 20px;
}

.sidebar-menu li a {
    color: #fff;
    text-decoration: none;
    display: block;
}

.sidebar-menu li:hover {
    background-color: #555;
}

.main-content {
    flex-grow: 1;
    padding: 20px;
    transition: margin-left 0.3s;
}

.sidebar.active + .main-content {
    margin-left: 60px;
}

header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    background-color: #fff;
    padding: 20px;
    box-shadow: 0 2px 4px rgba(0,0,0,0.1);
}

header h2 {
    margin: 0;
}

.toggle-btn {
    cursor: pointer;
}

.toggle-btn span {
    display: block;
    width: 25px;
    height: 3px;
    background-color: #333;
    margin: 5px 0;
    transition: all 0.3s;
}

.container {
    background-color: #fff;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0 2px 4px rgba(0,0,0,0.1);
    max-width: 1000px;
    margin: 20px auto;
}

.container h2 {
    margin-bottom: 20px;
}

.container table {
    width: 100%;
    border-collapse: collapse;
    margin: 20px 0;
}

.container table thead {
    background-color: #333;
    color: #fff;
}

.container table thead th {
    padding: 10px;
    text-align: left;
}

.container table tbody tr:nth-child(even) {
    background-color: #f2f2f2;
}

.container table tbody tr:hover {
    background-color: #ddd;
}

.container table tbody td {
    padding: 10px;
    text-align: left;
    border-bottom: 1px solid #ddd;
}

.container .btn {
    padding: 8px 12px;
    border-radius: 5px;
    text-decoration: none;
    margin-right: 5px;
}

.container .btn.approve {
    background-color: #4CAF50;
    color: white;
}

.container .btn.reject {
    background-color: #f44336;
    color: white;
}

.container .btn:hover {
    opacity: 0.8;
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
        <?php
include '../db/config.php';

$sql = "SELECT * FROM users WHERE is_approved=0";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - Konfirmasi Registrasi</title>
    <link rel="stylesheet" href="../css/konfirmasi_registrasi.css">
</head>
<body>
    <div class="container">
        <h2>Konfirmasi Registrasi</h2>
        <table>
            <thead>
                <tr>
                    <th>Username</th>
                    <th>Role</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $result->fetch_assoc()) { ?>
                <tr>
                    <td><?php echo $row['username']; ?></td>
                    <td><?php echo $row['role']; ?></td>
                    <td>
                        <a class="btn approve" href="approve.php?id=<?php echo $row['id']; ?>">Approve</a>
                        <a class="btn reject" href="reject.php?id=<?php echo $row['id']; ?>">Reject</a>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</body>
</html>


<?php
$conn->close();
?>

        </main>
    </div>

    <script src="../assets/dashboard.js"></script>
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


