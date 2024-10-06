<?php
  include 'navbar.php';
  include 'config/koneksi.php';

  // Validasi session pelanggan
  if (!isset($_SESSION['id_pelanggan'])) {
    echo "ID Pelanggan tidak ditemukan. Silakan login terlebih dahulu.";
    echo "<br><a href='index.php'>Login di sini</a>";
    exit;
}


  // Ambil id pelanggan dari session
  $id_pelanggan = $_SESSION['id_pelanggan'];

  // Query untuk mendapatkan data pelanggan
  $query_pelanggan = "SELECT * FROM pelanggan WHERE id_pelanggan = '$id_pelanggan'";
  $result_pelanggan = mysqli_query($conn, $query_pelanggan);

  // Cek apakah pelanggan ditemukan
  if ($row_pelanggan = mysqli_fetch_assoc($result_pelanggan)) {
    $nama = $row_pelanggan['nama_pelanggan'];
    $alamat = $row_pelanggan['alamat'];
    $username = $row_pelanggan['username'];
    $telp = $row_pelanggan['telp'];
  } else {
    echo "Data pelanggan tidak ditemukan.";
    exit;
  }

  // Query untuk mendapatkan data transaksi
  $query_transaksi = "SELECT * FROM transaksi WHERE id_pelanggan = '$id_pelanggan'";
  $result_transaksi = mysqli_query($conn, $query_transaksi);
?>

<section class="accounts section--lg">
  <div class="accounts__container container grid">
    <div class="account__tabs">
      <p class="account__tab active-tab" data-target="#dashboard">
        <i class="fi fi-rs-settings-sliders"></i> Dashboard
      </p>
      <p class="account__tab" data-target="#orders">
        <i class="fi fi-rs-shopping-bag"></i> Orders
      </p>
      <p class="account__tab" data-target="#update-profile">
        <i class="fi fi-rs-user"></i> Update Profile
      </p>
      <p class="account__tab" data-target="#address">
        <i class="fi fi-rs-marker"></i> My Address
      </p>
      <p class="account__tab" data-target="#change-password">
        <i class="fi fi-rs-settings-sliders"></i> Change Password
      </p>
      <p class="account__tab" ><i class="fi fi-rs-exit"></i><a href="logout.php"> Logout</a></p>
    </div>

    <!-- Dashboard -->
    <div class="tab__content active-tab" id="dashboard">
      <h3 class="tab__header">Hello <?= $nama; ?></h3>
      <div class="tab__body">
        <p class="tab__description">
          Nama: <?= $nama; ?><br>
          Alamat: <?= $alamat; ?><br>
          Username: <?= $username; ?><br>
          Telepon: <?= $telp; ?>
        </p>
      </div>
    </div>

    <!-- Orders -->
    <div class="tab__content" id="orders">
      <h3 class="tab__header">Your Orders</h3>
      <div class="tab__body">
        <table class="placed__order-table">
          <thead>
            <tr>
              <th>Orders</th>
              <th>Date</th>
              <th>Status</th>
              <th>Totals</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody>
            <?php while ($order = mysqli_fetch_assoc($result_transaksi)) { ?>
            <tr>
              <td>#<?= $order['id_transaksi']; ?></td>
              <td><?= date('F j, Y', strtotime($order['tgl_transaksi'])); ?></td>
              <td><?= ucfirst($order['status']); ?></td>
              <td>Rp <?= number_format($order['total_harga'], 2, ',', '.'); ?></td>
              <td><a href="histori_pembelian.php" class="view__order">View</a></td>
            </tr>
            <?php } ?>
          </tbody>
        </table>
      </div>
    </div>

    <!-- Update Profile -->
    <div class="tab__content" id="update-profile">
      <h3 class="tab__header">Update Profile</h3>
      <div class="tab__body">
        <form action="update_pelanggan.php" class="form grid" method="post">
          <input type="hidden" name="id_pelanggan" value="<?= $id_pelanggan; ?>">

          <!-- Username -->
          <input
            type="text"
            name="username"
            placeholder="Username"
            value="<?= $username; ?>"
            class="form__input"
            required
          />

          <!-- Nama -->
          <input
            type="text"
            name="nama_pelanggan"
            placeholder="Nama"
            value="<?= $nama; ?>"
            class="form__input"
            required
          />

          <!-- Alamat -->
          <textarea
            name="alamat"
            placeholder="Alamat"
            class="form__input"
            required
          ><?= $alamat; ?></textarea>

          <!-- Telepon -->
          <input
            type="text"
            name="telp"
            placeholder="Telepon"
            value="<?= $telp; ?>"
            class="form__input"
            required
          />

          <div class="form__btn">
            <button type="submit" class="btn btn--md">Save</button>
          </div>
        </form>
      </div>
    </div>

    <!-- Address -->
    <div class="tab__content" id="address">
      <h3 class="tab__header">Shipping Address</h3>
      <div class="tab__body">
        <address class="address">
          Address: <?= $alamat; ?><br>
        </address>
        <p class="city">Forest</p>
      </div>
    </div>

    <!-- Change Password -->
    <div class="tab__content" id="change-password">
      <h3 class="tab__header">Change Password</h3>
      <div class="tab__body">
        <form action="update_password.php" class="form grid" method="post">
          <input
            type="password"
            name="current_password"
            placeholder="Current Password"
            class="form__input"
          />
          <input
            type="password"
            name="new_password"
            placeholder="New Password"
            class="form__input"
          />
          <input
            type="password"
            name="confirm_password"
            placeholder="Confirm Password"
            class="form__input"
          />
          <div class="form__btn">
            <button class="btn btn--md">Save</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</section>

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
