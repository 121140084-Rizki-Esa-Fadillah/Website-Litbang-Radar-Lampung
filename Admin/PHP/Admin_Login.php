<?php
session_start();

include('Koneksi_user_litbang.php');

// Cek apakah pengguna sudah login
if (isset($_SESSION['username'])) {
    header("Location: ../HTML/Admin_Main.html"); // Redirect ke halaman dashboard jika sudah login
    exit();
}

// Cek apakah form login telah disubmit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Simpan data login dari form
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Lakukan query untuk mendapatkan informasi pengguna berdasarkan email
    $stmt = $conn->prepare("SELECT * FROM user WHERE username = ?");
    $stmt->bind_param('s', $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();

        // Verifikasi kata sandi menggunakan password_verify
        if ($password ==  $user['password']) {
            // Set data pengguna dalam session
            $_SESSION['username'] = $user['username'];

            // Redirect ke halaman dashboard setelah login berhasil
            header("Location: ../HTML/Admin_Main.html");
            exit();
        } else {
            header("Location: ../HTML/Admin_Login.html?error=invalid_credentials");
            exit();
        }
    } else {
        header("Location: ../HTML/Admin_Login.html?error=invalid_credentials");
        exit();
    }

    // Tutup statement dan koneksi
    $stmt->close();
    $conn->close();
}
?>