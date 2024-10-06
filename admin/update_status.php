<?php
  include 'config/koneksi.php';

  if (isset($_POST['id_transaksi']) && isset($_POST['status'])) {
    $id_transaksi = $_POST['id_transaksi'];
    $status = $_POST['status'];

    // Query untuk update status transaksi
    $query = "UPDATE transaksi SET status='$status' WHERE id_transaksi='$id_transaksi'";
    if (mysqli_query($conn, $query)) {
      // Redirect kembali ke halaman transaksi
      header("Location: home_admin.php");
      exit;
    } else {
      echo "Gagal mengupdate status.";
    }
  }
?>
