<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Perhitungan IPK Mahasiswa</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #ffe4ec;
      margin: 0;
      padding: 20px;
    }
    h2 {
      text-align: center;
      color: #d63384;
    }
    table {
      width: 100%;
      border-collapse: collapse;
      margin-top: 20px;
      background-color: #fff0f6;
      border-radius: 12px;
      overflow: hidden;
      box-shadow: 0 4px 10px rgba(0,0,0,0.1);
    }
    th {
      background-color: #f8bbd0;
      color: #333;
      padding: 10px;
    }
    td {
      text-align: center;
      padding: 8px;
      border-bottom: 1px solid #f4c2d7;
    }
    tr:hover {
      background-color: #fce4ec;
    }
    .hasil {
      background-color: #f8bbd0;
      font-weight: bold;
    }
    .container {
      max-width: 900px;
      margin: auto;
      background: #fff8fa;
      padding: 20px;
      border-radius: 12px;
      box-shadow: 0 4px 10px rgba(0,0,0,0.1);
    }
  </style>
</head>
<body>

<div class="container">
  <h2>💗 Perhitungan IPK Mahasiswa 💗</h2>

  <?php

  $matkul = [
    ["Algoritma dan Struktur Data", 4, 90, 85, 80, 88],
    ["Agama", 3, 70, 50, 60, 80],
    ["Basis Data", 3, 85, 80, 90, 87],
    ["Pemrograman Web", 3, 88, 92, 95, 90],
    ["Kalkulus", 3, 69, 85, 100, 95]
  ];

  function hitung($hadir, $tugas, $uts, $uas, $sks) {
    $nilaiAkhir = (0.1 * $hadir) + (0.2 * $tugas) + (0.3 * $uts) + (0.4 * $uas);

    if ($hadir < 70) {
      $grade = "E"; $mutu = 0; $status = "GAGAL";
    } elseif ($nilaiAkhir >= 91) {
      $grade = "A"; $mutu = 4.00; $status = "LULUS";
    } elseif ($nilaiAkhir >= 81) {
      $grade = "A-"; $mutu = 3.70; $status = "LULUS";
    } elseif ($nilaiAkhir >= 76) {
      $grade = "B+"; $mutu = 3.30; $status = "LULUS";
    } elseif ($nilaiAkhir >= 71) {
      $grade = "B"; $mutu = 3.00; $status = "LULUS";
    } elseif ($nilaiAkhir >= 66) {
      $grade = "B-"; $mutu = 2.70; $status = "LULUS";
    } elseif ($nilaiAkhir >= 61) {
      $grade = "C+"; $mutu = 2.30; $status = "LULUS";
    } elseif ($nilaiAkhir >= 56) {
      $grade = "C"; $mutu = 2.00; $status = "LULUS";
    } elseif ($nilaiAkhir >= 51) {
      $grade = "C-"; $mutu = 1.70; $status = "LULUS";
    } elseif ($nilaiAkhir >= 36) {
      $grade = "D"; $mutu = 1.00; $status = "GAGAL";
    } else {
      $grade = "E"; $mutu = 0.00; $status = "GAGAL";
    }

    $bobot = $mutu * $sks;
    return [$nilaiAkhir, $grade, $mutu, $bobot, $status];
  }

  echo "<table border='1'>";
  echo "<tr>
          <th>No</th>
          <th>Nama Mata Kuliah</th>
          <th>SKS</th>
          <th>Kehadiran</th>
          <th>Tugas</th>
          <th>UTS</th>
          <th>UAS</th>
          <th>Nilai Akhir</th>
          <th>Grade</th>
          <th>Mutu</th>
          <th>Bobot</th>
          <th>Status</th>
        </tr>";

  $totalBobot = 0;
  $totalSKS = 0;

  foreach ($matkul as $i => $m) {
    list($nama, $sks, $hadir, $tugas, $uts, $uas) = $m;
    list($nilaiAkhir, $grade, $mutu, $bobot, $status) = hitung($hadir, $tugas, $uts, $uas, $sks);
    
    echo "<tr>
            <td>".($i+1)."</td>
            <td>$nama</td>
            <td>$sks</td>
            <td>$hadir</td>
            <td>$tugas</td>
            <td>$uts</td>
            <td>$uas</td>
            <td>".number_format($nilaiAkhir,2)."</td>
            <td>$grade</td>
            <td>$mutu</td>
            <td>".number_format($bobot,2)."</td>
            <td>$status</td>
          </tr>";
    
    $totalBobot += $bobot;
    $totalSKS += $sks;
  }

  $ipk = $totalBobot / $totalSKS;

  echo "<tr class='hasil'>
          <td colspan='10'>TOTAL</td>
          <td>".number_format($totalBobot,2)."</td>
          <td>-</td>
        </tr>";
  echo "<tr class='hasil'>
          <td colspan='10'>TOTAL SKS</td>
          <td>$totalSKS</td>
          <td>-</td>
        </tr>";
  echo "<tr class='hasil'>
          <td colspan='10'>IPK</td>
          <td colspan='2'>".number_format($ipk,2)."</td>
        </tr>";
  echo "</table>";
  ?>
</div>

</body>
</html>
