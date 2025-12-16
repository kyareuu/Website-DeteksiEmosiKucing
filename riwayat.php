<?php
include 'koneksi.php';
$result = $koneksi->query("SELECT * FROM riwayat ORDER BY tanggal DESC");
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <link rel="stylesheet" href="style.css">
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
<meta charset="UTF-8">
<title>Riwayat Deteksi Emosi Kucing</title>
<style>
body { font-family: Arial; margin: 30px; }
table { border-collapse: collapse; width: 100%; }
td, th { border: 1px solid #ccc; padding: 6px; }
pre { white-space: pre-wrap; word-wrap: break-word; }
</style>
</head>
<body>

<h2>Riwayat Deteksi Emosi Kucing</h2>
<p><a href="index.php">⬅️ Kembali ke Form</a></p>

<table>
<tr><th>Tanggal</th><th>Gejala Dipilih</th><th>Emosi Hasil</th><th>Persentase</th></tr>
<?php while ($row = $result->fetch_assoc()): ?>
<tr>
<td><?= $row['tanggal'] ?></td>
<td><pre><?= $row['gejala_dipilih'] ?></pre></td>
<td><?= $row['hasil_emosi'] ?></td>
<td><pre><?= $row['persentase_json'] ?></pre></td>
</tr>
<?php endwhile; ?>
</table>

</body>
</html>
