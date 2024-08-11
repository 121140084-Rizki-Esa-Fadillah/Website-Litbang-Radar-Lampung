<?php
include "Koneksi_survei_litbang.php";

// Cek apakah form telah dikirim
if ($_SERVER['REQUEST_METHOD'] == 'POST') { 
    
    // Tabel Gender
    $gender_sangat_puas_laki = $_POST['gender_sangat_puas_laki'];
    $gender_puas_laki = $_POST['gender_puas_laki'];
    $gender_kurang_puas_laki = $_POST['gender_kurang_puas_laki'];
    $gender_sangat_kurang_puas_laki = $_POST['gender_sangat_kurang_puas_laki'];

    $gender_sangat_puas_perempuan = $_POST['gender_sangat_puas_perempuan'];
    $gender_puas_perempuan = $_POST['gender_puas_perempuan'];
    $gender_kurang_puas_perempuan = $_POST['gender_kurang_puas_perempuan'];
    $gender_sangat_kurang_puas_perempuan = $_POST['gender_sangat_kurang_puas_perempuan'];

    $total_responden_laki_laki = $gender_sangat_puas_laki + $gender_puas_laki + $gender_kurang_puas_laki + $gender_sangat_kurang_puas_laki;
    $total_responden_perempuan = $gender_sangat_puas_perempuan + $gender_puas_perempuan + $gender_kurang_puas_perempuan + $gender_sangat_kurang_puas_perempuan;
    $total_responden_gender = $total_responden_laki_laki + $total_responden_perempuan;
    
    $total_sangat_puas_gender = $gender_sangat_puas_laki + $gender_sangat_puas_perempuan;
    $total_puas_gender = $gender_puas_laki + $gender_puas_perempuan;
    $total_kurang_puas_gender = $gender_kurang_puas_laki + $gender_kurang_puas_perempuan;
    $total_sangat_kurang_puas_gender = $gender_sangat_kurang_puas_laki + $gender_sangat_kurang_puas_perempuan; 

    $persentase_sangat_puas_gender = $total_sangat_puas_gender / $total_responden_gender * 100;
    $persentase_puas_gender = $total_puas_gender / $total_responden_gender * 100;    
    $persentase_kurang_puas_gender = $total_kurang_puas_gender / $total_responden_gender * 100;
    $persentase_sangat_kurang_puas_gender =$total_sangat_kurang_puas_gender / $total_responden_gender * 100; 
    $total_persentase_gender = $persentase_sangat_puas_gender + $persentase_puas_gender + $persentase_kurang_puas_gender + $persentase_sangat_kurang_puas_gender;
    
    
    // Tabel Usia
    $usia_sangat_puas_18_35 = $_POST['usia_sangat_puas_18_35'];
    $usia_puas_18_35 = $_POST['usia_puas_18_35'];
    $usia_kurang_puas_18_35 = $_POST['usia_kurang_puas_18_35'];
    $usia_sangat_kurang_puas_18_35 = $_POST['usia_sangat_kurang_puas_18_35'];
    
    $usia_sangat_puas_36_plus = $_POST['usia_sangat_puas_36_plus'];
    $usia_puas_36_plus = $_POST['usia_puas_36_plus'];
    $usia_kurang_puas_36_plus = $_POST['usia_kurang_puas_36_plus'];
    $usia_sangat_kurang_puas_36_plus = $_POST['usia_sangat_kurang_puas_36_plus'];

    $total_responden_18_35 = $usia_sangat_puas_18_35 + $usia_puas_18_35 + $usia_kurang_puas_18_35 + $usia_sangat_kurang_puas_18_35;
    $total_responden_36_up = $usia_sangat_puas_36_plus + $usia_puas_36_plus + $usia_kurang_puas_36_plus + $usia_sangat_kurang_puas_36_plus;
    $total_responden_usia = $total_responden_18_35 + $total_responden_36_up;

    $total_sangat_puas_usia = $usia_sangat_puas_18_35 + $usia_sangat_puas_36_plus;
    $total_puas_usia = $usia_puas_18_35 + $usia_puas_36_plus;
    $total_kurang_puas_usia = $usia_kurang_puas_18_35 + $usia_kurang_puas_36_plus;
    $total_sangat_kurang_puas_usia = $usia_sangat_kurang_puas_18_35 + $usia_sangat_kurang_puas_36_plus;
    
    $persentase_sangat_puas_usia= $total_sangat_puas_usia/ $total_responden_usia* 100;
    $persentase_puas_usia= $total_puas_usia/ $total_responden_usia* 100;    
    $persentase_kurang_puas_usia= $total_kurang_puas_usia/ $total_responden_usia* 100;
    $persentase_sangat_kurang_puas_usia= $total_sangat_kurang_puas_usia/ $total_responden_usia* 100;
    $total_persentase_usia= $persentase_sangat_puas_usia+ $persentase_puas_usia+ $persentase_kurang_puas_gender + $persentase_sangat_kurang_puas_gender;

    
    // Tabel Lulusan
    $lulusan_sangat_puas_sd = $_POST['lulusan_sangat_puas_sd'];
    $lulusan_puas_sd = $_POST['lulusan_puas_sd'];
    $lulusan_kurang_puas_sd = $_POST['lulusan_kurang_puas_sd'];
    $lulusan_sangat_kurang_puas_sd = $_POST['lulusan_sangat_kurang_puas_sd'];
    
    $lulusan_sangat_puas_smp = $_POST['lulusan_sangat_puas_smp'];
    $lulusan_puas_smp = $_POST['lulusan_puas_smp'];
    $lulusan_kurang_puas_smp = $_POST['lulusan_kurang_puas_smp'];
    $lulusan_sangat_kurang_puas_smp = $_POST['lulusan_sangat_kurang_puas_smp'];

    $lulusan_sangat_puas_sma = $_POST['lulusan_sangat_puas_sma'];
    $lulusan_puas_sma = $_POST['lulusan_puas_sma'];
    $lulusan_kurang_puas_sma = $_POST['lulusan_kurang_puas_sma'];
    $lulusan_sangat_kurang_puas_sma = $_POST['lulusan_sangat_kurang_puas_sma'];

    $lulusan_sangat_puas_diploma = $_POST['lulusan_sangat_puas_diploma'];
    $lulusan_puas_diploma = $_POST['lulusan_puas_diploma'];
    $lulusan_kurang_puas_diploma = $_POST['lulusan_kurang_puas_diploma'];
    $lulusan_sangat_kurang_puas_diploma = $_POST['lulusan_sangat_kurang_puas_diploma'];

    $lulusan_sangat_puas_sarjana = $_POST['lulusan_sangat_puas_sarjana'];
    $lulusan_puas_sarjana = $_POST['lulusan_puas_sarjana'];
    $lulusan_kurang_puas_sarjana = $_POST['lulusan_kurang_puas_sarjana'];
    $lulusan_sangat_kurang_puas_sarjana = $_POST['lulusan_sangat_kurang_puas_sarjana'];
    
    $total_responden_sd = $lulusan_sangat_puas_sd + $lulusan_puas_sd + $lulusan_kurang_puas_sd + $lulusan_sangat_kurang_puas_sd;
    $total_responden_smp = $lulusan_sangat_puas_smp + $lulusan_puas_smp + $lulusan_kurang_puas_smp + $lulusan_sangat_kurang_puas_smp;
    $total_responden_sma = $lulusan_sangat_puas_sma + $lulusan_puas_sma + $lulusan_kurang_puas_sma + $lulusan_sangat_kurang_puas_sma;
    $total_responden_diploma = $lulusan_sangat_puas_diploma + $lulusan_puas_diploma + $lulusan_kurang_puas_diploma + $lulusan_sangat_kurang_puas_diploma;
    $total_responden_sarjana = $lulusan_sangat_puas_sarjana + $lulusan_puas_sarjana + $lulusan_kurang_puas_sarjana + $lulusan_sangat_kurang_puas_sarjana;
    $total_responden_lulusan = $total_responden_sd + $total_responden_smp + $total_responden_sma + $total_responden_diploma + $total_responden_sarjana;
    
    $total_sangat_puas_lulusan = $lulusan_sangat_puas_sd + $lulusan_sangat_puas_smp + $lulusan_sangat_puas_sma + $lulusan_sangat_puas_diploma + $lulusan_sangat_puas_sarjana;
    $total_puas_lulusan = $lulusan_puas_sd + $lulusan_puas_smp + $lulusan_puas_sma + $lulusan_puas_diploma + $lulusan_puas_sarjana;
    $total_kurang_puas_lulusan = $lulusan_kurang_puas_sd + $lulusan_kurang_puas_smp + $lulusan_kurang_puas_sma + $lulusan_kurang_puas_diploma + $lulusan_kurang_puas_sarjana;
    $total_sangat_kurang_puas_lulusan =  $lulusan_sangat_kurang_puas_sd + $lulusan_sangat_kurang_puas_smp + $lulusan_sangat_kurang_puas_sma + $lulusan_sangat_kurang_puas_diploma + $lulusan_sangat_kurang_puas_sarjana;
    
    $persentase_sangat_puas_lulusan= $total_sangat_puas_lulusan/ $total_responden_lulusan* 100;
    $persentase_puas_lulusan= $total_puas_lulusan/ $total_responden_lulusan* 100;    
    $persentase_kurang_puas_lulusan= $total_kurang_puas_lulusan/ $total_responden_lulusan* 100;
    $persentase_sangat_kurang_puas_lulusan= $total_sangat_kurang_puas_lulusan/ $total_responden_lulusan* 100;
    $total_persentase_lulusan= $persentase_sangat_puas_lulusan+ $persentase_puas_lulusan+ $persentase_kurang_puas_lulusan+ $persentase_sangat_kurang_puas_lulusan;

    
    // Tabel Profesi
    $profesi_sangat_puas_pns = $_POST['profesi_sangat_puas_pns'];
    $profesi_puas_pns = $_POST['profesi_puas_pns'];
    $profesi_kurang_puas_pns = $_POST['profesi_kurang_puas_pns'];
    $profesi_sangat_kurang_puas_pns = $_POST['profesi_sangat_kurang_puas_pns'];

    $profesi_sangat_puas_swasta_wiraswasta = $_POST['profesi_sangat_puas_swasta'];
    $profesi_puas_swasta_wiraswasta = $_POST['profesi_puas_swasta'];
    $profesi_kurang_puas_swasta_wiraswasta = $_POST['profesi_kurang_puas_swasta'];
    $profesi_sangat_kurang_puas_swasta_wiraswasta = $_POST['profesi_sangat_kurang_puas_swasta'];

    $profesi_sangat_puas_pelajar_mahasiswa = $_POST['profesi_sangat_puas_pelajar'];
    $profesi_puas_pelajar_mahasiswa = $_POST['profesi_puas_pelajar'];
    $profesi_kurang_puas_pelajar_mahasiswa = $_POST['profesi_kurang_puas_pelajar'];
    $profesi_sangat_kurang_puas_pelajar_mahasiswa = $_POST['profesi_sangat_kurang_puas_pelajar'];

    $profesi_sangat_puas_pengangguran = $_POST['profesi_sangat_puas_pengangguran'];
    $profesi_puas_pengangguran = $_POST['profesi_puas_pengangguran'];
    $profesi_kurang_puas_pengangguran = $_POST['profesi_kurang_puas_pengangguran'];
    $profesi_sangat_kurang_puas_pengangguran = $_POST['profesi_sangat_kurang_puas_pengangguran'];
    
    $total_responden_pns = $profesi_sangat_puas_pns + $profesi_puas_pns + $profesi_kurang_puas_pns + $profesi_sangat_kurang_puas_pns ; 
    $total_responden_swasta_wiraswasta  = $profesi_sangat_puas_swasta_wiraswasta + $profesi_puas_swasta_wiraswasta + $profesi_kurang_puas_swasta_wiraswasta + $profesi_sangat_kurang_puas_swasta_wiraswasta;
    $total_responden_pelajar_mahasiswa = $profesi_sangat_puas_pelajar_mahasiswa + $profesi_puas_pelajar_mahasiswa + $profesi_kurang_puas_pelajar_mahasiswa + $profesi_sangat_kurang_puas_pelajar_mahasiswa; 
    $total_responden_pengangguran = $profesi_sangat_puas_pengangguran + $profesi_puas_pengangguran + $profesi_kurang_puas_pengangguran + $profesi_sangat_kurang_puas_pengangguran;
    $total_responden_profesi = $total_responden_pns + $total_responden_swasta_wiraswasta + $total_responden_pelajar_mahasiswa + $total_responden_pengangguran;
    
    $total_sangat_puas_profesi = $profesi_sangat_puas_pns + $profesi_sangat_puas_swasta_wiraswasta + $profesi_sangat_puas_pelajar_mahasiswa  + $profesi_sangat_puas_pengangguran;
    $total_puas_profesi = $profesi_puas_pns + $profesi_puas_swasta_wiraswasta + $profesi_puas_pelajar_mahasiswa  + $profesi_puas_pengangguran;
    $total_kurang_puas_profesi = $profesi_kurang_puas_pns + $profesi_kurang_puas_swasta_wiraswasta + $profesi_kurang_puas_pelajar_mahasiswa  + $profesi_kurang_puas_pengangguran;
    $total_sangat_kurang_puas_profesi = $profesi_sangat_kurang_puas_pns  + $profesi_sangat_kurang_puas_swasta_wiraswasta + $profesi_sangat_kurang_puas_pelajar_mahasiswa  + $profesi_sangat_kurang_puas_pengangguran;
    
    $persentase_sangat_puas_profesi= $total_sangat_puas_profesi/ $total_responden_profesi* 100;
    $persentase_puas_profesi= $total_puas_profesi/ $total_responden_profesi* 100;    
    $persentase_kurang_puas_profesi= $total_kurang_puas_profesi/ $total_responden_profesi* 100;
    $persentase_sangat_kurang_puas_profesi= $total_sangat_kurang_puas_profesi/ $total_responden_profesi* 100;
    $total_persentase_profesi= $persentase_sangat_puas_profesi+ $persentase_puas_profesi+ $persentase_kurang_puas_profesi+ $persentase_sangat_kurang_puas_gender;

                              
    // Simpan data ke database
    $query1 = "INSERT INTO gender (laki_laki_sangat_puas, laki_laki_puas, laki_laki_kurang_puas, laki_laki_sangat_kurang_puas, perempuan_sangat_puas, perempuan_puas, perempuan_kurang_puas, perempuan_sangat_kurang_puas, total_responden_laki_laki, total_responden_perempuan, total_responden_gender, total_sangat_puas_gender, total_puas_gender, total_kurang_puas_gender, total_sangat_kurang_puas_gender, persentase_sangat_puas_gender, persentase_puas_gender, persentase_kurang_puas_gender, persentase_sangat_kurang_puas_gender, total_persentase_gender) 
               VALUES ('$gender_sangat_puas_laki', '$gender_puas_laki', '$gender_kurang_puas_laki', '$gender_sangat_kurang_puas_laki', '$gender_sangat_puas_perempuan', '$gender_puas_perempuan', '$gender_kurang_puas_perempuan', '$gender_sangat_kurang_puas_perempuan', '$total_responden_laki_laki', '$total_responden_perempuan', '$total_responden_gender', ' $total_sangat_puas_gender', '$total_puas_gender', '$total_kurang_puas_gender', '$total_sangat_kurang_puas_gender', '$persentase_sangat_puas_gender','$persentase_puas_gender', '$persentase_kurang_puas_gender', '$persentase_sangat_kurang_puas_gender', '$total_persentase_gender')";

    $query2 = "INSERT INTO usia (18_35_sangat_puas, 18_35_puas, 18_35_kurang_puas,18_35_sangat_kurang_puas, 36_up_sangat_puas, 36_up_puas, 36_up_kurang_puas, 36_up_sangat_kurang_puas, total_responden_18_35, total_responden_36_up, total_responden_usia, total_sangat_puas_usia, total_puas_usia, total_kurang_puas_usia, total_sangat_kurang_puas_usia, persentase_sangat_puas_usia, persentase_puas_usia, persentase_kurang_puas_usia, persentase_sangat_kurang_puas_usia, total_persentase_usia)
               VALUES ('$usia_sangat_puas_18_35', '$usia_puas_18_35', '$usia_kurang_puas_18_35', '$usia_sangat_kurang_puas_18_35', '$usia_sangat_puas_36_plus', '$usia_puas_36_plus', '$usia_kurang_puas_36_plus', '$usia_sangat_kurang_puas_36_plus', ' $total_responden_18_35', '$total_responden_36_up', '$total_responden_usia', '$total_sangat_puas_usia', '$total_puas_usia', '$total_kurang_puas_usia', '$total_sangat_kurang_puas_usia', '$persentase_sangat_puas_usia', '$persentase_puas_usia', '$persentase_kurang_puas_usia', '$persentase_sangat_kurang_puas_usia', '$total_persentase_usia')";

    $query3 = "INSERT INTO lulusan (sd_sangat_puas, sd_puas, sd_kurang_puas, sd_sangat_kurang_puas, smp_sangat_puas, smp_puas, smp_kurang_puas, smp_sangat_kurang_puas, sma_sangat_puas, sma_puas, sma_kurang_puas, sma_sangat_kurang_puas, diploma_sangat_puas, diploma_puas, diploma_kurang_puas, diploma_sangat_kurang_puas, sarjana_sangat_puas, sarjana_puas, sarjana_kurang_puas, sarjana_sangat_kurang_puas, total_responden_sd, total_responden_smp, total_responden_sma, total_responden_diploma, total_responden_sarjana, total_responden_lulusan, total_sangat_puas_lulusan, total_puas_lulusan, total_kurang_puas_lulusan, total_sangat_kurang_puas_lulusan, persentase_sangat_puas_lulusan, persentase_puas_lulusan, persentase_kurang_puas_lulusan, persentase_sangat_kurang_puas_lulusan, total_persentase_lulusan) 
               VALUES ('$lulusan_sangat_puas_sd', '$lulusan_puas_sd', '$lulusan_kurang_puas_sd', '$lulusan_sangat_kurang_puas_sd', '$lulusan_sangat_puas_smp', '$lulusan_puas_smp', '$lulusan_kurang_puas_smp', '$lulusan_sangat_kurang_puas_smp', '$lulusan_sangat_puas_sma', '$lulusan_puas_sma', '$lulusan_kurang_puas_sma', '$lulusan_sangat_kurang_puas_sma', '$lulusan_sangat_puas_diploma', '$lulusan_puas_diploma', '$lulusan_kurang_puas_diploma', '$lulusan_sangat_kurang_puas_diploma', '$lulusan_sangat_puas_sarjana', '$lulusan_puas_sarjana', '$lulusan_kurang_puas_sarjana', '$lulusan_sangat_kurang_puas_sarjana', '$total_responden_sd', '$total_responden_smp', '$total_responden_sma', '$total_responden_diploma', '$total_responden_sarjana', '$total_responden_lulusan', '$total_sangat_puas_lulusan', '$total_puas_lulusan', '$total_kurang_puas_lulusan', '$total_sangat_kurang_puas_lulusan', '$persentase_sangat_puas_lulusan', '$persentase_puas_lulusan', '$persentase_kurang_puas_lulusan', '$persentase_sangat_kurang_puas_lulusan', '$total_persentase_lulusan')";

    $query4 = "INSERT INTO profesi (pns_sangat_puas, pns_puas, pns_kurang_puas, pns_sangat_kurang_puas, swasta_wiraswasta_sangat_puas, swasta_wiraswasta_puas, swasta_wiraswasta_kurang_puas, swasta_wiraswasta_sangat_kurang_puas, pelajar_mahasiswa_sangat_puas, pelajar_mahasiswa_puas, pelajar_mahasiswa_kurang_puas, pelajar_mahasiswa_sangat_kurang_puas, pengangguran_sangat_puas, pengangguran_puas, pengangguran_kurang_puas, pengangguran_sangat_kurang_puas, total_responden_pns, total_responden_swasta_wiraswasta, total_responden_pelajar_mahasiswa, total_responden_pengangguran, total_responden_profesi, total_sangat_puas_profesi, total_puas_profesi, total_kurang_puas_profesi, total_sangat_kurang_puas_profesi, persentase_sangat_puas_profesi, persentase_puas_profesi, persentase_kurang_puas_profesi, persentase_sangat_kurang_puas_profesi, total_persentase_profesi) 
               VALUES ('$profesi_sangat_puas_pns', '$profesi_puas_pns', '$profesi_kurang_puas_pns', '$profesi_sangat_kurang_puas_pns', '$profesi_sangat_puas_swasta_wiraswasta', '$profesi_puas_swasta_wiraswasta', '$profesi_kurang_puas_swasta_wiraswasta', ' $profesi_sangat_kurang_puas_swasta_wiraswasta', '$profesi_sangat_puas_pelajar_mahasiswa', '$profesi_puas_pelajar_mahasiswa', '$profesi_kurang_puas_pelajar_mahasiswa', ' $profesi_sangat_kurang_puas_pelajar_mahasiswa', '$profesi_sangat_puas_pengangguran', '$profesi_puas_pengangguran', '$profesi_kurang_puas_pengangguran', '$profesi_sangat_kurang_puas_pengangguran', '$total_responden_pns', '$total_responden_swasta_wiraswasta', '$total_responden_pelajar_mahasiswa', '$total_responden_pengangguran', '$total_responden_profesi', '$total_sangat_puas_profesi', '$total_puas_profesi','$total_kurang_puas_profesi', '$total_sangat_kurang_puas_profesi', '$persentase_sangat_puas_profesi', '$persentase_puas_profesi', '$persentase_kurang_puas_profesi', '$persentase_sangat_kurang_puas_profesi', '$total_persentase_profesi')";

    if (mysqli_query($conn, $query1) && mysqli_query($conn, $query2) && mysqli_query($conn, $query3) && mysqli_query($conn, $query4)) {
        header('Location: ../HTML/Admin_Main.html?page=../php/Admin_Tambah_Survey_Hal3.php&status=success');
        exit();
    } else {
        echo "Gagal menyimpan data: " . mysqli_error($conn);
    }

    // Tutup koneksi
    mysqli_close($conn);
}
?>