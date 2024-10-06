<?php 
session_start();
if ($_POST) {
    // Ambil data produk dari ID yang dikirimkan melalui GET
    $id_produk = $_GET['id_produk'];
    $jumlah_baru = $_POST['jumlah'];
    
    // Periksa apakah cart sudah ada
    if (isset($_SESSION['cart'])) {
        // Loop melalui cart untuk menemukan produk yang sesuai
        foreach ($_SESSION['cart'] as &$item) {
            if ($item['id_produk'] == $id_produk) {
                // Update quantity
                $item['qty'] = $jumlah_baru;
                break; // Keluar dari loop setelah menemukan produk
            }
        }
    }

    // Setelah update, arahkan kembali ke halaman cart
    header('location: cart.php');
}
?>
