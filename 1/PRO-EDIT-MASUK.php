<?php
include("conn.php");

// Check if the form is submitted
if (isset($_POST['id'])) {
    $id = $_POST['id'];
    $id_guru = $_POST['id_guru'];
    $nama = $_POST['nama'];
    $tanggal = date('Y-m-d');
    $time = date('H:i:s');

    // Handle file upload
    $target_dir = "images/"; // Directory to upload images
    $target_file = $target_dir . basename($_FILES["foto"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

    // Check if image file is a actual image or fake image
    $check = getimagesize($_FILES["foto"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }

    // Check if file already exists
    if (file_exists($target_file)) {
        echo "Sorry, file already exists.";
        $uploadOk = 0;
    }

    // Check file size
    if ($_FILES["foto"]["size"] > 500000) { // 500KB
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
        // If there was an error, handle it appropriately (e.g., display an error message)
        echo "Sorry, your file was not uploaded.";
    } else {
        if (move_uploaded_file($_FILES["foto"]["tmp_name"], $target_file)) {
            // Update database with new data and photo path
            $sql = "UPDATE tb_guru SET id_guru='$id_guru', nama='$nama', tanggal='$tanggal', time='$time', foto='$target_file' WHERE id=$id";
        } else {
            // If file upload failed, update data without photo
            $sql = "UPDATE tb_guru SET id_guru='$id_guru', nama='$nama', tanggal='$tanggal', time='$time' WHERE id=$id";
        }
    }

    $query = mysqli_query($conn, $sql);

    if ($query) {
        header("Location: LIST-M-GURU.php?status=success");
    } else {
        header("Location: LIST-M-GURU.php?status=error");
    }
}
?>