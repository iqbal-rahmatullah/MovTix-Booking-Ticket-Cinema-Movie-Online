<?php
require('./php/koneksi.php');
session_start();

if (!isset($_SESSION["login"])) {
  header("Location: landing");
}

$id_res = $_SESSION["id"];
$data_user = hasil_query("SELECT * FROM data_user WHERE id = '$id_res'")[0];
$data_movie = hasil_query("SELECT * FROM movie");

if (!$data_user) {
  header("Location: landing");
}

$total_orders = hasil_query("SELECT COUNT(id_order) as jum FROM orders WHERE id_user = $id_res")[0];
$total_topup = hasil_query("SELECT COUNT(id) as jum FROM topup WHERE id_user = $id_res")[0];
$total_withdraw = hasil_query("SELECT COUNT(id) as jum FROM withdraw WHERE id_user = $id_res")[0];
$balance_trx = $total_topup['jum'] + $total_withdraw['jum'];

$all_order = hasil_query("SELECT * FROM orders WHERE id_user = $id_res AND status = 'Paid' ORDER BY tanggal_order DESC LIMIT 4");
$topup_trx = hasil_query("SELECT * FROM topup WHERE id_user = $id_res AND status = 'success' ORDER BY id DESC LIMIT 2");
$withdraw_trx = hasil_query("SELECT * FROM withdraw WHERE id_user = $id_res AND status = 'success' ORDER BY id DESC LIMIT 2");

$profile_img = $data_user['jenis_kelamin'] = "Laki-Laki" ? "boy.png" : "girl.png";
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>MovTix | Dashboard</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="assets/vendors/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="assets/vendors/css/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <link rel="stylesheet" href="assets/vendors/jvectormap/jquery-jvectormap.css">
  <link rel="stylesheet" href="assets/vendors/flag-icon-css/css/flag-icon.min.css">
  <link rel="stylesheet" href="assets/vendors/owl-carousel-2/owl.carousel.min.css">
  <link rel="stylesheet" href="assets/vendors/owl-carousel-2/owl.theme.default.min.css">
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <!-- endinject -->
  <!-- Layout styles -->
  <link rel="stylesheet" href="assets/css/style.css">
  <link rel="stylesheet" href="css/card_movie.css">
  <!-- End layout styles -->
  <link rel="shortcut icon" href="assets/img/icon.png" />
</head>

