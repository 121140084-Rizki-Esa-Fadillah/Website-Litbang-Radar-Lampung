<?php
session_start();

// Cek apakah pengguna sudah login
if (isset($_SESSION['username'])) {
    header("Location: ../HTML/Admin_Main.html"); // Redirect ke halaman dashboard jika sudah login
    exit();
}

function login($username,$password) {
    $adminUsername = "admin";
    $adminPassword = "admin123";

    if ($username == $adminUsername && $password == $adminPassword) {
          // Login berhasil
          $_SESSION['username'] = $username;
          header("Location: ../HTML/Admin_Main.html");
          exit();
    } else {
          // Login gagal
          header("Location: ../HTML/Admin_Login.html?error=invalid_credentials");
          exit();
    }
}

// Cek apakah form login telah disubmit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Simpan data login dari form
    $username = $_POST['username'];
    $password = $_POST['password'];

    login($username, $password);
}