<?php
  include 'navbar_admin.php';
?>
        <?php
        include "config/koneksi.php";
        $id_pelanggan = $_GET['id_pelanggan'];
        $qry_get_pelanggan = mysqli_query($conn, "SELECT * FROM pelanggan WHERE id_pelanggan = '$id_pelanggan'");
        $dt_pelanggan = mysqli_fetch_array($qry_get_pelanggan);
        ?>
        <div class="container">
            <h3>Ubah identitas</h3>
            <form action="proses_ubah_pelanggan.php" method="post">
                <input type="hidden" name="id_pelanggan" value="<?= $dt_pelanggan['id_pelanggan'] ?>">
                <label for="nama_pelanggan">Nama :</label>
                <input type="text" name="nama_pelanggan" value="<?= $dt_pelanggan['nama_pelanggan'] ?>" class="form-control">
                 <label for="username">username :</label>
                <input type="text" name="username" value="<?= $dt_pelanggan['username'] ?>" class="form-control">
                 <label for="alamat">Alamat :</label>
                <input type="text" name="alamat" value="<?= $dt_pelanggan['alamat'] ?>" class="form-control">
                 <label for="telp">Telp :</label>
                <input type="text" name="telp" value="<?= $dt_pelanggan['telp'] ?>" class="form-control">

                
                <br>
                <input type="submit" name="simpan" value="Simpan Perubahan" class="btn btn-primary">
            </form>
        </div>

<?php
  include 'footer.php';
?>