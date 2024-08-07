<?php
include "Koneksi_survei_litbang.php";

// Cek apakah form telah dikirim
if ($_SERVER['REQUEST_METHOD'] == 'POST') { 
    
    // Tabel Gender
    $gender_sangat_puas_laki = $_POST['gender_sangat_puas_laki'];
    $gender_puas_laki = $_POST['gender_puas_laki'];
    $gender_kurang_puas_laki = $_POST['gender_kurang_puas_laki'];
    
    $gender_sangat_puas_perempuan = $_POST['gender_sangat_puas_perempuan'];
    $gender_puas_perempuan = $_POST['gender_puas_perempuan'];
    $gender_kurang_puas_perempuan = $_POST['gender_kurang_puas_perempuan'];
    
    $total_responden_gender = $gender_sangat_puas_laki + $gender_puas_laki + $gender_kurang_puas_laki +
                              $gender_sangat_puas_perempuan + $gender_puas_perempuan + $gender_kurang_puas_perempuan;
    
    // Tabel Usia
    $usia_sangat_puas_18_35 = $_POST['usia_sangat_puas_18_35'];
    $usia_puas_18_35 = $_POST['usia_puas_18_35'];
    $usia_kurang_puas_18_35 = $_POST['usia_kurang_puas_18_35'];
    
    $usia_sangat_puas_36_plus = $_POST['usia_sangat_puas_36_plus'];
    $usia_puas_36_plus = $_POST['usia_puas_36_plus'];
    $usia_kurang_puas_36_plus = $_POST['usia_kurang_puas_36_plus'];
    
    $total_responden_usia = $usia_sangat_puas_18_35 + $usia_puas_18_35 + $usia_kurang_puas_18_35 +
                            $usia_sangat_puas_36_plus + $usia_puas_36_plus + $usia_kurang_puas_36_plus;
    
    // Tabel Lulusan
    $lulusan_sangat_puas_sd = $_POST['lulusan_sangat_puas_sd'];
    $lulusan_puas_sd = $_POST['lulusan_puas_sd'];
    $lulusan_kurang_puas_sd = $_POST['lulusan_kurang_puas_sd'];
    
    $lulusan_sangat_puas_smp = $_POST['lulusan_sangat_puas_smp'];
    $lulusan_puas_smp = $_POST['lulusan_puas_smp'];
    $lulusan_kurang_puas_smp = $_POST['lulusan_kurang_puas_smp'];

    $lulusan_sangat_puas_sma = $_POST['lulusan_sangat_puas_sma'];
    $lulusan_puas_sma = $_POST['lulusan_puas_sma'];
    $lulusan_kurang_puas_sma = $_POST['lulusan_kurang_puas_sma'];

    $lulusan_sangat_puas_diploma = $_POST['lulusan_sangat_puas_diploma'];
    $lulusan_puas_diploma = $_POST['lulusan_puas_diploma'];
    $lulusan_kurang_puas_diploma = $_POST['lulusan_kurang_puas_diploma'];

    $lulusan_sangat_puas_sarjana = $_POST['lulusan_sangat_puas_sarjana'];
    $lulusan_puas_sarjana = $_POST['lulusan_puas_sarjana'];
    $lulusan_kurang_puas_sarjana = $_POST['lulusan_kurang_puas_sarjana'];
    
    $total_responden_lulusan = $lulusan_sangat_puas_sd + $lulusan_puas_sd + $lulusan_kurang_puas_sd +
                              $lulusan_sangat_puas_smp + $lulusan_puas_smp + $lulusan_kurang_puas_smp +
                              $lulusan_sangat_puas_sma + $lulusan_puas_sma + $lulusan_kurang_puas_sma +
                              $lulusan_sangat_puas_diploma + $lulusan_puas_diploma + $lulusan_kurang_puas_diploma +
                              $lulusan_sangat_puas_sarjana + $lulusan_puas_sarjana + $lulusan_kurang_puas_sarjana;
    
    // Tabel Profesi
    $profesi_sangat_puas_pns = $_POST['profesi_sangat_puas_pns'];
    $profesi_puas_pns = $_POST['profesi_puas_pns'];
    $profesi_kurang_puas_pns = $_POST['profesi_kurang_puas_pns'];

    $profesi_sangat_puas_swasta = $_POST['profesi_sangat_puas_swasta'];
    $profesi_puas_swasta = $_POST['profesi_puas_swasta'];
    $profesi_kurang_puas_swasta = $_POST['profesi_kurang_puas_swasta'];

    $profesi_sangat_puas_pelajar = $_POST['profesi_sangat_puas_pelajar'];
    $profesi_puas_pelajar = $_POST['profesi_puas_pelajar'];
    $profesi_kurang_puas_pelajar = $_POST['profesi_kurang_puas_pelajar'];

    $profesi_sangat_puas_pengangguran = $_POST['profesi_sangat_puas_pengangguran'];
    $profesi_puas_pengangguran = $_POST['profesi_puas_pengangguran'];
    $profesi_kurang_puas_pengangguran = $_POST['profesi_kurang_puas_pengangguran'];

    $total_responden_profesi = $profesi_sangat_puas_pns + $profesi_puas_pns + $profesi_kurang_puas_pns +
                              $profesi_sangat_puas_swasta + $profesi_puas_swasta + $profesi_kurang_puas_swasta +
                              $profesi_sangat_puas_pelajar + $profesi_puas_pelajar + $profesi_kurang_puas_pelajar +
                              $profesi_sangat_puas_pengangguran + $profesi_puas_pengangguran + $profesi_kurang_puas_pengangguran;

    // Simpan data ke database
    $query1 = "INSERT INTO gender (laki_laki_sangat_puas, laki_laki_puas, laki_laki_kurang_puas, perempuan_sangat_puas, perempuan_puas, perempuan_kurang_puas, total_responden) 
               VALUES ('$gender_sangat_puas_laki', '$gender_puas_laki', '$gender_kurang_puas_laki', '$gender_sangat_puas_perempuan', '$gender_puas_perempuan', '$gender_kurang_puas_perempuan', '$total_responden_gender')";

    $query2 = "INSERT INTO usia (18_35_sangat_puas, 18_35_puas, 18_35_kurang_puas, 36_up_sangat_puas, 36_up_puas, 36_up_kurang_puas, total_responden)
               VALUES ('$usia_sangat_puas_18_35', '$usia_puas_18_35', '$usia_kurang_puas_18_35', '$usia_sangat_puas_36_plus', '$usia_puas_36_plus', '$usia_kurang_puas_36_plus', '$total_responden_usia')";

    $query3 = "INSERT INTO lulusan (sd_sangat_puas, sd_puas, sd_kurang_puas, smp_sangat_puas, smp_puas, smp_kurang_puas, sma_sangat_puas, sma_puas, sma_kurang_puas, diploma_sangat_puas, diploma_puas, diploma_kurang_puas, sarjana_sangat_puas, sarjana_puas, sarjana_kurang_puas, total_responden) 
               VALUES ('$lulusan_sangat_puas_sd', '$lulusan_puas_sd', '$lulusan_kurang_puas_sd', '$lulusan_sangat_puas_smp', '$lulusan_puas_smp', '$lulusan_kurang_puas_smp', '$lulusan_sangat_puas_sma', '$lulusan_puas_sma', '$lulusan_kurang_puas_sma', '$lulusan_sangat_puas_diploma', '$lulusan_puas_diploma', '$lulusan_kurang_puas_diploma', '$lulusan_sangat_puas_sarjana', '$lulusan_puas_sarjana', '$lulusan_kurang_puas_sarjana', '$total_responden_lulusan')";

    $query4 = "INSERT INTO profesi (pns_sangat_puas, pns_puas, pns_kurang_puas, swasta_wiraswasta_sangat_puas, swasta_wiraswasta_puas, swasta_wiraswasta_kurang_puas, pelajar_mahasiswa_sangat_puas, pelajar_mahasiswa_puas, pelajar_mahasiswa_kurang_puas, pengangguran_sangat_puas, pengangguran_puas, pengangguran_kurang_puas, total_responden) 
               VALUES ('$profesi_sangat_puas_pns', '$profesi_puas_pns', '$profesi_kurang_puas_pns', '$profesi_sangat_puas_swasta', '$profesi_puas_swasta', '$profesi_kurang_puas_swasta', '$profesi_sangat_puas_pelajar', '$profesi_puas_pelajar', '$profesi_kurang_puas_pelajar', '$profesi_sangat_puas_pengangguran', '$profesi_puas_pengangguran', '$profesi_kurang_puas_pengangguran', '$total_responden_profesi')";

    if (mysqli_query($conn, $query1) &&
        mysqli_query($conn, $query2) &&
        mysqli_query($conn, $query3) &&
        mysqli_query($conn, $query4)) {
        // Redirect to Admin_Main.html with query parameters
        header('Location: ../HTML/Admin_Main.html?page=../php/Admin_Tambah_Survey_Hal3.php&status=success');
        exit();
    } else {
        echo "Gagal menyimpan data: " . mysqli_error($conn);
    }

    // Tutup koneksi
    mysqli_close($conn);
}
?>