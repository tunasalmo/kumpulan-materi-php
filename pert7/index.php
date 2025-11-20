<?php
// Pertemuan 7: Fungsi-fungsi Array
$program = ["HTML", "PHP", "CSS", "JavaScript", "Python", "MySQL"];
$hasil_pencarian = "";
$status = "";

if(isset($_POST['cari'])) {
    $cari = $_POST['keyword'];
    
    // Fungsi in_array()
    if(in_array($cari, $program)) {
        $hasil_pencarian = $cari;
        $status = "✅ Ditemukan dalam array";
    } else {
        $hasil_pencarian = $cari;
        $status = "❌ Tidak ditemukan dalam array";
    }
}

// Data untuk demo fungsi lain
$tanggal = "17-05-2010";
list($hari, $bulan, $tahun) = explode("-", $tanggal);

$data_mahasiswa = ["Budi", "Teknik Informatika", "A12345", "Semester 4"];
list($nama, $jurusan, $nim, $semester) = $data_mahasiswa;

$buah = ["apel", "mangga", "jeruk", "anggur"];
$buah_string = implode(", ", $buah);
include "../templates/header.php";
?>
<div class="container">

    <h1>Demo Fungsi-fungsi Array</h1>

    <div class="box">
        <!-- IN_ARRAY() -->
        <div class="box">
            <h3>🔍 Fungsi in_array()</h3>
            <p>Array program: <?php echo implode(", ", $program); ?></p>
            
            <form method="post">
                <input type="text" name="keyword" placeholder="Cari program..." value="PHP">
                <button type="submit" name="cari">Cari</button>
            </form>
            
            <?php if(isset($_POST['cari'])): ?>
            <p>Hasil pencarian "<strong><?php echo $hasil_pencarian; ?></strong>": 
                <span class="<?php echo strpos($status, '✅') !== false ? 'found' : 'not-found'; ?>">
                <?php echo $status; ?>
                </span>
            </p>
            <?php endif; ?>
        </div>

        <!-- LIST() & EXPLODE() -->
        <div class="box">
            <h3>📅 Fungsi list() & explode()</h3>
            <p>Tanggal: <strong><?php echo $tanggal; ?></strong></p>
            <p>Hasil pemecahan:</p>
            <ul>
                <li>Hari: <?php echo $hari; ?></li>
                <li>Bulan: <?php echo $bulan; ?></li>
                <li>Tahun: <?php echo $tahun; ?></li>
            </ul>
        </div>
    </div>

    <div class="box">
        <!-- LIST() untuk array -->
        <div class="box">
            <h3>👨‍🎓 Fungsi list() untuk Data Mahasiswa</h3>
            <pre><?php print_r($data_mahasiswa); ?></pre>
            <p>Hasil list():</p>
            <ul>
                <li>Nama: <?php echo $nama; ?></li>
                <li>Jurusan: <?php echo $jurusan; ?></li>
                <li>NIM: <?php echo $nim; ?></li>
                <li>Semester: <?php echo $semester; ?></li>
            </ul>
        </div>

        <!-- IMPLODE() -->
        <div class="box">
            <h3>🔄 Fungsi implode()</h3>
            <p>Array buah: <?php print_r($buah); ?></p>
            <p>Hasil implode(", "):</p>
            <p><strong>"<?php echo $buah_string; ?>"</strong></p>
        </div>
    </div>

    <!-- IS_ARRAY() -->
    <div class="box" style="margin-top: 20px;">
        <h3>🔍 Fungsi is_array()</h3>
        <?php
        $test1 = [1,2,3];
        $test2 = "Ini string";
        $test3 = 123;
        
        echo "is_array(\$test1): " . (is_array($test1) ? "✅ True" : "❌ False") . "<br>";
        echo "is_array(\$test2): " . (is_array($test2) ? "✅ True" : "❌ False") . "<br>";
        echo "is_array(\$test3): " . (is_array($test3) ? "✅ True" : "❌ False") . "<br>";
        ?>
    </div>

</div>
<div class="container">
    <h3>🎯 Konsep Pertemuan 7:</h3>
    <ul>
        <li><code>in_array()</code> - Cek nilai dalam array</li>
        <li><code>list()</code> - Assign array ke variabel</li>
        <li><code>explode()</code> - String to array</li>
        <li><code>implode()</code> - Array to string</li>
        <li><code>is_array()</code> - Cek tipe data array</li>
    </ul>
</div>
<?php include "../templates/footer.php"; ?>