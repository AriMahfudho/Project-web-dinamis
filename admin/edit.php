<?php
require('../dbconnect.php');

$id = $_GET['id'];

$brgs=mysqli_query($conn,"SELECT * from kategori k, produk p where k.idkategori=p.idkategori");[0];
echo mysqli_error($conn);
if(isset($_POST['submit'])){
    //cek keberhasilan
    if(edit($_POST) > 0){
        $error = mysqli_error($conn);
        echo "
            <script>
                alert('Data Berhasil di Edit');
                document.location.href = 'index.php';
            </script>
        ";
    } else {
        echo "
            <script>
                alert('Data gagal diedit');
                // document.location.href = 'index.php';
            </script>
        ";
    }
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit</title>
</head>
<body>
    <?php
    $brgs=mysqli_query($conn,"SELECT * from kategori k, produk p where k.idkategori=p.idkategori and idproduk='$id'");
    $p=mysqli_fetch_array($brgs);
    ?>
    <h1>Edit Data Produk</h1>
    <form action="" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?= $id ?>">
        <input type="hidden" name="gambarlama" value="<?= $p['gambar'] ?>">
        
        <ul>
            <li>
                <label for="gambar">Gambar</label>
                <img src="../<?= $p["gambar"] ?>" alt=""  width="180px" height="200px">
            </li>
            <li>
                <label for="nama">Nama Produk</label>
                <input type="text" name="namaproduk" id="namaproduk" required value="<?= $p['namaproduk'] ?>">
            </li>
            <li>
                <label for="naim">Kategori</label>
                <input type="text" name="kategori" id="kategori" required value="<?= $p['idkategori'] ?>">
            </li>
            <li>
                <label for="hargadiskon">Harga Diskon</label>
                <input type="number" name="hargadiskon" id="hargadiskon" required value="<?= $p['hargaafter'] ?>">
            </li>
            <li>
                <label for="deskripsi">Deskripsi</label>
                <input type="text" name="deskripsi" id="deskripsi" required value="<?= $p['deskripsi'] ?>">
            </li>
            <li>
                <label for="hargaawal">Harga Awal</label>
                <input type="number" name="hargaawal" id="hargaawal" required value="<?= $p['hargabefore'] ?>">
            </li>
            <li>
            <input type="submit" name="submit" value="Edit">
            </li>
        </ul>
    </form>
</body>
</html>