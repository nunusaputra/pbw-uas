<?php

    session_start();
    if ( !isset($_SESSION["login"]) ) {
        header("Location: logres.php");
        exit;
    }

    // koneksi ke database
    require 'function.php';

    // cek apakah tombol submit sudah ditekan atau belum

    if( isset($_POST["submit"])) {


        
        // ambil data dari tiap elemen dalam form
        $nama = $_POST["nama"];
        $jenis = $_POST["jenis"];
        $caption = $_POST["caption"];
        
        // upload gambar
        $gambar = upload();
        if( !$gambar ) {
            return false;
        }

        // query insert data
        $query = "INSERT INTO post VALUES ('', '$nama', '$jenis', '$caption', '$gambar')";
        mysqli_query($conn, $query);

        if( $query ) {
            echo "<script>
                    alert('Postingan anda berhasil diupload!');
                    document.location.href = 'akun.php';
                </script>";
        } else {
            "<script>
                    alert('Postingan anda gagal diupload!');
                    document.location.href = 'akun.php';
            </script>";
        }
        
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CatHolic</title>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="css/gaya3.css?<?php echo time(); ?>">
</head>
<body>
    <div class="panah">
        <img src="img/slebew.png" alt="">
    </div>
    <a class="kata" href="akun.php" >Kembali</a>
    <div class="kelas">
    <h1>Buat Postingan Baru</h1>

        <form action="" method="post" enctype="multipart/form-data">
            <li>
                <label for="nama">Nama Kucing  </label>
                <input type="text" name="nama" id="nama">
            </li>

            <li>
                <label for="jenis">Jenis Kucing  </label>
                <input type="text" name="jenis" id="jenis">
            </li>

            <li>
                <label for="caption">Caption  </label>
                <input type="text" name="caption" id="caption">
            </li>

            <li>
                <label for="gambar" >Masukan Gambar  </label>
                <input type="file" name="gambar" id="gambar" class="input-1">
            </li>

            <li>
                <button type="reset" name="reset" class="btn">Batal</button>
                <button type="submit" name="submit">Posting</button>
            </li>
        </form>

                <img src="img/Group 2.png" alt="" class="cover">
            </div>
    
</body>
</html>