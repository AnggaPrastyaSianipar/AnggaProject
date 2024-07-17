<?php
$targetDir = "../images/";
$targetFile = $targetDir . "logo.png";
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

// Periksa apakah file adalah gambar atau bukan
$check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
if($check !== false) {
    $uploadOk = 1;
} else {
    echo "File bukan gambar.";
    $uploadOk = 0;
}

// Batasi ukuran file
if ($_FILES["fileToUpload"]["size"] > 500000) {
    echo "Maaf, ukuran file terlalu besar.";
    $uploadOk = 0;
}

// Izinkan format file tertentu
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    echo "Maaf, hanya file JPG, JPEG, PNG & GIF yang diperbolehkan.";
    $uploadOk = 0;
}

// Check jika $uploadOk tidak di-set ke 0 oleh suatu error
if ($uploadOk == 0) {
    echo "Maaf, file tidak diunggah.";
// Jika semua valid, coba upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $targetFile)) {
        header('Location: profile.php?uploadsuccess');
    } else {
        echo "Maaf, terjadi error saat mengunggah file.";
    }
}
?>
