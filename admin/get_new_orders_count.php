<?php
include 'config/koneksi.php';

function getNewOrdersCount($conn) {
    $query = "SELECT COUNT(*) as count 
              FROM transaksi 
              WHERE tgl_transaksi >= DATE_SUB(NOW(), INTERVAL 24 HOUR) 
              AND status = 'pending'";
    
    $result = mysqli_query($conn, $query);
    if ($result) {
        $row = mysqli_fetch_assoc($result);
        return $row['count'];
    }
    return 0;
}

$count = getNewOrdersCount($conn);

header('Content-Type: application/json');
echo json_encode(['count' => $count]);

mysqli_close($conn);
?>