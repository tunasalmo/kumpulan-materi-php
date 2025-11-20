<?php
// Pertemuan 1: Variabel, Konstanta, dan Scope
define("PHI", 3.14);
define("JUDUL", "Kalkulator Geometri");

// Variable global
$hasil = 0;

function hitungLuasLingkaran($jari) {
    return PHI * $jari * $jari;
}

function hitungVolumeTabung($jari, $tinggi) {
    global $hasil;
    $hasil = PHI * $jari * $jari * $tinggi;
    return $hasil;
}
?>
<?php include "../templates/header.php"; ?>

    <div class="container">
        <h3>Hitung Luas Lingkaran</h3>
        <form method="post">
            Jari-jari: <input type="number" name="jari1" value="7" step="0.1">
            <button type="submit" name="hitung_luas">Hitung</button>
        </form>
        
        <?php
        if(isset($_POST['hitung_luas'])) {
            $jari = $_POST['jari1'];
            $luas = hitungLuasLingkaran($jari);
            echo "<p>Luas lingkaran dengan jari-jari $jari = <strong>$luas</strong></p>";
        }
        ?>
    </div>

    <div class="container">
        <h3>Hitung Volume Tabung</h3>
        <form method="post">
            Jari-jari: <input type="number" name="jari2" value="5" step="0.1">
            Tinggi: <input type="number" name="tinggi" value="10" step="0.1">
            <button type="submit" name="hitung_volume">Hitung</button>
        </form>
        
        <?php
        if(isset($_POST['hitung_volume'])) {
            $jari = $_POST['jari2'];
            $tinggi = $_POST['tinggi'];
            $volume = hitungVolumeTabung($jari, $tinggi);
            echo "<p>Volume tabung = <strong>$volume</strong></p>";
            echo "<p>Variable global \$hasil = <strong>$hasil</strong></p>";
        }
        ?>
    </div>

    <div class="container">
        <h3>🎯 Konsep Pertemuan 1:</h3>
        <ul>
            <li>Define konstanta: <code>define("PHI", 3.14)</code></li>
            <li>Variable global & local</li>
            <li>Function dengan parameter</li>
            <li>Embed PHP dalam HTML</li>
        </ul>
    </div>
<?php include "../templates/footer.php"; ?>