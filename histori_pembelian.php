<?php
    include 'navbar.php';
?>

<section class="wishlist section--lg container">
    <div class="table__container">
        <table class="table">
            <thead>
                <tr>
                    <th>Image</th>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Date Purchased</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                include 'config/koneksi.php';



                $id_pelanggan = $_SESSION['id_pelanggan'];
                $qry_histori = mysqli_query($conn, "SELECT 
                    t.id_transaksi,
                    t.tgl_transaksi,
                    t.total_harga,
                    t.status,
                    GROUP_CONCAT(p.nama_produk SEPARATOR '||') AS nama_produk_list,
                    GROUP_CONCAT(p.foto_produk SEPARATOR '||') AS foto_produk_list,
                    GROUP_CONCAT(dt.qty SEPARATOR '||') AS qty_list
                FROM 
                    transaksi t 
                JOIN 
                    detail_transaksi dt ON t.id_transaksi = dt.id_transaksi 
                JOIN 
                    produk p ON dt.id_produk = p.id_produk 
                WHERE 
                    t.id_pelanggan = '$id_pelanggan' 
                GROUP BY 
                    t.id_transaksi
                ORDER BY 
                    t.tgl_transaksi DESC");
                
                if (mysqli_num_rows($qry_histori) > 0) {
                    while ($dt_histori = mysqli_fetch_array($qry_histori)) {
                        $nama_produk_array = explode('||', $dt_histori['nama_produk_list']);
                        $foto_produk_array = explode('||', $dt_histori['foto_produk_list']);
                        $qty_array = explode('||', $dt_histori['qty_list']);
                        $formatted_price = number_format($dt_histori['total_harga'], 2, ',', '.');
                        ?>
                        <tr>
                            <td>
                                <img src="assets/foto_produk/<?=$foto_produk_array[0]?>" alt="" class="table__img" />
                            </td>
                            <td>
                                <h3 class="table__title">Transaksi #<?=$dt_histori['id_transaksi']?></h3>
                                <?php
                                for ($i = 0; $i < count($nama_produk_array); $i++) {
                                    echo "<p class='table__description'>{$nama_produk_array[$i]} (Qty: {$qty_array[$i]})</p>";
                                }
                                ?>
                            </td>
                            <td>
                                <span class="table__price">Rp. <?=$formatted_price?></span>
                            </td>
                            <td><?=$dt_histori['tgl_transaksi']?></td>
                            <td>
                            <?php
                                $status = $dt_histori['status'];
                                $alert_class = '';

                                if ($status == 'canceled') {
                                    $alert_class = 'alert-danger';
                                } elseif ($status == 'pending') {
                                    $alert_class = 'alert-primary';
                                } elseif ($status == 'completed') {
                                    $alert_class = 'alert-success';
                                }
                            ?>
                                <div class="alert <?= $alert_class ?> mb-0" role="alert">
                                    <?= $status ?>
                                </div>
                            </td>
                        </tr>
                    <?php
                    }
                } else {
                    echo "<tr><td colspan='6'>Tidak ada histori pembelian.</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</section>

<?php
    include 'footer.php';
?>