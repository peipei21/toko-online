<?php
    session_start();
    include 'db.php';
    if($_SESSION['status_login'] != true){
        echo '<script>window.location="login_admin.php"</script>';
    }

    $query = mysqli_query($conn, "SELECT * FROM tb_admin WHERE id_admin = '".$_SESSION['id']."'");
    $d = mysqli_fetch_object($query);
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
                <li><a href="login_admin.php">Keluar</a></li>

            </ul>
        </div>
    </header>
    <!-- Header End -->

    <!-- Content -->
    <div class="section">
        <div class="container">
            <h3>Profil</h3>
            <div class="box">
                <form action="" method="POST">
                    <input type="text" name="admin_name" placeholder="Nama Lengkap" class="input-control" value="<?php echo $d->admin_name ?>" required>
                    <input type="text" name="username" placeholder="Username" class="input-control" value="<?php echo $d->username ?>" required>
                    <input type="text" name="telp_admin" placeholder="No HP" class="input-control" value="<?php echo $d->telp_admin ?>" required>
                    <input type="text" name="email_admin" placeholder="Email" class="input-control" value="<?php echo $d->email_admin ?>" required>
                    <input type="text" name="address_admin" placeholder="Alamat" class="input-control" value="<?php echo $d->address_admin ?>" required>
                    <input type="submit" name="submit" value="Ubah Profil" class="btn">
                </form>
                <?php
                    if(isset($_POST['submit'])){

                       $nama   = ucwords($_POST['admin_name']);
                       $user   = $_POST['username']; 
                       $nohp   = $_POST['telp_admin']; 
                       $email  = $_POST['email_admin']; 
                       $alamat = ucwords($_POST['address_admin']); 
 
                       $update = mysqli_query($conn, "UPDATE tb_admin SET
                                        admin_name = '".$nama."',
                                        username = '".$user."',
                                        telp_admin = '".$nohp."',
                                        email_admin = '".$email."',
                                        address_admin = '".$alamat."' 
                                        WHERE id_admin = '".$d->id_admin."'");

                        if($update){
                            echo '<script>alert(Ubah data berhasil)</script>';
                            echo '<script>window.location="profil.php"</script>';
                        }else{
                            echo 'gagal '.mysqli_error($conn);
                        }
                    }
                ?>
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