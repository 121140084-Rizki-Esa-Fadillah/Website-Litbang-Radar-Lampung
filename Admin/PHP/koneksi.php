<?php
$servername = "localhost";
$username = "username";
$database = "litbang";

$conn = new mysqli($servername, $username, $database);

// Cek koneksi
if ($conn->connect_error) {
    die("Koneksi ke database gagal: " . $conn->connect_error);
}
?>
