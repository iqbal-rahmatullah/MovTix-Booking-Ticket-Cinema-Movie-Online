<?php
session_start();
require('../php/koneksi.php');

if (isset($_COOKIE['id_admin']) && isset($_COOKIE['username_admin'])) {
    $cek_id = $_COOKIE['id'];
    $res_pengecekan = mysqli_query($koneksi, "SELECT * FROM admin WHERE id='$cek_id'");
    $pengecekan = mysqli_fetch_assoc($res_pengecekan);
    if ($_COOKIE['username_admin'] === hash('sha256', $pengecekan['username'])) {
        $_SESSION["login_admin"] = true;
        $_SESSION["id_admin"] = $pengecekan['id'];
    }
}

if (isset($_SESSION['login'])) {
    header("Location: index.php");
    exit;
}

$error = false;
if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $result = mysqli_query($koneksi, "SELECT * FROM admin WHERE username='$username'");

    if (mysqli_num_rows($result) === 1) {
        $result = mysqli_fetch_assoc($result);
        // var_dump($result);die;

        if (password_verify($password, $result['password'])) {
            $_SESSION["login_admin"] = true;
            $_SESSION["id_admin"] = $result["id"];

            if (isset($_POST['remember'])) {
                setcookie("username_admin", hash('sha256', $result['username']), time() + 3600);
                setcookie("id_admin", $result['id'], time() + 3600);
            }
            header("Location: index.php");
            exit;
        }
    }

    $error = true;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta scharset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MovTix | Login Page</title>
    <link rel="stylesheet" href="../style/bootstrap-5.2.3-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../style/style.css">
</head>

<body>
    <div class="container d-flex justify-content-center align-items-center min-vh-100" style="width: 600px;">
        <div class="row border rounded-5 p-3 bg-white shadow box-area">
            <div class="col-12 login-right d-flex align-items-center justify-content-center">
                <div class="row align-items-center">
                    <?php if ($error) { ?>
                        <div class="alert alert-danger p-3">
                            <i class="icon-warning2"></i><strong>Wrong Username/Password!!</strong>
                        </div>
                    <?php } ?>
                    <h1 class="text-center mb-4">Admin Login</h1>
                    <form action="" method="POST">
                        <div class="input-group mb-3">
                            <input type="username" class="form-control form-control-lg bg-light fs-6" placeholder="Username" name="username">
                        </div>
                        <div class="input-group mb-3">
                            <input type="password" class="form-control form-control-lg bg-light fs-6" placeholder="Password" name="password">
                        </div>

                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="formCheck" name="remember">
                            <label for="formCheck" class="form-check-label text-secondary"><small>Remember Me</small></label>
                        </div>
                        <div class="input-group mb-3">
                            <button type="submit" name="login" class="btn btn-lg w-100 text-white fs-6 btn-login">Login</button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>

    <script src="../style/bootstrap-5.2.3-dist/js/bootstrap.min.js"></script>
</body>

</html>