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
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .profile-container {
            max-width: 600px;
            width: 100%;
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }
        .profile-container h2 {
            color: #333;
            text-align: center;
            margin-bottom: 20px;
        }
        .profile-info {
            margin-bottom: 20px;
            text-align: center;
        }
        .profile-info label {
            font-weight: bold;
            display: block;
            margin-bottom: 5px;
        }
        .profile-info p {
            margin: 5px 0;
            color: #555;
        }
        .profile-info img {
            max-width: 150px;
            height: auto;
            border-radius: 50%;
            margin-bottom: 20px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }
        .profile-info .btn {
            display: inline-block;
            padding: 10px 20px;
            border-radius: 5px;
            color: white;
            text-decoration: none;
            margin: 5px;
            transition: background-color 0.3s ease;
        }
        .btn-edit {
            background-color: #4CAF50;
        }
        .btn-edit:hover {
            background-color: #45a049;
        }
        .btn-upload {
            background-color: #2196F3;
        }
        .btn-upload:hover {
            background-color: #1E88E5;
        }
        .btn-back {
            background-color: #f44336;
        }
        .btn-back:hover {
            background-color: #e53935;
        }
        .btn-container {
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="profile-container">
        <h2>Profil Admin</h2>
        <div class="profile-info">
            <label>Nama:</label>
            <p>Sianipar Punya</p>
        </div>
        <div class="profile-info">
            <label>Email:</label>
            <p>Sianipar@example.com</p>
        </div>
        <div class="profile-info">
            <label>Alamat:</label>
            <p>Kabanjahe Sekitar</p>
        </div>
        <div class="profile-info">
            <label>No. Telepon:</label>
            <p>08123456789</p>
        </div>
        <div class="profile-info">
            <label>Foto Profil:</label>
            <?php
            $defaultFoto = "uploads/default.jpg";
            $uploadedFoto = $defaultFoto;

            if (file_exists('../images/logo.png')) {
                $uploadedFoto = '../images/logo.png';
            }

            echo "<img src='{$uploadedFoto}' alt='Foto Profil'>";
            ?>
            <form action="upload.php" method="post" enctype="multipart/form-data">
                <input type="file" name="fotoProfil" accept="image/*" class="btn btn-upload">
                <button type="submit" class="btn btn-edit">Upload Foto</button>
            </form>
        </div>
        <div class="btn-container">
            <a class="btn btn-back" href="dashboard_admin.php">Kembali</a>
        </div>
    </div>
</body>
</html>
