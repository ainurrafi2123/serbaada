
<?php
include 'navbar_admin.php';
?>
<div class="container mt-3">
    <div class="row">

        <!-- Form Tambah Kategori -->
        <div class="col-md-6 mb-5"> <!-- Menambahkan mb-5 untuk memberi jarak bawah -->
            <h3>Tambah Kategori</h3>
            <form action="proses_kategori.php" method="post" class="bg-light p-4 rounded">
                <div class="mb-3">
                    <label for="nama_kategori" class="form-label">Kategori</label>
                    <input type="text" class="form-control" id="nama_kategori" name="nama_kategori" placeholder="Nama Kategori" required>
                </div>
                <div class="mb-3">
                    <label for="deskripsi_kategori" class="form-label">Deskripsi</label>
                    <textarea class="form-control" id="deskripsi_kategori" name="deskripsi_kategori" rows="4" placeholder="Deskripsi Kategori" required></textarea>
                </div>
                <div class="mb-3 form-check">
                    <input class="form-check-input" type="checkbox" id="terms" name="terms" required>
                    <label class="form-check-label" for="terms">
                        Saya setuju dengan syarat dan ketentuan
                    </label>
                </div>
                <button type="submit" class="btn btn-primary">Tambah Kategori</button>
            </form>
        </div>

        <!-- Form Tambah Produk -->
        <div class="col-md-6"> <!-- Tidak perlu mb-5 jika hanya ingin memberikan jarak pada kolom sebelumnya -->
            <h3>Tambah Produk</h3>
            <form action="proses_tambah_produk.php" method="post" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="nama_produk" class="form-label">Nama produk</label>
                    <input type="text" name="nama_produk" id="nama_produk" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="id_kategori" class="form-label">Kategori</label>
                    <select name="id_kategori" id="id_kategori" class="form-select" required>
                        <option value="">Pilih Kategori</option>
                        <?php
                        include "config/koneksi.php";
                        $qry_level=mysqli_query($conn,"SELECT * FROM kategori");
                        while($data_kategori=mysqli_fetch_array($qry_level)){
                            echo '<option value="'.$data_kategori['id_kategori'].'">'.$data_kategori['nama_kategori'].'</option>';    
                        }
                        ?>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="deskripsi" class="form-label">Deskripsi</label>
                    <textarea name="deskripsi" id="deskripsi" rows="4" class="form-control" placeholder="Deskripsi"></textarea>
                </div>
                <div class="mb-3">
                    <label for="harga" class="form-label">Harga</label>
                    <input type="number" name="harga" id="harga" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="foto_produk" class="form-label">Foto produk</label>
                    <input type="file" name="foto_produk" id="foto_produk" class="form-control" required>
                </div>
                <button type="submit" name="simpan" class="btn btn-primary">Tambah produk</button>
            </form>
        </div>

    </div>
</div>

<?php
include 'footer.php';
?>