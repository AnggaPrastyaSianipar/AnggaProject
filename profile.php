<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }
        .profile-container {
            max-width: 600px;
            margin: auto;
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }
        .profile-container h2 {
            color: #333;
            text-align: center;
            margin-bottom: 20px;
            font-size: 28px;
            text-transform: uppercase;
            border-bottom: 2px solid #ccc;
            padding-bottom: 10px;
        }
        .profile-info {
            margin-bottom: 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .profile-info label {
            font-weight: bold;
            color: #555;
            text-transform: uppercase;
            font-size: 14px;
            width: 120px; /* Lebar label */
            text-align: right; /* Penyusunan teks label ke kanan */
            margin-right: 20px; /* Jarak antara label dan nilai */
        }
        .profile-info p {
            margin: 5px 0;
            font-size: 16px;
        }
        .profile-info .btn-edit {
            background-color: #4CAF50;
            color: white;
            border: none;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            text-transform: uppercase;
            font-weight: bold;
            font-size: 14px;
        }
        .profile-info .btn-edit:hover {
            background-color: #45a049;
        }
        .btn-back {
            display: inline-block;
            background-color: #007bff;
            color: white;
            border: none;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            text-transform: uppercase;
            font-weight: bold;
            font-size: 14px;
            margin-top: 10px;
        }
        .btn-back:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="profile-container">
        <h2>Profil Admin</h2>
        <?php
        include 'db/config.php';

        $userId = 1; // ID pengguna yang akan ditampilkan (Anda bisa mengganti ini sesuai kebutuhan)
        $sql = "SELECT * FROM users WHERE id = $userId";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $user = $result->fetch_assoc();
        ?>
        <div class="profile-info">
            <label>ID : </label>
            <p><?php echo $user['id']; ?></p>
        </div>
        <div class="profile-info">
            <label>Username : </label>
            <p><?php echo $user['username']; ?></p>
        </div>
        <div class="profile-info">
            <label>Role : </label>
            <p><?php echo $user['role']; ?></p>
        </div>
        <div class="profile-info">
            <label>Status : </label>
            <p><?php echo $user['role']; ?></p>
        </div>
    
        <div class="profile-info">
            <button class="btn-edit">Edit Profil</button>
        </div>
        <a class="btn btn-primary m-1" href="dashboard_user.php">Kembali</a>
        <?php
        } else {
            echo "<p>Pengguna tidak ditemukan.</p>";
        }
        $conn->close();
        ?>
    </div>
    
</body>
</html>
