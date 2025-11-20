<?php
// Pertemuan 4: Perulangan FOR, WHILE, dan kontrol (break, continue)
$bilangan = isset($_POST['bilangan']) ? $_POST['bilangan'] : 10;
include "../templates/header.php";
?>
<div class="container">

    <h1>Demo Perulangan PHP</h1>
    
    <form method="post">
        Jumlah bilangan: <input type="number" name="bilangan" value="<?php echo $bilangan; ?>" min="1" max="50">
        <button type="submit">Generate</button>
    </form>

    <div class="box">
        <!-- PERULANGAN FOR -->
        <div class="box">
            <h3>🔢 FOR Loop (1-<?php echo $bilangan; ?>)</h3>
            <?php
            for($i = 1; $i <= $bilangan; $i++) {
                echo "$i ";
                if($i % 10 == 0) echo "<br>";
            }
            ?>
        </div>

        <!-- PERULANGAN WHILE -->
        <div class="box">
            <h3>⏱️ WHILE Loop (Ganjil)</h3>
            <?php
            $i = 1;
            $count = 0;
            while($count < $bilangan) {
                if($i % 2 != 0) {
                    echo "$i ";
                    $count++;
                }
                $i++;
            }
            ?>
        </div>
    </div>

    <!-- BREAK & CONTINUE -->
    <div class="box" style="margin-top: 20px;">
        <h3>⏹️ BREAK & CONTINUE Demo</h3>
        <p>Bilangan 1-20 (break di 15, skip kelipatan 5):</p>
        <?php
        for($i = 1; $i <= 20; $i++) {
            if($i == 15) {
                echo "<strong>BREAK!</strong>";
                break;
            }
            if($i % 5 == 0) {
                continue;
            }
            echo "$i ";
        }
        ?>
    </div>

    <!-- TABEL PERKALIAN -->
    <div class="box" style="margin-top: 20px;">
        <h3>📊 Tabel Perkalian (1-10)</h3>
        <table>
            <tr><th>×</th><?php for($i=1;$i<=10;$i++) echo "<th>$i</th>"; ?></tr>
            <?php for($i=1;$i<=10;$i++): ?>
            <tr <?php if($i%2==0) echo 'class="even"'; ?>>
                <th><?php echo $i; ?></th>
                <?php for($j=1;$j<=10;$j++): ?>
                <td><?php echo $i * $j; ?></td>
                <?php endfor; ?>
            </tr>
            <?php endfor; ?>
        </table>
    </div>

</div>
<div class="container">
    <h3>🎯 Konsep Pertemuan 4:</h3>
    <ul>
        <li>FOR loop dengan increment</li>
        <li>WHILE loop dengan condition</li>
        <li>BREAK untuk menghentikan loop</li>
        <li>CONTINUE untuk skip iterasi</li>
        <li>Nested loop untuk tabel</li>
    </ul>
</div>
<?php include "../templates/footer.php"; ?>