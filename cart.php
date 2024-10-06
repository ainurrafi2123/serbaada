<?php
  session_start();
  include 'navbar.php';
?>

<section class="cart section--lg container">
    <div class="table__container">
        <table class="table">
            <thead>
                <tr>
                    <th>Image</th>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Subtotal</th>
                    <th>Rename</th>
                </tr>
            </thead>
            <tbody>
              <?php 
              foreach ($_SESSION['cart'] as $item) { 
                  $subtotal = floatval($item['harga']) * intval($item['qty']); // Pastikan konversi tipe data
              ?>
                  <tr>
                      <td>
                          <img src="assets/foto_produk/<?= $item['foto_produk']; ?>" alt="" class="table__img" />
                      </td>
                      <td>
                          <h3 class="table__title"><?= $item['nama_produk']; ?></h3>
                          <p class="table__description"><?= $item['deskripsi']; ?></p>
                      </td>
                      <td>
                        <span class="table__price">Rp <?= number_format(floatval($item['harga']), 0, ',', '.'); ?></span> <!-- Format harga -->
                      </td>
                      <td>
                          <form action="update_cart.php?id_produk=<?= $item['id_produk']; ?>" method="post">
                              <input type="number" name="jumlah" value="<?= $item['qty']; ?>" class="quantity" min="1" />
                              <input type="submit" value="Update" class="btn btn--sm" />
                          </form>
                      </td>
                      <td>
                        <span class="subtotal">Rp <?= number_format($subtotal, 0, ',', '.'); ?></span> <!-- Format subtotal -->
                      </td>
                      <td>
                          <a href="hapus_cart.php?id_produk=<?= $item['id_produk']; ?>" class="table__trash">
                              <i class="fi fi-rs-trash"></i>
                          </a>
                      </td>
                  </tr>
              <?php } ?>
          </tbody>
        </table>
    </div>

    <!-- Bagian untuk Update Cart dan Continue Shopping -->
    <div class="cart__actions">
        <a href="shop.php" class="btn flex btn__md">
            <i class="fi-rs-shopping-bag"></i> Continue Shopping
        </a>
    </div>

    <div class="divider">
          <i class="fi fi-rs-fingerprint"></i>
    </div>

    <?php
$total_harga = 0; // Inisialisasi total harga
foreach ($_SESSION['cart'] as $item) {
    $subtotal_item = floatval($item['harga']) * intval($item['qty']);
    $total_harga += $subtotal_item; // Tambahkan subtotal item ke total harga
}

// Biaya pengiriman
$biaya_pengiriman = 10000; // Misalnya biaya pengiriman Rp10.000
$total = $total_harga + $biaya_pengiriman; // Hitung total
?>

<!-- Tampilkan Total di Bawah Tabel -->
  <div class="cart__total">
      <h3 class="section__title">Cart Totals</h3>
      <table class="cart__total-table">
          <tr>
              <td><span class="cart__total-title">Cart Subtotal</span></td>
              <td><span class="cart__total-price">Rp<?= number_format($total_harga, 2, ',', '.'); ?></span></td>
          </tr>
          <tr>
              <td><span class="cart__total-title">Shipping</span></td>
              <td><span class="cart__total-price">Rp<?= number_format($biaya_pengiriman, 2, ',', '.'); ?></span></td>
          </tr>
          <tr>
              <td><span class="cart__total-title">Total</span></td>
              <td><span class="cart__total-price">Rp<?= number_format($total, 2, ',', '.'); ?></span></td>
          </tr>
      </table>
      <a href="checkout.php" class="btn flex btn--md">
          <i class="fi fi-rs-box-alt"></i> Proceed To Checkout
      </a>
  </div>

</section>


<?php
  include 'footer.php';
?>
