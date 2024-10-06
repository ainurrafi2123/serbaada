<?php
    if($_POST){
        // Ambil data dari formulir
        $nama_produk = $_POST['nama_produk'];
        $id_kategori = $_POST['id_kategori'];
        $deskripsi = $_POST['deskripsi'];
        $harga = $_POST['harga'];
        $foto_produk = $_FILES['foto_produk']['name'];
        $foto_produk_tmp = $_FILES['foto_produk']['tmp_name']; // Lokasi file sementara
        $tipe_file = $_FILES['foto_produk']['type']; // Tipe file
        $ukuran_file = $_FILES['foto_produk']['size']; // Ukuran file

        // Validasi tipe file
        if ($tipe_file != "image/jpeg" && $tipe_file != "image/png" && $tipe_file != "image/jpg") {
            echo "<script>alert('Tipe file yang diupload bukan gambar!');location.href='tambah_produk.php';</script>";
            exit;
        }

        // Validasi ukuran file (maksimum 1 MB)
        if ($ukuran_file > 1048576) { 
            echo "<script>alert('Ukuran file melebihi batas (1 MB)!');location.href='tambah_produk.php';</script>";
            exit;
        }

        // Validasi nama produk
        if(empty($nama_produk)){
            echo "<script>alert('Nama produk tidak boleh kosong');location.href='tambah_produk.php';</script>";
        } else {
            // Tentukan direktori tujuan untuk menyimpan file
            $target_dir = "../assets/foto_produk/";
            $target_file = $target_dir . basename($foto_produk);

            if(move_uploaded_file($foto_produk_tmp, $target_file)) {
                include 'config/koneksi.php';
                $insert = mysqli_query($conn, "INSERT INTO produk (nama_produk, id_kategori, deskripsi, harga, foto_produk) VALUES ('$nama_produk', '$id_kategori', '$deskripsi', '$harga', '$foto_produk')") or die(mysqli_error($conn));

                if($insert){
                    echo "<script>alert('Sukses menambahkan produk');location.href='produk.php';</script>";
                } else {
                    echo "<script>alert('Gagal menambahkan produk');location.href='tambah_produk.php';</script>";
                }
            } else {
                echo "<script>alert('Gagal mengunggah file');location.href='tambah_produk.php';</script>";
            }
        }
    }
?>
