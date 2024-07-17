<?php
// Include composer autoload file
require_once __DIR__ . '/vendor/autoload.php';

use \Mpdf\Mpdf;

// Create an instance of mPDF
$mpdf = new \Mpdf\Mpdf();

// Start output buffering
ob_start();

// Include database configuration file
include 'db/config.php';

// Query to fetch data from database
$sql = "SELECT * FROM pembeliann ORDER BY tanggal_pembelian DESC";
$result = $conn->query($sql);

// Check if data exists
if ($result->num_rows > 0) {
    // Start HTML content for PDF
    echo "<h1>History Pembelian</h1>";
    echo "<table border='1'><thead><tr><th>No.</th><th>Nama Buah</th><th>Harga Satuan</th><th>Jumlah</th><th>Total Harga</th><th>Tanggal Pembelian</th><th>Status Pembayaran</th></tr></thead><tbody>";

    $no = 1;
    while ($row = $result->fetch_assoc()) {
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

        echo "</tr>";
        $no++;
    }

    echo "</tbody></table>";

    // End output buffering and assign HTML content to $html variable
    $html = ob_get_contents();
    ob_end_clean();

    // Set mPDF options
    $mpdf->SetTitle('History Pembelian');
    $mpdf->WriteHTML($html);

    // Output PDF
    $mpdf->Output('history_pembelian.pdf', 'D'); // Download PDF file
    exit;
} else {
    echo "Tidak ada data pembelian.";
}

// Close database connection
$conn->close();