<body>
  <div class="container-scroller">
    <!-- partial:partials/_sidebar.html -->
    <nav class="sidebar sidebar-offcanvas" id="sidebar">
      <div class="sidebar-brand-wrapper d-none d-lg-flex align-items-center justify-content-center fixed-top">
        <a class="sidebar-brand brand-logo" href="index.php"><img src="assets/img/logo.png" alt="logo" /></a>
        <a class="sidebar-brand brand-logo-mini" href="index.php"><img src="assets/img/icon.png" alt="logo" /></a>
      </div>
      <ul class="nav">
        <li class="nav-item profile">
          <div class="profile-desc">
            <div class="profile-pic">
              <div class="count-indicator">
                <img class="img-xs rounded-circle " src="assets/img/<?php echo $profile_img ?>" alt="">
                <span class="count bg-success"></span>
              </div>
              <div class="profile-name">
                <h5 class="mb-0 font-weight-normal"><?php echo $data_user['nama'] ?></h5>
                <span><?php echo $data_user['level'] ?></span>
              </div>
            </div>
            <a href="#" id="profile-dropdown" data-toggle="dropdown"><i class="mdi mdi-dots-vertical"></i></a>
            <div class="dropdown-menu dropdown-menu-right sidebar-dropdown preview-list" aria-labelledby="profile-dropdown">
              <a href="settings.php" class="dropdown-item preview-item">
                <div class="preview-thumbnail">
                  <div class="preview-icon bg-dark rounded-circle">
                    <i class="mdi mdi-settings text-primary"></i>
                  </div>
                </div>
                <div class="preview-item-content">
                  <p class="preview-subject ellipsis mb-1 text-small">Account settings</p>
                </div>
              </a>
              <div class="dropdown-divider"></div>
              <div class="dropdown-divider"></div>
              <a href="logout.php" class="dropdown-item preview-item">
                <div class="preview-thumbnail">
                  <div class="preview-icon bg-dark rounded-circle">
                    <i class="mdi mdi-logout text-danger"></i>
                  </div>
                </div>
                <div class="preview-item-content">
                  <p class="preview-subject ellipsis mb-1 text-small">Log Out</p>
                </div>
              </a>
            </div>
          </div>
        </li>
        <li class="nav-item nav-category">
          <span class="nav-link">Navigation</span>
        </li>
        <li class="nav-item menu-items">
          <a class="nav-link" href="index.php">
            <span class="menu-icon">
              <i class="mdi mdi-speedometer"></i>
            </span>
            <span class="menu-title">Dashboard</span>
          </a>
        </li>
        <li class="nav-item menu-items">
          <a class="nav-link" href="movies.php">
            <span class="menu-icon">
              <i class="mdi mdi-film"></i>
            </span>
            <span class="menu-title">All Movie</span>
          </a>
        </li>
        <li class="nav-item menu-items">
          <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
            <span class="menu-icon">
              <i class="mdi mdi-database-plus text-success"></i>
            </span>
            <span class="menu-title">Balance</span>
            <i class="menu-arrow"></i>
          </a>
          <div class="collapse" id="ui-basic">
            <ul class="nav flex-column sub-menu">
              <li class="nav-item"> <a class="nav-link" href="topup.php">Top Up</a></li>
              <li class="nav-item"> <a class="nav-link" href="withdraw.php">Withdraw</a></li>
              <li class="nav-item"> <a class="nav-link" href="history_topup.php">History</a></li>
            </ul>
          </div>
        </li>
        <li class="nav-item menu-items">
          <a class="nav-link" href="history_orders.php">
            <span class="menu-icon">
              <i class="mdi mdi-history"></i>
            </span>
            <span class="menu-title">History Order</span>
          </a>
        </li>
        <li class="nav-item menu-items">
          <a class="nav-link" href="settings.php">
            <span class="menu-icon">
              <i class="mdi mdi-settings text-white"></i>
            </span>
            <span class="menu-title">Settings</span>
          </a>
        </li>
        <li class="nav-item menu-items">
          <a class="nav-link" href="logout.php">
            <span class="menu-icon">
              <i class="mdi mdi-exit-to-app text-danger"></i>
            </span>
            <span class="menu-title">Log Out</span>
          </a>
        </li>
      </ul>
    </nav>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_navbar.html -->
      <nav class="navbar p-0 fixed-top d-flex flex-row">
        <div class="navbar-brand-wrapper d-flex d-lg-none align-items-center justify-content-center">
          <a class="navbar-brand brand-logo-mini" href="index.php"><img src="assets/img/icon.png" alt="logo" /></a>
        </div>
        <div class="navbar-menu-wrapper flex-grow d-flex align-items-stretch">
          <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
            <span class="mdi mdi-menu"></span>
          </button>
          <ul class="navbar-nav navbar-nav-right">
            <li class="nav-item dropdown border-left">
              <a class="nav-link count-indicator dropdown-toggle" id="messageDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
                <i class="mdi mdi mdi-cart-outline"></i>
                <span class="count bg-success"></span>
              </a>
              <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="messageDropdown">
                <h6 class="p-3 mb-0">Your Orders</h6>
                <?php foreach ($all_order as $order) { ?>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item preview-item" href="view_orders.php?id_pesanan=<?php echo str_replace('#', '', $order['id_order']) ?>">
                    <div class="preview-thumbnail">
                      <div class="preview-icon bg-dark rounded-circle">
                        <i class="mdi mdi-cart-plus text-info"></i>
                      </div>
                    </div>
                    <div class="preview-item-content">
                      <p class="preview-subject ellipsis mb-1"><?php echo $order['id_order'] ?></p>
                      <p class="text-muted mb-0"> You have successfully checked out Rp.<?php echo $order['total_harga'] ?> </p>
                    </div>
                  </a>
                  <div class="dropdown-divider"></div>
                <?php } ?>
                <div class="dropdown-divider"></div>
                <a href="history_orders.php">
                  <p class="p-3 mb-0 text-center">View All Transaction</p>
                </a>
              </div>
            </li>
            <li class="nav-item dropdown border-left">
              <a class="nav-link count-indicator dropdown-toggle" id="notificationDropdown" href="#" data-toggle="dropdown">
                <i class="mdi mdi mdi-cash-usd"></i>
                <span class="count bg-danger"></span>
              </a>
              <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="notificationDropdown">
                <h6 class="p-3 mb-0">Balance Transaction</h6>
                <?php foreach ($topup_trx as $topup) { ?>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item preview-item">
                    <div class="preview-thumbnail">
                      <div class="preview-icon bg-dark rounded-circle">
                        <i class="mdi mdi-database-plus text-success"></i>
                      </div>
                    </div>
                    <div class="preview-item-content">
                      <p class="preview-subject mb-1">Rp.<?php echo $topup['total'] ?></p>
                      <p class="text-muted ellipsis mb-0"> You have successfully top up your balance Rp. <?php echo $topup['total'] ?></p>
                    </div>
                  </a>
                  <div class="dropdown-divider"></div>
                <?php } ?>
                <?php foreach ($withdraw_trx as $withdraw) { ?>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item preview-item">
                    <div class="preview-thumbnail">
                      <div class="preview-icon bg-dark rounded-circle">
                        <i class="mdi mdi-database-minus text-danger"></i>
                      </div>
                    </div>
                    <div class="preview-item-content">
                      <p class="preview-subject mb-1">- Rp.<?php echo $withdraw['total'] ?></p>
                      <p class="text-muted ellipsis mb-0"> You have successfully withdraw your balance Rp. <?php echo $withdraw['total'] ?></p>
                    </div>
                  </a>
                  <div class="dropdown-divider"></div>
                <?php } ?>
                <div class="dropdown-divider"></div>
                <a href="history_topup.php">
                  <p class="p-3 mb-0 text-center">View Balance Transaction</p>
                </a>
              </div>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link" id="profileDropdown" href="#" data-toggle="dropdown">
                <div class="navbar-profile">
                  <img class="img-xs rounded-circle" src="assets/img/<?php echo $profile_img ?>" alt="">
                  <p class="mb-0 d-none d-sm-block navbar-profile-name"><?php echo $data_user['nama'] ?></p>
                  <i class="mdi mdi-menu-down d-none d-sm-block"></i>
                </div>
              </a>
              <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="profileDropdown">
                <h6 class="p-3 mb-0">Profile</h6>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item preview-item" href="settings.php">
                  <div class="preview-thumbnail">
                    <div class="preview-icon bg-dark rounded-circle">
                      <i class="mdi mdi-settings text-primary"></i>
                    </div>
                  </div>
                  <div class="preview-item-content">
                    <p class="preview-subject mb-1">Settings</p>
                  </div>
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item preview-item" href="logout.php">
                  <div class="preview-thumbnail">
                    <div class="preview-icon bg-dark rounded-circle">
                      <i class="mdi mdi-logout text-danger"></i>
                    </div>
                  </div>
                  <div class="preview-item-content">
                    <p class="preview-subject mb-1">Log out</p>
                  </div>
                </a>
                <div class="dropdown-divider"></div>
              </div>
            </li>
          </ul>
          <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
            <span class="mdi mdi-format-line-spacing"></span>
          </button>
        </div>
      </nav>
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-12 grid-margin stretch-card">
              <div class="card corona-gradient-card">
                <div class="card-body py-0 px-0 px-sm-3">
                  <div class="row align-items-center">
                    <div class="col-4 col-sm-3 col-xl-2">
                      <img src="assets/img/avengers.png" class="gradient-corona-img img-fluid" alt="" style="height: 200px;">
                    </div>
                    <div class="col-5 col-sm-7 col-xl-8 p-0">
                      <h4 class="mb-1 mb-sm-0">Get attractive promos to watch your favorite movies?</h4>
                      <p class="mb-0 font-weight-normal d-none d-sm-block">
                        Immediately checkout your ticket, before it runs out!
                      </p>
                    </div>
                    <div class="col-3 col-sm-2 col-xl-2 pl-0 text-center">
                      <span>
                        <a href="movies.php" class="btn btn-outline-light btn-rounded get-started-btn">Book Ticket</a>
                      </span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-sm-4 grid-margin">
              <div class="card">
                <div class="card-body">
                  <h5>Balance</h5>
                  <div class="row">
                    <div class="col-8 col-sm-12 col-xl-8 my-auto">
                      <div class="d-flex d-sm-block d-md-flex align-items-center">
                        <h2 class="mb-0">Rp. <?php echo $data_user['saldo'] ?></h2>
                      </div>
                      <a href="topup.php" class="btn btn-primary btn-icon-text mt-2">
                        <i class="mdi mdi-database-plus btn-icon-prepend"></i> Top Up </a>
                      <a href="withdraw.php" class="btn btn-info btn-icon-text mt-2">
                        <i class="mdi mdi-bank btn-icon-prepend"></i> Withdraw </a>
                    </div>
                    <div class="col-4 col-sm-12 col-xl-4 text-center text-xl-right">
                      <i class="icon-lg mdi mdi-wallet text-primary ml-auto"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-sm-4 grid-margin">
              <div class="card">
                <div class="card-body">
                  <h5>Total Orders</h5>
                  <div class="row">
                    <div class="col-8 col-sm-12 col-xl-8 my-auto">
                      <div class="d-flex d-sm-block d-md-flex align-items-center">
                        <h2 class="mb-0"><?php echo $total_orders['jum'] ?> Transaction</h2>
                      </div>
                      <a href="history_orders.php" class="btn btn-danger btn-icon-text mt-2">
                        <i class="mdi mdi-history btn-icon-prepend"></i> History Orders </a>
                    </div>
                    <div class="col-4 col-sm-12 col-xl-4 text-center text-xl-right">
                      <i class="icon-lg mdi mdi-cart text-danger ml-auto"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-sm-4 grid-margin">
              <div class="card">
                <div class="card-body">
                  <h5>Balance Transaction</h5>
                  <div class="row">
                    <div class="col-8 col-sm-12 col-xl-8 my-auto">
                      <div class="d-flex d-sm-block d-md-flex align-items-center">
                        <h2 class="mb-0"><?php echo $balance_trx ?> Transaction</h2>
                      </div>
                      <a href="history_topup.php" class="btn btn-success btn-icon-text mt-2">
                        <i class="mdi mdi-square-inc-cash btn-icon-prepend"></i> History Balance </a>
                    </div>
                    <div class="col-4 col-sm-12 col-xl-4 text-center text-xl-right">
                      <i class="icon-lg mdi mdi-database-plus text-success ml-auto"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row ">
            <div class="col-12 grid-margin">
              <div class="card">
                <div class="card-body">
                  <div class="d-flex justify-content-between">
                    <h4 class="card-title">Top Movie Weakly</h4>
                    <a href="movies.php">See All</a>
                  </div>
                  <div class="row mt-3 mx-auto">
                    <?php for ($i = 0; $i < 4; $i++) { ?>
                      <div class="col-md-3">
                        <div class="movie-card">
                          <div class="movie-header" style="background-image: url('<?php echo $data_movie[$i]['poster_url'] ?>');">
                            <div class="header-icon-container">
                              <a href="detail_movies.php?id=<?php echo $data_movie[$i]['id'] ?>">
                                <i class="mdi mdi-play header-icon"></i>
                              </a>
                            </div>
                          </div>
                          <div class="movie-content">
                            <div class="movie-content-header">
                              <a href="detail_movies.php?id=<?php echo $data_movie[$i]['id'] ?>">
                                <h3 class="movie-title"><?php echo $data_movie[$i]['judul'] ?></h3>
                              </a>
                            </div>
                            <div class="movie-info">
                              <div class="info-section">
                                <label>Date Release</label>
                                <span><?php echo $data_movie[$i]['tanggal_rilis'] ?></span>
                              </div>
                              <div class="info-section">
                                <label>Price</label>
                                <span><?php echo $data_movie[$i]['harga_tiket'] ?></span>
                              </div>
                              <div class="info-section">
                                <label>For Age</label>
                                <span><?php echo $data_movie[$i]['ketentuan_umur'] ?></span>
                              </div>
                              <div class="info-section">
                                <label>Seat</label>
                                <span>60</span>
                              </div>
                            </div>
                            <div class="d-flex justify-content-center mt-3">
                              <a class="btn btn-warning" href="detail_movies.php?id=<?php echo $data_movie[$i]['id'] ?>"><i class="mdi mdi-ticket-confirmation"></i> Book Now</a>
                            </div>
                          </div>
                        </div>
                      </div>
                    <?php } ?>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
        <footer class="footer">
          <div class="d-sm-flex justify-content-center justify-content-sm-between">
            <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © bootstrapdash.com 2020</span>
            <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center"> Modified By Iqbal Rahmatullah 2023</span>
          </div>
        </footer>
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- plugins:js -->
  <script src="assets/vendors/js/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <script src="assets/vendors/chart.js/Chart.min.js"></script>
  <script src="assets/vendors/progressbar.js/progressbar.min.js"></script>
  <script src="assets/vendors/jvectormap/jquery-jvectormap.min.js"></script>
  <script src="assets/vendors/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
  <script src="assets/vendors/owl-carousel-2/owl.carousel.min.js"></script>
  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="assets/js/off-canvas.js"></script>
  <script src="assets/js/hoverable-collapse.js"></script>
  <script src="assets/js/misc.js"></script>
  <script src="assets/js/settings.js"></script>
  <script src="assets/js/todolist.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page -->
  <script src="assets/js/dashboard.js"></script>
  <!-- End custom js for this page -->
</body>

</html>