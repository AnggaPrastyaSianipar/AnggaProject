<?php
// Include your database connection file (config.php)
include '../db/config.php';

// Directory where uploaded images will be saved
$target_dir = "../images/";
$target_file = $target_dir . basename($_FILES["gambar"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["gambar"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}

// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}

// Check file size
if ($_FILES["gambar"]["size"] > 500000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}

// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["gambar"]["tmp_name"], $target_file)) {
        echo "The file ". htmlspecialchars(basename($_FILES["gambar"]["name"])) . " has been uploaded.";

        // Process form data to insert into database
        $nama = $_POST['nama'];
        $harga = $_POST['harga'];
        $gambar = $target_file; // Use the path where the file is saved

        // Insert into database
        $sql = "INSERT INTO produk (nama, gambar, harga) VALUES ('$nama', '$gambar', '$harga')";

        if ($conn->query($sql) === TRUE) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}

// Close database connection
$conn->close();
?>
