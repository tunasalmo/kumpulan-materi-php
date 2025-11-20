<?php include "koneksi.php"; ?>
<?php include "../templates/header.php"; ?>

    <div class="container">
      <h2>Katalog Produk Interior</h2>
      <a href="tambah.php"><button class="btn btn-add">+ Tambah Produk</button></a>
    
      <table>
        <tr>
          <th>ID</th>
          <th>Nama Produk</th>
          <th>Kategori</th>
          <th>Harga</th>
          <th>Stok</th>
          <th>Aksi</th>
        </tr>
    
        <?php
        $data = mysqli_query($koneksi, "SELECT * FROM produk");
        while($d = mysqli_fetch_array($data)){
        ?>
        <tr>
          <td><?php echo $d['id']; ?></td>
          <td><?php echo $d['nama_produk']; ?></td>
          <td><?php echo $d['kategori']; ?></td>
          <td>Rp<?php echo number_format($d['harga']); ?></td>
          <td><?php echo $d['stok']; ?></td>
          <td>
            <a href="edit.php?id=<?php echo $d['id']; ?>"><button class="btn btn-edit">Edit</button></a>
            <a href="hapus.php?id=<?php echo $d['id']; ?>" onclick="return confirm('Hapus produk ini?')"><button class="btn btn-delete">Hapus</button></a>
          </td>
        </tr>
        <?php } ?>
      </table>
    
<?php include "../templates/footer.php"; ?>