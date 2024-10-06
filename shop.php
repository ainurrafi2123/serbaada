<?php
  include 'navbar.php';
  include "config/koneksi.php"; // Koneksi ke database

  // Query untuk mendapatkan semua produk
  $qry_produk = mysqli_query($conn, "
    SELECT p.*, k.nama_kategori 
    FROM produk p 
    LEFT JOIN kategori k ON p.id_kategori = k.id_kategori
  ");

  // Query untuk menghitung jumlah produk
  $qry_count = mysqli_query($conn, "SELECT COUNT(*) AS total FROM produk");
  $data_count = mysqli_fetch_assoc($qry_count);
  $total_products = $data_count['total'];
?>

<section class="products container section--lg">
  <?php if ($total_products > 0): ?>
    <p class="total__products">We found <span><?php echo $total_products; ?></span> items for you!</p>
  <?php else: ?>
    <p class="total__products">No products found. Please add some products!</p>
  <?php endif; ?>

  <div class="products__container grid">
    <?php while($dt_produk = mysqli_fetch_assoc($qry_produk)): ?>
      <div class="product__item">
        <div class="product__banner">
          <a href="details.php?id_produk=<?=$dt_produk['id_produk']?>" class="product__images">
            <img
              src="assets/foto_produk/<?=$dt_produk['foto_produk']?>"
              alt="<?=$dt_produk['nama_produk']?>"
              class="product__img default"
            />
            <img
              src="assets/img/product-1-2.jpg"
              alt="<?=$dt_produk['nama_produk']?>"
              class="product__img hover"
            />
          </a>
          <div class="product__actions">
            <a href="#" class="action__btn" aria-label="Quick View">
              <i class="fi fi-rs-eye"></i>
            </a>
            <a href="#" class="action__btn" aria-label="Add to Wishlist">
              <i class="fi fi-rs-heart"></i>
            </a>
            <a href="#" class="action__btn" aria-label="Compare">
              <i class="fi fi-rs-shuffle"></i>
            </a>
          </div>
          <div class="product__badge light-pink">Hot</div>
        </div>
        <div class="product__content">
          <span class="product__category"><?= isset($dt_produk['nama_kategori']) ? $dt_produk['nama_kategori'] : 'Kategori tidak tersedia'; ?></span>
          <a href="details.php?id_produk=<?=$dt_produk['id_produk']?>">
            <h3 class="product__title"><?=$dt_produk['nama_produk']?></h3>
          </a>
          <div class="product__rating">
            <i class="fi fi-rs-star"></i>
            <i class="fi fi-rs-star"></i>
            <i class="fi fi-rs-star"></i>
            <i class="fi fi-rs-star"></i>
            <i class="fi fi-rs-star"></i>
          </div>
          <div class="product__price flex">
            <span class="new__price">Rp<?=number_format($dt_produk['harga'], 0, ',', '.')?></span>
          </div>
          <a href="#" class="action__btn cart__btn" aria-label="Add To Cart">
            <i class="fi fi-rs-shopping-bag-add"></i>
          </a>
        </div>
      </div>
    <?php endwhile; ?>
  </div>
</section>

   <!--=============== NEWSLETTER ===============-->
   <section class="newsletter section home__newsletter">
        <div class="newsletter__container container grid">
          <h3 class="newsletter__title flex">
            <img
              src="./assets/img/icon-email.svg"
              alt=""
              class="newsletter__icon"
            />
              Mulai Berjualan
          </h3>
          <p class="newsletter__description">
            Buka Toko Online Anda Sendiri
            "Ciptakan toko online Anda, kelola produk dengan mudah"
          </p>
              <form action="" class="newsletter__form">

                <a href="call.php" class="btn btn-primary"><i class="fas fa-headset"></i>  Call Center</a>
                <a href="admin/index.php" class="btn btn-primary">Daftar Sekarang</a>
              </form>
        </div>
     </section>

<?php include 'footer.php'; ?>
