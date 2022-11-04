<?php 
session_start();
    if($_POST){
        include "db.php";
        
        $qry_get_produk=mysqli_query($conn,"select * from tb_product where id_product = '".$_GET['id_product']."'");
        $produk=mysqli_fetch_array($qry_get_produk);
        $_SESSION['cart'][]=array(
            'id_product'=>$produk['id_product'],
            'name_product'=>$produk['name_product'],
            'qty'=>$_POST['jumlah'],
            'price_product'=>$produk['price_product']
        );
    }
    header('location: keranjang.php');
?>

