<?php
// Pertemuan 2: Operator Aritmatika
$hasil = 0;
$operasi = "";

if(isset($_POST['hitung'])) {
    $nilai1 = $_POST['nilai1'];
    $nilai2 = $_POST['nilai2'];
    $operator = $_POST['operator'];
    
    // Operator aritmatika
    switch($operator) {
        case '+':
            $hasil = $nilai1 + $nilai2;
            $operasi = "Penjumlahan";
            break;
        case '-':
            $hasil = $nilai1 - $nilai2;
            $operasi = "Pengurangan";
            break;
        case '*':
            $hasil = $nilai1 * $nilai2;
            $operasi = "Perkalian";
            break;
        case '/':
            $hasil = $nilai2 != 0 ? $nilai1 / $nilai2 : "Tidak bisa dibagi 0";
            $operasi = "Pembagian";
            break;
        case '%':
            $hasil = $nilai1 % $nilai2;
            $operasi = "Modulus";
            break;
    }
}
include "../templates/header.php";
?>
<div class="container">

    <h1>Kalkulator Operator Aritmatika</h1>
    
    <div class="calculator">
        <form method="post">
            <input type="number" name="nilai1" placeholder="Nilai I" value="15" required>
            
            <select name="operator">
                <option value="+">+ (Penjumlahan)</option>
                <option value="-">- (Pengurangan)</option>
                <option value="*">* (Perkalian)</option>
                <option value="/">/ (Pembagian)</option>
                <option value="%">% (Modulus)</option>
            </select>
            
            <input type="number" name="nilai2" placeholder="Nilai II" value="3" required>
            
            <button type="submit" name="hitung">Hitung</button>
        </form>
        
        <?php if(isset($_POST['hitung'])): ?>
        <div class="result">
            <h3>Hasil <?php echo $operasi; ?>:</h3>
            <p><?php echo "$nilai1 $operator $nilai2 = <strong>$hasil</strong>"; ?></p>
        </div>
        <?php endif; ?>
    </div>

</div>
<div class="container">
    <h3>🎯 Konsep Pertemuan 2:</h3>
    <ul>
        <li>Operator Aritmatika: +, -, *, /, %</li>
        <li>Switch Case untuk pemilihan operasi</li>
        <li>Form handling dengan POST</li>
        <li>Conditional operator: <code>? :</code></li>
    </ul>
</div>
<?php include "../templates/footer.php"; ?>