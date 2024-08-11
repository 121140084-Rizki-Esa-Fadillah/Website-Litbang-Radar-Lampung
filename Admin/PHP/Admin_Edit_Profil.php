<?php
session_start();

include('koneksi_user_litbang.php');

if (!isset($_SESSION['username'])) {
    header("Location: ../HTML/Admin_Login.html");
    exit();
}

$username = $_SESSION['username'];
$sql = "SELECT * FROM user WHERE username='$username'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $user = $result->fetch_assoc();
} else {
    // Jika tidak ada data pengguna ditemukan, redirect ke halaman login
    header("Location: ../HTML/Admin_Login.html");
    exit();
}

$conn->close();
?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Dashboard Admin</title>
    <link rel="stylesheet" href="..\CSS\Admin_Edit_Profil.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    <script src="https://kit.fontawesome.com/ae643ea90b.js" crossorigin="anonymous"></script>
</head>

<body>
    <section id="edit-profil">
        <i class="fa-solid fa-bars"></i>
        <h2>Edit Profil Admin</h2>
    </section>
    <div class="profile-admin">
        <div class="foto-profile">
            <?php if (!empty($user['image_profile_path'])): ?>
                <img src="<?php echo htmlspecialchars($user['image_profile_path']); ?>" alt="Foto Profil" style="width: 100px; height: 100px; border-radius: 50%;">
            <?php else: ?>
                <i class="fa-solid fa-circle-user"></i>
            <?php endif; ?>
        </div>
        <div class="username-status-admin">
            <h2><?php echo !empty($user['username']) ? htmlspecialchars($user['username']) : '-'; ?></h2>
            <div class="indikator-admin">
                <span class="status-admin">Admin</span>
            </div>
        </div>
    </div>
    <form action="../PHP/Admin_Update_Data.php" method="post">
    <div class="data-profile-admin">
        <div>
            <div class="form-group">
                <label for="fullname">Nama Lengkap</label>
                <input type="text" id="fullname" name="fullname" placeholder="Nama Lengkap" required value="<?php echo htmlspecialchars($user['nama_lengkap']); ?>">
            </div>
            <div class="form-group">
                <label for="gender">Jenis Kelamin</label>
                <select name="gender" id="gender">
                    <option value="laki-laki" <?php if ($user['jenis_kelamin'] == 'laki-laki') echo 'selected'; ?>>Laki-Laki</option>
                    <option value="perempuan" <?php if ($user['jenis_kelamin'] == 'perempuan') echo 'selected'; ?>>Perempuan</option>
                </select>
            </div>
        </div>
        <div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" placeholder="Email" required value="<?php echo htmlspecialchars($user['email']); ?>">
            </div>
            <div class="form-group">
                <label for="no-hp">No. Hp</label>
                <input type="number" id="no-hp" name="no-hp" placeholder="No. Telepon" required value="<?php echo htmlspecialchars($user['no_hp']); ?>" min="0">
            </div>
        </div>
    </div>
    <div class="tombol">
        <button type="button" class="tombol-cancel"">
            <i class="fa-solid fa-x"></i>
            <strong>Batal</strong>
        </button>
        <button type="submit" class="tombol-simpan">
            <i class="fa-regular fa-floppy-disk"></i>
            <strong>Simpan</strong>
        </button>
    </div>
</form>

</body>
</html>