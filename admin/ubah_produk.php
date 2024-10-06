<?php
include "config/koneksi.php";
include "navbar_admin.php";


if (isset($_GET['id_produk'])) {
    $id_produk = $_GET['id_produk'];
    $qry_produk = mysqli_query($conn, "SELECT * FROM produk WHERE id_produk = '$id_produk'");
    $data_produk = mysqli_fetch_array($qry_produk);
}
?>
  <div class="container mt-3">
    <h3>Ubah Produk</h3>
    <div class="row">
      <form action="proses_ubah_produk.php" method="POST" enctype="multipart/form-data class="bg-light p-4 rounded"">
          <input type="hidden" name="id_produk" value="<?php echo $data_produk['id_produk']; ?>">
          <div class="mt-2 mb-3">
            <label for="nama_produk" class="form-label">Nama Produk:</label>
            <input type="text" name="nama_produk" value="<?php echo $data_produk['nama_produk']; ?>" class="form-control" required>
          </div>

          <label for="deskripsi" class="form-label">Deskripsi:</label>
          <textarea name="deskripsi" class="form-control" required><?php echo $data_produk['deskripsi']; ?></textarea>
          
          <label for="harga" class="form-label">Harga:</label>
          <input type="number" name="harga" class="form-control"value="<?php echo $data_produk['harga']; ?>" required>
          
          <label for="kategori" class="form-label">Kategori:</label>
          <select name="id_kategori" class="form-control" required>
              <?php
              $qry_kategori = mysqli_query($conn, "SELECT * FROM kategori");
              while ($data_kategori = mysqli_fetch_array($qry_kategori)) {
                  $selected = ($data_kategori['id_kategori'] == $data_produk['id_kategori']) ? "selected" : "";
                  echo "<option value='{$data_kategori['id_kategori']}' $selected>{$data_kategori['nama_kategori']}</option>";
              }
              ?>
          </select>
          
          <label for="foto_produk" class="form-label">Foto Produk:</label><br>
          <img src="../assets/foto_produk/<?php echo $data_produk['foto_produk']; ?>" width="100" height="auto"><br><br>
          <input type="file" name="foto_produk" class="form-control">
            </br>
          <button type="submit" class="btn btn-primary">Ubah Produk</button>
      </form>
    </div>
  </div>

<?php 
include 'footer.php';
?>
