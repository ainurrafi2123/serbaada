<?php
// Pastikan sesi hanya dimulai jika belum aktif
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Memeriksa apakah pengguna sudah login
if (!isset($_SESSION['status_login']) || $_SESSION['status_login'] != true) {
    // Arahkan pengguna ke halaman login jika belum login
    header('location: /SerbaAda/Admin');
    exit; // Pastikan script berhenti setelah pengalihan
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link
      rel="stylesheet"
      href="https://cdn-uicons.flaticon.com/2.0.0/uicons-regular-straight/css/uicons-regular-straight.css"
    />
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"
    />
    <link rel="stylesheet" href="assets/styles.css" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <!-- SweetAlert2 CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <title>Ecommerce Website</title>
    <style>
        body {
            padding-top: 70px;
        }

        .navbar {
            background-color: #007bff;
        }

        .navbar-brand,
        .navbar-nav .nav-link {
            color: #fff;
            transition: transform 0.3s;
        }

        .navbar-nav .nav-link:hover {
            transform: translateY(-3px);
        }

        .navbar-nav .nav-link.active {
            font-weight: bold;
        }

        .card {
            margin-top: 20px;
        }
    </style>
</head>
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top">
            <div class="container">
                    <a class="navbar-brand" href="home_admin.php">
                    <img src="assets/img/logowhite.png" alt="Logo SerbaAda" style="height: 32px;"/> <!-- Ganti dengan path logo Anda -->
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a class="nav-link <?= (basename($_SERVER['PHP_SELF']) == 'home_admin.php') ? 'active' : ''; ?>" href="home_admin.php"><i class="fas fa-home"></i> Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?= (basename($_SERVER['PHP_SELF']) == 'produk.php') ? 'active' : ''; ?>" href="produk.php"><i class="bx bxs-box"></i> Produk</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?= (basename($_SERVER['PHP_SELF']) == 'transaction.php') ? 'active' : ''; ?>" href="transaction.php"><i class="fas fa-credit-card"></i> Transaksi</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?= (basename($_SERVER['PHP_SELF']) == 'profile_petugas.php') ? 'active' : ''; ?>" href="profile_petugas.php"><i class="fa-solid fa-user"></i> Profile</a>
                        </li>
                    </ul>
                </div>
            </div>
    </nav>