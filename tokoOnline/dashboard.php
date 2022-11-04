<?php
    session_start();
    if($_SESSION['status_login'] != true){
        echo '<script>window.location="login_admin.php"</script>';
    }
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
    <!-- Header -->
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
    <!-- Header End -->

    <!-- Content -->
    <div class="sectionn">
        <div class="containerr">
            <h3>Dashboard</h3>
            <div class="boxx">
                <h3>hi, <span>admin</span></h3>
                <h1>welcome <span><?php echo $_SESSION['admin_name'] ?></span></h1>
                <p>this is an admin page</p>
            </div>
        </div>
    </div>
    <!-- Content End-->

    <!-- Footer -->
    <footer> 
        <div class="container">
            <small>Copyright &copy; 2022 - TokoOnline.</small>
        </div>
    </footer>
    <!-- Footer -->

</body>
</html>