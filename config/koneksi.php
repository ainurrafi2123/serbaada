<?php
$conn=mysqli_connect('localhost','root','','toko_online'); //toko online dapat diubah sesuai nama database anda
/* check connection */
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}
?>