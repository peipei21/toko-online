<?php
    session_start();
    include "db.php";
    $cart=@$_SESSION['cart'];
    if(($cart)!=null){
        mysqli_query($conn,"insert into tb_pembelian (user_id, tanggal_pembelian, status) value('".$_SESSION['id']."','".date('Y-m-d')."','Menunggu Barang di Konfirmasi')");
        mysqli_error($conn);
         $id=mysqli_insert_id($conn);
        foreach ($cart as $key_produk => $val_produk) {
            $subtotal = $val_produk['qty'] * $val_produk['price_product'];
            mysqli_query($conn,"insert into detail_pembelian_produk (id_pembelian, product_id, qty, subtotal) value('".$id."','".$val_produk['id_product']."','".$val_produk['qty']."', '".$subtotal."')");
        }
        unset($_SESSION['cart']);
        echo '<script>alert("Anda berhasil membeli produk");location.href="histori_pembelian_user.php"</script>';
    }
?>