<?php 
session_start();
include "config/koneksi.php";
$cart = @$_SESSION['cart'];

if (count($cart) > 0) {
    // Hitung total harga
    $total_harga = 0;
    foreach ($cart as $key_produk => $val_produk) {
        $subtotal = $val_produk['harga'] * $val_produk['qty'];
        $total_harga += $subtotal;
    }

    // Insert transaksi ke tabel transaksi
    $insert_transaksi = mysqli_query($conn, "INSERT INTO transaksi (id_pelanggan, tgl_transaksi, total_harga, status) VALUES ('".$_SESSION['id_pelanggan']."', '".date('Y-m-d')."', ".$total_harga.", 'pending')");
    
    if ($insert_transaksi) {
        // Ambil ID transaksi yang baru saja dimasukkan
        $id_transaksi = mysqli_insert_id($conn);
        
        // Insert detail transaksi
        foreach ($cart as $key_produk => $val_produk) {
            $subtotal_item = $val_produk['harga'] * $val_produk['qty']; // Hitung subtotal untuk item
            mysqli_query($conn, "INSERT INTO detail_transaksi (id_transaksi, id_produk, qty, subtotal) VALUES ('".$id_transaksi."', '".$val_produk['id_produk']."', '".$val_produk['qty']."', '".$subtotal_item."')");
        }

        // Kosongkan cart setelah checkout
        unset($_SESSION['cart']);

        echo '<script>alert("Anda berhasil melakukan pembelian!"); location.href="histori_pembelian.php";</script>';
    } else {
        echo "Error: " . mysqli_error($conn);
    }
} else {
    echo '<script>alert("Cart Anda kosong."); location.href="cart.php";</script>';
}
?>
