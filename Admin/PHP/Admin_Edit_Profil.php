<?php
session_start();
include('koneksi_user_litbang.php');

// Cek apakah pengguna sudah login
if (!isset($_SESSION['username'])) {
    header("Location: ../HTML/Admin_Login.html");
    exit();
}

$username = $_SESSION['username'];

// Cek apakah form telah disubmit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil data dari form
    $fullname = $_POST['fullname'];
    $gender = $_POST['gender'];
    $email = $_POST['email'];
    $no_hp = $_POST['no-hp'];

    // Update data pengguna di database
    $stmt = $conn->prepare("UPDATE user SET nama_lengkap = ?, jenis_kelamin = ?, email = ?, no_hp = ? WHERE username = ?");
    $stmt->bind_param('sssss', $fullname, $gender, $email, $no_hp, $username);

    if ($stmt->execute()) {
        echo "<script>alert('Profil berhasil diperbarui'); window.location.href = '../PHP/Admin_Profile.php';</script>";
    } else {
        echo "<script>alert('Gagal memperbarui profil');</script>";
    }

    // Tutup statement dan koneksi
    $stmt->close();
    $conn->close();
}
?>