<!DOCTYPE html>
<html lang="en">

<head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Tambah Survey</title>
      <link rel="stylesheet" href="../CSS/Admin_Tambah_Survey_Hal3.css">
      <script src="https://kit.fontawesome.com/ae643ea90b.js" crossorigin="anonymous"></script>
</head>

<body>
      <?php
        include 'Koneksi_survei_litbang.php';

        // Fetch the latest survey
        $sql = "SELECT * FROM survey ORDER BY id DESC LIMIT 1";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $surveyTitle = $row['title'];
            $surveyIdWilayah = $row['id_wilayah'];

            // Fetch wilayah name
            $sqlWilayah = "SELECT nama_wilayah FROM wilayah WHERE id = $surveyIdWilayah";
            $resultWilayah = $conn->query($sqlWilayah);
            if ($resultWilayah->num_rows > 0) {
                $rowWilayah = $resultWilayah->fetch_assoc();
                $wilayahName = $rowWilayah['nama_wilayah'];
            }
        } else {
            $surveyTitle = "No Survey Found";
            $wilayahName = "Unknown";
        }

        // Fetch the latest data for gender
        $sqlGender = "SELECT * FROM gender ORDER BY id DESC LIMIT 1";
        $resultGender = $conn->query($sqlGender);
    
        // Fetch the latest data for usia
        $sqlUsia = "SELECT * FROM usia ORDER BY id DESC LIMIT 1";
        $resultUsia = $conn->query($sqlUsia);
    
        // Fetch the latest data for lulusan
        $sqlLulusan = "SELECT * FROM lulusan ORDER BY id DESC LIMIT 1";
        $resultLulusan = $conn->query($sqlLulusan);
    
        // Fetch the latest data for profesi
        $sqlProfesi = "SELECT * FROM profesi ORDER BY id DESC LIMIT 1";
        $resultProfesi = $conn->query($sqlProfesi);
    
        $conn->close();
        ?>
      <section id="Tambah_Survey">
            <i class="fa-solid fa-bars"></i>
            <h2>Tambah Survey</h2>
      </section>
      <div class="tambah_survei">
            <h2><span class="Tambah-Survei"><?php echo htmlspecialchars($surveyTitle); ?></span></h2>
      </div>
      <div class="tab-container-wrapper">
            <div class="tab-container">
                  <button id="table-button" class="tab active">Tabel Data</button>
                  <button id="chart-button" class="tab ">Grafik</button>
            </div>
            <div class="sort-box">
                  <h4>Wilayah : <span><?php echo htmlspecialchars($wilayahName); ?></span></h4>
            </div>
      </div>
      <div id="table" class="table" style="display: block;">
            <h3>Gender</h3>
            <table>
                  <thead>
                        <tr>
                              <th>Kategori</th>
                              <th>Sangat Puas</th>
                              <th>Puas</th>
                              <th>Kurang Puas</th>
                        </tr>
                  </thead>
                  <tbody>
                        <?php
                        if ($resultGender->num_rows > 0) {
                            $rowGender = $resultGender->fetch_assoc();
                            echo "<tr>
                                    <td>Laki-laki</td>
                                        <td>{$rowGender['laki_laki_sangat_puas']}</td>
                                        <td>{$rowGender['laki_laki_puas']}</td>
                                        <td>{$rowGender['laki_laki_kurang_puas']}</td>
                                    </tr>
                                    <tr>
                                        <td>Perempuan</td>
                                        <td>{$rowGender['perempuan_sangat_puas']}</td>
                                        <td>{$rowGender['perempuan_puas']}</td>
                                        <td>{$rowGender['perempuan_kurang_puas']}</td>
                                    </tr>";
                        }
                        ?>
                  </tbody>
            </table>
            <h3>Usia</h3>
            <table>
                  <thead>
                        <tr>
                              <th>Kategori</th>
                              <th>Sangat Puas</th>
                              <th>Puas</th>
                              <th>Kurang Puas</th>
                        </tr>
                  </thead>
                  <tbody>
                        <?php
                        if ($resultUsia->num_rows > 0) {
                            $rowUsia = $resultUsia->fetch_assoc();
                            echo "<tr>
                                        <td>18-35 Tahun</td>
                                        <td>{$rowUsia['18_35_sangat_puas']}</td>
                                        <td>{$rowUsia['18_35_puas']}</td>
                                        <td>{$rowUsia['18_35_kurang_puas']}</td>
                                    </tr>
                                    <tr>
                                        <td>36 Tahun ke atas</td>
                                        <td>{$rowUsia['36_up_sangat_puas']}</td>
                                        <td>{$rowUsia['36_up_puas']}</td>
                                        <td>{$rowUsia['36_up_kurang_puas']}</td>
                                    </tr>";
                        }
                        ?>
                  </tbody>
            </table>
            <h3>Lulusan</h3>
            <table>
                  <thead>
                        <tr>
                              <th>Kategori</th>
                              <th>Sangat Puas</th>
                              <th>Puas</th>
                              <th>Kurang Puas</th>
                        </tr>
                  </thead>
                  <tbody>
                        <?php
                        if ($resultLulusan->num_rows > 0) {
                            $rowLulusan = $resultLulusan->fetch_assoc();
                            echo "<tr>
                                        <td>SD</td>
                                        <td>{$rowLulusan['sd_sangat_puas']}</td>
                                        <td>{$rowLulusan['sd_puas']}</td>
                                        <td>{$rowLulusan['sd_kurang_puas']}</td>
                                    </tr>
                                    <tr>
                                        <td>SMP</td>
                                        <td>{$rowLulusan['smp_sangat_puas']}</td>
                                        <td>{$rowLulusan['smp_puas']}</td>
                                        <td>{$rowLulusan['smp_kurang_puas']}</td>
                                    </tr>
                                    <tr>
                                        <td>SMA</td>
                                        <td>{$rowLulusan['sma_sangat_puas']}</td>
                                        <td>{$rowLulusan['sma_puas']}</td>
                                        <td>{$rowLulusan['sma_kurang_puas']}</td>
                                    </tr>
                                    <tr>
                                        <td>Diploma</td>
                                        <td>{$rowLulusan['diploma_sangat_puas']}</td>
                                        <td>{$rowLulusan['diploma_puas']}</td>
                                        <td>{$rowLulusan['diploma_kurang_puas']}</td>
                                    </tr>
                                    <tr>
                                        <td>S1/S2/S3</td>
                                        <td>{$rowLulusan['sarjana_sangat_puas']}</td>
                                        <td>{$rowLulusan['sarjana_puas']}</td>
                                        <td>{$rowLulusan['sarjana_kurang_puas']}</td>
                                    </tr>";
                            }
                        ?>
                  </tbody>
            </table>
            <h3>Profesi</h3>
            <table>
                  <thead>
                        <tr>
                              <th>Kategori</th>
                              <th>Sangat Puas</th>
                              <th>Puas</th>
                              <th>Kurang Puas</th>
                        </tr>
                  </thead>
                  <tbody>
                        <?php
                        if ($resultProfesi->num_rows > 0) {
                            $rowProfesi = $resultProfesi->fetch_assoc();
                            echo "<tr>
                                        <td>PNS</td>
                                        <td>{$rowProfesi['pns_sangat_puas']}</td>
                                        <td>{$rowProfesi['pns_puas']}</td>
                                        <td>{$rowProfesi['pns_kurang_puas']}</td>
                                    </tr>
                                    <tr>
                                        <td>Swasta/Wiraswasta</td>
                                        <td>{$rowProfesi['swasta_wiraswasta_sangat_puas']}</td>
                                        <td>{$rowProfesi['swasta_wiraswasta_puas']}</td>
                                        <td>{$rowProfesi['swasta_wiraswasta_kurang_puas']}</td>
                                    </tr>
                                    <tr>
                                        <td>Pelajar/Mahasiswa</td>
                                        <td>{$rowProfesi['pelajar_mahasiswa_sangat_puas']}</td>
                                        <td>{$rowProfesi['pelajar_mahasiswa_puas']}</td>
                                        <td>{$rowProfesi['pelajar_mahasiswa_kurang_puas']}</td>
                                    </tr>
                                    <tr>
                                        <td>Pengangguran</td>
                                        <td>{$rowProfesi['pengangguran_sangat_puas']}</td>
                                        <td>{$rowProfesi['pengangguran_puas']}</td>
                                        <td>{$rowProfesi['pengangguran_kurang_puas']}</td>
                                    </tr>";
                        }
                        ?>
                  </tbody>
            </table>
      </div>
      <div id="chart" class="grafik" style="display: none;">
            <!-- Tempat untuk menampilkan grafik -->
            <h3>Grafik Survey</h3>
            <p>Di sini grafik akan ditampilkan.</p>
      </div>
      <div class="actions">
            <button class="tombol-cancel"><i class="fa-solid fa-arrow-left"></i><strong>Kembali</strong></button>
            <button class="tombol-publish"><i class="fa-solid fa-upload"></i>Publish</button>
      </div>
</body>

</html>