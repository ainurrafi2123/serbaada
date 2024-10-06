<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
if ($_POST) {
    // Ambil data dari formulir
    $id_produk = $_POST['id_produk']; // ID produk harus ada
    $nama_produk = $_POST['nama_produk'];
    $id_kategori = $_POST['id_kategori'];
    $deskripsi = $_POST['deskripsi'];
    $harga = $_POST['harga'];
    
    include 'config/koneksi.php';

    // Ambil informasi produk lama
    $qry_produk = mysqli_query($conn, "SELECT * FROM produk WHERE id_produk='$id_produk'");
    $data_produk = mysqli_fetch_array($qry_produk);

    $foto_produk_lama = $data_produk['foto_produk'];
    $foto_produk_baru = $_FILES['foto_produk']['name'];
    $foto_produk_tmp = $_FILES['foto_produk']['tmp_name'];
    $target_dir = "../assets/foto_produk/";

    // Cek jika ada foto baru yang diupload
    if ($foto_produk_baru) {
        // Validasi tipe dan ukuran file jika ada foto baru
        $tipe_file = $_FILES['foto_produk']['type'];
        $ukuran_file = $_FILES['foto_produk']['size'];

        if ($tipe_file != "image/jpeg" && $tipe_file != "image/png" && $tipe_file != "image/jpg") {
            echo "<script>alert('Tipe file yang diupload bukan gambar!');location.href='ubah_produk.php?id_produk=$id_produk';</script>";
            exit;
        }

        if ($ukuran_file > 1048576) { 
            echo "<script>alert('Ukuran file melebihi batas (1 MB)!');location.href='ubah_produk.php?id_produk=$id_produk';</script>";
            exit;
        }

        // Hapus foto lama jika ada
        if ($foto_produk_lama != '' && file_exists($target_dir . $foto_produk_lama)) {
            unlink($target_dir . $foto_produk_lama);
        }

        // Pindahkan file foto baru
        if (move_uploaded_file($foto_produk_tmp, $target_dir . $foto_produk_baru)) {
            // Jika sukses, update database
            $update = mysqli_query($conn, "UPDATE produk SET 
                nama_produk='$nama_produk', 
                id_kategori='$id_kategori', 
                deskripsi='$deskripsi', 
                harga='$harga', 
                foto_produk='$foto_produk_baru' 
                WHERE id_produk='$id_produk'");

            if ($update) {
                echo "<script>alert('Sukses mengubah produk');location.href='produk.php';</script>";
            } else {
                echo "<script>alert('Gagal mengubah produk');location.href='ubah_produk.php?id_produk=$id_produk';</script>";
            }
        } else {
            echo "<script>alert('Gagal mengunggah file');location.href='ubah_produk.php?id_produk=$id_produk';</script>";
        }
    } else {
        // Jika tidak ada foto baru, update tanpa mengubah foto
        $update = mysqli_query($conn, "UPDATE produk SET 
            nama_produk='$nama_produk', 
            id_kategori='$id_kategori', 
            deskripsi='$deskripsi', 
            harga='$harga' 
            WHERE id_produk='$id_produk'");

        if ($update) {
            echo "<script>alert('Sukses mengubah produk tanpa mengganti foto');location.href='produk.php';</script>";
        } else {
            echo "<script>alert('Gagal mengubah produk');location.href='ubah_produk.php?id_produk=$id_produk';</script>";
        }
    }
}
?>
