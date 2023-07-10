<?php
require('koneksi.php');

function register()
{
    global $koneksi;

    $username = strtolower(stripslashes($_POST['username'])); //Menghapus backslah jika ada
    $password = mysqli_real_escape_string($koneksi, $_POST['password']); //mengeluarkan karakter khusus dalam string untuk digunakan dalam kueri SQL
    $confirmpass = mysqli_real_escape_string($koneksi, $_POST['confirmpass']);
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $umur = $_POST['umur'];
    $level = 'member';

    $cek_username = hasil_query("SELECT username FROM user WHERE username = '$username'");
    $cek_email = hasil_query("SELECT email FROM data_user WHERE email = '$email'");
    $cek_phone = hasil_query("SELECT phone FROM data_user WHERE phone = '$phone'");

    if ($cek_username) {
        echo "<script>
            alert('Username alredy exist !!');
        </script>";

        return false;
    }
    if ($password != $confirmpass) {
        echo "<script>
            alert('Password not same !')
        </script>";

        return false;
    }

    if ($cek_email) {
        echo "<script>
        alert('Email alredy exist !!');
    </script>";

        return false;
    }
    if ($cek_phone) {
        echo "<script>
        alert('Phone alredy exist !!');
    </script>";

        return false;
    }

    $password = password_hash($password, PASSWORD_DEFAULT);

    $query = "INSERT INTO user VALUES(NULL, '$username', '$password')";
    mysqli_query($koneksi, $query);
    $query2 = "INSERT INTO data_user VALUES(NULL, '$nama', '$email', '$phone', '$jenis_kelamin', '$level', '$umur', 0)";
    mysqli_query($koneksi, $query2);

    return mysqli_affected_rows($koneksi);
}
