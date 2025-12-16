<?php include 'koneksi.php'; ?>
<!DOCTYPE html>
<html lang="id">
<head>
     <link rel="stylesheet" href="style.css">
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet"><?php include 'koneksi.php'; ?>
<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Sistem Pakar Deteksi Emosi Kucing</title>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">

<style>
    body {
        font-family: 'Poppins', sans-serif;
        margin: 0;
        padding: 0;
        background: linear-gradient(135deg, #89f7fe, #66a6ff);
        color: #333;
        overflow-x: hidden;
    }

    /* --- Tampilan Selamat Datang --- */
    #welcome-screen {
        position: fixed;
        top: 0; left: 0;
        width: 100%; height: 100vh;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        background: linear-gradient(135deg, #6dd5fa, #2980b9);
        color: white;
        text-align: center;
        z-index: 10;
        transition: opacity 1s ease;
    }

    #welcome-screen.hidden {
        opacity: 0;
        pointer-events: none;
    }

    #welcome-screen h1 {
        font-size: 2.5em;
        margin-bottom: 10px;
    }

    #welcome-screen p {
        font-size: 1.1em;
        margin-bottom: 40px;
        max-width: 600px;
    }

    #start-btn {
        background-color: #ff9800;
        border: none;
        padding: 12px 30px;
        border-radius: 25px;
        font-size: 1.2em;
        color: white;
        cursor: pointer;
        transition: transform 0.3s ease, background-color 0.3s ease;
        box-shadow: 0 4px 8px rgba(0,0,0,0.3);
    }

    #start-btn:hover {
        background-color: #ffb84d;
        transform: scale(1.05);
    }

    /* --- Form Gejala --- */
    .content {
        display: none;
        padding: 30px;
        max-width: 700px;
        margin: 0 auto;
        background: white;
        border-radius: 12px;
        box-shadow: 0 4px 10px rgba(0,0,0,0.1);
        margin-top: 50px;
        animation: fadeIn 1s ease;
    }

    h2 { color: #444; text-align: center; }
    label { display: block; margin: 6px 0; }
    button {
        padding: 10px 15px;
        border: none;
        background: #2196F3;
        color: white;
        border-radius: 5px;
        cursor: pointer;
    }

    a {
        text-decoration: none;
        color: #2196F3;
        margin-left: 10px;
    }

    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(20px); }
        to { opacity: 1; transform: translateY(0); }
    }
</style>
</head>

<body>

<!-- Tampilan Selamat Datang -->
<div id="welcome-screen">
    <h1>🐱 Selamat Datang Cat Lovers 🐱</h1>
    <p>Daripada nebak-nebak perasaan si meong, mending langsung cek aja😽
Klik tombol di bawah dan liat hasilnya!</p>
    <button id="start-btn">Mulai Deteksi</button>
</div>

<!-- Form Deteksi -->
<div class="content" id="main-content">
    <h2>🐾 Sistem Pakar Deteksi Emosi Kucing</h2>
    <form action="proses.php" method="POST">
        <p>Pilih gejala yang terlihat pada kucing:</p>

        <?php
        $gejala = [
            "telinga ke depan" => "Senang / Penasaran / Ingin bermain",
            "telinga ke belakang" => "Marah / Takut",
            "mata menyipit" => "Rileks / Senang",
            "pupil melebar" => "Takut / Terkejut",
            "ekor tegak" => "Senang / Penasaran",
            "ekor mengibas cepat" => "Marah / Terganggu",
            "ekor disembunyikan" => "Takut / Cemas",
            "badan rileks" => "Senang / Nyaman",
            "badan menunduk" => "Takut / Merendah",
            "mendengkur (purring)" => "Senang / Nyaman",
            "mendesis (hissing)" => "Marah / Takut",
            "menggeram" => "Marah",
            "mengeong lembut" => "Ingin bermain / Penasaran",
            "mengeong keras" => "Marah / Sedih / Lapar",
            "menggesekkan tubuh" => "Senang / Ingin bermain",
            "tidak mau makan" => "Sedih / Sakit / Stres",
            "bersembunyi" => "Takut / Cemas",
            "mengejar mainan" => "Ingin bermain / Penasaran",
            "berjalan anggun" => "Penasaran / Senang",
            "tidur terus-menerus" => "Sedih / Nyaman"
        ];

        foreach ($gejala as $g => $arti) {
            echo "<label><input type='checkbox' name='gejala[]' value='$g'> $g</label>";
        }
        ?>
        <br>
        <button type="submit">Deteksi Emosi</button>
        <a href="riwayat.php">Lihat Riwayat</a>
    </form>
</div>

<script>
    const startBtn = document.getElementById("start-btn");
    const welcomeScreen = document.getElementById("welcome-screen");
    const mainContent = document.getElementById("main-content");

    startBtn.addEventListener("click", () => {
        welcomeScreen.classList.add("hidden");
        setTimeout(() => {
            welcomeScreen.style.display = "none";
            mainContent.style.display = "block";
        }, 1000);
    });
</script>

</body>
</html>

<meta charset="UTF-8">
<title>Sistem Pakar Deteksi Emosi Kucing</title>
<style>
body { font-family: Arial; margin: 30px; }
h2 { color: #444; }
label { display: block; margin: 6px 0; }
button { padding: 10px 15px; border: none; background: #2196F3; color: white; border-radius: 5px; cursor: pointer; }
a { text-decoration: none; color: #2196F3; margin-left: 10px; }
</style>
</head>

</form>
</body>
</html>
