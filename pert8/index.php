<?php
// Pertemuan 8: User Defined Function

// Deklarasi fungsi
function jumlah($A, $B) {
    return $A + $B;
}

function kurang($A, $B) {
    return $A - $B;
}

function kali($A, $B) {
    return $A * $B;
}

function bagi($A, $B) {
    if($B == 0) {
        return "Tidak bisa dibagi 0";
    }
    return $A / $B;
}

function modulus($A, $B) {
    if($B == 0) {
        return "Tidak bisa modulus 0";
    }
    return $A % $B;
}

function pangkat($A, $B) {
    return pow($A, $B);
}

// Proses form
$hasil = "";
$operasi = "";

if(isset($_POST['hitung'])) {
    $A = $_POST['bil1'];
    $B = $_POST['bil2'];
    $operator = $_POST['operator'];
    
    switch($operator) {
        case '+':
            $hasil = jumlah($A, $B);
            $operasi = "Penjumlahan";
            break;
        case '-':
            $hasil = kurang($A, $B);
            $operasi = "Pengurangan";
            break;
        case '*':
            $hasil = kali($A, $B);
            $operasi = "Perkalian";
            break;
        case '/':
            $hasil = bagi($A, $B);
            $operasi = "Pembagian";
            break;
        case '%':
            $hasil = modulus($A, $B);
            $operasi = "Modulus";
            break;
        case '^':
            $hasil = pangkat($A, $B);
            $operasi = "Pangkat";
            break;
    }
}
include "../templates/header.php";
?>
<div class="container">

    <h1>Kalkulator dengan Function</h1>
    
    <div class="calculator">
        <form method="post">
            <div class="form-group">
                <input type="number" name="bil1" placeholder="Bilangan pertama" value="10" step="any" required>
            </div>
            
            <div class="form-group">
                <select name="operator">
                    <option value="+">+ (Penjumlahan)</option>
                    <option value="-">- (Pengurangan)</option>
                    <option value="*">* (Perkalian)</option>
                    <option value="/">/ (Pembagian)</option>
                    <option value="%">% (Modulus)</option>
                    <option value="^">^ (Pangkat)</option>
                </select>
            </div>
            
            <div class="form-group">
                <input type="number" name="bil2" placeholder="Bilangan kedua" value="3" step="any" required>
            </div>
            
            <button type="submit" name="hitung">Hitung</button>
        </form>
        
        <?php if(isset($_POST['hitung'])): ?>
        <div class="result">
            <h3>Hasil <?php echo $operasi; ?>:</h3>
            <p><?php echo "$A $operator $B = <strong>$hasil</strong>"; ?></p>
        </div>
        <?php endif; ?>
    </div>

    <div class="functions-list">
        <h3>📋 Daftar Function yang Digunakan:</h3>
        <ul>
            <li><code>function jumlah($A, $B)</code> - Penjumlahan</li>
            <li><code>function kurang($A, $B)</code> - Pengurangan</li>
            <li><code>function kali($A, $B)</code> - Perkalian</li>
            <li><code>function bagi($A, $B)</code> - Pembagian dengan error handling</li>
            <li><code>function modulus($A, $B)</code> - Modulus dengan error handling</li>
            <li><code>function pangkat($A, $B)</code> - Pangkat menggunakan pow()</li>
        </ul>
    </div>

    <!-- FUNCTION DENGAN DEFAULT PARAMETER -->
    <div class="box" >
        <h3>⚡ Function dengan Default Parameter</h3>
        <?php
        function sapa($nama = "User", $waktu = "Pagi") {
            return "Selamat $waktu, $nama!";
        }
        
        echo sapa() . "<br>"; // Default parameter
        echo sapa("Budi", "Siang") . "<br>";
        echo sapa("Ani") . "<br>"; // Satu parameter default
        ?>
    </div>

</div>
<div class="container">
    <h3>🎯 Konsep Pertemuan 8:</h3>
    <ul>
        <li>User Defined Function (UDF)</li>
        <li>Parameter dan return value</li>
        <li>Error handling dalam function</li>
        <li>Default parameter values</li>
        <li>Switch case untuk pemilihan operasi</li>
        <li>Built-in function: pow()</li>
    </ul>
</div>
<?php include "../templates/footer.php"; ?>