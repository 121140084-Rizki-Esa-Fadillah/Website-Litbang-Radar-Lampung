<?php
include "Koneksi_survei_litbang.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $judul = $_POST['judul-survey'];
    $keterangan = $_POST['keterangan'];
    $id_wilayah = $_POST['id_wilayah'];
    $image = $_FILES['upload-gambar']['name']; 
    $tmp = $_FILES['upload-gambar']['tmp_name']; 

    // Move uploaded file to a desired location
    $uploadDir = '../../image/';
    if (move_uploaded_file($tmp, $uploadDir . $image)) {
        $query = "INSERT INTO survey (title, keterangan, id_wilayah, image) VALUES ('$judul', '$keterangan', '$id_wilayah', '$image')";

        if (mysqli_query($conn, $query)) {
            // Redirect to Admin_Main.html with query parameters
            header('Location: ../HTML/Admin_Main.html?page=../HTML/Admin_Tambah_Survey_Hal2.html&status=success');
            exit();
        } else {
            // Redirect with error message
            echo "Error: " . $query . "<br>" . mysqli_error($conn);
            exit();
        }
    } else {
       echo "Failed to upload image";
    }

    mysqli_close($conn);
}
?>