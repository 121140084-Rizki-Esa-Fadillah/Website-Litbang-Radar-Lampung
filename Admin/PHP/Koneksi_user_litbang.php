<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "user_litbang";

$conn = new mysqli($servername, $username, $password, $database);

// Cek koneksi
if ($conn->connect_error) {
    die("Koneksi ke database gagal: " . $conn->connect_error);
}
?>