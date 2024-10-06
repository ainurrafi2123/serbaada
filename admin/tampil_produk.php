<?php
    include 'navbar_admin.php';
?>

<section class="wishlist section--lg container">
    <div class="table__container">
        <h3>Tampil Produk</h3>
        <table class="table">
            <thead>
                <tr>
                    <th>Image</th>
                    <th>Name</th>
                    <th>Deskripsi</th>
                    <th>Harga</th>
                    <th>Kategori</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
            <?php 
                include "config/koneksi.php";
                $qry_produk = mysqli_query($conn, "SELECT p.*, k.nama_kategori 
                                                    FROM produk p 
                                                    JOIN kategori k ON k.id_kategori = p.id_kategori");
                if (mysqli_num_rows($qry_produk) > 0) {
                    while ($data_produk = mysqli_fetch_array($qry_produk)) {
            ?>
                <tr>
                    <td>
                        <img src="../assets/foto_produk/<?php echo $data_produk['foto_produk']; ?>" 
                             alt="<?php echo $data_produk['nama_produk']; ?>" 
                             class="table__img" style="width: 100px; height: auto;">
                    </td>
                    <td>
                        <h3 class="table__title"><?php echo $data_produk['nama_produk']; ?></h3>
                    </td>
                    <td>
                        <p class="table__description"><?php echo substr($data_produk['deskripsi'], 0, 100) . '...'; ?></p>
                    </td>
                    <td>
                        <span class="table__price">Rp <?php echo number_format($data_produk['harga'], 0, ',', '.'); ?></span>
                    </td>
                    <td>
                        <?php echo $data_produk['nama_kategori']; ?>
                    </td>
                    <td>
                        <a href="ubah_produk.php?id_produk=<?= $data_produk['id_produk'] ?>" class="table__icon">
                            <i class="fi fi-rs-edit"></i> <!-- Ikon Ubah -->
                        </a> | 
                        <a href="hapus_produk.php?id_produk=<?= $data_produk['id_produk'] ?>" 
                           onclick="return confirm('Apakah anda yakin menghapus data ini?')" class="table__icon">
                            <i class="fi fi-rs-trash"></i> <!-- Ikon Hapus -->
                        </a>
                    </td>
                </tr>
            <?php 
                    }
                } else {
                    echo "<tr><td colspan='6'>Tidak ada produk yang ditemukan.</td></tr>";
                }
            ?>
            </tbody>
        </table>
    </div>
</section>

<?php
    include 'footer.php';
?>
