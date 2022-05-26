<?php

    session_start();

    if ( isset($_SESSION["login"])){
        header("Location: landing.php");
        exit;
    }

    require 'function.php';

    if( isset($_POST["daftar"])) {

        if ( registrasi($_POST) > 0) {
            echo "<script>
            alert('user baru berhasil ditambahkan!');
            </script>";
        } else {
            echo mysqli_error($conn);
        }
    }

    if ( isset($_POST["login"])) {

        $username = $_POST["username"];
        $password = $_POST["password"];

        $result = mysqli_query($conn, "SELECT * FROM user WHERE username = '$username'");

        // cek username
        if( mysqli_num_rows($result) === 1) {

            // cek password
            $row = mysqli_fetch_assoc($result);
            if (password_verify($password, $row["password"]) ) {
                // set session
                $_SESSION["login"] = true;

                header("Location: landing.php");
                exit;
            }
        }

        $error = true;
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CatHolic</title>
    <link rel="stylesheet" href="css/logres.css?<?php echo time();?>">
    <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>
</head>
<body>
    <!-- Untuk Konten -->
    <div class="konten">
        <!-- Untuk Form Konten -->
        <div class="form_konten">
            <!-- Untuk Menu Login dan Registrasi -->
            <div class="logres">
                <!-- Untuk Form Login -->
                <form action="" class="login_form" method="post">
                    <h2 class="judul">Login</h2>
                    <!-- Pesan Error Saat Login -->
                    <?php if( isset($error) ) : ?>
                        <p class="pesan">Username atau Password anda salah!</p>
                    <?php endif; ?>
                    <!-- Untuk Menu Username -->
                    <div class="input_1">
                        <i class="fas fa-user"></i>
                        <input type="text" placeholder="Username" name="username">
                    </div>
                    <!-- Untuk Menu Password -->
                    <div class="input_1">
                        <i class="fas fa-lock"></i>
                        <input type="password" placeholder="Password" name="password">
                    </div>
                    <!-- Untuk Menu Submit Login-->
                    <div class="tombol">
                    <input type="reset" value="Reset" class="tbl_tbl">
                    <input type="submit" value="Login" class="tbl" name="login">
                    </div>
                    <!-- Untuk Menu Login dengan berbagai platform -->
                    <p class="platform">atau Login dengan berbagai Platform berikut</p>
                    <!-- Untuk Bagian Icon Platform -->
                    <div class="media">
                    <!-- Untuk Icon Facebook -->
                        <a href="#" class="ikon-media">
                        <i class="fab fa-facebook-f"></i>
                        </a>
                    <!-- Untuk Icon Twitter -->
                        <a href="#" class="ikon-media">
                        <i class="fab fa-twitter"></i>
                        </a>
                    <!-- Untuk Icon Google -->
                        <a href="#" class="ikon-media">
                        <i class="fab fa-google"></i>
                        </a>
                    </div>
                </form>

                <!-- Untuk Form Daftar -->
                <form action="" class="daftar_form" method="post">
                    <h2 class="judul">Daftar</h2>
                    <!-- Untuk Menu Nama Lengkap -->
                    <div class="input_1">
                        <i class="fas fa-user"></i>
                        <input type="text" placeholder="Nama Lengkap" name="nama">
                    </div>
                    <!-- Untuk Menu Username -->
                    <div class="input_1">
                        <i class="fas fa-user"></i>
                        <input type="text" placeholder="Username" name="username">
                    </div>
                    <!-- Untuk Menu Email -->
                    <div class="input_1">
                        <i class="fas fa-envelope"></i>
                        <input type="email" placeholder="Email" name="email">
                    </div>
                    <!-- Untuk Menu Password -->
                    <div class="input_1">
                        <i class="fas fa-lock"></i>
                        <input type="password" placeholder="Password" name="password">
                    </div>
                    <!-- Untuk Menu Submit Daftar-->
                    <div class="tombol">
                    <input type="reset" value="Reset" class="tbl_tbl">
                    <input type="submit" value="Daftar" class="tbl" name="daftar">
                    </div>
                    <!-- Untuk Menu Login dengan berbagai platform -->
                    <p class="platform">atau Daftar dengan berbagai Platform berikut</p>
                    <!-- Untuk Bagian Icon Platform -->
                    <div class="media">
                    <!-- Untuk Icon Facebook -->
                        <a href="#" class="ikon-media">
                        <i class="fab fa-facebook-f"></i>
                        </a>
                    <!-- Untuk Icon Twitter -->
                        <a href="#" class="ikon-media">
                        <i class="fab fa-twitter"></i>
                        </a>
                    <!-- Untuk Icon Google -->
                        <a href="#" class="ikon-media">
                        <i class="fab fa-google"></i>
                        </a>
                    </div>
                </form>
            </div>
        </div>

        <div class="konten_2">
            <!-- Konten Sebelah Kiri -->
            <div class="kon konten_kiri">
                <div class="kont">
                    <h3 class="kata">Bergabunglah Dengan Kami</h3>
                    <p class="kata">Ayo jadilah bagian dari kami sebagai komunitas pecinta Kucing dengan menekan tombol di bawah ini.</p>
                    <button type="submit" class="tbl_A transparent" id="daftar_tbl">Daftar</button>
                </div>
                <img src="img/Group 2.png" class="gam" alt="">
            </div>
            <!-- Konten Sebelah Kanan -->
            <div class="kon konten_kanan">
                <div class="kont">
                    <h3 class="kata">Selamat Datang</h3>
                    <p class="kata">Silahkan untuk melakukan login agar dapat melanjutkan ke menu selanjutnya</p>
                    <button type="submit" class="tbl_A transparent" id="login_tbl">Login</button>
                </div>
                <img src="img/kukuc.png" class="gam" alt="">
            </div>
        </div>
    </div>

    <script src="js/logres.js"></script>
</body>
</html>