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
   


table {
    width: 100%;
    border-collapse: collapse;
    margin: 20px 0;
}

thead {
    background: #333;
    color: #fff;
}

th, td {
    padding: 1rem;
    text-align: left;
    border-bottom: 1px solid #ddd;
}

th {
    text-transform: uppercase;
}

tbody tr:nth-child(even) {
    background: #f9f9f9;
}

tbody tr:hover {
    background: #f1f1f1;
}

button {
    padding: 0.5rem 1rem;
    border: none;
    border-radius: 5px;
    background: #4CAF50;
    color: #fff;
    cursor: pointer;
    transition: background 0.3s;
}

button:hover {
    background: #45a049;
}

form input[type="number"] {
    padding: 0.5rem;
    margin-right: 0.5rem;
    border: 1px solid #ccc;
    border-radius: 5px;
}

@media (max-width: 768px) {
    th, td {
        font-size: 0.9rem;
        padding: 0.5rem;
    }

    button {
        padding: 0.5rem;
    }
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
        <table>
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Nama Buah</th>
                    <th>Harga Satuan</th>
                    <th>Jumlah</th>
                    <th>Total Harga</th>
                    <th>Tanggal Pembelian</th>
                    <th>Status Pembayaran</th>
                    <th>Status Pengiriman</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include '../db/config.php';

                // Query untuk mengambil data pembelian dari tabel pembeliann
                $sql = "SELECT * FROM pembeliann ORDER BY tanggal_pembelian DESC";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    $no = 1;
                    while($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>{$no}</td>";
                        echo "<td>{$row['nama']}</td>";
                        echo "<td>Rp " . number_format($row['harga'], 0, ',', '.') . "</td>";
                        echo "<td>{$row['jumlah']}</td>";
                        echo "<td>Rp " . number_format($row['total'], 0, ',', '.') . "</td>";
                        echo "<td>{$row['tanggal_pembelian']}</td>";

                        // Menampilkan status pembayaran
                        $status_pembayaran = isset($row['status_pembayaran']) ? $row['status_pembayaran'] : 'Belum Dibayar';
                        echo "<td>{$status_pembayaran}</td>";

                        // Menampilkan status pengiriman
                        $status_pengiriman = isset($row['status_pengiriman']) ? $row['status_pengiriman'] : 'Belum Dikirim';
                        echo "<td>{$status_pengiriman}</td>";

                        // Menampilkan form pembayaran jika status masih 'Belum Dibayar'
                        if ($status_pembayaran == 'Belum Dibayar') {
                            echo "<td>";
                            echo "<form action='proses_bayar.php' method='post'>";
                            echo "<input type='hidden' name='id' value='{$row['id']}'>";
                            echo "<input type='number' name='jumlah_bayar' placeholder='Jumlah Bayar' required>";
                            echo "<button type='submit'>Bayar</button>";
                            echo "</form>";
                            echo "</td>";
                        } elseif ($status_pembayaran == 'Sudah Dibayar' && $status_pengiriman == 'Belum Dikirim') {
                            echo "<td>";
                            echo "<form action='proses_kirim.php' method='post'>";
                            echo "<input type='hidden' name='id' value='{$row['id']}'>";
                            echo "<button type='submit'>Kirim Barang</button>";
                            echo "</form>";
                            echo "</td>";
                        } else {
                            echo "<td>Tidak ada aksi tersedia</td>";
                        }

                        echo "</tr>";
                        $no++;
                    }
                } else {
                    echo "<tr><td colspan='9'>Tidak ada data pembelian.</td></tr>";
                }
                $conn->close();
                ?>
            </tbody>
        </table>
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
