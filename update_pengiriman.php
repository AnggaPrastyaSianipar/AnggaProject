<?php
// update_pengiriman.php
include 'db/config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_produk = $_POST['id_produk'];
    $status_pengiriman = $_POST['status_pengiriman'];

    $sql = "UPDATE produk SET status_pengiriman='$status_pengiriman' WHERE id=$id_produk";

    if ($conn->query($sql) === TRUE) {
        echo "Status pengiriman berhasil diperbarui.";
    } else {
        echo "Error updating record: " . $conn->error;
    }
}

$conn->close();
?>
