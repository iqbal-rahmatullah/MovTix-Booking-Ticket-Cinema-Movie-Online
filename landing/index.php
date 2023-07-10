<?php
require('../php/koneksi.php');

$data_movie = hasil_query('SELECT * FROM movie');
?>
<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="MovTix Landing Page">
    <meta name="keywords" content="Movtix">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>MovTix | Landing Page</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Mulish:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="css/plyr.css" type="text/css">
    <link rel="stylesheet" href="css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="css/style.css" type="text/css">

    <link rel="shortcut icon" href="../assets/img/icon.png" />
</head>

<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <!-- Header Section Begin -->
    <header class="header d-flex justify-content-between align-items-center">
        <div class="container">
            <div class="header__logo d-flex justify-content-between align-items-center">
                <a href="index.php">
                    <img src="../assets/img/logo.png" width="150000px" alt="">
                    <a href="../login.php" class="btn btn-primary text-white"><i class="fa fa-sign-in"></i> Login / Signup</a>
                </a>
            </div>
        </div>
    </header>
    <!-- Header End -->

    <!-- Hero Section Begin -->
    <section class="hero">
        <div class="container">
            <div class="hero__slider owl-carousel">
                <?php for ($i = 0; $i < 4; $i++) { ?>
                    <div class="hero__items set-bg" data-setbg="<?php echo $data_movie[$i]['banner_url'] ?>">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="hero__text">
                                    <h2><?php echo $data_movie[$i]['judul'] ?></h2>
                                    <p><?php echo $data_movie[$i]['deskripsi'] ?></p>
                                    <a href="details_movie.php?id_movie=<?php echo $data_movie[$i]['id'] ?>"><span>Watch Now</span> <i class="fa fa-angle-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </section>
    <!-- Hero Section End -->

    <!-- Product Section Begin -->
    <section class="product spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="trending__product">
                        <div class="row">
                            <div class="col-lg-8 col-md-8 col-sm-8">
                                <div class="section-title">
                                    <h4>Avaible Now</h4>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-4">
                                <div class="btn__all">
                                    <a href="../login.php" class="primary-btn">Book Now <span class="arrow_right"></span></a>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <?php foreach ($data_movie as $movie) { ?>
                                <div class="col-lg-3 col-md-4">
                                    <a href="details_movie.php?id_movie=<?php echo $movie['id'] ?>">
                                        <div class="product__item border">
                                            <div class="product__item__pic set-bg" data-setbg="<?php echo $movie['poster_url'] ?>">
                                                <div class="ep"><i class="fa fa-child"></i> <?php echo $movie['ketentuan_umur'] - 1 ?>++ years old</div>
                                                <div class="comment"><i class="fa fa-clock-o"></i> <?php echo $movie['durasi'] ?> min</div>
                                                <div class="view"><i class="fa fa-calendar"></i> <?php echo $movie['tanggal_rilis'] ?> </div>
                                            </div>
                                            <div class="product__item__text p-3">
                                                <h5><a href="details_movie.php?id_movie=<?php echo $movie['id'] ?>"><?php echo $movie['judul'] ?></a></h5>
                                                <ul>
                                                    <li>Rp. <?php echo $movie['harga_tiket'] ?></li>
                                                    <li class="bg-success">Avaible</li>
                                                </ul>
                                                <div class="d-flex justify-content-center">
                                                    <a href="details_movie.php?id_movie=<?php echo $movie['id'] ?>" class="btn btn-warning text-white">Book Now</a>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Product Section End -->

    <!-- Footer Section Begin -->
    <footer class="footer">
        <div class="page-up">
            <a href="#" id="scrollToTopButton"><span class="arrow_carrot-up"></span></a>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="footer__logo">
                        <a href="index.php"><img src="../assets/img/logo.png" alt="" width="150"></a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="footer__nav">
                    </div>
                </div>
                <div class="col-lg-3">
                    <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        Copyright &copy;<script>
                            document.write(new Date().getFullYear());
                        </script> All rights reserved
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                    </p>

                </div>
            </div>
        </div>
    </footer>
    <!-- Footer Section End -->

    <!-- Search model Begin -->
    <div class="search-model">
        <div class="h-100 d-flex align-items-center justify-content-center">
            <div class="search-close-switch"><i class="icon_close"></i></div>
            <form class="search-model-form">
                <input type="text" id="search-input" placeholder="Search here.....">
            </form>
        </div>
    </div>
    <!-- Search model end -->

    <!-- Js Plugins -->
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/player.js"></script>
    <script src="js/jquery.nice-select.min.js"></script>
    <script src="js/mixitup.min.js"></script>
    <script src="js/jquery.slicknav.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/main.js"></script>


</body>

</html>