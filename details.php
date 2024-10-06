<?php
  include 'navbar.php';
  include "config/koneksi.php";
  
  // Ambil ID produk dari URL (pastikan id_produk ada di URL)
  if (!isset($_GET['id_produk']) || empty($_GET['id_produk'])) {
    echo "<script>alert('Produk tidak ditemukan!'); window.location='index.php';</script>";
    exit;
  }

  $id_produk = $_GET['id_produk'];

  // Query untuk mengambil data produk beserta kategori
  $qry_produk = mysqli_query($conn, "
    SELECT p.*, k.nama_kategori 
    FROM produk p 
    LEFT JOIN kategori k ON p.id_kategori = k.id_kategori
    WHERE p.id_produk = '$id_produk'
  ");

  // Ambil data produk dari hasil query
  $dt_produk = mysqli_fetch_array($qry_produk);
?>
      <!--=============== DETAILS ===============-->
      <section class="details section--lg">
        <div class="details__container container grid">
          <div class="details__group">
            <!-- Menampilkan gambar utama produk -->
            <img
              src="assets/foto_produk/<?= $dt_produk['foto_produk']; ?>"  
              alt="<?= $dt_produk['nama_produk']; ?>"
              class="details__img"
            />
            <div class="details__small-images grid">
              <!-- Anda dapat menambahkan gambar kecil lainnya di sini -->
              <img
                src="./assets/img/<?= $dt_produk['foto_produk']; ?>" 
                alt="<?= $dt_produk['nama_produk']; ?>"
                class="details__small-img"
              />
              <!-- Tambahan gambar lainnya jika ada -->
            </div>
          </div>
          <div class="details__group">
            <!-- Menampilkan nama produk -->
            <h3 class="details__title"><?= $dt_produk['nama_produk']; ?></h3>

            <!-- Menampilkan kategori produk -->
            <p class="details__brand">Brand: <span><?= $dt_produk['nama_kategori']; ?></span></p>
            
            <!-- Menampilkan harga produk -->
            <div class="details__price flex">
              <span class="new__price">Rp<?= number_format($dt_produk['harga'], 0, ',', '.'); ?></span>
              <span class="old__price">Rp200.000</span> <!-- Jika Anda memiliki harga lama atau diskon, ganti sesuai kebutuhan -->
              <span class="save__price">25% Off</span> <!-- Jika ada persentase diskon -->
            </div>
            
            <!-- Menampilkan deskripsi produk -->
            <p class="short__description">
              <?= $dt_produk['deskripsi']; ?> <!-- Mengambil deskripsi dari database -->
            </p>
            
            <ul class="products__list">
              <li class="list__item flex">
                <i class="fi-rs-crown"></i> 1 Year Al Jazeera Brand Warranty
              </li>
              <li class="list__item flex">
                <i class="fi-rs-refresh"></i> 30 Days Return Policy
              </li>
              <li class="list__item flex">
                <i class="fi-rs-credit-card"></i> Cash on Delivery available
              </li>
            </ul>

            <!-- Menampilkan pilihan warna produk jika ada -->
            <div class="details__color flex">
              <span class="details__color-title">Color</span>
              <ul class="color__list">
                <li>
                  <a
                    href="#"
                    class="color__link"
                    style="background-color: hsl(37, 100%, 65%)"
                  ></a>
                </li>
                <!-- Tambahkan lebih banyak warna sesuai dengan produk jika ada -->
              </ul>
            </div>

            <!-- Menampilkan pilihan ukuran produk jika ada -->
            <div class="details__size flex">
              <span class="details__size-title">Size</span>
              <ul class="size__list">
                <li>
                  <a href="#" class="size__link size-active">M</a>
                </li>
                <li>
                  <a href="#" class="size__link">L</a>
                </li>
                <li>
                  <a href="#" class="size__link">XL</a>
                </li>
                <!-- Tambahkan lebih banyak ukuran sesuai produk -->
              </ul>
            </div>

            <!-- Form untuk aksi tambah ke keranjang -->
            <div class="details__action">
            <form action="add_to_cart.php?id_produk=<?= $dt_produk['id_produk']; ?>" method="post">
                <input type="number" name="jumlah" class="quantity" value="1" min="1" />
                <input type="submit" class="btn btn--sm" value="Add To Cart" />
            </form>
              <a href="#" class="details__action-btn">
                <i class="fi fi-rs-heart"></i>
              </a>
            </div>

            <!-- Menampilkan informasi tambahan produk -->
            <ul class="details__meta">
            <li class="meta__list flex">
              <span>SKU:</span>
              <?= !empty($dt_produk['sku']) ? $dt_produk['sku'] : 'SKU tidak tersedia'; ?>
            </li>

            <li class="meta__list flex">
              <span>Tags:</span>
              <?= !empty($dt_produk['tag_produk']) ? $dt_produk['tag_produk'] : 'Tidak ada tag'; ?>
            </li>

            <li class="meta__list flex">
              <span>Availability:</span>
              <?= !empty($dt_produk['stok']) ? $dt_produk['stok'] . ' Items in Stock' : 'Stok tidak tersedia'; ?>
            </li>

            </ul>
          </div>
        </div>
      </section>

            <!--=============== PRODUCTS ===============-->
            <section class="products container section--lg">
        <h3 class="section__title"><span>Related</span> Products</h3>
        <div class="products__container grid">
          <div class="product__item">
            <div class="product__banner">
              <a href="details.html" class="product__images">
                <img
                  src="assets/img/product-1-1.jpg"
                  alt=""
                  class="product__img default"
                />
                <img
                  src="assets/img/product-1-2.jpg"
                  alt=""
                  class="product__img hover"
                />
              </a>
              <div class="product__actions">
                <a href="#" class="action__btn" aria-label="Quick View">
                  <i class="fi fi-rs-eye"></i>
                </a>
                <a
                  href="#"
                  class="action__btn"
                  aria-label="Add to Wishlist"
                >
                  <i class="fi fi-rs-heart"></i>
                </a>
                <a href="#" class="action__btn" aria-label="Compare">
                  <i class="fi fi-rs-shuffle"></i>
                </a>
              </div>
              <div class="product__badge light-pink">Hot</div>
            </div>
            <div class="product__content">
              <span class="product__category">Clothing</span>
              <a href="details.html">
                <h3 class="product__title">Colorful Pattern Shirts</h3>
              </a>
              <div class="product__rating">
                <i class="fi fi-rs-star"></i>
                <i class="fi fi-rs-star"></i>
                <i class="fi fi-rs-star"></i>
                <i class="fi fi-rs-star"></i>
                <i class="fi fi-rs-star"></i>
              </div>
              <div class="product__price flex">
                <span class="new__price">$238.85</span>
                <span class="old__price">$245.8</span>
              </div>
              <a
                href="#"
                class="action__btn cart__btn"
                aria-label="Add To Cart"
              >
                <i class="fi fi-rs-shopping-bag-add"></i>
              </a>
            </div>
          </div>
          <div class="product__item">
            <div class="product__banner">
              <a href="details.html" class="product__images">
                <img
                  src="assets/img/product-2-1.jpg"
                  alt=""
                  class="product__img default"
                />
                <img
                  src="assets/img/product-2-2.jpg"
                  alt=""
                  class="product__img hover"
                />
              </a>
              <div class="product__actions">
                <a href="#" class="action__btn" aria-label="Quick View">
                  <i class="fi fi-rs-eye"></i>
                </a>
                <a
                  href="#"
                  class="action__btn"
                  aria-label="Add to Wishlist"
                >
                  <i class="fi fi-rs-heart"></i>
                </a>
                <a href="#" class="action__btn" aria-label="Compare">
                  <i class="fi fi-rs-shuffle"></i>
                </a>
              </div>
              <div class="product__badge light-green">Hot</div>
            </div>
            <div class="product__content">
              <span class="product__category">Clothing</span>
              <a href="details.html">
                <h3 class="product__title">Colorful Pattern Shirts</h3>
              </a>
              <div class="product__rating">
                <i class="fi fi-rs-star"></i>
                <i class="fi fi-rs-star"></i>
                <i class="fi fi-rs-star"></i>
                <i class="fi fi-rs-star"></i>
                <i class="fi fi-rs-star"></i>
              </div>
              <div class="product__price flex">
                <span class="new__price">$238.85</span>
                <span class="old__price">$245.8</span>
              </div>
              <a
                href="#"
                class="action__btn cart__btn"
                aria-label="Add To Cart"
              >
                <i class="fi fi-rs-shopping-bag-add"></i>
              </a>
            </div>
          </div>
          <div class="product__item">
            <div class="product__banner">
              <a href="details.html" class="product__images">
                <img
                  src="assets/img/product-3-1.jpg"
                  alt=""
                  class="product__img default"
                />
                <img
                  src="assets/img/product-3-2.jpg"
                  alt=""
                  class="product__img hover"
                />
              </a>
              <div class="product__actions">
                <a href="#" class="action__btn" aria-label="Quick View">
                  <i class="fi fi-rs-eye"></i>
                </a>
                <a
                  href="#"
                  class="action__btn"
                  aria-label="Add to Wishlist"
                >
                  <i class="fi fi-rs-heart"></i>
                </a>
                <a href="#" class="action__btn" aria-label="Compare">
                  <i class="fi fi-rs-shuffle"></i>
                </a>
              </div>
              <div class="product__badge light-orange">Hot</div>
            </div>
            <div class="product__content">
              <span class="product__category">Clothing</span>
              <a href="details.html">
                <h3 class="product__title">Colorful Pattern Shirts</h3>
              </a>
              <div class="product__rating">
                <i class="fi fi-rs-star"></i>
                <i class="fi fi-rs-star"></i>
                <i class="fi fi-rs-star"></i>
                <i class="fi fi-rs-star"></i>
                <i class="fi fi-rs-star"></i>
              </div>
              <div class="product__price flex">
                <span class="new__price">$238.85</span>
                <span class="old__price">$245.8</span>
              </div>
              <a
                href="#"
                class="action__btn cart__btn"
                aria-label="Add To Cart"
              >
                <i class="fi fi-rs-shopping-bag-add"></i>
              </a>
            </div>
          </div>
          <div class="product__item">
            <div class="product__banner">
              <a href="details.html" class="product__images">
                <img
                  src="assets/img/product-4-1.jpg"
                  alt=""
                  class="product__img default"
                />
                <img
                  src="assets/img/product-4-2.jpg"
                  alt=""
                  class="product__img hover"
                />
              </a>
              <div class="product__actions">
                <a href="#" class="action__btn" aria-label="Quick View">
                  <i class="fi fi-rs-eye"></i>
                </a>
                <a
                  href="#"
                  class="action__btn"
                  aria-label="Add to Wishlist"
                >
                  <i class="fi fi-rs-heart"></i>
                </a>
                <a href="#" class="action__btn" aria-label="Compare">
                  <i class="fi fi-rs-shuffle"></i>
                </a>
              </div>
              <div class="product__badge light-blue">Hot</div>
            </div>
            <div class="product__content">
              <span class="product__category">Clothing</span>
              <a href="details.html">
                <h3 class="product__title">Colorful Pattern Shirts</h3>
              </a>
              <div class="product__rating">
                <i class="fi fi-rs-star"></i>
                <i class="fi fi-rs-star"></i>
                <i class="fi fi-rs-star"></i>
                <i class="fi fi-rs-star"></i>
                <i class="fi fi-rs-star"></i>
              </div>
              <div class="product__price flex">
                <span class="new__price">$238.85</span>
                <span class="old__price">$245.8</span>
              </div>
              <a
                href="#"
                class="action__btn cart__btn"
                aria-label="Add To Cart"
              >
                <i class="fi fi-rs-shopping-bag-add"></i>
              </a>
            </div>
          </div>
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



<?php
  include 'footer.php';
?>
