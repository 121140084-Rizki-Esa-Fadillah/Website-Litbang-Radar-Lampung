<?php
$servername = "localhost";
$username = "root";
$password = "";
<<<<<<< HEAD:Admin/php/Koneksi.php
$database = "litbang";
=======
$dbname = "user_litbang";
>>>>>>> 3d7dc742f9e947353d72c7b241edecc5235bf901:Admin/PHP/Koneksi_user_litbang.php

$conn = new mysqli($servername, $username, $password, $database);

// Cek koneksi
if ($conn->connect_error) {
    die("Koneksi ke database gagal: " . $conn->connect_error);
}
?>
