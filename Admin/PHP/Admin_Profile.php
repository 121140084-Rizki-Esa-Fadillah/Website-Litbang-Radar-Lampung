<?php
session_start();

include('Koneksi_user_litbang.php');

if (!isset($_SESSION['username'])) {
    header("Location: ../HTML/Admin_Login.html");
    exit();
}

$username = $_SESSION['username'];
$stmt = $conn->prepare("SELECT * FROM user WHERE username = ?");
$stmt->bind_param('s', $username);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $user = $result->fetch_assoc();
} else {
    // Jika tidak ada data pengguna ditemukan, redirect ke halaman login
    header("Location: ../HTML/Admin_Login.html");
    exit();
}

// Tutup statement dan koneksi
$stmt->close();
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Dashboard Admin</title>
    <link rel="stylesheet" href="..\CSS\Admin_Profile.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    <script src="https://kit.fontawesome.com/ae643ea90b.js" crossorigin="anonymous"></script>
</head>

<body>
    <section id="Profile">
        <i class="fa-solid fa-bars"></i>
        <h2>Profil Admin</h2>
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
    <div class="data-profile-admin">
        <div>
            <div class="nama-admin data">
                <strong class="sub-judul">Nama Lengkap</strong>
                <p class="value"><?php echo !empty($user['nama_lengkap']) ? htmlspecialchars($user['nama_lengkap']) : '-'; ?></p>
            </div>
            <div class="jenis-kelamin-admin data">
                <strong class="sub-judul">Jenis Kelamin</strong>
                <p class="value"><?php echo !empty($user['jenis_kelamin']) ? htmlspecialchars($user['jenis_kelamin']) : '-'; ?></p>
            </div>
            <div class="password-admin data">
                <strong class="sub-judul">password</strong>
                <div class="value-password">
                    <p id="password-value">*********</p>
                    <span class="material-symbols-outlined toggle-password" id="toggle-password">visibility_off</span>
                    <a href="#" id="edit-password">Edit</a>
                </div>
            </div>
        </div>
        <div>
            <div class="email-admin data">
                <strong class="sub-judul">Email</strong>
                <p class="value"><?php echo !empty($user['email']) ? htmlspecialchars($user['email']) : '-'; ?></p>
            </div>
            <div class="no-telp-admin data">
                <strong class="sub-judul">No. Hp</strong>
                <p class="value"><?php echo !empty($user['no_hp']) ? htmlspecialchars($user['no_hp']) : '-'; ?></p>
            </div>
        </div>
    </div>
    <div class="edit">
        <button class="tombol-edit">
            <span class="material-symbols-outlined">
                edit_square
            </span>
            <strong>Edit</strong>
        </button>        
    </div>
    <script src="..\js\Admin_Main.js"></script>
    <script>
        document.getElementById('toggle-password').addEventListener('click', function() {
            const passwordElement = document.getElementById('password-value');
            const togglePassword = document.getElementById('toggle-password');
            const isPasswordHidden = passwordElement.textContent === '*********';
            
            if (isPasswordHidden) {
                // Jika password tersembunyi, tampilkan
                passwordElement.textContent = '<?php echo htmlspecialchars($user['password']); ?>';
                togglePassword.textContent = 'visibility'; // Ubah ikon menjadi mata terbuka
            } else {
                // Jika password terlihat, sembunyikan
                passwordElement.textContent = '*********';
                togglePassword.textContent = 'visibility_off'; // Ubah ikon menjadi mata tertutup
            }

        });
    </script>
</body>

</html>