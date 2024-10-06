<?php
include 'navbar_admin.php';
include 'config/koneksi.php';

// Validasi session petugas
if (!isset($_SESSION['id_petugas'])) {
    echo "ID petugas tidak ditemukan. Silakan login terlebih dahulu.";
    exit;
}

// Ambil id petugas dari session
$id_petugas = $_SESSION['id_petugas'];

// Query untuk mendapatkan data petugas
$query_petugas = "SELECT * FROM petugas WHERE id_petugas = '$id_petugas'";
$result_petugas = mysqli_query($conn, $query_petugas);

// Cek apakah petugas ditemukan
if ($row_petugas = mysqli_fetch_assoc($result_petugas)) {
    $nama = $row_petugas['nama_petugas'];
    $username = $row_petugas['username'];
    $id_level = $row_petugas['id_level'];
} else {
    echo "Data petugas tidak ditemukan.";
    exit;
}

// Query untuk mendapatkan nama level berdasarkan id_level
$query_level = "SELECT nama_level FROM level WHERE id_level = '$id_level'";
$result_level = mysqli_query($conn, $query_level);
$row_level = mysqli_fetch_assoc($result_level);
$nama_level = $row_level['nama_level'];


?>

<section class="accounts section--lg">
  <div class="accounts__container container grid">
    <div class="account__tabs">
      <p class="account__tab active-tab" data-target="#dashboard">
        <i class="fi fi-rs-settings-sliders"></i> Dashboard
      </p>
      <p class="account__tab" data-target="#update-profile">
        <i class="fi fi-rs-user"></i> Update Profile
      </p>
      <p class="account__tab" data-target="#change-password">
        <i class="fi fi-rs-settings-sliders"></i> Change Password
      </p>
      <p class="account__tab" ><i class="fi fi-rs-exit"></i><a href="logout.php"> Logout</a></p>
    </div>

    <!-- Dashboard -->
    <div class="tab__content active-tab" id="dashboard">
      <h3 class="tab__header">Welcome, <?= $nama; ?></h3>
      <div class="tab__body">
        <p class="tab__description">
          Nama: <?= $nama; ?><br>
          Username: <?= $username; ?><br>
          Level: <?= $nama_level; ?> 
        </p>
      </div>
    </div>

    <!-- Transactions -->
    <div class="tab__content" id="transactions">
      <h3 class="tab__header">Managed Transactions</h3>
      <div class="tab__body">
        <table class="placed__order-table">
          <thead>
            <tr>
              <th>Date</th>
              <th>Status</th>
              <th>Total</th>
              <th>Actions</th>
            </tr>
          </thead>
        </table>
      </div>
    </div>

    <!-- Update Profile -->
    <div class="tab__content" id="update-profile">
      <h3 class="tab__header">Update Profile</h3>
      <div class="tab__body">
        <form action="update_petugas.php" class="form grid" method="post">
          <input type="hidden" name="id_petugas" value="<?= $id_petugas; ?>">

          <input
            type="text"
            name="username"
            placeholder="Username"
            value="<?= $username; ?>"
            class="form__input"
            required
          />

          <input
            type="text"
            name="nama_petugas"
            placeholder="Nama"
            value="<?= $nama; ?>"
            class="form__input"
            required
          />

          <div class="form__btn">
            <button type="submit" class="btn btn--md">Save</button>
          </div>
        </form>
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

<?php include 'footer.php'; ?>