<?php
include 'db/config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_pembelian = $_POST['id'];

    // Update status pengiriman menjadi 'Sudah Dikirim'
    $update_sql = "UPDATE pengiriman SET status_pengiriman = 'Sudah Dikirim' WHERE id = ?";
    $stmt_update = $conn->prepare($update_sql);
    $stmt_update->bind_param("i", $id_pembelian);

    if ($stmt_update->execute()) {
        // Redirect ke halaman history pembelian setelah proses selesai
        header("Location: history.php");
        exit();
    } else {
        echo "Error: " . $stmt_update->error;
    }

    $stmt_update->close();
    $conn->close();
}
?>
