<?php

    session_start();
    if ( !isset($_SESSION["login"]) ) {
        header("Location: logres.php");
        exit;
    }

    require 'function.php';
    // mengambil data dari tabel post
    $result = mysqli_query($conn, "SELECT * FROM post");

    // mengambil data dari tabel user
    $user = mysqli_query($conn, "SELECT * FROM user");
    $ambil = mysqli_fetch_assoc($user);
    

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/akun.css?<?php echo time();?>">
    <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>
    <!--===== Boxicons CSS =====-->
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
    <title>CatHolic</title>
</head>
<body>
    <div class="garis">
        <a href="posting.php" class="kata_A">Upload</a>
        <a href="logout.php" class="kata_1">Logout</a>
        <a href="landing.php" class="kata_1">Back</a>
        <a href="akun.php" class="kata_1">Me</a>
        <p class="kata">CatHolic</p>
        <div class="search-box">
                <i class="bx bx-search"></i>
                <input type="text" placeholder="Search">
        </div>
    </div>

        <div class="logo_2">
            <a class="logo_2" href="logres.php"><img class="mas" src="img/cat.png" alt=""></a>
            <p class="nama"><?php echo $ambil['username']; ?></p>
            <a href="" class="edit">Edit Profile</a>
            <p class="nama_2"><?php echo $ambil['nama']; ?></p>

            <p class="post">0</p>
            <p class="post_1">Likes</p>

            <p class="post2">0</p>
            <p class="post_2">Followers</p>

            <p class="post3">0</p>
            <p class="post_3">Following</p>
        </div>

                <div class="media">
                    <!-- Untuk Icon Facebook -->
                        <a href="posting.php" class="ikon-media">
                        <i class="fas fa-plus"></i>
                        </a>
                    <!-- Untuk Icon Twitter -->
                        <a href="#" class="ikon-media">
                        <i class="fas fa-heart"></i>
                        </a>
                    <!-- Untuk Icon Google -->
                        <a href="#" class="ikon-media">
                        <i class="fas fa-save"></i>
                        </a>

                        <a href="#" class="ikon-media">
                        <i class="fas fa-trash"></i>
                        </a>
                </div>

                <div class="product-container">
                    <?php while( $pos = mysqli_fetch_assoc($result) ) : ?>
                        <div class="product-card">
                            <div class="product-image">
                                <img src="img/<?= $pos["gambar"]; ?>" class="product-thumb" alt="">
                                <button class="card-btn">
                                <a href="edit.php?id=<?= $pos["id"]; ?>" class="aksi">Edit</a> | 
                                <a href="hapus.php?id=<?= $pos["id"]; ?>" class="aksi">Hapus</a>
                                </button>
                            </div>
                        </div>
                    <?php endwhile; ?>
                </div>
            

        <script src="js/script2.js"></script>
</body>
</html>