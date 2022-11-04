<?php
if($_POST){
    $id_pembelian=$_POST['id_pembelian'];
    $status=$_POST['status'];
        include "db.php";
            $update=mysqli_query($conn,"update tb_pembelian set status = '".$status."' where id_pembelian = '".$id_pembelian."'") or die(mysqli_error($conn));
            if($update){
                echo "<script>alert('Sukses update transaksi');location.href='data_transaksi_admin.php';</script>";
            } else {
                echo "<script>alert('Gagal update transaksi');location.href='data_transaksi_admin.php?id_pembelian=".$id_pembelian."';</script>";
   }
}
?>