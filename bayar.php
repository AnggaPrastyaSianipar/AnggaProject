<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>History Pembelian</title>
   
    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />

    <!-- Font Google Poppins -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,700&display=swap" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/style.css" rel="stylesheet" />

    <!-- Responsive style -->
    <link href="css/responsive.css" rel="stylesheet" />
</head>
<body>
    <div class="container">
        <h1>History Pembelian</h1>
        <!-- Table for history -->
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Nama Buah</th>
                    <th>Harga Satuan</th>
                    <th>Jumlah</th>
                    <th>Total Harga</th>
                    <th>Tanggal Pembelian</th>
                    <th>Status Pembayaran</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <!-- PHP script to fetch and display purchase history -->
                <?php
                include 'db/config.php';

                // Query to fetch purchase data from pembeliann table
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
                        
                        // Display payment status
                        $status_pembayaran = isset($row['status_pembayaran']) ? $row['status_pembayaran'] : 'Belum Dibayar';
                        echo "<td>{$status_pembayaran}</td>";
                        
                        // Display payment form if status is 'Belum Dibayar'
                        if ($status_pembayaran == 'Belum Dibayar') {
                            echo "<td>";
                            echo "<form action='proses_bayar.php' method='post'>";
                            echo "<input type='hidden' name='id' value='{$row['id']}'>";
                            echo "<input type='number' name='jumlah_bayar' placeholder='Jumlah Bayar' required>";
                            echo "<button type='submit' class='btn btn-primary'>Bayar</button>";
                            echo "</form>";
                            echo "</td>";
                        } else {
                            echo "<td>Sudah Dibayar</td>";
                        }
                        
                        echo "</tr>";
                        $no++;
                    }
                } else {
                    echo "<tr><td colspan='8'>Tidak ada data pembelian.</td></tr>";
                }
                $conn->close();
                ?>
                
            </tbody>
            
        </table>

        <!-- Print button -->
        <div class="text-center mt-4">
            <button class="btn btn-primary" onclick="window.print()">Print</button>
        </div>
        <a class="btn btn-primary m-1" href="dashboard_user.php">Kembali</a>
    </div>

    <!-- Footer section -->
    <footer class="container-fluid footer_section">
        <div class="container">
            <p>&copy; <span id="displayDate"></span> All Rights Reserved By <a href="https://html.design/">Free Html Templates</a></p>
        </div>
    </footer>

    <!-- Scripts -->
    <script src="js/jquery-3.4.1.min.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="js/custom.js"></script>
</body>
</html>
