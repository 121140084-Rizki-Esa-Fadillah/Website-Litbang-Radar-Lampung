</html><?php
session_start();
include "Koneksi_survei_litbang.php";

// Helper function to validate and sanitize inputs
function validateInput($data) {
    return filter_var($data, FILTER_SANITIZE_NUMBER_INT);
}

$error_message = '';
$success = false;

$id = isset($_GET['id']) ? intval($_GET['id']) : 0;

// Check if the form has been submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Validate and sanitize gender inputs
    $gender_sangat_puas_laki = validateInput($_POST['gender_sangat_puas_laki']);
    $gender_puas_laki = validateInput($_POST['gender_puas_laki']);
    $gender_kurang_puas_laki = validateInput($_POST['gender_kurang_puas_laki']);
    $gender_sangat_kurang_puas_laki = validateInput($_POST['gender_sangat_kurang_puas_laki']);

    $gender_sangat_puas_perempuan = validateInput($_POST['gender_sangat_puas_perempuan']);
    $gender_puas_perempuan = validateInput($_POST['gender_puas_perempuan']);
    $gender_kurang_puas_perempuan = validateInput($_POST['gender_kurang_puas_perempuan']);
    $gender_sangat_kurang_puas_perempuan = validateInput($_POST['gender_sangat_kurang_puas_perempuan']);

    // Calculate totals
    $total_responden_laki_laki = $gender_sangat_puas_laki + $gender_puas_laki + $gender_kurang_puas_laki + $gender_sangat_kurang_puas_laki;
    $total_responden_perempuan = $gender_sangat_puas_perempuan + $gender_puas_perempuan + $gender_kurang_puas_perempuan + $gender_sangat_kurang_puas_perempuan;
    $total_responden_gender = $total_responden_laki_laki + $total_responden_perempuan;

    // SQL Update Query for `gender` table
    $updateGenderQuery = "
        UPDATE gender SET 
        laki_laki_sangat_puas = ?, laki_laki_puas = ?, laki_laki_kurang_puas = ?, laki_laki_sangat_kurang_puas = ?,
        perempuan_sangat_puas = ?, perempuan_puas = ?, perempuan_kurang_puas = ?, perempuan_sangat_kurang_puas = ?,
        total_responden_laki_laki = ?, total_responden_perempuan = ?, total_responden_gender = ?
        WHERE id = ?
    ";

    if ($stmt = $conn->prepare($updateGenderQuery)) {
        $stmt->bind_param(
            'iiiiiiiiiiii',
            $gender_sangat_puas_laki, $gender_puas_laki, $gender_kurang_puas_laki, $gender_sangat_kurang_puas_laki,
            $gender_sangat_puas_perempuan, $gender_puas_perempuan, $gender_kurang_puas_perempuan, $gender_sangat_kurang_puas_perempuan,
            $total_responden_laki_laki, $total_responden_perempuan, $total_responden_gender,
            $id
        );

        if ($stmt->execute()) {
            $success = true;
        } else {
            $error_message = "Failed to update gender data: " . $stmt->error;
        }
        $stmt->close();
    } else {
        $error_message = "Failed to prepare gender update query: " . $conn->error;
    }

    // Validate and sanitize age group inputs
    $usia_sangat_puas_18_35 = validateInput($_POST['usia_sangat_puas_18_35']);
    $usia_puas_18_35 = validateInput($_POST['usia_puas_18_35']);
    $usia_kurang_puas_18_35 = validateInput($_POST['usia_kurang_puas_18_35']);
    $usia_sangat_kurang_puas_18_35 = validateInput($_POST['usia_sangat_kurang_puas_18_35']);

    $usia_sangat_puas_36_plus = validateInput($_POST['usia_sangat_puas_36_plus']);
    $usia_puas_36_plus = validateInput($_POST['usia_puas_36_plus']);
    $usia_kurang_puas_36_plus = validateInput($_POST['usia_kurang_puas_36_plus']);
    $usia_sangat_kurang_puas_36_plus = validateInput($_POST['usia_sangat_kurang_puas_36_plus']);
    
    // Calculate totals
    $total_responden_18_35 = $usia_sangat_puas_18_35 + $usia_puas_18_35 + $usia_kurang_puas_18_35 + $usia_sangat_kurang_puas_18_35;
    $total_responden_36_up = $usia_sangat_puas_36_plus + $usia_puas_36_plus + $usia_kurang_puas_36_plus + $usia_sangat_kurang_puas_36_plus;
    $total_responden_usia = $total_responden_18_35 + $total_responden_36_up;

    // SQL Update Query for `usia` table
    $updateUsiaQuery = "
        UPDATE usia SET 
        18_35_sangat_puas = ?, 18_35_puas = ?, 18_35_kurang_puas = ?, 18_35_sangat_kurang_puas = ?,
        36_up_sangat_puas = ?, 36_up_puas = ?, 36_up_kurang_puas = ?, 36_up_sangat_kurang_puas = ?,
        total_responden_18_35 = ?, total_responden_36_up = ?, total_responden_usia = ?
        WHERE id = ?
    ";

    if ($stmt = $conn->prepare($updateUsiaQuery)) {
        $stmt->bind_param(
            'iiiiiiiiiiii',
            $usia_sangat_puas_18_35, $usia_puas_18_35, $usia_kurang_puas_18_35, $usia_sangat_kurang_puas_18_35,
            $usia_sangat_puas_36_plus, $usia_puas_36_plus, $usia_kurang_puas_36_plus, $usia_sangat_kurang_puas_36_plus,
            $total_responden_18_35, $total_responden_36_up, $total_responden_usia,
            $id
        );

        if ($stmt->execute()) {
            $success = true;
        } else {
            $error_message = "Failed to update age group data: " . $stmt->error;
        }
        $stmt->close();
    } else {
        $error_message = "Failed to prepare age group update query: " . $conn->error;
    }

    // Validate and sanitize education level inputs
    $lulusan_sangat_puas_sd = validateInput($_POST['lulusan_sangat_puas_sd']);
    $lulusan_puas_sd = validateInput($_POST['lulusan_puas_sd']);
    $lulusan_kurang_puas_sd = validateInput($_POST['lulusan_kurang_puas_sd']);
    $lulusan_sangat_kurang_puas_sd = validateInput($_POST['lulusan_sangat_kurang_puas_sd']);

    $lulusan_sangat_puas_smp = validateInput($_POST['lulusan_sangat_puas_smp']);
    $lulusan_puas_smp = validateInput($_POST['lulusan_puas_smp']);
    $lulusan_kurang_puas_smp = validateInput($_POST['lulusan_kurang_puas_smp']);
    $lulusan_sangat_kurang_puas_smp = validateInput($_POST['lulusan_sangat_kurang_puas_smp']);

    $lulusan_sangat_puas_sma = validateInput($_POST['lulusan_sangat_puas_sma']);
    $lulusan_puas_sma = validateInput($_POST['lulusan_puas_sma']);
    $lulusan_kurang_puas_sma = validateInput($_POST['lulusan_kurang_puas_sma']);
    $lulusan_sangat_kurang_puas_sma = validateInput($_POST['lulusan_sangat_kurang_puas_sma']);

    $lulusan_sangat_puas_diploma = validateInput($_POST['lulusan_sangat_puas_diploma']);
    $lulusan_puas_diploma = validateInput($_POST['lulusan_puas_diploma']);
    $lulusan_kurang_puas_diploma = validateInput($_POST['lulusan_kurang_puas_diploma']);
    $lulusan_sangat_kurang_puas_diploma = validateInput($_POST['lulusan_sangat_kurang_puas_diploma']);

    $lulusan_sangat_puas_sarjana = validateInput($_POST['lulusan_sangat_puas_sarjana']);
    $lulusan_puas_sarjana = validateInput($_POST['lulusan_puas_sarjana']);
    $lulusan_kurang_puas_sarjana = validateInput($_POST['lulusan_kurang_puas_sarjana']);
    $lulusan_sangat_kurang_puas_sarjana = validateInput($_POST['lulusan_sangat_kurang_puas_sarjana']);

    // Calculate totals
    $total_responden_sd = $lulusan_sangat_puas_sd + $lulusan_puas_sd + $lulusan_kurang_puas_sd + $lulusan_sangat_kurang_puas_sd;
    $total_responden_smp = $lulusan_sangat_puas_smp + $lulusan_puas_smp + $lulusan_kurang_puas_smp + $lulusan_sangat_kurang_puas_smp;
    $total_responden_sma = $lulusan_sangat_puas_sma + $lulusan_puas_sma + $lulusan_kurang_puas_sma + $lulusan_sangat_kurang_puas_sma;
    $total_responden_diploma = $lulusan_sangat_puas_diploma + $lulusan_puas_diploma + $lulusan_kurang_puas_diploma + $lulusan_sangat_kurang_puas_diploma;
    $total_responden_sarjana = $lulusan_sangat_puas_sarjana + $lulusan_puas_sarjana + $lulusan_kurang_puas_sarjana + $lulusan_sangat_kurang_puas_sarjana;
    $total_responden_lulusan = $total_responden_sd + $total_responden_smp + $total_responden_sma + $total_responden_diploma + $total_responden_sarjana;

    // SQL Update Query for `lulusan` table
    $updateLulusanQuery = "
        UPDATE lulusan SET 
        sd_sangat_puas = ?, sd_puas = ?, sd_kurang_puas = ?, sd_sangat_kurang_puas = ?,
        smp_sangat_puas = ?, smp_puas = ?, smp_kurang_puas = ?, smp_sangat_kurang_puas = ?,
        sma_sangat_puas = ?, sma_puas = ?, sma_kurang_puas = ?, sma_sangat_kurang_puas = ?,
        diploma_sangat_puas = ?, diploma_puas = ?, diploma_kurang_puas = ?, diploma_sangat_kurang_puas = ?,
        sarjana_sangat_puas = ?, sarjana_puas = ?, sarjana_kurang_puas = ?, sarjana_sangat_kurang_puas = ?,
        total_responden_sd = ?, total_responden_smp = ?, total_responden_sma = ?, total_responden_diploma = ?, total_responden_sarjana = ?, total_responden_lulusan = ?
        WHERE id = ?
    ";

    if ($stmt = $conn->prepare($updateLulusanQuery)) {
        $stmt->bind_param(
            'iiiiiiiiiiiiiiiiiiiiiiiiiii',
            $lulusan_sangat_puas_sd, $lulusan_puas_sd, $lulusan_kurang_puas_sd, $lulusan_sangat_kurang_puas_sd,
            $lulusan_sangat_puas_smp, $lulusan_puas_smp, $lulusan_kurang_puas_smp, $lulusan_sangat_kurang_puas_smp,
            $lulusan_sangat_puas_sma, $lulusan_puas_sma, $lulusan_kurang_puas_sma, $lulusan_sangat_kurang_puas_sma,
            $lulusan_sangat_puas_diploma, $lulusan_puas_diploma, $lulusan_kurang_puas_diploma, $lulusan_sangat_kurang_puas_diploma,
            $lulusan_sangat_puas_sarjana, $lulusan_puas_sarjana, $lulusan_kurang_puas_sarjana, $lulusan_sangat_kurang_puas_sarjana,
            $total_responden_sd, $total_responden_smp, $total_responden_sma, $total_responden_diploma, $total_responden_sarjana, $total_responden_lulusan,
            $id
        );

        if ($stmt->execute()) {
            $success = true;
        } else {
            $error_message = "Failed to update education level data: " . $stmt->error;
        }
        $stmt->close();
    } else {
        $error_message = "Failed to prepare education level update query: " . $conn->error;
    }

    // Validate and sanitize profession inputs
    $profesi_sangat_puas_pns = validateInput($_POST['profesi_sangat_puas_pns']);
    $profesi_puas_pns = validateInput($_POST['profesi_puas_pns']);
    $profesi_kurang_puas_pns = validateInput($_POST['profesi_kurang_puas_pns']);
    $profesi_sangat_kurang_puas_pns = validateInput($_POST['profesi_sangat_kurang_puas_pns']);

    $profesi_sangat_puas_swasta_wiraswasta = validateInput($_POST['profesi_sangat_puas_swasta_wiraswasta']);
    $profesi_puas_swasta_wiraswasta = validateInput($_POST['profesi_puas_swasta_wiraswasta']);
    $profesi_kurang_puas_swasta_wiraswasta = validateInput($_POST['profesi_kurang_puas_swasta_wiraswasta']);
    $profesi_sangat_kurang_puas_swasta_wiraswasta = validateInput($_POST['profesi_sangat_kurang_puas_swasta_wiraswasta']);

    $profesi_sangat_puas_pelajar_mahasiswa = validateInput($_POST['profesi_sangat_puas_pelajar_mahasiswa']);
    $profesi_puas_pelajar_mahasiswa = validateInput($_POST['profesi_puas_pelajar_mahasiswa']);
    $profesi_kurang_puas_pelajar_mahasiswa = validateInput($_POST['profesi_kurang_puas_pelajar_mahasiswa']);
    $profesi_sangat_kurang_puas_pelajar_mahasiswa = validateInput($_POST['profesi_sangat_kurang_puas_pelajar_mahasiswa']);

    $profesi_sangat_puas_pengangguran = validateInput($_POST['profesi_sangat_puas_pengangguran']);
    $profesi_puas_pengangguran = validateInput($_POST['profesi_puas_pengangguran']);
    $profesi_kurang_puas_pengangguran = validateInput($_POST['profesi_kurang_puas_pengangguran']);
    $profesi_sangat_kurang_puas_pengangguran = validateInput($_POST['profesi_sangat_kurang_puas_pengangguran']);

    // Calculate totals
    $total_responden_pns = $profesi_sangat_puas_pns + $profesi_puas_pns + $profesi_kurang_puas_pns + $profesi_sangat_kurang_puas_pns;
    $total_responden_swasta_wiraswasta = $profesi_sangat_puas_swasta_wiraswasta + $profesi_puas_swasta_wiraswasta + $profesi_kurang_puas_swasta_wiraswasta + $profesi_sangat_kurang_puas_swasta_wiraswasta;
    $total_responden_pelajar_mahasiswa = $profesi_sangat_puas_pelajar_mahasiswa + $profesi_puas_pelajar_mahasiswa + $profesi_kurang_puas_pelajar_mahasiswa + $profesi_sangat_kurang_puas_pelajar_mahasiswa;
    $total_responden_pengangguran = $profesi_sangat_puas_pengangguran + $profesi_puas_pengangguran + $profesi_kurang_puas_pengangguran + $profesi_sangat_kurang_puas_pengangguran;
    $total_responden_profesi = $total_responden_pns + $total_responden_swasta_wiraswasta + $total_responden_pelajar_mahasiswa + $total_responden_pengangguran;

    // SQL Update Query for `profesi` table
    $updateProfesiQuery = "
        UPDATE profesi SET 
        pns_sangat_puas = ?, pns_puas = ?, pns_kurang_puas = ?, pns_sangat_kurang_puas = ?,
        swasta_wiraswasta_sangat_puas  = ?, swasta_wiraswasta_puas = ?, swasta_wiraswasta_kurang_puas = ?, swasta_wiraswasta_sangat_kurang_puas = ?,
        pelajar_mahasiswa_sangat_puas = ?, pelajar_mahasiswa_puas = ?, pelajar_mahasiswa_kurang_puas = ?, pelajar_mahasiswa_sangat_kurang_puas = ?,
        pengangguran_sangat_puas = ?, pengangguran_puas = ?, pengangguran_kurang_puas = ?, pengangguran_sangat_kurang_puas = ?,
        total_responden_pns = ?, total_responden_swasta_wiraswasta = ?, total_responden_pelajar_mahasiswa = ?, total_responden_pengangguran = ?, total_responden_profesi = ?
        WHERE id = ?
    ";

    if ($stmt = $conn->prepare($updateProfesiQuery)) {
        $stmt->bind_param(
            'iiiiiiiiiiiiiiiiiiiiii',
            $profesi_sangat_puas_pns, $profesi_puas_pns, $profesi_kurang_puas_pns, $profesi_sangat_kurang_puas_pns,
            $profesi_sangat_puas_swasta_wiraswasta, $profesi_puas_swasta_wiraswasta, $profesi_kurang_puas_swasta_wiraswasta, $profesi_sangat_kurang_puas_swasta_wiraswasta,
            $profesi_sangat_puas_pelajar_mahasiswa, $profesi_puas_pelajar_mahasiswa, $profesi_kurang_puas_pelajar_mahasiswa, $profesi_sangat_kurang_puas_pelajar_mahasiswa,
            $profesi_sangat_puas_pengangguran, $profesi_puas_pengangguran, $profesi_kurang_puas_pengangguran, $profesi_sangat_kurang_puas_pengangguran,
            $total_responden_pns, $total_responden_swasta_wiraswasta, $total_responden_pelajar_mahasiswa, $total_responden_pengangguran, $total_responden_profesi,
            $id
        );

        if ($stmt->execute()) {
            $success = true;
        } else {
            $error_message = "Failed to update profession data: " . $stmt->error;
        }
        $stmt->close();
    } else {
        $error_message = "Failed to prepare profession update query: " . $conn->error;
    }

      // Redirect based on the action
      if (isset($_POST['action'])) {
            if ($success) {
            $_SESSION['notification'] = "Data berhasil diperbarui.";
            if ($_POST['action'] === 'save') {
                  header("Location: Admin_Hasil_Survey.php");
            } elseif ($_POST['action'] === 'back') {
                  header("Location: Admin_Edit_Keterangan_Survey.php?id=" . htmlspecialchars($id));
            }
            exit();
            } else {
            // Handle error by showing an alert and going back to the previous page
            echo '<script>
                  alert("Gagal memperbarui data: ' . htmlspecialchars($error_message, ENT_QUOTES, 'UTF-8') . '");
                  window.history.back();
            </script>';
            exit();
            }
      }
}

