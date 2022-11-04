<?php 
    include "db.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TokoOnline</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <link href="https://fonts.googleapis.com/css2?family=Quicksand&display=swap" rel="stylesheet">
</head>
<body>
<header>
        <div class="container">
            
            <h1><a href="dashboard_user.php">TokoOnline</a></h1>
            <ul>
                <li><a href="dashboard_user.php">Produk</a></li>
                <li><a href="histori_pembelian_user.php">Histori</a></li>
            </ul>
        </div>
</header>
<h2>Daftar Pesanan</h2>
<table class="table table-hover striped">
    <thead>
        <tr>
            <th>NO</th><th>Nama Produk</th><th>Jumlah</th><th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php
        session_start();
        if (@$_SESSION['cart']!=null){
        foreach (@$_SESSION['cart'] as $key_produk => $val_produk): ?>
            <tr>
                <td><?=($key_produk+1)?></td>
                <td><?=$val_produk['name_product']?></td>
                <td><?=$val_produk['qty']?></td>
                <td><a href="hapus_cart.php?id=<?=$key_produk?>" class="btn btn-danger"><strong>X</strong></a></td>
            </tr>

        <?php endforeach; }
        ?>
    </tbody>
</table>
<br><br>
<a href="checkout.php" class="btn btn-primary">Check Out</a>
<footer>
        <div class="container">
            <small>Copyright &copy; 2022 - TokoOnline.</small>
        </div>
    </footer>
</body>
</html>
