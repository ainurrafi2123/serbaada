<?php
    if($_POST){
        $nama_kategori=$_POST['nama_kategori'];
        $deskripsi_kategori=$_POST['deskripsi_kategori'];
        
        if(empty($nama_kategori)){
            echo "<script>alert('nama kategori tidak boleh kosong');location.href='tambah_petugas.php';</script>";

        } elseif(empty($deskripsi_kategori)){
            echo "<script>alert('deskripsi tidak boleh kosong');location.href='tambah_petugas.php';</script>";
        } else {
            include "config/koneksi.php";
            $insert=mysqli_query($conn,"INSERT INTO kategori (nama_kategori, deskripsi_kategori) VALUE ('".$nama_kategori."','".$deskripsi_kategori."')") or die(mysqli_error($conn));
            if($insert){
                echo "<script>alert('Sukses menambahkan kategori');location.href='tambah_.php';</script>";
            } else {
                echo "<script>alert('Gagal menambahkan kategori');location.href='tambah_petugas.php';</script>";
            }
        }
    }
    ?>