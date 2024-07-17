<!DOCTYPE html>
<html lang="en">
<head>
    <style>
        body {
    margin: 0;
    font-family: Arial, sans-serif;
    background: #f4f4f4;
    color: #333;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
}

main {
    padding: 1rem;
    background: #fff;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    border-radius: 10px;
    width: 90%;
    max-width: 1200px;
    margin: auto;
}

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

.success-message {
    color: green;
    font-weight: bold;
    text-align: center;
    margin-bottom: 1rem;
}

.error-message {
    color: red;
    font-weight: bold;
    text-align: center;
    margin-bottom: 1rem;
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
    <title>History Pembelian</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <main>
        <?php
        if (isset($_GET['status'])) {
            $status = $_GET['status'];
            if ($status == 'success') {
                echo "<p class='success-message'>Barang berhasil dikirim!</p>";
            } else {
                echo "<p class='error-message'>Gagal mengirim barang.</p>";
            }
        }
        ?>

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
                    
                </tr>
            </thead>
            <tbody>
                <?php
                include 'db/config.php';

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
                            
                            
                            echo "</form>";
                            echo "</td>";
                        } elseif ($status_pembayaran == 'Sudah Dibayar' && $status_pengiriman == 'Belum Dikirim') {
                            echo "<td>";
                            echo "<form action='proses_kirim.php' method='post'>";
                            echo "<input type='hidden' name='id' value='{$row['id']}'>";
                           
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
        <a class="btn btn-primary m-1" href="dashboard_user.php">Kembali</a>
    </main>
</body>
</html>
