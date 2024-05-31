<?php require_once('controller/koneksi.php');
    if(!isset($_SESSION[md5('admin')])){
        pesan('login.php');
    }
?>
<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>DPMD Malinau</title>

        <!-- Custom fonts for this template -->
        <link href="assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

        <!-- Custom styles for this template -->
        <link href="assets/css/sb-admin-2.min.css" rel="stylesheet">

        <!-- Custom styles for this page -->
        <link href="assets/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

        <script src="assets/vendor/jquery/jquery.min.js"></script>
    </head>

    <body id="page-top">

        <!-- Page Wrapper -->
        <div id="wrapper">
            
            <!-- Sidebar -->
            <ul class="navbar-nav bg-gradient-info sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php?p=home">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-database"></i>
                </div>
                <div class="sidebar-brand-text mx-3">DPMD Malinau</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item <?php $p = $_GET['p']; if($p=='home'){echo "active";}?>">
                <a class="nav-link" href="index.php?p=home">
                    <i class="fas fa-fw fa-home"></i>
                    <span>Dashboard</span></a>
            </li>

        <?php if(get_hak_akses()==0){ ?>
            
            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                MASTER DATA
            </div>
            
            <li class="nav-item <?php $p = $_GET['p']; if($p=='peserta'){echo "active";} ?>">
                <a class="nav-link" href="index.php?p=peserta">
                    <i class="fas fa-fw fa-user"></i>
                    <span>Data Peserta</span>
            </li>

            <li class="nav-item <?php $p = $_GET['p']; if($p=='pengguna'){echo "active";} ?>">
                <a class="nav-link" href="index.php?p=pengguna">
                    <i class="fas fa-fw fa-user-cog"></i>
                    <span>Data Pengguna</span>
            </li>

        <?php } ?>
            <?php if(get_hak_akses()==1 || get_hak_akses()==2){ ?>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                MASTER DATA
            </div>

            <li class="nav-item <?php $p = $_GET['p']; if($p=='penilaian'){echo "active";} ?>">
                <a class="nav-link" href="index.php?p=penilaian">
                    <i class="fas fa-fw fa-edit"></i>
                    <span>Data Penilaian</span>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                MASTER LAPORAN
            </div>

            <li class="nav-item <?php $p = $_GET['p']; if($p=='lap_penilaian'){echo "active";} ?>">
                <a class="nav-link" href="index.php?p=lap_penilaian">
                    <i class="fas fa-fw fa-print"></i>
                    <span>Laporan Keseluruhan</span>
            </li>

            <li class="nav-item <?php $p = $_GET['p']; if($p=='lap_penilaian_peserta'){echo "active";} ?>">
                <a class="nav-link" href="index.php?p=lap_penilaian_peserta">
                    <i class="fas fa-fw fa-print"></i>
                    <span>Laporan Per-Peserta</span>
            </li>
        
        <?php } ?>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

            </ul>
            <!-- End of Sidebar -->

            <!-- Content Wrapper -->
            <div id="content-wrapper" class="d-flex flex-column">

                <!-- Main Content -->
                <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                <!-- Sidebar Toggle (Topbar) -->
                <button id="sidebarToggleTop" class="btn text-info d-md-none rounded-circle mr-3">
                    <i class="fa fa-bars"></i>
                </button>

                <!-- Topbar Navbar -->
                <ul class="navbar-nav ml-auto">

                <!-- Nav Item - User Information -->
                <li class="nav-item dropdown no-arrow">
                    <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="text-uppercase mr-2 d-none d-lg-inline text-gray-600 small">
                        <?php get_user(); ?>
                        </span>
                        <img class="img-profile rounded-circle" src="assets/img/user.png">
                    </a>

                <!-- Dropdown - User Information -->
                <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                    <a class="dropdown-item" href="index.php?p=profile&detail=<?= $_SESSION[md5('admin')]; ?>">
                        <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                        Keluar
                    </a>
                </div>
                </li>
                </ul>

                </nav>
                <!-- End of Topbar -->
                <div class="container-fluid">
                    <?php 
                    if(isset($_GET['p'])){
                        $dir = 'view';
                        $page = $_GET['p'].'.php';
                        $hal = scandir($dir);
                        if(in_array($page, $hal)){
                            include $dir.'/'.$page;
                        }else{
                            include 'view/404.php';
                        } 
                    }else{
                        include 'view/home.php';
                    }
                    ?>
                </div>
                <!-- /.container-fluid -->    
            </div>
            <!-- End of Main Content -->
        </div>
        <!-- End of Content Wrapper -->

        <!-- Scroll to Top Button -->
        <a class="scroll-to-top rounded" href="#page-top">
            <i class="fas fa-angle-up"></i>
        </a>

        <!-- Logout Modal -->
        <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="">

        </div>

    </body>
</html>