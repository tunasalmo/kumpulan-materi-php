<?php
// Pertemuan 3: Struktur Kontrol IF-ELSE
$diskon = 0;
$total_bayar = 0;
$kategori = "";

if(isset($_POST['hitung_diskon'])) {
    $total_beli = $_POST['total_beli'];
    
    // IF-ELSE untuk menentukan diskon
    if($total_beli >= 200000) {
        $diskon = 0.1;
        $kategori = "Gold (10%)";
    } elseif($total_beli >= 100000) {
        $diskon = 0.05;
        $kategori = "Silver (5%)";
    } else {
        $diskon = 0.01;
        $kategori = "Bronze (1%)";
    }
    
    $jumlah_diskon = $diskon * $total_beli;
    $total_bayar = $total_beli - $jumlah_diskon;
}
include "../templates/header.php";
?>
<div class="container">

    <h1>Kalkulator Diskon</h1>
    
    <form method="post">
        <div class="form-group">
            <label>Total Pembelian:</label>
            <input type="number" name="total_beli" placeholder="Masukkan total pembelian" value="150000" required>
        </div>
        <button type="submit" name="hitung_diskon">Hitung Diskon</button>
    </form>
    
    <?php if(isset($_POST['hitung_diskon'])): ?>
    <div class="result">
        <h3>Detail Pembayaran:</h3>
        <p>Total Pembelian: <strong>Rp <?php echo number_format($total_beli, 0, ',', '.'); ?></strong></p>
        <p>Kategori: 
            <span class="<?php 
                if($kategori == "Gold (10%)") echo 'gold';
                elseif($kategori == "Silver (5%)") echo 'silver';
                else echo 'bronze';
            ?>">
            <?php echo $kategori; ?>
            </span>
        </p>
        <p>Diskon: Rp <?php echo number_format($jumlah_diskon, 0, ',', '.'); ?></p>
        <p style="font-size: 1.2em; font-weight: bold;">
            Total Bayar: Rp <?php echo number_format($total_bayar, 0, ',', '.'); ?>
        </p>
    </div>
    <?php endif; ?>

</div>
<div class="container">
    <h3>🎯 Konsep Pertemuan 3:</h3>
    <ul>
        <li>IF-ELSEIF-ELSE statement</li>
        <li>Conditional logic untuk business rule</li>
        <li>Nested conditional dalam HTML</li>
        <li>Number formatting</li>
    </ul>
</div>
<?php include "../templates/footer.php"; ?>