<?php
if ($_POST) {
    include "config/koneksi.php"; // Ganti dengan path ke file koneksi Anda

    session_start();
    $id_pelanggan = $_SESSION['id_pelanggan']; // Ambil id pelanggan dari session
    $current_password = $_POST['current_password'];
    $new_password = $_POST['new_password'];
    $confirm_password = $_POST['confirm_password'];

    // Mendapatkan password saat ini dari database
    $result = mysqli_query($conn, "SELECT password FROM pelanggan WHERE id_pelanggan='$id_pelanggan'");
    
    if (!$result) {
        echo "<script>alert('Error dalam pengambilan data');location.href='dashboard.php';</script>";
        exit();
    }

    $row = mysqli_fetch_assoc($result);

    // Memeriksa apakah password saat ini sesuai
    if ($row['password'] !== $current_password) {
        echo "<script>alert('Password saat ini salah');location.href='dashboard.php';</script>";
    } elseif ($new_password !== $confirm_password) {
        echo "<script>alert('Password baru dan konfirmasi password tidak sama');location.href='dashboard.php';</script>";
    } else {
        // Mengupdate password dengan password baru
        $update = mysqli_query($conn, "UPDATE pelanggan SET password='$new_password' WHERE id_pelanggan='$id_pelanggan'") or die(mysqli_error($conn));
        
        if ($update) {
            echo "<script>alert('Sukses update password');location.href='dashboard.php';</script>";
        } else {
            echo "<script>alert('Gagal update password');location.href='dashboard.php';</script>";
        }
    }
}
?>
