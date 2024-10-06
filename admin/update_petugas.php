<?php
if ($_POST) {
    $id_petugas = $_POST['id_petugas'];
    $username = $_POST['username'];
    $nama_petugas = $_POST['nama_petugas'];

    include "config/koneksi.php";

    $update = mysqli_query($conn, "UPDATE petugas SET username='$username', nama_petugas='$nama_petugas' WHERE id_petugas='$id_petugas'") or die(mysqli_error($conn));

    if ($update) {
        echo "<script>alert('Profil berhasil diperbarui');location.href='profile_petugas.php';</script>";
    } else {
        echo "<script>alert('Gagal memperbarui profil');location.href='dashboard_admin.php';</script>";
    }
}
?>
