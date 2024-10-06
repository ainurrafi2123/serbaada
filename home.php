<?php
  include 'navbar.php';
?>

<body>
      <!--=============== HOME ===============-->
      <main class="main">
      <!--=============== HOME ===============-->
        <section class="home section--lg">
          <div class="home__container container grid">
            <div class="home__content">
              <span class="home__subtitle">Hot Promotions</span>
              <h1 class="home__title">
                Fashion Trending <span>Great Collection</span>
              </h1>
              <p class="home__description">
                Save more with coupons & up tp 20% off
              </p>
              <a href="shop.php" class="btn">Shop Now</a>
            </div>
            <img src="assets/img/home-img.png" class="home__img" alt="hats" />
          </div>
        </section>

              <!--=============== CATEGORIES ===============-->
      <section class="categories container section">
        <h3 class="section__title"><span>Popular</span> Categories</h3>
        <div class="categories__container swiper">
          <div class="swiper-wrapper">
            <a href="shop.php" class="category__item swiper-slide">
              <img
                src="assets/img/category-1.jpg"
                alt=""
                class="category__img"
              />
              <h3 class="category__title">T-Shirt</h3>
            </a>
            <a href="shop.php" class="category__item swiper-slide">
              <img
                src="assets/img/category-2.jpg"
                alt=""
                class="category__img"
              />
              <h3 class="category__title">Bags</h3>
            </a>
            <a href="shop.php" class="category__item swiper-slide">
              <img
                src="assets/img/category-3.jpg"
                alt=""
                class="category__img"
              />
              <h3 class="category__title">Sandal</h3>
            </a>
            <a href="shop.php" class="category__item swiper-slide">
              <img
                src="assets/img/category-4.jpg"
                alt=""
                class="category__img"
              />
              <h3 class="category__title">Scarf Cap</h3>
            </a>
            <a href="shop.php" class="category__item swiper-slide">
              <img
                src="assets/img/category-5.jpg"
                alt=""
                class="category__img"
              />
              <h3 class="category__title">Shoes</h3>
            </a>
            <a href="shop.php" class="category__item swiper-slide">
              <img
                src="assets/img/category-6.jpg"
                alt=""
                class="category__img"
              />
              <h3 class="category__title">Pillowcase</h3>
            </a>
            <a href="shop.php" class="category__item swiper-slide">
              <img
                src="assets/img/category-7.jpg"
                alt=""
                class="category__img"
              />
              <h3 class="category__title">Jumpsuit</h3>
            </a>
            <a href="shop.php" class="category__item swiper-slide">
              <img
                src="assets/img/category-8.jpg"
                alt=""
                class="category__img"
              />
              <h3 class="category__title">Hats</h3>
            </a>
          </div>

          <div class="swiper-button-prev">
            <i class="fi fi-rs-angle-left"></i>
          </div>
          <div class="swiper-button-next">
            <i class="fi fi-rs-angle-right"></i>
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
      
      </main>

<?php
  include 'footer.php';
?>