<?php
session_start();
include "db.php";

?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>TokoOnline</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@500&display=swap" rel="stylesheet">
    <script src="https://cdn.ckeditor.com/4.19.1/standard/ckeditor.js"></script>

</head>

<body>
<header>
        <div class="container">
            <h1><a href="dashboard_user.php">TokoOnline</a></h1>
            <ul>
                <li><a href="dashboard_user.php">Produk</a></li>
                <li><a href="histori_pembelian_user.php">Histori</a></li>
                <li><a href="keluar_user.php">Log Out</a></li>
            </ul>
        </div>
    </header>
    <br><br>
    <div class="container">
        <div class="card">
            <div class="card-header">
                <tbody>
                    <h2 align='center'>Histori Pembelian Produk</h2>
                    <br><br>
                    <div class="container">
                        <table class="table table-hover table-striped">
                            <thead>
                                <th>NO</th>
                                <th>Tanggal Beli</th>
                                <th>Nama Produk</th>
                                <th>Jumlah Barang</th>
                                <th>Harga</th>
                                <th>Total</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </thead>
                            <tbody>
                                <?php
                                include "db.php";
                                echo $_SESSION['id'];
                                $qry_histori = mysqli_query($conn, "SELECT * from tb_pembelian where user_id='" . $_SESSION['id'] . "' order by id_pembelian desc");
                                $no = 0;
                                while ($dt_histori = mysqli_fetch_array($qry_histori)) {
                                    $no++;
                                    //menampilkan produk yang dibeli
                                    $produk_dibeli = "<ol>";
                                    $qry_produk = mysqli_query($conn, "select * from detail_pembelian_produk JOIN tb_product ON detail_pembelian_produk.product_id = tb_product.id_product where id_pembelian = '" . $dt_histori['id_pembelian'] . "'");
                                    mysqli_error($conn);
                                    while ($dt_produk = mysqli_fetch_array($qry_produk)) {

                                        $produk_dibeli = $dt_produk['name_product'];
                                        $qty_produk = $dt_produk['qty'];
                                        $hrg_produk = $dt_produk['price_product'];
                                        $total_harga = $dt_produk['qty'] * $dt_produk['price_product'];
                                        $produk_dibeli .= "</ol>";
                                        //diterima
                                        $qry_cek_diterima = mysqli_query($conn, "select * from tb_pembelian where status = '" . $dt_histori['status'] . "'");
                                        $qry_cek_diterima = mysqli_fetch_array($qry_cek_diterima);
                                        if ($qry_cek_diterima['status'] == 'Barang Sudah sampai') {
                                            $button_diterima = "<a href ='diterima.php?id=".$qry_cek_diterima['id_pembelian']."' onclick='return confirm(\"Produk Berhasil Diterima\")'>Diterima</a>";
                                        } else {
                                            $button_diterima = "";
                                        }
                                ?>
                                        <tr>
                                            <td><?= $no ?></td>
                                            <td><?= $dt_histori['tanggal_pembelian'] ?></td>
                                            <td><?= $produk_dibeli ?></td>
                                            <td><?= $qty_produk ?></td>
                                            <td><?= $hrg_produk ?></td>
                                            <td><?= $total_harga ?></td>
                                            <td><?= $qry_cek_diterima['status'] ?></td>
                                            <td><?= $button_diterima ?></td>
                                        </tr>
                                <?php
                                    }
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </tbody>
        </table>