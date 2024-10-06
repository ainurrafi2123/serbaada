<?php
session_start();

// Pastikan cart sudah ada di session
if (isset($_SESSION['cart'])) {
    // Cek apakah id_produk ada di query string
    if (isset($_GET['id_produk'])) {
        // Loop melalui cart untuk mencari produk yang akan dihapus
        foreach ($_SESSION['cart'] as $key => $item) {
            if ($item['id_produk'] == $_GET['id_produk']) {
                // Menghapus item dari cart
                unset($_SESSION['cart'][$key]);
                // Menyimpan perubahan di session
                $_SESSION['cart'] = array_values($_SESSION['cart']); // Re-index array
                break;
            }
        }
    }
}

// Redirect ke halaman cart setelah penghapusan
header('location:cart.php');
exit(); // Pastikan untuk menghentikan script setelah redirect
?>
