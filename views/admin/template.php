<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?= $title ?? "" ?>Admin Dashboard</title>

    <!-- Custom fonts for this template-->
    <link href="<?= APP_BASE_HREF ?>theme/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?= APP_BASE_HREF ?>theme/css/sb-admin-2.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@sweetalert2/theme-bootstrap-4/bootstrap-4.min.css">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@10/dist/sweetalert2.min.js"></script>

</head>

<body id="page-top">

<!-- Page Wrapper -->
<div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

        <!-- Sidebar - Brand -->
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= APP_BASE_HREF ?>admin">
            <div class="sidebar-brand-text">COVID-19</div>
        </a>

        <!-- Divider -->
        <hr class="sidebar-divider my-0">

        <!-- Nav Item - Dashboard -->
        <li class="nav-item">
            <a class="nav-link" href="<?= APP_BASE_HREF ?>admin/">
                <i class="fas fa-fw fa-angle-double-right"></i>
                <span>Dashboard</span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="<?= APP_BASE_HREF ?>admin/?path=daily-talukawise-data-entry">
                <i class="fas fa-fw fa-angle-double-right"></i>
                <span>Daily Data Entry</span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="<?= APP_BASE_HREF ?>admin/?path=manage-hospitals">
                <i class="fas fa-fw fa-angle-double-right"></i>
                <span>Hospital Management</span></a>
        </li>

    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content">

            <!-- Topbar -->
            <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                <!-- Sidebar Toggle (Topbar) -->
                <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                    <i class="fa fa-bars"></i>
                </button>
                Admin
                <!-- Topbar Navbar -->
                <ul class="navbar-nav ml-auto">


                    <div class="topbar-divider"></div>
                    <div class="container-fluid">
                        <a role="button"  type="button" class="btn btn-outline-primary">Logout</a>
                    </div>


                </ul>

            </nav>
            <!-- End of Topbar -->

            <!-- Begin Page Content -->
            <div class="container-fluid">
                <?php if(isset($_SESSION["PAGE_INFO_EXISTS"])): ?>
                <div class="alert alert-<?= $_SESSION["PAGE_INFO_TYPE"] ?>" role="alert">
                    <strong><?= $_SESSION["PAGE_INFO"] ?></strong>
                </div>
                <?php clearPageInfo(); endif; ?>
                <?= $this->section("content"); ?>

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- End of Main Content -->

        <!-- Footer -->
        <footer class="sticky-footer bg-white">
            <div class="container my-auto">
                <div class="copyright text-center my-auto">
                    <span>Designed And Developed By NIC Parbhani</span>
                </div>
            </div>
        </footer>
        <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<!-- Bootstrap core JavaScript-->
<script src="<?= APP_BASE_HREF ?>theme/vendor/jquery/jquery.min.js"></script>
<script src="<?= APP_BASE_HREF ?>theme/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="<?= APP_BASE_HREF ?>theme/vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="<?= APP_BASE_HREF ?>theme/js/sb-admin-2.min.js"></script>

</body>

</html>
