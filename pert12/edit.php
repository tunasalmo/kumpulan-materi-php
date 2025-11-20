<?php include "koneksi.php";
      include '../templates/header.php';
?>

<div class="container">

  <h2>Edit Produk Interior</h2>
  <?php
  $id = $_GET['id'];
  $data = mysqli_query($koneksi, "SELECT * FROM produk WHERE id='$id'");
  $d = mysqli_fetch_array($data);
  ?>

  <form method="post">
    Nama Produk: <input type="text" name="nama_produk" value="<?php echo $d['nama_produk']; ?>"><br><br>
    Kategori: <input type="text" name="kategori" value="<?php echo $d['kategori']; ?>"><br><br>
    Harga: <input type="number" name="harga" value="<?php echo $d['harga']; ?>"><br><br>
    Stok: <input type="number" name="stok" value="<?php echo $d['stok']; ?>"><br><br>
    Deskripsi:<br>
    <textarea name="deskripsi" rows="4" cols="30"><?php echo $d['deskripsi']; ?></textarea><br><br>
    <input type="submit" name="update" value="Update">
  </form>

  <?php
  if(isset($_POST['update'])){
    $nama = $_POST['nama_produk'];
    $kategori = $_POST['kategori'];
    $harga = $_POST['harga'];
    $stok = $_POST['stok'];
    $deskripsi = $_POST['deskripsi'];

    mysqli_query($koneksi, "UPDATE produk SET 
      nama_produk='$nama', 
      kategori='$kategori', 
      harga='$harga', 
      stok='$stok', 
      deskripsi='$deskripsi' 
      WHERE id='$id'");

    echo "Data produk berhasil diupdate! <a href='index.php'>Kembali</a>";
  }
  ?>
</div>

<?php include "../templates/footer.php"; ?>