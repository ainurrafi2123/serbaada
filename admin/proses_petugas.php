<?php
    if($_POST){
        $nama_petugas=$_POST['nama_petugas'];
        $id_level = $_POST['id_level'];
        $username=$_POST['username'];
        $password= $_POST['password'];
        
        if(empty($nama_petugas)){
            echo "<script>alert('nama siswa tidak boleh kosong');location.href='tambah_petugas.php';</script>";

        } elseif(empty($username)){
            echo "<script>alert('username tidak boleh kosong');location.href='tambah_petugas.php';</script>";
        } elseif(empty($password)){
            echo "<script>alert('password tidak boleh kosong');location.href='tambah_petugas.php';</script>";
        } else {
            include "config/koneksi.php";
            $insert=mysqli_query($conn,"INSERT INTO petugas (nama_petugas, id_level, username, password ) VALUE ('".$nama_petugas."','".$id_level."','".$username."','".$password."')") or die(mysqli_error($conn));
            if($insert){
                echo "<script>alert('Sukses menambahkan petugas');location.href='tambah_petugas.php';</script>";
            } else {
                echo "<script>alert('Gagal menambahkan petugas');location.href='tambah_petugas.php';</script>";
            }
        }
    }
    ?>