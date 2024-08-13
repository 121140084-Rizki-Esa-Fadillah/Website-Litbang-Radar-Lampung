<?php
session_start();
include('Koneksi_user_litbang.php');

if (!isset($_SESSION['username'])) {
    header("Location: ../HTML/Admin_Login.html");
    exit();
}

$username = $_SESSION['username'];

// Cek apakah file diunggah
if (isset($_FILES['profile-image']) && $_FILES['profile-image']['error'] === UPLOAD_ERR_OK) {
    $fileTmpPath = $_FILES['profile-image']['tmp_name'];
    $fileName = $_FILES['profile-image']['name'];
    $fileSize = $_FILES['profile-image']['size'];
    $fileType = $_FILES['profile-image']['type'];
    $fileNameCmps = explode(".", $fileName);
    $fileExtension = strtolower(end($fileNameCmps));

    // Tentukan path file upload
    $uploadFileDir = 'C:\xampp\htdocs\Website-Litbang-Radar-Lampung\image\foto-profile';
    $newFileName = md5(time() . $fileName) . '.' . $fileExtension;
    $dest_path = $uploadFileDir . $newFileName;

    // Validasi ekstensi file
    $allowedExts = array('jpg', 'jpeg', 'png');
    if (in_array($fileExtension, $allowedExts)) {
        if (move_uploaded_file($fileTmpPath, $dest_path)) {
            // Update database
            $stmt = $conn->prepare("UPDATE user SET image_profile_name = ?, image_profile_path = ? WHERE username = ?");
            $stmt->bind_param('sss', $fileName, $dest_path, $username);
            
            if ($stmt->execute()) {
                header("Location: ../HTML/Admin_Main.html?page=Admin_Profile.php&status=upload_success");
            } else {
                echo "Error updating record: " . $conn->error;
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
