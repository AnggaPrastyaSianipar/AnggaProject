<?php
include 'db/config.php';

$id = $_GET['id'];

$sql = "UPDATE users SET is_approved=1 WHERE id=$id";

if ($conn->query($sql) === TRUE) {
    echo "User approved successfully.";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
header("Location: admin.php");
?>
