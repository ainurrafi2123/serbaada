<?php 
session_start();
if($_POST){
    include "config/koneksi.php";
    
    // Ambil data produk dari database
    $qry_get_produk = mysqli_query($conn, "SELECT * FROM produk WHERE id_produk = '".$_GET['id_produk']."'");
    $dt_produk = mysqli_fetch_array($qry_get_produk);

    // Menambahkan produk ke cart session, termasuk foto_produk
    $_SESSION['cart'][] = array(
        'id_produk' => $dt_produk['id_produk'],
        'nama_produk' => $dt_produk['nama_produk'],
        'deskripsi' => $dt_produk['deskripsi'],
        'qty' => $_POST['jumlah'], // ambil jumlah dari form input
        'harga' => $dt_produk['harga'], // harga produk
        'foto_produk' => $dt_produk['foto_produk'] // tambahkan foto_produk ke dalam session
    );        
}
header('location:cart.php');
?>
