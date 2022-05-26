<?php

    session_start();
    if ( !isset($_SESSION["login"]) ) {
        header("Location: logres.php");
        exit;
    }

    // koneksi ke database
    require 'function.php';

    // ambil data dari url
    $id = $_GET['id'];

    // query data mahasiswa berdasarkan id nya
    $pos = mysqli_query($conn, "SELECT * FROM post WHERE id = '$id' ");
    $ambil = mysqli_fetch_assoc($pos);

    if(isset($_POST['submit'])){

        $id = $_POST['id'];
        $nama = $_POST['nama'];
        $jenis = $_POST['jenis'];
        $caption = $_POST['caption'];
        $gambarLama = $_POST['gambarLama'];

        if( $_FILES['gambar']['error'] === 4) {
            $gambar = $gambarLama;
        } else {
            $gambar = $_POST['gambar'];
        }

        $new = mysqli_query($conn, "UPDATE post SET nama='$nama', jenis='$jenis', caption='$caption',
                    gambar='$gambar' WHERE id = $id") or die(mysqli_error($conn));

                    if ($new){
                        echo "<script>alert('Data Berhasil Diupdate'); 
                                window.location.href='akun.php';
                                </script>";
                    } else echo "<script>alert('Data Gagal Diupdate'); 
                                    window.location.href='akun.php';
                            </script>";
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CatHolic</title>
    <link rel="stylesheet" href="css/gaya3.css?<?php echo time(); ?>">
</head>
<body>
    <div class="panah">
        <img src="img/slebew.png" alt="">
    </div>
    <a class="kata" href="akun.php" >Kembali</a>
    <div class="kelas">
    <h1>Edit Postingan Anda</h1>

        <form action="" method="post">
            <input type="hidden" name="id" id="id" value="<?php if($ambil['id'] != "") echo $ambil['id']; ?>">
            <input type="hidden" name="gambarLama" id="gambarLama" 
            value="<?php if($ambil['gambarLama'] != "") echo $ambil['gambarLama']; ?>">
            <li>
                <label for="nama">Nama Kucing  </label>
                <input type="text" name="nama" id="nama"
                value="<?php if($ambil['nama'] != "") echo $ambil['nama']; ?>">
            </li>

            <li>
                <label for="jenis">Jenis Kucing  </label>
                <input type="text" name="jenis" id="jenis"
                value="<?php if($ambil['jenis'] != "") echo $ambil['jenis']; ?>">
            </li>

            <li>
                <label for="caption">Caption  </label>
                <input type="text" name="caption" id="caption"
                value="<?php if($ambil['caption'] != "") echo $ambil['caption']; ?>">
            </li>

            <li>
                <label for="gambar">Gambar Kucing  </label>
                <div class="garis"></div>
                    <img src="img/<?php if($ambil['gambar'] != "") echo $ambil['gambar']; ?>" alt="" class="gagam">
                <input type="file" name="gambar" id="gambar" class="input-1">
            </li>

            <li>
                <button type="reset" name="reset" class="btn">Batal</button>
                <button type="submit" name="submit">Edit</button>
            </li>
        </form>
    </div>
    
</body>
</html>