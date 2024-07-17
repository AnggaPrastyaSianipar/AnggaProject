<?php
// Sambungkan ke database (sesuaikan dengan informasi koneksi Anda)
$servername = "localhost";
$username = "root"; // Ganti dengan username database Anda
$password = ""; // Ganti dengan password database Anda
$dbname = "buahangga"; // Ganti dengan nama database Anda

// Buat koneksi ke database
$conn = new mysqli($servername, $username, $password, $dbname);

// Periksa koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Inisialisasi variabel pencarian
$search = "";
if (isset($_GET['search'])) {
    $search = $_GET['search'];
}

// Query untuk mengambil data pengguna berdasarkan pencarian
$sql = "SELECT id, username, password, role FROM users WHERE username LIKE '%$search%' OR role LIKE '%$search%'";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pengguna Yang Terdaftar</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0; /* Warna latar belakang keseluruhan */
            padding: 20px;
            margin: 0;
        }
        .container {
            max-width: 800px;
            margin: 0 auto;
            background-color: #fff; /* Warna latar belakang container */
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            margin-top: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        th, td {
            padding: 12px 15px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #f2f2f2;
            color: #333;
            font-weight: bold;
            text-transform: uppercase;
        }
        td {
            color: #666;
        }
        tr:hover {
            background-color: #f5f5f5;
        }
        h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #333;
        }
        form {
            margin-bottom: 20px;
            display: flex;
            align-items: center;
        }
        label {
            margin-right: 10px;
        }
        input[type="text"] {
            padding: 8px;
            width: 200px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 14px;
        }
        button[type="submit"] {
            padding: 8px 16px;
            background-color: #007bff;
            border: 1px solid #007bff;
            color: #fff;
            border-radius: 4px;
            cursor: pointer;
            font-size: 14px;
        }
        button[type="submit"]:hover {
            background-color: #0069d9;
            border-color: #0062cc;
        }
        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
        }
        .btn-primary:hover {
            background-color: #0069d9;
            border-color: #0062cc;
        }
        .btn-primary {
    background-color: #007bff;
    border-color: #007bff;
    color: #fff;
    padding: 8px 16px;
    border-radius: 4px;
    text-decoration: none; /* Menghilangkan underline pada link */
    display: inline-block; /* Mengubah tampilan link menjadi inline block */
    transition: background-color 0.3s ease; /* Animasi perubahan warna latar belakang */
}

.btn-primary:hover {
    background-color: #0069d9;
    border-color: #0062cc;
    text-decoration: none; /* Menghilangkan underline pada link saat hover */
}
    </style>
</head>
<body>
    <h2>Pengguna Yang Terdaftar (Admin/User)</h2>

    <!-- Formulir Pencarian -->
    <form method="GET">
        <label for="search">Cari Pengguna:</label>
        <input type="text" id="search" name="search">
        <button type="submit">Cari</button>
    </form>

    <table>
        <tr>
            <th>ID</th>
            <th>Username</th>
            <th>Password</th>
            <th>Role</th>
        </tr>
        <?php
        // Tampilkan data pengguna berdasarkan hasil pencarian
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["id"] . "</td>";
                echo "<td>" . $row["username"] . "</td>";
                echo "<td>" . $row["password"] . "</td>";
                echo "<td>" . $row["role"] . "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='4'>Tidak ada pengguna terdaftar yang cocok dengan pencarian.</td></tr>";
        }
        ?>
    </table>
    <a class="btn btn-primary m-1" href="dashboard_admin.php">Kembali</a>

    <?php
    // Tutup koneksi
    $conn->close();
    ?>
</body>
</html>
