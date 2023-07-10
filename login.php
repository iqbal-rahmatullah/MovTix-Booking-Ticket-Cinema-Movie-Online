<?php
session_start();
require('./php/koneksi.php');

if (isset($_COOKIE['id']) && isset($_COOKIE['username'])) {
    $cek_id = $_COOKIE['id'];
    $res_pengecekan = mysqli_query($koneksi, "SELECT * FROM user WHERE id='$cek_id'");
    $pengecekan = mysqli_fetch_assoc($res_pengecekan);
    if ($_COOKIE['username'] === hash('sha256', $pengecekan['username'])) {
        $_SESSION["login"] = true;
        $_SESSION["id"] = $pengecekan['id'];
    }
}

if (isset($_SESSION['login'])) {
    $id_res = $_SESSION["id"];
    $data_user = hasil_query("SELECT * FROM data_user WHERE id = $id_res")[0];

    if ($data_user) {
        header("Location: index.php");
        exit;
    }
}

$error = false;
if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $result = mysqli_query($koneksi, "SELECT * FROM user WHERE username='$username'");

    if (mysqli_num_rows($result) === 1) {
        $result = mysqli_fetch_assoc($result);
        // var_dump($result);die;

        if (password_verify($password, $result['password'])) {
            $_SESSION["login"] = true;
            $_SESSION["id"] = $result["id"];

            if (isset($_POST['remember'])) {
                setcookie("username", hash('sha256', $result['username']), time() + 3600);
                setcookie("id", $result['id'], time() + 3600);
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
    <link rel="stylesheet" href="style/bootstrap-5.2.3-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="style/style.css">

    <link rel="shortcut icon" href="assets/img/icon.png" />
</head>

<body>
    <div class="container d-flex justify-content-center align-items-center min-vh-100">
        <div class="row border rounded-5 p-3 bg-white shadow box-area">

            <div class="col-md-6 rounded-4 d-flex justify-content-center align-items-center flex-column login-left" style="background: #1A1C24;">
                <div class="featured-image">
                    <img src="./assets/img/background-login.png" class="img-fluid" style="width: 550px;">
                </div>
                <div class="desc-left mb-3 text-center">
                    <p class="text-white fs-2" style="font-family: 'Playfair Display', serif; font-weight: 600;">Enjoy The Best Movie</p>
                    <small class="text-white text-wrap text-center" style="width: 17rem;font-family: 'Playfair Display', serif;">Keep Up To Date With The Latest News, And Get Attractive Deals And Promos!</small>
                </div>
            </div>

            <div class="col-md-6 login-right d-flex align-items-center">
                <div class="row align-items-center">
                    <div class="header-text mb-4">
                        <h2>Hello,Again</h2>
                        <p>We are happy to have you back.</p>
                    </div>
                    <?php if ($error) { ?>
                        <div class="alert alert-danger p-3">
                            <i class="icon-warning2"></i><strong>Wrong Username/Password!!</strong>
                        </div>
                    <?php } ?>
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
                    <div class="row">
                        <small>Don't have account? <a href="register.php" class="text-signup">Sign Up</a></small>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <script src="style/bootstrap-5.2.3-dist/js/bootstrap.min.js"></script>
</body>

</html>