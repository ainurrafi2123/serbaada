<?php
    include 'config/koneksi.php'; // Tambahkan titik koma di sini
    include 'navbar_admin.php';
    // Memeriksa koneksi
    if (!$conn) {
      die("Koneksi gagal: " . mysqli_connect_error());
    }
    // Query untuk mengambil data transaksi
    $query_transaksi = mysqli_query($conn, "SELECT id_transaksi, id_pelanggan, tgl_transaksi, total_harga, status FROM transaksi");
  
    if (mysqli_num_rows($query_transaksi) > 0) {
?>

<div class="container mt-3">

  <div class="col-md-12">
          <h2 class="mb-4">Transaksi Berlangsung</h2>
              <div class="table-responsive">
                          <table class="table table-bordered table-striped">
                        <thead>
                          <tr>
                            <th>ID Transaksi</th>
                            <th>ID Pelanggan</th>
                            <th>Tanggal Transaksi</th>
                            <th>Total Harga</th>
                            <th>Status</th>
                          </tr>
                        </thead>
                        <tbody>
                  <?php
                        while ($row = mysqli_fetch_assoc($query_transaksi)) {
                  ?>
                          <tr>
                            <td><?= $row['id_transaksi']; ?></td>
                            <td><?= $row['id_pelanggan']; ?></td>
                            <td><?= date('d-m-Y', strtotime($row['tgl_transaksi'])); ?></td> <!-- Format tanggal -->
                            <td>Rp<?= number_format($row['total_harga'], 0, ',', '.'); ?></td>
                            <td>
                              <form action="update_status.php" method="POST">
                                <input type="hidden" name="id_transaksi" value="<?= $row['id_transaksi']; ?>">
                                <select name="status" onchange="this.form.submit()">
                                  <option value="pending" <?= $row['status'] == 'pending' ? 'selected' : ''; ?>>Pending</option>
                                  <option value="completed" <?= $row['status'] == 'completed' ? 'selected' : ''; ?>>Completed</option>
                                  <option value="canceled" <?= $row['status'] == 'canceled' ? 'selected' : ''; ?>>Canceled</option>
                                </select>
                              </form>
                            </td>
                          </tr>
                  <?php
                        }
                  ?>
                        </tbody>
                      </table>
                  <?php
                    } else {
                      echo "<p>Tidak ada transaksi.</p>";
                    }
                  ?>
                  </div>
              </div>
  </div>

</div>

<?php
  include 'footer.php';
?>