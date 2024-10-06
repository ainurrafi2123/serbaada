<?php
  include 'navbar_admin.php';
  include 'config/koneksi.php';
  

  // Query untuk New Order
  function getNewOrderCount($conn) {
    // Anggap pesanan baru adalah yang dibuat dalam 24 jam terakhir
    $query = "SELECT COUNT(*) as new_order_count 
              FROM transaksi 
              WHERE tgl_transaksi >= DATE_SUB(NOW(), INTERVAL 24 HOUR) 
              AND status = 'pending'";
    
    $result = mysqli_query($conn, $query);
    if ($result) {
        $row = mysqli_fetch_assoc($result);
        return $row['new_order_count'];
    }
    return 0;
}

// Mendapatkan jumlah pesanan baru
$new_order_count = getNewOrderCount($conn);

  // Query untuk Visitors (jumlah pelanggan)
  $query_visitors = mysqli_query($conn, "SELECT COUNT(*) as total_visitors FROM pelanggan");
  $data_visitors = mysqli_fetch_assoc($query_visitors);
  $visitors = $data_visitors['total_visitors'];

  // Query untuk Total Sales
  $query_total_sales = mysqli_query($conn, "SELECT SUM(total_harga) as total_sales FROM transaksi WHERE status = 'completed'");
  $data_total_sales = mysqli_fetch_assoc($query_total_sales);
  $total_sales = $data_total_sales['total_sales'];
?>


<style>
 .box-info {
    display: flex;
    justify-content: space-between;
    padding: 20px;
    margin: 20px 0;
    background-color: #f9f9f9; /* Warna latar belakang */
    border-radius: 10px; /* Membuat sudut melengkung */
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1); /* Bayangan halus */
}

.box-info li {
    flex: 1; /* Membagi ruang secara merata */
    text-align: center; /* Mengatur teks di tengah */
    padding: 20px;
    border: 1px solid #e0e0e0; /* Garis border */
    border-radius: 8px; /* Sudut melengkung untuk setiap box */
    transition: all 0.3s ease; /* Animasi saat hover */
}

.box-info li:hover {
    transform: translateY(-5px); /* Mengangkat box saat hover */
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.15); /* Bayangan lebih dalam saat hover */
}

.box-info li i {
    font-size: 40px; /* Ukuran ikon */
    color: var(--first-color); /* Warna ikon */
    margin-bottom: 10px; /* Jarak antara ikon dan teks */
}

.box-info .text h3 {
    font-size: 24px; /* Ukuran font untuk jumlah */
    margin: 0; /* Menghapus margin default */
    color: #333; /* Warna teks */
}

.box-info .text p {
    font-size: 14px; /* Ukuran font untuk deskripsi */
    color: #777; /* Warna deskripsi */
}



</style>

    <div class="container mt-4 content">
                <div class="row">
                    <div class="col-md-8">
                        <h2 class="display-4 mb-4 fw-bold">Selamat datang, <?= $_SESSION['nama_petugas'] ?>!</h2>
                        <p class="lead mb-4 fw-bold">Mulai Bangun Toko anda</p>
                    </div>
                </div>
    </div>

<section>
  <ul class="box-info">
    <li onclick="window.location.href='new_orders.php';" style="cursor: pointer;">
      <i class='bx bxs-calendar-check'></i>
      <span class="text">
        <h3><?= $new_order_count ?></h3>
        <p>New Order<?= $new_order_count != 1 ? 's' : '' ?></p>
      </span>
    </li>
    <li onclick="window.location.href='tampil_pelanggan.php';" style="cursor: pointer;">
      <i class='bx bxs-group'></i>
      <span class="text">
        <h3><?= $visitors ?></h3>
        <p>Visitors</p>
      </span>
    </li>
    <li onclick="window.location.href='transaction.php';" style="cursor: pointer;">
      <i class='bx bxs-dollar-circle'></i>
      <span class="text">
        <h3>Rp<?= $total_sales !== null ? number_format($total_sales, 0, ',', '.') : '0' ?></h3>
        <p>Total Sales</p>
      </span>
    </li>
  </ul>
</section>

<section class="newsletter section home__newsletter">
        <div class="newsletter__container container grid">
          <h3 class="newsletter__title flex">
              <i class="fas fa-chart-line newsletter__icon" class="newsletter__icon"></i> <!-- Ikon grafik naik -->
              Ingin Menaikan Penjualan
          </h3>
          <p class="newsletter__description">
            Apakah Anda siap untuk membawa penjualan Anda ke level yang lebih tinggi? 
            Dengan mengikuti tips berikut.
          </p>
              <form action="" class="newsletter__form">

                <a href="call.php" class="btn btn-primary"><i class="fas fa-headset"></i>  Call Center</a>
                <a href="tips.php" class="btn btn-primary">Tips Menaikan Penjualan</a>
              </form>
        </div>
</section>


<?php
  include 'footer.php';
?>
