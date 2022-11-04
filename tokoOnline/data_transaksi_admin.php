<?php
    include 'db.php';
    error_reporting(E_ERROR | E_PARSE);
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
            <h1><a href="dashboard.php">TokoOnline</a></h1>
            <ul>
                <li><a href="profil.php">Profil</a></li>
                <li><a href="data-kategori.php">Data Kategori</a></li>
                <li><a href="data-produk.php">Data Produk</a></li>
                <li><a href="data_pelanggan.php">Data Pelanggan</a></li>
                <li><a href="data_transaksi_admin.php">Data Transaksi</a></li>
                <li><a href="keluar.php">Keluar</a></li>

            </ul>
        </div>
    </header>
<div class="container">
        <div class="card">
            <div class="card-header">
                <br><br>
                <h3 align='center'>Data transaksi</h3>
                <br>
        <table class="table table-hover table-striped"><br>
            <thead>
                <tr>
                    <th>NO TRANSAKSI</th>
                    <th></th>
                    <th>NAMA PELANGGAN</th>
                    <th>NAMA BARANG</th>
                    <th>STATUS</th>
                    <th>AKSI</th>
                </tr>
            </thead>
            <tbody>
            <?php
            include "db.php";
            $no = 1;
            $qry_transaksi = mysqli_query($conn, "SELECT b.`id_pembelian`, u.`user_name`, p.name_product, b.`tanggal_pembelian`, b.`status` FROM `tb_pembelian` b JOIN `tb_user` u ON b.`user_id`=u.`id_user` JOIN detail_pembelian_produk d ON b.id_pembelian=d.id_pembelian JOIN tb_product p ON d.product_id = p.id_product");
            while ($data_transaksi=mysqli_fetch_array($qry_transaksi)){
               $subtotal=$data_transaksi['qty'] * $data_transaksi['price_product'];
            ?>
                <tr>
                    <td><?=$no++?></td>
                    <td><?=$data_transaksi['id_user']?></td>
                    <td><?=$data_transaksi['user_name']?></td>
                    <td><?=$data_transaksi['name_product']?></td>
                    <td><?=$data_transaksi['status']?></td>
                    <td>
                        <form action="proses_ubah_status.php" method="post">
                            <input type="hidden" name="id_pembelian" value="<?= $data_transaksi['id_pembelian']?>">
                            <select name="status" onchange='if(this.value != 0) { this.form.submit(); }'>
                                <option value="Pilih Status">Pilih Status</option>
                                <option value="Barang Diconfirm oleh Petugas">Dikonfirmasi</option>
                                <option value="Barang Sedang Dikemas">Barang dikemas</option>
                                <option value="Barang Sedang Dikirim">Barang dikirim</option>
                                <option value="Barang Sudah sampai">Barang sampai</option>
                            </select>
                        </form>
                    </td>
                </tr>
                <?php
                }
                ?>
            </tbody>
        </div>
    </table>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
</body>
</html>