<?php

    // koneksi ke database 
    $conn = mysqli_connect("localhost", "root", "", "uas");

    // fungsi hapus
    function hapus($id) {
        global $conn;
        mysqli_query($conn, "DELETE FROM post WHERE id = $id");

        return mysqli_affected_rows($conn);
    }

    // fungsi registrasi
    function registrasi($data){
        global $conn;

        $nama = htmlspecialchars($data["nama"]);
        $username  = htmlspecialchars(strtolower(stripslashes($data["username"])));
        $email  = htmlspecialchars($data["email"]);
        $password = mysqli_real_escape_string($conn, $data["password"]);
        
        // cek username sudah ada atau belum
        $result = mysqli_query($conn, "SELECT username FROM user WHERE username = '$username'");
        if( mysqli_fetch_assoc($result)) {
            echo "<script>
                alert('Username sudah terdaftar!')
                </script>";
            return false;
        }
        
        // enkripsi password
        $password = password_hash($password, PASSWORD_DEFAULT);
        
        // tambahkan user baru ke database
        mysqli_query($conn, "INSERT INTO user VALUES('', '$nama', '$username', '$email', '$password')");

        return mysqli_affected_rows($conn);

    }

    function upload() {
        $namafile = $_FILES['gambar']['name'];
        $ukuranfile = $_FILES['gambar']['size'];
        $error = $_FILES['gambar']['error'];
        $tmpname = $_FILES['gambar']['tmp_name'];

        // cek apakah tidak ada gambar yang diupload
        if( $error === 4) {
            echo "<script>
                    alert('Masukan gambar terlebih dahulu!');
                    document.location.href = 'posting.php';
                </script>";
            return false;
        }

        // cek apakah yang diupload adalah gambar
        $ekstensigambarvalid = ['jpg', 'jpeg', 'png'];
        $ekstensigambar = explode('.', $namafile);
        $ekstensigambar = strtolower(end($ekstensigambar));
        if( !in_array($ekstensigambar, $ekstensigambarvalid)) {
            echo "<script>
                    alert('Yang anda upload bukan gambar!');
                    document.location.href = 'posting.php';
                </script>";
        }

        // cek jika ukurannya terlalu besar
        if( $ukuranfile > 1000000 ) {
            echo "<script>
                    alert('Ukuran gambar terlalu besar!');
                    document.location.href = 'posting.php';
                </script>";
        }

        // gambar siap diupload
        // generate nama gambar baru
        $namafilebaru = uniqid();
        $namafilebaru .= '.';
        $namafilebaru .= $ekstensigambar;

        move_uploaded_file( $tmpname, 'img/' . $namafilebaru);

        return $namafilebaru;
    }
?>