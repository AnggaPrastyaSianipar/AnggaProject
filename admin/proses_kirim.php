<?php
include '../db/config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['id'])) {
    $id = $_POST['id'];
    
    // Lakukan update status pengiriman
    $sql_update = "UPDATE pembeliann SET status_pengiriman = 'Sudah Dikirim' WHERE id = ?";
    $stmt = $conn->prepare($sql_update);
    $stmt->bind_param("i", $id);
    
    if ($stmt->execute()) {
        // Redirect kembali ke halaman history pembelian setelah berhasil mengirim barang
        header("Location: ../proses_kirim.php");
        exit();
    } else {
        echo "Gagal mengirim barang.";
    }
} else {
    // Redirect jika tidak ada POST request atau id tidak tersedia
    header("Location: ../proses_kirim.php");
    exit();
}

$conn->close();
?>
