<?php
    if($_POST){
        $nama_level=$_POST['nama_level'];
        $hak_akses=$_POST['hak_akses'];
        $gaji_pokok= $_POST['gaji_pokok'];
        
        if(empty($nama_level)){
            echo "<script>alert('nama siswa tidak boleh kosong');location.href='tambah_petugas.php';</script>";

        } elseif(empty($hak_akses)){
            echo "<script>alert('hak akses tidak boleh kosong');location.href='tambah_petugas.php';</script>";
        } elseif(empty($gaji_pokok)){
            echo "<script>alert('password tidak boleh kosong');location.href='tambah_petugas.php';</script>";
        } else {
            include "config/koneksi.php";
            $insert=mysqli_query($conn,"INSERT INTO level (nama_level, hak_akses, gaji_pokok ) VALUE ('".$nama_level."','".$hak_akses."','".$gaji_pokok."')") or die(mysqli_error($conn));
            if($insert){
                echo "<script>alert('Sukses menambahkan level');location.href='tambah_petugas.php';</script>";
            } else {
                echo "<script>alert('Gagal menambahkan level');location.href='tambah_petugas.php';</script>";
            }
        }
    }
    ?>