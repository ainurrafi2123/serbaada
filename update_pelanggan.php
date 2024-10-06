<?php
if ($_POST) {
    $id_pelanggan = $_POST['id_pelanggan'];
    $username = $_POST['username'];
    $nama_pelanggan = $_POST['nama_pelanggan'];
    $alamat = $_POST['alamat'];
    $telp = $_POST['telp'];

    include "config/koneksi.php";

    $update = mysqli_query($conn, "UPDATE pelanggan SET username='$username', nama_pelanggan='$nama_pelanggan', alamat='$alamat', telp='$telp' WHERE id_pelanggan='$id_pelanggan'") or die(mysqli_error($conn));

    if ($update) {
        echo "<script>alert('Profil berhasil diperbarui');location.href='profile_pelanggan.php';</script>";
    } else {
        echo "<script>alert('Gagal memperbarui profil');location.href='dashboard.php';</script>";
    }
}
?>
