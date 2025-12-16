<?php
session_start();
if (!isset($_SESSION['hasil'])) {
    header("Location: index.php");
    exit;
}

$data = $_SESSION['hasil'];
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <link rel="stylesheet" href="style.css">
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">

<meta charset="UTF-8">
<title>Hasil Deteksi Emosi Kucing</title>
<style>
body { font-family: Arial; margin: 30px; }
table { border-collapse: collapse; width: 50%; }
td, th { border: 1px solid #ccc; padding: 6px; text-align: left; }
</style>
</head>
<body>

<h2>Hasil Deteksi Emosi Kucing</h2>
<p>Gejala yang dipilih:</p>
<ul>
<?php foreach ($data['gejala'] as $g) echo "<li>$g</li>"; ?>
</ul>

<h3>Persentase Emosi (tanpa bobot)</h3>
<table>
<tr><th>Emosi</th><th>Persentase (%)</th></tr>
<?php foreach ($data['persentase'] as $e => $p): ?>
<tr><td><?= $e ?></td><td><?= $p ?></td></tr>
<?php endforeach; ?>
</table>

<h3>Hasil Akhir: <span style="color:blue;"><?= $data['hasil'] ?></span></h3>
<p><a href="index.php">Kembali</a> | <a href="riwayat.php">Lihat Riwayat</a></p>
<button onclick="if(confirm('Yakin mau keluar?')) window.location.href='welcome.php';" 
style="background:#f44336; color:white; padding:10px 15px; border:none; border-radius:8px; cursor:pointer;">
Keluar
</button>


</body>
</html>
