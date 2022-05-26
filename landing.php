<?php

    session_start();
    if ( !isset($_SESSION["login"]) ) {
        header("Location: logres.php");
        exit;
    }

    require 'function.php';
    $result = mysqli_query($conn, "SELECT * FROM post");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CatHolic</title>
    <link rel="stylesheet" href="css/gaya2.css?<?php echo time();?>">
    <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>
    <!-- Boxicons CSS -->
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>
<nav>
        <div class="wrapper">
            <div class="logo">
                <img src="img/cat 2.png" alt="">
                <p>CatHolic</p>
            </div>
            
            <div class="menu">
                <ul>
                    <li><a href="">Home</a></li>
                    <li><a href="">Menu</a></li>
                    <li><a href="">About</a></li>
                    <li><a href="">Contact</a></li>
                </ul>
            </div>
        </div>
        
        <div class="logo_2">
            <a class="logo_2" href="akun.php"><img class="mas" src="img/cat.png" alt=""></a>
        </div>
    </nav>

        <div class="garis">
            <img class="ucing" src="img/cing1.png" alt="">
            <p class="kata_ucing">Temukan & Cari Majikan Kesukaan Mu</p>
            <p class="kata_ucing_2">Kami para kucing hanya ingin kalian menjadi babu kami <br>
            Tapi mengapa kalian tendang kami, pukul kami, sleding kami <br>
            Cintai lah kami sebagai mana kami mencintai mu Manusia</p>
        </div>

        <div class="list">
            <p class="list_1">Kucing Tergemoy</p>
                <a class="list_A" href="">Kampung</a>
                <a class="list_2" href="">Muchkin</a>
                <a class="list_C" href="">Garong</a>
                <a class="list_2" href="">Anggora</a>
                <a class="list_B" href="">Oyen</a>
        </div>

        <!-- Card Slider -->
    <section class="product">
        <button class="pre-btn"><img src="img/arrow.png" alt=""></button>
        <button class="nxt-btn"><img src="img/arrow.png" alt=""></button>
        <div class="product-container">
            <?php while( $pos = mysqli_fetch_assoc($result)) : ?>
                <div class="product-card">
                    <div class="product-image">
                        <img src="img/<?= $pos["gambar"]; ?>" class="product-thumb" alt="">
                        <button class="card-btn"><?= $pos["caption"]; ?></button>
                    </div>
                </div>
            <?php endwhile; ?>
            <div class="product-card">
                <div class="product-image">
                    <img src="img/1.jpeg" class="product-thumb" alt="">
                    <button class="card-btn">Cute Banget</button>
                </div>
            </div>

            <div class="product-card">
                <div class="product-image">
                    <img src="img/2.jpeg" class="product-thumb" alt="">
                    <button class="card-btn">Lucu Banget</button>
                </div>
            </div>

            <div class="product-card">
                <div class="product-image">
                    <img src="img/3.jpeg" class="product-thumb" alt="">
                    <button class="card-btn">Keren Banget</button>
                </div>
            </div>

            <div class="product-card">
                <div class="product-image">
                    <img src="img/4.jpeg" class="product-thumb" alt="">
                    <button class="card-btn">Gemes Banget</button>
                </div>
            </div>

            <div class="product-card">
                <div class="product-image">
                    <img src="img/5.jpeg" class="product-thumb" alt="">
                    <button class="card-btn">Cool Banget</button>
                </div>
            </div>

            <div class="product-card">
                <div class="product-image">
                    <img src="img/6.jpeg" class="product-thumb" alt="">
                    <button class="card-btn">Ganteng Banget</button>
                </div>
            </div>

            <div class="product-card">
                <div class="product-image">
                    <img src="img/7.jpeg" class="product-thumb" alt="">
                    <button class="card-btn">Swag Banget</button>
                </div>
            </div>

            <div class="product-card">
                <div class="product-image">
                    <img src="img/8.jpeg" class="product-thumb" alt="">
                    <button class="card-btn">Stylish Banget</button>
                </div>
            </div>
        </div>
    </section>

        <div class="container">
            <p class="kata_ucing3">Kucing Yang Mungkin Anda Sukai</p>
            <div class="search-box">
                <i class="bx bx-search"></i>
                <input type="text" placeholder="Search your cat">
            </div>

            <div class="images">
                <div class="image-box" data-name="gemoy">
                    <img src="img/kitten2.jpg" alt="">
                    <h6>anak kucing</h6>
                </div>

                <div class="image-box" data-name="gemoy">
                    <img src="img/kitten-3.jpg" alt="">
                    <h6>anak kucing</h6>
                </div>

                <div class="image-box" data-name="gemoy">
                    <img src="img/kitten4.jpg" alt="">
                    <h6>anak kucing</h6>
                </div>

                <div class="image-box" data-name="gemoy">
                    <img src="img/kitten5.jpg" alt="">
                    <h6>anak kucing</h6>
                </div>

                <div class="image-box" data-name="kucing">
                    <img src="img/akward3.jpg" alt="">
                    <h6>anak kucing</h6>
                </div>

                <div class="image-box" data-name="anakkucing">
                    <img src="img/akward.jpg" alt="">
                    <h6>anak kucing</h6>
                </div>

                <div class="image-box" data-name="">
                    <img src="img/akward2.jpg" alt="">
                    <h6>anak kucing</h6>
                </div>

                <div class="image-box" data-name="">
                    <img src="img/akward4.jpg" alt="">
                    <h6>anak kucing</h6>
                </div>
            </div>
        </div>

        <div class="footer">
            <p class="fot_kata1">CatHolic</p>
            <p class="fot_kata">Jl.Proklamasi</p>
            <p class="fot_kata">Rengasdengklok</p>
            <p class="fot_kata">Karawang Jawa Barat</p>

            <p class="fot_kata2">Community</p>
            <p class="fot_kata_1">About</p>
            <p class="fot_kata_1">Contact Us</p>
            <p class="fot_kata_1">Support</p>
            <p class="fot_kata_1">Other</p>

            <p class="fot_kata3">Social Media</p>
            <p class="fot_kata_2">Facebook</p>
            <p class="fot_kata_2">Instagram</p>
            <p class="fot_kata_2">Twitter</p>
            <p class="fot_kata_2">Youtube</p>

            <p class="fot_kata4">Subcribe for connect</p>
            <p class="fot_kata_3">Get Started</p>
            <img src="img/slebew.png" alt="" class="awe">
            <div class="media">
                    <!-- Untuk Icon Facebook -->
                        <a href="#" class="ikon-media">
                        <i class="fab fa-facebook-f"></i>
                        </a>
                    <!-- Untuk Icon Instagram -->
                        <a href="#" class="ikon-media">
                        <i class="fab fa-instagram"></i>
                        </a>
                    <!-- Untuk Icon Twitter -->
                        <a href="#" class="ikon-media">
                        <i class="fab fa-twitter"></i>
                        </a>
                    <!-- Untuk Icon Youtube -->
                    <a href="#" class="ikon-media">
                        <i class="fab fa-youtube"></i>
                    </a>
            </div>
            <div class="garis_x"></div>
            <p class="copyright">Copyright &copy; CatHolic Community 2022 Credit by Wisnu Saputra</p>
        </div>
        <div class="footer_2">
            <img src="img/cat 2.png" alt="">
            <p class="footer_kata">Let's Join With US!</p>
            <p class="footer_kata_2">Add your friends to join with our community</p>
            <p class="footer_kata_3">Get Started</p>
            <img src="img/slebew.png" alt="" class="awe">
        </div>

        <script src="js/script.js"></script>
        <script src="js/script2.js"></script>
</body>
</html>