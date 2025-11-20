<?php
// Pertemuan 5: Manipulasi File
$file_counter = "counter.dat";
$file_test = "test1.txt";
$pencacah = 1;

// Baca/update counter
if(file_exists($file_counter)) {
    $berkas = fopen($file_counter, "r");
    $pencacah = (int)trim(fgets($berkas, 255));
    $pencacah++;
    fclose($berkas);
}

// Simpan counter baru
$berkas = fopen($file_counter, "w");
fputs($berkas, $pencacah);
fclose($berkas);

// Baca file test1.txt jika ada
$isi_file = "";
if(file_exists($file_test)) {
    $file = fopen($file_test, "r");
    while(!feof($file)) {
        $isi_file .= fgets($file) . "<br>";
    }
    fclose($file);
}

// Tambah data ke file log
$file_log = "log_aktivitas.txt";
$waktu = date("Y-m-d H:i:s");
$log_data = "$waktu - Pengunjung ke-$pencacah\n";

$log_file = fopen($file_log, "a");
fputs($log_file, $log_data);
fclose($log_file);
include "../templates/header.php";
?>
<div class="container">

    <h1>File Handling & Counter</h1>
    
    <div class="card">
        <div class="counter">Anda pengunjung ke: <?php echo $pencacah; ?></div>
    </div>

    <div class="card">
        <h3>📄 Isi File test1.txt:</h3>
        <?php if($isi_file): ?>
            <div style="background: white; padding: 15px; border-radius: 5px;">
                <?php echo $isi_file; ?>
            </div>
        <?php else: ?>
            <p>File test1.txt tidak ditemukan. Buat file dengan konten:</p>
            <pre>Hello, this is a test file.
There are three lines here.
This is the last line.</pre>
        <?php endif; ?>
    </div>

    <div class="card">
        <h3>📝 Log Aktivitas:</h3>
        <?php
        if(file_exists($file_log)) {
            $log_content = file_get_contents($file_log);
            echo "<pre>" . htmlspecialchars($log_content) . "</pre>";
        } else {
            echo "<p>Log file akan dibuat otomatis...</p>";
        }
        ?>
    </div>

</div>
<div class="container>
    <h3>🎯 Konsep Pertemuan 5:</h3>
    <ul>
        <li>Membuka file: <code>fopen()</code></li>
        <li>Membaca file: <code>fgets()</code>, <code>feof()</code></li>
        <li>Menulis file: <code>fputs()</code></li>
        <li>Menutup file: <code>fclose()</code></li>
        <li>File existence check: <code>file_exists()</code></li>
        <li>Append mode: <code>"a"</code></li>
    </ul>
</div>
<?php include "../templates/footer.php"; ?>