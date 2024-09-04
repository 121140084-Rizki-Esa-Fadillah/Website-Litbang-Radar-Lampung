<?php
session_start(); // Start the session

unset(
      $_SESSION['id'], 
      $_SESSION['judul-survey'], 
      $_SESSION['keterangan'], 
      $_SESSION['id_wilayah'], 
      $_SESSION['image'],

      $_SESSION['gender_sangat_puas_laki'], 
      $_SESSION['gender_puas_laki'], 
      $_SESSION['gender_kurang_puas_laki'], 
      $_SESSION['gender_sangat_kurang_puas_laki'],
      $_SESSION['gender_sangat_puas_perempuan'], 
      $_SESSION['gender_puas_perempuan'], 
      $_SESSION['gender_kurang_puas_perempuan'], 
      $_SESSION['gender_sangat_kurang_puas_perempuan'],

      $_SESSION['total_responden_laki_laki'], 
      $_SESSION['total_responden_perempuan'], 
      $_SESSION['total_responden_gender'],

      $_SESSION['usia_sangat_puas_18_35'], 
      $_SESSION['usia_puas_18_35'], 
      $_SESSION['usia_kurang_puas_18_35'], 
      $_SESSION['usia_sangat_kurang_puas_18_35'],

      $_SESSION['usia_sangat_puas_36_plus'], 
      $_SESSION['usia_puas_36_plus'], 
      $_SESSION['usia_kurang_puas_36_plus'], 
      $_SESSION['usia_sangat_kurang_puas_36_plus'],

      $_SESSION['total_responden_18_35'], 
      $_SESSION['total_responden_36_up'], 
      $_SESSION['total_responden_usia'],

      $_SESSION['lulusan_sangat_puas_sd'], 
      $_SESSION['lulusan_puas_sd'], 
      $_SESSION['lulusan_kurang_puas_sd'], 
      $_SESSION['lulusan_sangat_kurang_puas_sd'],

      $_SESSION['lulusan_sangat_puas_smp'], 
      $_SESSION['lulusan_puas_smp'], 
      $_SESSION['lulusan_kurang_puas_smp'], 
      $_SESSION['lulusan_sangat_kurang_puas_smp'],

      $_SESSION['lulusan_sangat_puas_sma'], 
      $_SESSION['lulusan_puas_sma'], 
      $_SESSION['lulusan_kurang_puas_sma'], 
      $_SESSION['lulusan_sangat_kurang_puas_sma'],

      $_SESSION['lulusan_sangat_puas_diploma'], 
      $_SESSION['lulusan_puas_diploma'], 
      $_SESSION['lulusan_kurang_puas_diploma'], 
      $_SESSION['lulusan_sangat_kurang_puas_diploma'],

      $_SESSION['lulusan_sangat_puas_sarjana'], 
      $_SESSION['lulusan_puas_sarjana'], 
      $_SESSION['lulusan_kurang_puas_sarjana'], 
      $_SESSION['lulusan_sangat_kurang_puas_sarjana'],

      $_SESSION['total_responden_sd'], 
      $_SESSION['total_responden_smp'], 
      $_SESSION['total_responden_sma'], 
      $_SESSION['total_responden_diploma'], 
      $_SESSION['total_responden_sarjana'], 
      $_SESSION['total_responden_lulusan'],

      $_SESSION['profesi_sangat_puas_pns'], 
      $_SESSION['profesi_puas_pns'], 
      $_SESSION['profesi_kurang_puas_pns'], 
      $_SESSION['profesi_sangat_kurang_puas_pns'],

      $_SESSION['profesi_sangat_puas_swasta_wiraswasta'], 
      $_SESSION['profesi_puas_swasta_wiraswasta'], 
      $_SESSION['profesi_kurang_puas_swasta_wiraswasta'], 
      $_SESSION['profesi_sangat_kurang_puas_swasta_wiraswasta'],

      $_SESSION['profesi_sangat_puas_pelajar_mahasiswa'], 
      $_SESSION['profesi_puas_pelajar_mahasiswa'], 
      $_SESSION['profesi_kurang_puas_pelajar_mahasiswa'], 
      $_SESSION['profesi_sangat_kurang_puas_pelajar_mahasiswa'],

      $_SESSION['profesi_sangat_puas_pengangguran'], 
      $_SESSION['profesi_puas_pengangguran'], 
      $_SESSION['profesi_kurang_puas_pengangguran'], 
      $_SESSION['profesi_sangat_kurang_puas_pengangguran'],

      $_SESSION['total_responden_pns'], 
      $_SESSION['total_responden_swasta_wiraswasta'], 
      $_SESSION['total_responden_pelajar_mahasiswa'], 
      $_SESSION['total_responden_pengangguran'], 
      $_SESSION['total_responden_profesi']
);  

?>