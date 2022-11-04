<?php
session_start();
include 'db.php';
if($_SESSION['status_login'] != true){
    echo '<script>window.location="login.php"</script>';
}
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
    <h1><a href="dashboard.php">TokoOnline</a></h1>
    <ul>
                <li><a href="dashboard.php">Dashboard</a></li>
                <li><a href="profil.php">Profil</a></li>
                <li><a href="data-kategori.php">Data Kategori</a></li>
                <li><a href="data-produk.php">Data Produk</a></li>
                <li><a href="keluar.php">Keluar</a></li>
    </ul>
    </div>
    </header>

    <!-- content -->
    <div class="section">
        <div class="container">
            <h3>Tambah Data Produk</h3>
            <div class="box">
                <form action="" method="POST" enctype="multipart/form-data">
                   <select class="input-control" name="data-kategori" required>
                    <option value="">--Pilih--</option>
                    <?php
                      $kategori = mysqli_query($conn, "SELECT * FROM tb_category ORDER BY id_category DESC");
                      while($r = mysqli_fetch_array($kategori)){
                        ?>
                        <option value="<?php echo $r['id_category']?> "><?php echo $r['name_category'] ?></option>
                 <?php } ?>
                 </select>

                 <input type="text" name="nama" class="input-control" placeholder="Nama Produk" required>
                 <input type="text" name="harga" class="input-control" placeholder="Harga" required>
                 <input type="file" name="gambar" class="input-control" required>
                 <textarea class="input-control" name="deskripsi" placeholder="Deskripsi"></textarea>
                 <select class="input-control" name="status">
                    <option value="">--Pilih--</option>
                    <option value="1">Aktif</option>
                    <option value="2">Tidak Aktif</option>
                 </select>
                 <input type="submit" name="submit" value="Submit" class="btn">
                      </form>
                    <?php
                 if(isset($_POST['submit'])){

                    // print_r($_FILES['gambar']);
                    // MENAMPUNG INPUTAN DARI FORM
                    $kategori   = $_POST['data-kategori'];
                    $nama       = $_POST['nama'];
                    $harga      = $_POST['harga'];
                    $status     = $_POST['status'];
                    $deskripsi = $_POST['deskripsi'];

                    // menampung data file yang diupload
                    $filename = $_FILES['gambar']['name'];
                    $tmp_name = $_FILES['gambar']['tmp_name'];

                    $type1 = explode('.',$filename);
                    $type2 = $type1[1];

                    $newname = 'produk'.time().".".$type2;

                    // menampung data format file yang diizinkan
                    $tipe_diizinkan = array('jpg', 'jpeg', 'png', 'gif');

                    //validasi format file
                    if(!in_array($type2, $tipe_diizinkan)){
                        // jika format file tidak ada di dalam tipe diizinkan
                        echo '<script>alert("Format file tidak diizinkan")</script';
                    }else{
                    // jika format file sesuai dengan yang ada di dalam array tipe diizinkan
                    //proses upload file sekaligus insert ke database
                        move_uploaded_file($tmp_name, 'produk/'.$filename);

                        $insert = mysqli_query($conn, "INSERT INTO tb_product VALUES(
                            null,
                            '".$kategori."',
                            '".$nama."',
                            '".$harga."',
                            '".$deskripsi."',
                            '".$filename."',
                            '".$status."',
                            null
                                )");
                            if($insert){
                                echo 'simpan data berhasil';
                            }else{
                                echo 'gagal'.mysqli_error($conn);
                            }

                    }
                    

                 }
                 ?>
            </div>
                </div>
            </div>
        </div>
        <!-- footer -->
        <footer>
        <div class="container">
            <small>Copyright &copy; 2022 - TokoOnline.</small>
        </div>
    </footer>
        <script>
            CKEDITOR.replace( 'deskripsi' );
        </script>
    </body>
    </html> 
