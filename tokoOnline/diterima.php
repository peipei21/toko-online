<?php
if($_GET){
    include "db.php";
    $id_pembelian=$_GET['id'];
        $update=mysqli_query($conn,"update tb_pembelian set status='Barang Sudah diterima Pelanggan' where id_pembelian = '".$id_pembelian."'") or die(mysqli_error($conn));
        echo "<script>alert('Barang Sukses Di Confirm');location.href='histori_pembelian_user.php';</script>";
}
?>