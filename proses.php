<?php
session_start();
include 'koneksi.php';

// Jika tidak ada gejala dipilih, kembali ke index
if (!isset($_POST['gejala'])) {
    echo "<script>alert('❌ Anda belum memilih gejala apapun!'); window.location='index.php';</script>";
    exit;
}

$selected = $_POST['gejala'];

// Validasi maksimal 4 gejala
if (count($selected) > 4) {
    echo "<script>alert('❌ Anda hanya dapat memilih maksimal 4 gejala!'); window.location='index.php';</script>";
    exit;
}

// Peta emosi dan gejala terkait
$emosi_map = [
    "Senang" => ["telinga ke depan","mata menyipit","ekor tegak","badan rileks","mendengkur (purring)","menggesekkan tubuh","berjalan anggun"],
    "Marah" => ["telinga ke belakang","mendesis (hissing)","menggeram","ekor mengibas cepat","mengeong keras"],
    "Takut" => ["telinga ke belakang","ekor disembunyikan","pupil melebar","badan menunduk","bersembunyi","mendesis (hissing)"],
    "Sedih" => ["tidak mau makan","tidur terus-menerus","mengeong keras"],
    "Penasaran" => ["telinga ke depan","ekor tegak","mengejar mainan","mengeong lembut","berjalan anggun"],
    "Ingin Bermain" => ["mengejar mainan","mengeong lembut","menggesekkan tubuh","telinga ke depan"]
];

$total_gejala = count($selected);
$persentase = [];

// Hitung kecocokan tiap emosi
foreach ($emosi_map as $emosi => $list) {
    $cocok = count(array_intersect($selected, $list));
    $persentase[$emosi] = round(($cocok / $total_gejala) * 100, 2);
}

// Tentukan hasil tertinggi
$hasil_tertinggi = array_keys($persentase, max($persentase))[0];

// Simpan ke database
$tanggal = date("Y-m-d H:i:s");
$json_persen = json_encode($persentase, JSON_UNESCAPED_UNICODE);
$json_gejala = json_encode($selected, JSON_UNESCAPED_UNICODE);

$stmt = $koneksi->prepare("INSERT INTO riwayat (tanggal, gejala_dipilih, hasil_emosi, persentase_json) VALUES (?, ?, ?, ?)");
$stmt->bind_param("ssss", $tanggal, $json_gejala, $hasil_tertinggi, $json_persen);
$stmt->execute();
$stmt->close();

// Simpan hasil ke session untuk halaman hasil.php
$_SESSION['hasil'] = [
    'gejala' => $selected,
    'persentase' => $persentase,
    'hasil' => $hasil_tertinggi
];

// Arahkan ke halaman hasil
header("Location: hasil.php");
exit;
?>
