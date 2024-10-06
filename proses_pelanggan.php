<?php
if ($_POST) {
  $nama_pelanggan = $_POST['nama_pelanggan'];
  $alamat = $_POST['alamat'];
  $telp = $_POST['telp'];
  $username = $_POST['username'];
  $password = $_POST['password']; 

  if (empty($nama_pelanggan)) {
    echo "<script>alert('Nama tidak boleh kosong');location.href='tambah_pelanggan.php';</script>";
    exit; // 
  } else if (empty($alamat)) {
    echo "<script>alert('Alamat tidak boleh kosong');location.href='tambah_pelanggan.php';</script>";
    exit;
  } else if (empty($telp)) {
    echo "<script>alert('Nomor telepon tidak boleh kosong');location.href='tambah_pelanggan.php';</script>";
    exit;
  } else if (empty($username)) {
    echo "<script>alert('Username tidak boleh kosong');location.href='tambah_pelanggan.php';</script>";
    exit;
  } else if (empty($password)) {
    echo "<script>alert('Password tidak boleh kosong');location.href='tambah_pelanggan.php';</script>";
    exit;
  }

  include "config/koneksi.php";

  $insert = mysqli_query($conn, "INSERT INTO pelanggan (nama_pelanggan, alamat, telp, username, password) VALUES ('$nama_pelanggan', '$alamat', '$telp', '$username', '$password')");

  if ($insert) {
    echo "<script>alert('Sukses menambahkan pelanggan');location.href='index.php';</script>";
  } else {
    echo "<script>alert('Gagal menambahkan pelanggan');location.href='tambah_pelanggan.php';</script>";
    echo "<p>Error: " . mysqli_error($conn) . "</p>"; 
  }
}
?>
