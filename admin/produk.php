<?php
  include 'navbar_admin.php';
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

    .table {
        font-size: 0.85rem; /* Mengurangi ukuran font */
    }

    .table th, .table td {
        padding: 0.5rem; /* Mengurangi padding sel */
    }
  </style>

  <div class="container mt-4">
    <div class="col-md-12 mb-5">
        <h2 class="mb-4">Persiapkan Produkmu</h2>

        <ul class="box-info">
          <li onclick="window.location.href='tambah_produk.php';" style="cursor: pointer;">
            <i class='bx bxs-plus-circle'></i>
            <span class="text">
              <h3>Tambahkan</h3>
              <p>Produkmu</p>
            </span>
          </li>
          <li onclick="window.location.href='tampil_produk.php';" style="cursor: pointer;">
            <i class='bx bxs-cog'></i>
            <span class="text">
              <h3>Ubah</h3>
              <p>produk</p>
            </span>
          </li>
          <li onclick="window.location.href='katalog_produk.php';" style="cursor: pointer;">
            <i class='bx bxs-grid-alt'></i>
            <span class="text">
              <h3>Katalog</h3>
              <p>barang</p>
            </span>
            </a>
          </li>
        </ul>
    </div>
  </div>

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
