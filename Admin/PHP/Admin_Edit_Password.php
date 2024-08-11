<?php
session_start();

include('koneksi_user_litbang.php');

if (!isset($_SESSION['username'])) {
    header("Location: ../HTML/Admin_Login.html");
    exit();
}

$username = $_SESSION['username'];
$sql = "SELECT id, password FROM user WHERE username='$username'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Ambil ID dari hasil query
    $row = $result->fetch_assoc();
    $id = $row['id'];

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $password_lama = $_POST['password-lama'];
        $password_baru = $_POST['password-baru'];
        $confirm_password_baru = $_POST['confirm-password-baru'];

        if ($password_baru == $confirm_password_baru) {
            if ($password_lama == $row['password']) {
                // Update data pengguna berdasarkan ID
                $sql_update = "UPDATE user SET password='$password_baru' WHERE id=$id";
        
                if ($conn->query($sql_update) === TRUE) {
                    header("Location: ../HTML/Admin_Main.html?page=../PHP/Admin_Profile.php&status=success");
                    exit();
                } else {
                    echo "<script>alert('Gagal memperbaharui password');</script>";
                }
            } else {
                header("Location: ../HTML/Admin_Main.html?page=Admin_Edit_Password.html&error=invalid_password_old");
                exit();
            }
        } else {
            header("Location: ../HTML/Admin_Main.html?page=Admin_Edit_Password.html&error=invalid_password_new");
            exit();
        }

    }
} else {
    echo "<script>alert('user tidak ditemukan');</script>";
}

$conn->close();
?>