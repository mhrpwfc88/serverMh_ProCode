<?php
session_start();
include "../koneksi.php";
$hal = @$_GET['hal'];
$beranda = "hal/beranda.php";
$p = "hal/$hal.php";
$akses = $_SESSION['user_akses'];




$restricted_pages = [
  'admin' => 1,
  'server' => 1,
  'list' => 1,
  'monitoring' => 1,
  'beranda'=>0,1,
  'search-p' => 0, 1,
  'share_file' => 0, 1,
  'uploadFileShare' => 0, 1,
  'deleteShare' => 0, 1,
  'private_file' => 1,
  'uploadFilePrivate' => 1,
  'deletePrivate' => 1,
  'tambahadmin' => 1,
  'deleteAdmin' => 1,
  'tambahserver' => 1,
  'deleteServer' => 1,
  'edit-server' => 1,
  'selesaiTarget' => 1,
  'deleteTarget' => 1,
  'tambahtarget' => 1,
  'catatan' => 1,
  'tambahCatatan' => 1,
  'deleteCatatan' => 1,
  'process_edit_access'=>1
];
if (empty($_SESSION['iduser'])) {
  echo "<script>location='login.php'</script>";
} else {
?>

  <!DOCTYPE html>
  <html lang="en">

  <head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" 
      content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0"/>
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Server ~ Nata</title>
    <!-- loader-->
    <link href="assets/css/pace.min.css" rel="stylesheet" />
    <script src="assets/js/pace.min.js"></script>
    <!--favicon-->
    <link rel="icon" href="assets/images/logo Mhrp.png" type="image/x-icon">
    <!-- Vector CSS -->
    <link href="assets/plugins/vectormap/jquery-jvectormap-2.0.2.css" rel="stylesheet" />
    <!-- simplebar CSS-->
    <link href="assets/plugins/simplebar/css/simplebar.css" rel="stylesheet" />
    <!-- Bootstrap core CSS-->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />
    <!-- animate CSS-->
    <link href="assets/css/animate.css" rel="stylesheet" type="text/css" />
    <!-- Icons CSS-->
    <link href="assets/css/icons.css" rel="stylesheet" type="text/css" />
    <!-- Sidebar CSS-->
    <link href="assets/css/sidebar-menu.css" rel="stylesheet" />
    <!-- Custom Style-->
    <link href="assets/css/app-style.css" rel="stylesheet" />
    <style>
       .non-editable-textarea {
            resize: none; /* Mencegah pengguna mengubah ukuran textarea */
            overflow: hidden; /* Menghilangkan scrollbar */
            width: 300px; /* Menentukan lebar sendiri, misalnya 300px */
            border: none; /* Menghilangkan border */
            background: transparent; /* Background transparan */
        }
    </style>
  </head>

  <body class="bg-theme bg-theme1">

    <!-- Start wrapper-->
    <div id="wrapper">

      <!--Start sidebar-wrapper-->
      <div id="sidebar-wrapper" data-simplebar="" data-simplebar-auto-hide="true">
        <div class="brand-logo">
          <a href="index.php">
            <img src="assets/images/logo Mhrp.png" class="logo-icon" alt="logo icon">
            <h5 class="logo-text">Mh ProCode</h5>
          </a>
        </div>
        <ul class="sidebar-menu do-nicescrol">
          <li class="sidebar-header">NAVIGATION</li>
          <li>
            <a href="index.php">
              <i class="zmdi zmdi-view-dashboard"></i> <span>Dashboard</span>
            </a>
          </li>
          <li>
            <a href=".?hal=admin">
              <i class="zmdi zmdi-account-box-o"></i> <span>Admin</span>
              <small class="badge float-right badge-light">lock</small>
            </a>
          </li>

          <li>
            <a href=".?hal=catatan">
              <i class="zmdi zmdi-bookmark-outline"></i> <span>catatan</span>
              <small class="badge float-right badge-light">lock</small>
            </a>
          </li>

          <li>
            <a href=".?hal=list">
              <i class="zmdi zmdi-grid"></i> <span>list tugas</span>
              <small class="badge float-right badge-light">lock</small>
            </a>
          </li>



          <li>
            <a href=".?hal=server">
              <i class="zmdi zmdi-card-membership"></i> <span>server</span>
              <small class="badge float-right badge-light">lock</small>
            </a>
          </li>

          <!-- <li>
            <a href="login.html" target="_blank">
              <i class="zmdi zmdi-info-outline"></i> <span>monitoring</span>
            </a>
          </li> -->

          <li>
            <a href=".?hal=private_file" >
              <i class="zmdi zmdi-lock"></i> <span>file ~ private</span>
              <small class="badge float-right badge-light">lock</small>
            </a>
          </li>
                       <?php
$aksess = $_SESSION['user_akses'];
if ($aksess != 1) {
    $hakses = 'hidden';
} else {
    $hakses = '';
} ?>
          <li <?= $hakses?>>
            <a href=".?hal=share_file">
              <i class="zmdi zmdi-accounts-alt"></i> <span>file ~ share</span>
            </a>
          </li>

          <li class="sidebar-header">SERVER</li>
      
          <li><a href="https://mhprocode.my.id"><i class="zmdi zmdi-share text-info"></i> <span>Mhprocode</span></a></li>
          <li class="sidebar-header">NataDev.</li>
          <li class="sidebar-header">Version 1.5</li>
        </ul>

      </div>
      <!--End sidebar-wrapper-->

      <!--Start topbar header-->
      <header class="topbar-nav">
        <nav class="navbar navbar-expand fixed-top">
          <ul class="navbar-nav mr-auto align-items-center">
            <li class="nav-item">
              <a class="nav-link toggle-menu" href="javascript:void();">
                <i class="icon-menu menu-icon"></i>
              </a>
            </li>
            <!-- <li class="nav-item">
      <form class="search-bar">
        <input type="text" class="form-control" placeholder="Enter keywords">
         <a href="javascript:void();"><i class="icon-magnifier"></i></a>
      </form>
    </li> -->
          </ul>

          <ul class="navbar-nav align-items-center right-nav-link">

            <li class="nav-item">
              <a class="nav-link dropdown-toggle dropdown-toggle-nocaret" data-toggle="dropdown" href="#">
                <span class="user-profile"><img src="assets/images/logo Mhrp.png" class="img-circle" alt="user avatar"></span>
              </a>
              <ul class="dropdown-menu dropdown-menu-right">
                <li class="dropdown-item user-details">
                  <a href="javaScript:void();">
                    <div class="media">
                      <div class="avatar"><img class="align-self-start mr-3" src="assets/images/logo Mhrp.png" alt="user avatar"></div>
                      <div class="media-body">
                        <h6 class="mt-2 user-title"><?= $_SESSION['namauser'] ?></h6>
                        <p class="user-subtitle"><?= $_SESSION['user_email'] ?></p>
                      </div>
                    </div>
                  </a>
                </li>
                <li class="dropdown-divider"></li>
                <li class="dropdown-divider"></li>
                <li class="dropdown-item"><i class="icon-wallet mr-2"></i> Account</li>
                <li class="dropdown-divider"></li>
                <li class="dropdown-divider"></li>
                <li class="dropdown-item"><a href="logout.php"><i class="icon-power mr-2"></i> Logout</a></li>
              </ul>
            </li>
          </ul>
        </nav>
      </header>
      <!--End topbar header-->

      <div class="clearfix"></div>

      <div class="content-wrapper">
        <div class="container-fluid">

          <!--Start Dashboard Content-->

          <?php
          if (!empty($hal) && file_exists($p)) {
            // Periksa apakah pengguna memiliki akses ke halaman ini
            if (isset($restricted_pages[$hal]) && $akses >= $restricted_pages[$hal]) {
              include "$p";
            } else {
              echo "Akses Anda ditolak.";
            }
          } else {
            include "$beranda";
          }
          ?>

          <!--End Dashboard Content-->

          <!--start overlay-->
          <div class="overlay toggle-menu"></div>
          <!--end overlay-->

        </div>
        <!-- End container-fluid-->

      </div><!--End content-wrapper-->
      <!--Start Back To Top Button-->
      <a href="javaScript:void();" class="back-to-top"><i class="fa fa-angle-double-up"></i> </a>
      <!--End Back To Top Button-->

      <!--Start footer-->
      <!-- <footer class="footer">
        <div class="container">
          <div class="text-center">
            Copyright © 2024 NataDev.
          </div>
        </div>
      </footer> -->
      <!--End footer-->

      <!--start color switcher-->
      <div class="right-sidebar">
        <div class="switcher-icon">
          <i class="zmdi zmdi-settings zmdi-hc-spin"></i>
        </div>
        <div class="right-sidebar-content">

          <p class="mb-0">Gaussion Texture</p>
          <hr>

          <ul class="switcher">
            <li id="theme1"></li>
            <li id="theme2"></li>
            <li id="theme3"></li>
            <li id="theme4"></li>
            <li id="theme5"></li>
            <li id="theme6"></li>
          </ul>

          <p class="mb-0">Gradient Background</p>
          <hr>

          <ul class="switcher">
            <li id="theme7"></li>
            <li id="theme8"></li>
            <li id="theme9"></li>
            <li id="theme10"></li>
            <li id="theme11"></li>
            <li id="theme12"></li>
            <li id="theme13"></li>
            <li id="theme14"></li>
            <li id="theme15"></li>
          </ul>

        </div>
      </div>
      <!--end color switcher-->

    </div><!--End wrapper-->

    <!-- Bootstrap core JavaScript-->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>

    <!-- simplebar js -->
    <script src="assets/plugins/simplebar/js/simplebar.js"></script>
    <!-- sidebar-menu js -->
    <script src="assets/js/sidebar-menu.js"></script>
    <!-- loader scripts -->
    <script src="assets/js/jquery.loading-indicator.js"></script>
    <!-- Custom scripts -->
    <script src="assets/js/app-script.js"></script>
    <!-- Chart js -->

    <script src="assets/plugins/Chart.js/Chart.min.js"></script>

    <!-- Index js -->
    <script src="assets/js/index.js"></script>

    <script>
        function autoResize(textarea) {
            textarea.style.height = 'auto';
            textarea.style.height = (textarea.scrollHeight) + 'px';
        }

        // Memastikan textarea diresize saat halaman dimuat
        document.addEventListener("DOMContentLoaded", function() {
            document.querySelectorAll('.non-editable-textarea').forEach(textarea => {
                autoResize(textarea);
            });
        });


        function copyToClipboard(link) {
    // Buat elemen sementara untuk menyalin teks
    var tempInput = document.createElement("input");
    tempInput.value = window.location.origin + "/" + link; // Menyusun URL lengkap
    document.body.appendChild(tempInput);
    tempInput.select();
    document.execCommand("copy");
    document.body.removeChild(tempInput);

    // Berikan umpan balik kepada pengguna
    alert("Link download telah disalin ke clipboard.");
}
    </script>
  </body>

  </html>
<?php } ?>