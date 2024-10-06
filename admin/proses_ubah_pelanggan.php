<?php
if ($_POST) {
    $id_pelanggan = $_POST['id_pelanggan'];
    $nama_pelanggan = $_POST['nama_pelanggan'];
    $username = $_POST['username'];
    $alamat = $_POST['alamat'];
    $telp = $_POST['telp'];
    if (empty($nama_pelanggan)) {
        echo "<script>alert('Nama pelanggan tidak boleh kosong');location.href='ubah_pelanggan.php';</script>";
    } elseif (empty($alamat)) {
        echo "<script>alert('Alamat tidak boleh kosong');location.href='ubah_pelanggan.php';</script>";
    } else {
        include "config/koneksi.php";
        if (empty($telp)) {
            $update = mysqli_query($conn, "UPDATE pelanggan SET nama_pelanggan='$nama_pelanggan' ,username='$username', alamat='$alamat' WHERE id_pelanggan='$id_pelanggan'") or die(mysqli_error($conn));
            if ($update) {
                echo "<script>alert('Sukses update pelanggan');location.href='tampil_pelanggan.php';</script>";
            } else {
                echo "<script>alert('Gagal update pelanggan');location.href='ubah_pelanggan.php?id_pelanggan=".$id_pelanggan."';</script>";
            }
        } else {
            $update = mysqli_query($conn, "UPDATE pelanggan SET nama_pelanggan='$nama_pelanggan', username='$username', alamat='$alamat', telp='$telp' WHERE id_pelanggan='$id_pelanggan'") or die(mysqli_error($conn));
            if ($update) {
                echo "<script>alert('Sukses update pelanggan');location.href='tampil_pelanggan.php';</script>";
            } else {
                echo "<script>alert('Gagal update pelanggan');location.href='ubah_pelanggan.php?id_pelanggan=".$id_pelanggan."';</script>";
            }
        }
    }
}
?>