if ($id > 0) {
          // Prepare and execute query for lulusan
          $stmt = $conn->prepare("SELECT * FROM lulusan WHERE id = ?");
          $stmt->bind_param("i", $id);
          $stmt->execute();
          $result = $stmt->get_result();
          $lulusan = $result->fetch_assoc();
          $stmt->close();
  
          // Prepare and execute query for profesi
          $stmt = $conn->prepare("SELECT * FROM profesi WHERE id = ?");
          $stmt->bind_param("i", $id);
          $stmt->execute();
          $result = $stmt->get_result();
          $profesi = $result->fetch_assoc();
          $stmt->close();
  
          // Prepare and execute query for gender
          $stmt = $conn->prepare("SELECT * FROM gender WHERE id = ?");
          $stmt->bind_param("i", $id);
          $stmt->execute();
          $result = $stmt->get_result();
          $gender = $result->fetch_assoc();
          $stmt->close();
  
          // Prepare and execute query for usia
          $stmt = $conn->prepare("SELECT * FROM usia WHERE id = ?");
          $stmt->bind_param("i", $id);
          $stmt->execute();
          $result = $stmt->get_result();
          $usia = $result->fetch_assoc();
          $stmt->close();
} else {
      echo '<script>
          alert("ID tidak valid.");
          window.location.href = "Admin_Hasil_Survey.php";
      </script>';
      exit();
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Tambah Survey - Halaman 2</title>
      <link rel="stylesheet" href="../CSS/Admin_Main.css">
      <link rel="stylesheet" href="../CSS/Admin_Tambah_Survey_Hal2.css">
      <script src="https://kit.fontawesome.com/ae643ea90b.js" crossorigin="anonymous"></script>
</head>

<body>
      <div id="header"></div>
      <div id="aside"></div>
      <main id="content">
            <section id="Tambah_Survey">
                  <i class="fa-solid fa-bars"></i>
                  <h2>Tambah Survey</h2>
            </section>
            <form method="post" action="">
                  <div class="keterangan">
                        <h3>Masukkan Data Survey Anda ke Dalam Kolom yang Tersedia di Tabel di Bawah Ini!</h3><br>
                        <p>Mohon untuk mengisi data survei dengan lengkap dan akurat pada kolom-kolom yang telah
                              disediakan di
                              tabel
                              di bawah ini. Data yang Anda berikan sangat berharga bagi kami untuk meningkatkan kualitas
                              layanan dan
                              memahami kebutuhan serta kepuasan Anda dengan lebih baik.</p>
                  </div>

                  <!-- Tabel Gender -->
                  <div class="table">
                        <h3>Gender</h3>
                        <table>
                              <thead>
                                    <tr>
                                          <th>Kategori</th>
                                          <th>Sangat Puas</th>
                                          <th>Puas</th>
                                          <th>Kurang Puas</th>
                                          <th>Sangat Kurang Puas</th>
                                    </tr>
                              </thead>
                              <tbody>
                                    <tr>
                                          <td>Laki-laki</td>
                                          <td><input type="number" name="gender_sangat_puas_laki" required
                                                      value="<?php echo htmlspecialchars($gender['laki_laki_sangat_puas']); ?>">
                                          </td>
                                          <td><input type="number" name="gender_puas_laki" required
                                                      value="<?php echo htmlspecialchars($gender['laki_laki_puas']); ?>">
                                          </td>
                                          <td><input type="number" name="gender_kurang_puas_laki" required
                                                      value="<?php echo htmlspecialchars($gender['laki_laki_kurang_puas']); ?>">
                                          </td>
                                          <td><input type="number" name="gender_sangat_kurang_puas_laki" required
                                                      value="<?php echo htmlspecialchars($gender['laki_laki_sangat_kurang_puas']); ?>">
                                          </td>
                                    </tr>
                                    <tr>
                                          <td>Perempuan</td>
                                          <td><input type="number" name="gender_sangat_puas_perempuan" required
                                                      value="<?php echo htmlspecialchars($gender['perempuan_sangat_puas']); ?>">
                                          </td>
                                          <td><input type="number" name="gender_puas_perempuan" required
                                                      value="<?php echo htmlspecialchars($gender['perempuan_puas']); ?>">
                                          </td>
                                          <td><input type="number" name="gender_kurang_puas_perempuan" required
                                                      value="<?php echo htmlspecialchars($gender['perempuan_kurang_puas']); ?>">
                                          </td>
                                          <td><input type="number" name="gender_sangat_kurang_puas_perempuan" required
                                                      value="<?php echo htmlspecialchars($gender['perempuan_sangat_kurang_puas']); ?>">
                                          </td>
                                    </tr>
                              </tbody>
                        </table>

                        <!-- Tabel Usia -->
                        <h3>Usia</h3>
                        <table>
                              <thead>
                                    <tr>
                                          <th>Kategori</th>
                                          <th>Sangat Puas</th>
                                          <th>Puas</th>
                                          <th>Kurang Puas</th>
                                          <th>Sangat Kurang Puas</th>
                                    </tr>
                              </thead>
                              <tbody>
                                    <tr>
                                          <td>18-35 Tahun</td>
                                          <td><input type="number" name="usia_sangat_puas_18_35" required
                                                      value="<?php echo htmlspecialchars($usia['18_35_sangat_puas']); ?>">
                                          </td>
                                          <td><input type="number" name="usia_puas_18_35" required
                                                      value="<?php echo htmlspecialchars($usia['18_35_puas']); ?>"></td>
                                          <td><input type="number" name="usia_kurang_puas_18_35" required
                                                      value="<?php echo htmlspecialchars($usia['18_35_kurang_puas']); ?>">
                                          </td>
                                          <td><input type="number" name="usia_sangat_kurang_puas_18_35" required
                                                      value="<?php echo htmlspecialchars($usia['18_35_sangat_kurang_puas']); ?>">
                                          </td>
                                    </tr>
                                    <tr>
                                          <td>36 Tahun ke atas</td>
                                          <td><input type="number" name="usia_sangat_puas_36_plus" required
                                                      value="<?php echo htmlspecialchars($usia['36_up_sangat_puas']); ?>">
                                          </td>
                                          <td><input type="number" name="usia_puas_36_plus" required
                                                      value="<?php echo htmlspecialchars($usia['36_up_puas']); ?>"></td>
                                          <td><input type="number" name="usia_kurang_puas_36_plus" required
                                                      value="<?php echo htmlspecialchars($usia['36_up_kurang_puas']); ?>">
                                          </td>
                                          <td><input type="number" name="usia_sangat_kurang_puas_36_plus" required
                                                      value="<?php echo htmlspecialchars($usia['36_up_sangat_kurang_puas']); ?>">
                                          </td>
                                    </tr>
                              </tbody>
                        </table>
                        <!-- Tabel Lulusan -->
                        <h3>Lulusan</h3>
                        <table>
                              <thead>
                                    <tr>
                                          <th>Kategori</th>
                                          <th>Sangat Puas</th>
                                          <th>Puas</th>
                                          <th>Kurang Puas</th>
                                          <th>Sangat Kurang Puas</th>
                                    </tr>
                              </thead>
                              <tbody>
                                    <tr>
                                          <td>SD</td>
                                          <td><input type="number" name="lulusan_sangat_puas_sd" required
                                                      value="<?php echo htmlspecialchars($lulusan['sd_sangat_puas']); ?>">
                                          </td>
                                          <td><input type="number" name="lulusan_puas_sd" required
                                                      value="<?php echo htmlspecialchars($lulusan['sd_puas']); ?>"></td>
                                          <td><input type="number" name="lulusan_kurang_puas_sd" required
                                                      value="<?php echo htmlspecialchars($lulusan['sd_kurang_puas']); ?>">
                                          </td>
                                          <td><input type="number" name="lulusan_sangat_kurang_puas_sd" required
                                                      value="<?php echo htmlspecialchars($lulusan['sd_sangat_kurang_puas']); ?>">
                                          </td>
                                    </tr>
                                    <tr>
                                          <td>SMP</td>
                                          <td><input type="number" name="lulusan_sangat_puas_smp" required
                                                      value="<?php echo htmlspecialchars($lulusan['smp_sangat_puas']); ?>">
                                          </td>
                                          <td><input type="number" name="lulusan_puas_smp" required
                                                      value="<?php echo htmlspecialchars($lulusan['smp_puas']); ?>">
                                          </td>
                                          <td><input type="number" name="lulusan_kurang_puas_smp" required
                                                      value="<?php echo htmlspecialchars($lulusan['smp_kurang_puas']); ?>">
                                          </td>
                                          <td><input type="number" name="lulusan_sangat_kurang_puas_smp" required
                                                      value="<?php echo htmlspecialchars($lulusan['smp_sangat_kurang_puas']); ?>">
                                          </td>
                                    </tr>
                                    <tr>
                                          <td>SMA</td>
                                          <td><input type="number" name="lulusan_sangat_puas_sma" required
                                                      value="<?php echo htmlspecialchars($lulusan['sma_sangat_puas']); ?>">
                                          </td>
                                          <td><input type="number" name="lulusan_puas_sma" required
                                                      value="<?php echo htmlspecialchars($lulusan['sma_puas']); ?>">
                                          </td>
                                          <td><input type="number" name="lulusan_kurang_puas_sma" required
                                                      value="<?php echo htmlspecialchars($lulusan['sma_kurang_puas']); ?>">
                                          </td>
                                          <td><input type="number" name="lulusan_sangat_kurang_puas_sma" required
                                                      value="<?php echo htmlspecialchars($lulusan['sma_sangat_kurang_puas']); ?>">
                                          </td>
                                    </tr>
                                    <tr>
                                          <td>Diploma</td>
                                          <td><input type="number" name="lulusan_sangat_puas_diploma" required
                                                      value="<?php echo htmlspecialchars($lulusan['diploma_sangat_puas']); ?>">
                                          </td>
                                          <td><input type="number" name="lulusan_puas_diploma" required
                                                      value="<?php echo htmlspecialchars($lulusan['diploma_puas']); ?>">
                                          </td>
                                          <td><input type="number" name="lulusan_kurang_puas_diploma" required
                                                      value="<?php echo htmlspecialchars($lulusan['diploma_kurang_puas']); ?>">
                                          </td>
                                          <td><input type="number" name="lulusan_sangat_kurang_puas_diploma" required
                                                      value="<?php echo htmlspecialchars($lulusan['diploma_sangat_kurang_puas']); ?>">
                                          </td>
                                    </tr>
                                    <tr>
                                          <td>S1/S2/S3</td>
                                          <td><input type="number" name="lulusan_sangat_puas_sarjana" required
                                                      value="<?php echo htmlspecialchars($lulusan['sarjana_sangat_puas']); ?>">
                                          </td>
                                          <td><input type="number" name="lulusan_puas_sarjana" required
                                                      value="<?php echo htmlspecialchars($lulusan['sarjana_puas']); ?>">
                                          </td>
                                          <td><input type="number" name="lulusan_kurang_puas_sarjana" required
                                                      value="<?php echo htmlspecialchars($lulusan['sarjana_kurang_puas']); ?>">
                                          </td>
                                          <td><input type="number" name="lulusan_sangat_kurang_puas_sarjana" required
                                                      value="<?php echo htmlspecialchars($lulusan['sarjana_sangat_kurang_puas']); ?>">
                                          </td>
                                    </tr>
                              </tbody>
                        </table>

                        <!-- Tabel Profesi -->
                        <h3>Profesi</h3>
                        <table>
                              <thead>
                                    <tr>
                                          <th>Kategori</th>
                                          <th>Sangat Puas</th>
                                          <th>Puas</th>
                                          <th>Kurang Puas</th>
                                          <th>Sangat Kurang Puas</th>
                                    </tr>
                              </thead>
                              <tbody>
                                    <tr>
                                          <td>PNS</td>
                                          <td><input type="number" name="profesi_sangat_puas_pns" required
                                                      value="<?php echo htmlspecialchars($profesi['pns_sangat_puas']); ?>">
                                          </td>
                                          <td><input type="number" name="profesi_puas_pns" required
                                                      value="<?php echo htmlspecialchars($profesi['pns_puas']); ?>">
                                          </td>
                                          <td><input type="number" name="profesi_kurang_puas_pns" required
                                                      value="<?php echo htmlspecialchars($profesi['pns_kurang_puas']); ?>">
                                          </td>
                                          <td><input type="number" name="profesi_sangat_kurang_puas_pns" required
                                                      value="<?php echo htmlspecialchars($profesi['pns_sangat_kurang_puas']); ?>">
                                          </td>
                                    </tr>
                                    <tr>
                                          <td>Swasta/Wiraswasta</td>
                                          <td><input type="number" name="profesi_sangat_puas_swasta_wiraswasta" required
                                                      value="<?php echo htmlspecialchars($profesi['swasta_wiraswasta_sangat_puas']); ?>">
                                          </td>
                                          <td><input type="number" name="profesi_puas_swasta_wiraswasta" required
                                                      value="<?php echo htmlspecialchars($profesi['swasta_wiraswasta_puas']); ?>">
                                          </td>
                                          <td><input type="number" name="profesi_kurang_puas_swasta_wiraswasta" required
                                                      value="<?php echo htmlspecialchars($profesi['swasta_wiraswasta_kurang_puas']); ?>">
                                          </td>
                                          <td><input type="number" name="profesi_sangat_kurang_puas_swasta_wiraswasta"
                                                      required
                                                      value="<?php echo htmlspecialchars($profesi['swasta_wiraswasta_sangat_kurang_puas']); ?>">
                                          </td>
                                    </tr>
                                    <tr>
                                          <td>Pelajar/Mahasiswa</td>
                                          <td><input type="number" name="profesi_sangat_puas_pelajar_mahasiswa" required
                                                      value="<?php echo htmlspecialchars($profesi['pelajar_mahasiswa_sangat_puas']); ?>">
                                          </td>
                                          <td><input type="number" name="profesi_puas_pelajar_mahasiswa" required
                                                      value="<?php echo htmlspecialchars($profesi['pelajar_mahasiswa_puas']); ?>">
                                          </td>
                                          <td><input type="number" name="profesi_kurang_puas_pelajar_mahasiswa" required
                                                      value="<?php echo htmlspecialchars($profesi['pelajar_mahasiswa_kurang_puas']); ?>">
                                          </td>
                                          <td><input type="number" name="profesi_sangat_kurang_puas_pelajar_mahasiswa"
                                                      required
                                                      value="<?php echo htmlspecialchars($profesi['pelajar_mahasiswa_sangat_kurang_puas']); ?>">
                                          </td>
                                    </tr>
                                    <tr>
                                          <td>Pengangguran</td>
                                          <td><input type="number" name="profesi_sangat_puas_pengangguran" required
                                                      value="<?php echo htmlspecialchars($profesi['pengangguran_sangat_puas']); ?>">
                                          </td>
                                          <td><input type="number" name="profesi_puas_pengangguran" required
                                                      value="<?php echo htmlspecialchars($profesi['pengangguran_puas']); ?>">
                                          </td>
                                          <td><input type="number" name="profesi_kurang_puas_pengangguran" required
                                                      value="<?php echo htmlspecialchars($profesi['pengangguran_kurang_puas']); ?>">
                                          </td>
                                          <td><input type="number" name="profesi_sangat_kurang_puas_pengangguran"
                                                      required
                                                      value="<?php echo htmlspecialchars($profesi['pengangguran_sangat_kurang_puas']); ?>">
                                          </td>
                                    </tr>
                              </tbody>
                        </table>
                  </div>
                  <div class="save">
                        <!-- Back Button Styled as a Button -->
                        <button type="submit" name="action" value="back" class="button-back">
                              <i class="fa-solid fa-arrow-left"></i>
                              <strong>Kembali</strong>
                        </button>

                        <!-- Save Button -->
                        <button type="submit" class="tombol-save" name="action" value="save">
                              <i class="fa-regular fa-floppy-disk"></i>
                              <strong>Simpan</strong>
                        </button>
            </form>
      </main>
      <script src="..\Js\Main.js"></script>
</body>

</html>