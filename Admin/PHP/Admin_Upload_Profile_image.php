<?php
session_start();
include('Koneksi_user_litbang.php');

if (!isset($_SESSION['id_user'])) {
    header("Location: Admin_Login.php");
    exit();
}

$id = $_SESSION['id_user'];

// Cek apakah file diunggah
if (isset($_FILES['profile-image']) && $_FILES['profile-image']['error'] === UPLOAD_ERR_OK) {
    $fileTmpPath = $_FILES['profile-image']['tmp_name'];
    $fileName = $_FILES['profile-image']['name'];
    $fileSize = $_FILES['profile-image']['size'];
    $fileType = $_FILES['profile-image']['type'];
    $fileNameCmps = explode(".", $fileName);
    $fileExtension = strtolower(end($fileNameCmps));

    $uploadFileDir = realpath(__DIR__ . '/../../image/foto-profile') . '/';
    $newFileName = md5(time() . $fileName) . '.' . $fileExtension;
    $dest_path = $uploadFileDir . $newFileName;
    // Path relatif yang akan disimpan ke database
    $dest_path_rel = '../../image/foto-profile/' . $newFileName;

    $allowedExts = array('jpg', 'jpeg', 'png');
    if (in_array($fileExtension, $allowedExts)) {
        if (is_dir($uploadFileDir) && move_uploaded_file($fileTmpPath, $dest_path)) {
            $sql_update = "UPDATE user SET image_profile_name = ?, image_profile_path = ? WHERE id_user = ?";
            $stmt = $conn->prepare($sql_update);
            $stmt->bind_param('ssi', $fileName, $dest_path_rel, $id);
            if ($stmt->execute()) {
                header("Location: Admin_Edit_Profile.php");
                exit();
            } else {
                echo "Error updating record: " . $stmt->error;
            }
            $stmt->close();
        } else {
            echo "Error moving the uploaded file.";
        }
    } else {
        echo "Invalid file type.";
    }
} else {
    echo "No file uploaded or upload error.";
}

$conn->close();
?>