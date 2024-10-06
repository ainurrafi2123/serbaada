<?php
include 'config/koneksi.php';

include 'navbar_admin.php'; // Asumsikan kita memiliki file ini untuk fungsi-fungsi umum


// Fungsi untuk mendapatkan pesanan baru
function getNewOrders($conn) {
    $query = "SELECT t.*, p.nama_pelanggan 
              FROM transaksi t
              JOIN pelanggan p ON t.id_pelanggan = p.id_pelanggan
              WHERE t.tgl_transaksi >= DATE_SUB(NOW(), INTERVAL 24 HOUR) 
              AND t.status = 'pending'
              ORDER BY t.tgl_transaksi DESC";
    
    $result = mysqli_query($conn, $query);
    $orders = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $orders[] = $row;
    }
    return $orders;
}

$new_orders = getNewOrders($conn);
?>

<section class="wishlist section--lg container">

  <h3>New Orders</h3>
  <div id="new-orders-count">
      <span id="order-count"><?= count($new_orders) ?></span> New Order(s)
  </div>
    <div class="table__container">
      <table class="table">
          <thead>
              <tr>
                  <th>Order ID</th>
                  <th>Customer</th>
                  <th>Date</th>
                  <th>Total</th>
                  <th>Status</th>
                  <th>Action</th>
              </tr>
          </thead>
          <tbody>
              <?php foreach ($new_orders as $order): ?>
                  <tr>
                      <td><?= $order['id_transaksi'] ?></td>
                      <td><?= htmlspecialchars($order['nama_pelanggan']) ?></td>
                      <td><?= $order['tgl_transaksi'] ?></td>
                      <td>Rp <?= number_format($order['total_harga'], 2, ',', '.') ?></td>
                      <td><?= $order['status'] ?></td>
                      <td>
                        <a href="transaction.php" class="table__icon">
                              <i class="fi fi-rs-edit"></i> <!-- Ikon Ubah -->
                        </a> 
                      </td>
                  </tr>
              <?php endforeach; ?>
          </tbody>
      </table>
    </div>

</section>

<script src="js/new-orders-realtime.js"></script>
<?php
  include 'footer.php';
?>