<?php
// Pertemuan 6: Array Dasar
$usiaKaryawan = [
    "Lisa" => "28",
    "Jack" => "16", 
    "Ryan" => "35",
    "Rachel" => "46",
    "Grace" => "34"
];

$kota = ["Yogya", "Solo", "Bandung", "Bogor", "Jakarta", "Surabaya"];

// Hitung statistik
$jumlah_karyawan = count($usiaKaryawan);
$usia_tertinggi = max($usiaKaryawan);
$usia_terendah = min($usiaKaryawan);
$rata_rata = array_sum($usiaKaryawan) / $jumlah_karyawan;
include "../templates/header.php";
?>
<div class="container">

    <h1>Demo Array PHP</h1>

    <div class="box">
        <!-- ARRAY ASSOCIATIVE -->
        <div class="box">
            <h3>👥 Data Karyawan (Associative Array)</h3>
            <table>
                <tr><th>Nama</th><th>Usia</th></tr>
                <?php foreach($usiaKaryawan as $nama => $umur): ?>
                <tr>
                    <td><?php echo $nama; ?></td>
                    <td><?php echo $umur; ?> tahun</td>
                </tr>
                <?php endforeach; ?>
            </table>
        </div>

        <!-- ARRAY NUMERIK -->
        <div class="box">
            <h3>🏙️ Daftar Kota (Numerik Array)</h3>
            <table>
                <tr><th>Index</th><th>Kota</th></tr>
                <?php foreach($kota as $index => $nama_kota): ?>
                <tr>
                    <td><?php echo $index; ?></td>
                    <td><?php echo $nama_kota; ?></td>
                </tr>
                <?php endforeach; ?>
            </table>
        </div>
    </div>

    <!-- STATISTIK -->
    <div class="stats">
        <h3>Statistik Usia Karyawan</h3>
        <p>Jumlah Karyawan: <strong><?php echo $jumlah_karyawan; ?></strong></p>
        <p>Usia Tertinggi: <strong><?php echo $usia_tertinggi; ?> tahun</strong></p>
        <p>Usia Terendah: <strong><?php echo $usia_terendah; ?> tahun</strong></p>
        <p>Rata-rata Usia: <strong><?php echo number_format($rata_rata, 1); ?> tahun</strong></p>
    </div>

    <!-- ARRAY FUNCTIONS -->
    <div class="box" style="margin-top: 20px;">
        <h3>Array Functions</h3>
        <?php
        echo "<strong>count():</strong> " . count($kota) . " kota<br>";
        echo "<strong>sizeof():</strong> " . sizeof($usiaKaryawan) . " karyawan<br>";
        echo "<strong>array_sum():</strong> Total usia = " . array_sum($usiaKaryawan) . "<br>";
        echo "<strong>max():</strong> Usia tertinggi = " . max($usiaKaryawan) . "<br>";
        echo "<strong>min():</strong> Usia terendah = " . min($usiaKaryawan) . "<br>";
        
        // Array push example
        $kota_baru = $kota;
        array_push($kota_baru, "Medan", "Makassar");
        echo "<strong>array_push():</strong> " . implode(", ", $kota_baru);
        ?>
    </div>

</div>
<div class="container">
    <h3>🎯 Konsep Pertemuan 6:</h3>
    <ul>
        <li>Array Associative: key => value</li>
        <li>Array Numerik: index angka</li>
        <li>FOREACH loop untuk iterasi array</li>
        <li>Fungsi array: count(), sizeof(), array_sum()</li>
        <li>Array manipulation: array_push()</li>
    </ul>
</div>
<?php include "../templates/footer.php"; ?>