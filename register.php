<?php
require('php/proses_register.php');

session_start();
if (isset($_SESSION['login'])) {
    $id_res = $_SESSION["id"];
    $data_user = hasil_query("SELECT * FROM data_user WHERE id = $id_res")[0];

    if ($data_user) {
        header("Location: index.php");
        exit;
    }
}

if (isset($_POST['register'])) {
    $cek_status = register();
    if ($cek_status > 0) {
        echo "<script>
			alert('You have successfully registered account')
            window.location.href = 'login.php'
				</script>";
    } else {
        echo "<script>
					alert('You failed to register account')
				</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta scharset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MovTix | Register Page</title>
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
                        <h2>Hello Friend!</h2>
                        <p>Let's join to get attractive promos</p>
                    </div>
                    <form action="" method="POST">
                        <div class="input-group mb-3">
                            <input type="username" class="form-control form-control-lg bg-light fs-6" placeholder="Username" name="username">
                        </div>
                        <div class="input-group mb-3">
                            <input type="password" class="form-control form-control-lg bg-light fs-6" placeholder="Password" name="password">
                        </div>
                        <div class="input-group mb-3">
                            <input type="password" class="form-control form-control-lg bg-light fs-6" placeholder="Confirm Password" name="confirmpass">
                        </div>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control form-control-lg bg-light fs-6" placeholder="Full Name" name="nama">
                        </div>
                        <div class="d-flex mb-3">
                            <div class="form-check me-3">
                                <input class="form-check-input" type="radio" name="jenis_kelamin" id="jenis_kelamin2" value="Laki-Laki" checked>
                                <label class="form-check-label" for="jenis_kelamin2">
                                    Laki-Laki
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="jenis_kelamin" id="jenis_kelamin1" value="Perempuan">
                                <label class="form-check-label" for="jenis_kelamin1">
                                    Perempuan
                                </label>
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <input type="email" class="form-control form-control-lg bg-light fs-6" placeholder="Email" name="email">
                        </div>
                        <div class="input-group mb-3">
                            <input type="number" class="form-control form-control-lg bg-light fs-6" placeholder="Phone Number" name="phone">
                        </div>
                        <div class="input-group mb-3">
                            <input type="number" class="form-control form-control-lg bg-light fs-6" placeholder="Age" name="umur">
                        </div>
                        <div class="input-group mb-3">
                            <button type="submit" name="register" class="btn btn-lg text-white w-100 fs-6 btn-login">Register</button>
                        </div>
                    </form>
                    <div class="row">
                        <small>Already have an account? <a href="login.php" class="text-signup">Sign In</a></small>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <script src="style/bootstrap-5.2.3-dist/js/bootstrap.min.js"></script>
</body>

</html>