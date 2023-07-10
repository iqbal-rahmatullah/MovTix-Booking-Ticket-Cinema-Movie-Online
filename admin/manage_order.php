<?php
require('../php/koneksi.php');
session_start();

if (!isset($_SESSION["login_admin"])) {
    header("Location: login.php");
}

$data_orders = hasil_query("SELECT * FROM orders
INNER JOIN movie
ON id_film = id
LEFT JOIN seat
ON orders.id_order = seat.id_pesanan
GROUP BY orders.id_order");

$status_orders = isset($data_orders[0]) ? true : false;

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>MovTix | Manage Order</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="../assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="../assets/vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="../assets/vendors/jvectormap/jquery-jvectormap.css">
    <link rel="stylesheet" href="../assets/vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="../assets/vendors/owl-carousel-2/owl.carousel.min.css">
    <link rel="stylesheet" href="../assets/vendors/owl-carousel-2/owl.theme.default.min.css">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="../assets/css/style.css">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="../assets/img/icon.png" />
</head>

<body>
    <div class="container-scroller">
        <!-- partial:partials/_sidebar.html -->
        <nav class="sidebar sidebar-offcanvas" id="sidebar">
            <div class="sidebar-brand-wrapper d-none d-lg-flex align-items-center justify-content-center fixed-top">
                <a class="sidebar-brand brand-logo" href="index.php"><img src="../assets/img/logo.png" alt="logo" /></a>
                <a class="sidebar-brand brand-logo-mini" href="index.php"><img src="../assets/img/icon.png" alt="logo" /></a>
            </div>
            <ul class="nav">
                <li class="nav-item profile">
                    <div class="profile-desc">
                        <div class="profile-pic">
                            <div class="count-indicator">
                                <img class="img-xs rounded-circle " src="../assets/img/boy.png" alt="">
                                <span class="count bg-success"></span>
                            </div>
                            <div class="profile-name">
                                <h5 class="mb-0 font-weight-normal">Admin</h5>
                                <span>administrator</span>
                            </div>
                        </div>
                        <a href="#" id="profile-dropdown" data-toggle="dropdown"><i class="mdi mdi-dots-vertical"></i></a>
                        <div class="dropdown-menu dropdown-menu-right sidebar-dropdown preview-list" aria-labelledby="profile-dropdown">
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
                    <a class="nav-link" href="manage_user.php">
                        <span class="menu-icon">
                            <i class="mdi mdi-account-settings"></i>
                        </span>
                        <span class="menu-title">Manage User</span>
                    </a>
                </li>
                <li class="nav-item menu-items">
                    <a class="nav-link" href="manage_order.php">
                        <span class="menu-icon">
                            <i class="mdi mdi-cart" style="color: #FF9B9B;"></i>
                        </span>
                        <span class="menu-title">Manage Order</span>
                    </a>
                </li>
                <li class="nav-item menu-items">
                    <a class="nav-link" href="manage_topup.php">
                        <span class="menu-icon">
                            <i class="mdi mdi-cash-usd"></i>
                        </span>
                        <span class="menu-title">Manage Top Up</span>
                    </a>
                </li>
                <li class="nav-item menu-items">
                    <a class="nav-link" href="manage_withdraw.php">
                        <span class="menu-icon">
                            <i class="mdi mdi-bank"></i>
                        </span>
                        <span class="menu-title">Manage Withdraw</span>
                    </a>
                </li>
                <li class="nav-item menu-items">
                    <a class="nav-link" href="logout.php">
                        <span class="menu-icon">
                            <i class="mdi mdi-logout text-danger"></i>
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
                    <a class="navbar-brand brand-logo-mini" href="index.html"><img src="../assets/img/icon.png" /></a>
                </div>
                <div class="navbar-menu-wrapper flex-grow d-flex align-items-stretch">
                    <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
                        <span class="mdi mdi-menu"></span>
                    </button>
                    <ul class="navbar-nav navbar-nav-right">
                        <li class="nav-item dropdown">
                            <a class="nav-link" id="profileDropdown" href="#" data-toggle="dropdown">
                                <div class="navbar-profile">
                                    <img class="img-xs rounded-circle" src="../assets/img/boy.png" alt="">
                                    <p class="mb-0 d-none d-sm-block navbar-profile-name">Admin</p>
                                    <i class="mdi mdi-menu-down d-none d-sm-block"></i>
                                </div>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="profileDropdown">
                                <h6 class="p-3 mb-0">Profile</h6>
                                <div class="dropdown-divider"></div>
                                <div class="dropdown-divider"></div>
                                <a href="logout.php" class="dropdown-item preview-item">
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
                    <div class="row ">
                        <div class="col-lg-12 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <?php if ($status_orders) { ?>
                                            <table class="table table-striped">
                                                <thead>
                                                    <tr class="text-center">
                                                        <th> Orders ID </th>
                                                        <th> Date (Y-M-D)</th>
                                                        <th> Movie Name </th>
                                                        <th> Total Ticket </th>
                                                        <th> Total Price </th>
                                                        <th> Status </th>
                                                        <th> Action </th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php foreach ($data_orders as $orders) { ?>
                                                        <tr class="text-center">
                                                            <td> <?php echo $orders["id_order"] ?> </td>
                                                            <td> <?php echo $orders["tanggal_order"] ?> </td>
                                                            <td>
                                                                <?php echo $orders["judul"] ?>
                                                            </td>
                                                            <td> <?php echo $orders["jumlah_tiket"] ?> </td>
                                                            <td> <?php echo $orders["total_harga"] ?> </td>
                                                            <td><label class="badge badge-success <?php if ($orders['status'] == 'Cancelled') echo 'badge-danger' ?>"><?php echo $orders['status'] ?></label></td>
                                                            <td>
                                                                <a href="view_orders.php?id_pesanan=<?php echo str_replace('#', '', $orders['id_order']) ?>" class="btn btn-primary mr-3 <?php if ($orders['status'] == 'Cancelled') echo "d-none" ?>"><i class="mdi mdi-eye"></i> View Details</a>
                                                                <button data-bs-toggle="modal" data-bs-target="#modalcancel<?php echo str_replace('#', '', $orders['id_order']) ?>" class="btn btn-danger <?php if (strtotime($tanggal_now) >= strtotime($orders['tanggal']) || $orders['status'] == 'Cancelled') {
                                                                                                                                                                                                                echo "d-none";
                                                                                                                                                                                                            } ?>"><i class="mdi mdi-eye"></i> Cancel</button>
                                                            </td>
                                                            <div class="modal fade" id="modalcancel<?php echo str_replace('#', '', $orders['id_order']) ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                                <div class="modal-dialog modal-dialog-centered">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h3 class="modal-title fs-5" id="exampleModalLabel">Confirm Cancel Order</h3>
                                                                        </div>
                                                                        <div class="modal-body d-flex justify-content-center flex-column">
                                                                            <img src="../assets/img/cancel.png" alt="" class="img-fluid mx-auto" width="120">
                                                                            <p class="text-center mt-3">If you confirm, the order will be canceled and the balance will return to your balance.</p>
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <a type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</a>
                                                                            <a href="cancel_orders.php?id_pesanan=<?php echo str_replace('#', '', $orders['id_order']) ?>" name="confirm_withdraw" class="btn btn-danger"><i class="mdi mdi-close-circle"></i> Confirm Cancel</a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </tr>
                                                    <?php } ?>
                                                </tbody>
                                            </table>
                                        <?php } else { ?>
                                            <table class="table table-striped">
                                                <thead>
                                                    <tr class="text-center">
                                                        <th> Orders ID </th>
                                                        <th> Date (Y-M-D)</th>
                                                        <th> Movie Name </th>
                                                        <th> Total Ticket </th>
                                                        <th> Total Price </th>
                                                        <th> Status </th>
                                                        <th> Action </th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <td colspan="7" class="text-center text-white">
                                                        <h3>No transaction orders</h3>
                                                    </td>
                                                </tbody>
                                            </table>
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
                        <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center"> Modified By Iqbal Rahmatullah</span>
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
    <script src="../assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="../style/bootstrap-5.2.3-dist/js/bootstrap.min.js"></script>
    <script src="../assets/vendors/chart.js/Chart.min.js"></script>
    <script src="../assets/vendors/progressbar.js/progressbar.min.js"></script>
    <script src="../assets/vendors/jvectormap/jquery-jvectormap.min.js"></script>
    <script src="../assets/vendors/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
    <script src="../assets/vendors/owl-carousel-2/owl.carousel.min.js"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="../assets/js/off-canvas.js"></script>
    <script src="../assets/js/hoverable-collapse.js"></script>
    <script src="../assets/js/misc.js"></script>
    <script src="../assets/js/settings.js"></script>
    <script src="../assets/js/todolist.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="../assets/js/dashboard.js"></script>
    <!-- End custom js for this page -->
</body>

</html>