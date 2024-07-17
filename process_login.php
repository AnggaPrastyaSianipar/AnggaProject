<?php
include 'db/config.php';

$username = $_POST['username'];
$password = $_POST['password'];

$sql = "SELECT * FROM users WHERE username='$username'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    if (password_verify($password, $row['password'])) {
        if ($row['is_approved'] == 1) {
            session_start();
            $_SESSION['username'] = $row['username'];
            $_SESSION['role'] = $row['role'];
            if ($row['role'] == 'user') {
                header("Location: dashboard_user.php");
            } elseif ($row['role'] == 'admin') {
                header("Location: admin/dashboard_admin.php");
            } else {
                // Handle other roles if needed
                echo "Unknown role.";
            }
        } else {
            echo "Your account has not been approved by the admin.";
        }
    } else {
        echo "Invalid password.";
    }
} else {
    echo "No user found with that username.";
}

$conn->close();
?>
