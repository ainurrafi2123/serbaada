<?php
include 'navbar_admin.php';
?>

<section class="wishlist section--lg container">
    <h3>Tampil Pelanggan</h3>
    <div class="table__container">
        <table class="table">
            <thead>
                <tr>
                    <th>No</th> <!-- Kolom Nomor -->
                    <th>Nama Pelanggan</th>
                    <th>Alamat</th>
                    <th>Username</th>
                    <th>Telepon</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
            <?php 
                include "config/koneksi.php";
                $qry_pelanggan = mysqli_query($conn, "SELECT * FROM pelanggan");
                if (mysqli_num_rows($qry_pelanggan) > 0) {
                    $no = 1; // Inisialisasi nomor urut
                    while ($data_pelanggan = mysqli_fetch_array($qry_pelanggan)) {
            ?>
                <tr>
                    <td><?php echo $no; ?></td> <!-- Tampilkan nomor urut -->
                    <td><?php echo $data_pelanggan['nama_pelanggan']; ?></td>
                    <td><?php echo $data_pelanggan['alamat']; ?></td>
                    <td><?php echo $data_pelanggan['username']; ?></td>
                    <td><?php echo $data_pelanggan['telp']; ?></td>
                    <td>
                        <a href="ubah_pelanggan.php?id_pelanggan=<?= $data_pelanggan['id_pelanggan'] ?>" class="table__icon">
                            <i class="fi fi-rs-edit"></i> <!-- Ikon Ubah -->
                        </a> | 
                        <a href="hapus_pelanggan.php?id_pelanggan=<?= $data_pelanggan['id_pelanggan'] ?>" 
                           onclick="return confirm('Apakah anda yakin menghapus data ini?')" class="table__icon">
                            <i class="fi fi-rs-trash"></i> <!-- Ikon Hapus -->
                        </a>
                    </td>
                </tr>
            <?php 
                    $no++; // Increment nomor urut
                    }
                } else {
                    echo "<tr><td colspan='7'>Tidak ada pelanggan yang ditemukan.</td></tr>";
                }
            ?>
            </tbody>
        </table>
    </div>
</section>

<?php
include 'footer.php';
?>
