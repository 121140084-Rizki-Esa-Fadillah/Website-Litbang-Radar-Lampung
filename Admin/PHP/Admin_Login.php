<?php
session_start();
include("koneksi.php");

// cek koneksi
if ($conn->connect_error) {
    die("Koneksi ke database gagal: " . $conn->connect_error);
}

// Cek apakah pengguna sudah login
if (isset($_SESSION['email'])) {
    header("Location: ../HTML/Dashboard_Admin.html"); // Redirect ke halaman dashboard jika sudah login
    exit();
}

// Cek apakah form login telah disubmit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Simpan data login dari form
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Lakukan query untuk mendapatkan informasi pengguna berdasarkan username
    $stmt = $conn->prepare("SELECT * FROM users WHERE username = ?");
    $stmt->bind_param('s', $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();

        // Verifikasi kata sandi menggunakan password_verify
        if (password_verify($password, $user['password'])) {
            // Set data pengguna dalam session
            $_SESSION['username'] = $user['username'];

            // Redirect ke halaman dashboard setelah login berhasil
            header("Location: ../HTML/Dashboard_Admin.html");
            exit();
        } else {
            $error_message = "Username atau password salah";
            echo "<script>alert('$error_message');</script>";
        }
    } else {
        $error_message = "Username atau password salah";
        echo "<script>alert('$error_message');</script>";
    }

    // Tutup statement dan koneksi
    $stmt->close();
    $conn->close();
}
?>