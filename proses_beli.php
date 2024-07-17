<?php
include 'db/config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_POST['nama'];
    $harga = $_POST['harga'];
    $jumlah = $_POST['jumlah'];
    $total = (int) $harga * $jumlah; // Hitung total harga

    // Persiapkan query SQL menggunakan prepared statement
    $stmt = $conn->prepare("INSERT INTO pembeliann (nama, harga, jumlah, total) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("sidi", $nama, $harga, $jumlah, $total); // Menggunakan "i" untuk tipe data integer

    // Eksekusi statement
    if ($stmt->execute()) {
        echo "<h1>Terima Kasih atas Pembelian Anda!</h1>";
        echo "<p>Nama Buah: $nama</p>";
        echo "<p>Harga Satuan: Rp " . number_format($harga, 0, ',', '.') . "</p>";
        echo "<p>Jumlah: $jumlah</p>";
        echo "<p>Total Harga: Rp " . number_format($total, 0, ',', '.') . "</p>";
        echo "<a href='history.php'>Lihat History Pembelian</a>";
    } else {
        echo "Error: " . $stmt->error;
    }

    // Tutup statement dan koneksi
    $stmt->close();
    $conn->close();
}
?>
