<?php include "koneksi.php"; 
      include '../templates/header.php';
?>

  <div class="container">

    <h2>Tambah Produk Baru</h2>
    <form method="post">
      Nama Produk: <input type="text" name="nama_produk" required><br><br>
      Kategori: <input type="text" name="kategori" required><br><br>
      Harga: <input type="number" name="harga" required><br><br>
      Stok: <input type="number" name="stok" required><br><br>
      Deskripsi:<br>
      <textarea name="deskripsi" rows="4" cols="30"></textarea><br><br>
      <input type="submit" name="simpan" value="Simpan">
    </form>

    <?php
    if(isset($_POST['simpan'])){
      $nama = $_POST['nama_produk'];
      $kategori = $_POST['kategori'];
      $harga = $_POST['harga'];
      $stok = $_POST['stok'];
      $deskripsi = $_POST['deskripsi'];

      $query = "INSERT INTO produk VALUES('', '$nama', '$kategori', '$harga', '$stok', '$deskripsi')";
      mysqli_query($koneksi, $query);
      echo "Produk berhasil ditambahkan! <a href='index.php'>Lihat katalog</a>";
    }
    ?>
  </div>
<?php include "../templates/footer.php"; ?>