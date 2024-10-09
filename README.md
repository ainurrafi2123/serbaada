<div align="center">
  <img src="https://github.com/ainurrafi2123/serbaada/blob/main/assets/img/serba.png" alt="Logo Toko" width="60px">
</div>

<div align="center">
  <h1>SerbaAda</h1>
</div>

![Preview Situs Web](https://github.com/ainurrafi2123/serbaada/blob/main/assets/img/previeweb.png) <!-- Ganti dengan path gambar preview yang sesuai -->


## Introduction

SerbaAda adalah platform e-commerce yang dirancang untuk memudahkan penjualan dan pembelian produk secara online. Platform ini memungkinkan pengguna untuk membuat akun sebagai pelanggan atau petugas, mengelola produk, melakukan transaksi, dan mengelola status transaksi. SerbaAda juga mendukung fitur kategori produk, tampilan produk yang menarik, serta integrasi sistem pembayaran sederhana.


## Fitur Utama

- **Beragam Pilihan Produk**: Temukan ribuan produk dari berbagai kategori.
- **Manajemen Produk**: Tambah, ubah, dan hapus produk dengan mudah.
- **Sistem Kategori**: Pengelompokan produk berdasarkan kategori untuk memudahkan pencarian.
- **Manajemen Pengguna**: Login sebagai petugas atau pelanggan, dengan akses berbeda untuk masing-masing pengguna.
- **Transaksi**: Pembelian produk dengan laporan transaksi dan detail lengkap.
- **Dashboard Admin**: Akses untuk mengelola produk, pelanggan, dan petugas.

## Cara Membuat Database

Berikut adalah langkah-langkah untuk membuat database dan tabel yang diperlukan untuk aplikasi e-commerce ini.

### 1. Membuat Database

Membuat Database: Anda dapat menggunakan phpMyAdmin atau MySQL CLI. Buat database baru dan sesuaikan dengan nama database yang digunakan di file koneksi.php.
Opsional: Jika ingin sama dengan file koneksi.php, gunakan nama toko_online.

### 2. Import SQL

Import SQL: Setelah database dibuat, gunakan SQL berikut untuk membuat tabel-tabel yang diperlukan:

```sql
-- Create level table
CREATE TABLE level (
    id_level INT PRIMARY KEY,
    nama_level VARCHAR(50),
    hak_akses VARCHAR(100),
    gaji_pokok DECIMAL(10,2),
    tanggal_dibuat TIMESTAMP,
    tanggal_diperbarui TIMESTAMP
);

-- Create petugas table
CREATE TABLE petugas (
    id_petugas INT PRIMARY KEY,
    nama_petugas VARCHAR(100),
    username VARCHAR(100),
    password VARCHAR(100),
    id_level INT,
    FOREIGN KEY (id_level) REFERENCES level(id_level)
);

-- Create pelanggan table
CREATE TABLE pelanggan (
    id_pelanggan INT PRIMARY KEY,
    nama_pelanggan VARCHAR(100),
    alamat TEXT,
    username VARCHAR(100),
    password VARCHAR(100),
    telp VARCHAR(50)
);

-- Create kategori table
CREATE TABLE kategori (
    id_kategori INT PRIMARY KEY,
    nama_kategori VARCHAR(100),
    deskripsi_kategori TEXT
);

-- Create produk table
CREATE TABLE produk (
    id_produk INT PRIMARY KEY,
    nama_produk VARCHAR(100),
    deskripsi TEXT,
    harga INT,
    foto_produk VARCHAR(255),
    id_kategori INT,
    FOREIGN KEY (id_kategori) REFERENCES kategori(id_kategori)
);

-- Create transaksi table
CREATE TABLE transaksi (
    id_transaksi INT PRIMARY KEY,
    id_pelanggan INT,
    tgl_transaksi DATETIME,
    total_harga DECIMAL(10,2),
    status ENUM('pending', 'completed', 'canceled'),
    FOREIGN KEY (id_pelanggan) REFERENCES pelanggan(id_pelanggan)
);

-- Create detail_transaksi table
CREATE TABLE detail_transaksi (
    id_detail_transaksi INT PRIMARY KEY,
    id_transaksi INT,
    id_produk INT,
    qty INT,
    subtotal DECIMAL(10,2),
    FOREIGN KEY (id_transaksi) REFERENCES transaksi(id_transaksi),
    FOREIGN KEY (id_produk) REFERENCES produk(id_produk)
);
