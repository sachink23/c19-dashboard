<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Covid-19 - Parbhani District Dashboard</title>

    <link href="<?= APP_BASE_HREF ?>theme/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <link href="<?= APP_BASE_HREF ?>theme/css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

<!-- Page Wrapper -->
<div id="wrapper">
    <div id="content-wrapper" class="d-flex flex-column">
        <div id="content">
            
            <div class="container-fluid my-3 text-center">
                <!-- Content Row -->

                
                <div class="row">
                    <div class="col-12 mb-3">
                        <button id="scrollBtn" style="display: none" onclick="startScroller()" class="btn btn-outline-info float-left">Start Scroller</button>
                        <?php if(!$logged_in): ?>
                        <a role="button" href="login.php" class="btn btn-outline-info float-right">Login</a>
                        <?php else: ?>
                         <a role="button" href="./admin/" class="btn btn-outline-info float-right">Return To Admin</a>

                        <?php endif; ?>
                    </div>
                    <div class="col-12 mb-4">
                        <h1 class="h1 text-danger" style="font-weight: 800">COVID-19</h1>
                        <hr />
                        <h2 class="h2 text-primary" style="font-weight: 650">Parbhani District Dashboard</h2>
                        <p style="font-weight: 800">As On <?= $last_talukawise_update ?></p>
                    </div>
                </div>

                <div class="row">
                    <div class="col-xl-1 mb-3"></div>
                    <div class="col-xl-2 col-md-6 mb-3">
                        <div class="card border-primary shadow h-100 p-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col-12 text-center mb-3">
                                        <div class="text-md font-weight-bold text-primary text-uppercase" style="letter-spacing: 1.3px">Tests</div>
                                    </div>
                                    <div class="col-12 text-center">
                                        <div class="h3 mb-0 font-weight-bold text-gray-800"><?= $total_tests ?></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-2 col-md-6 mb-3">
                        <div class="card border-warning shadow h-100 p-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col-12 text-center mb-3">
                                        <div class="text-md font-weight-bold text-warning text-uppercase" style="letter-spacing: 1.3px">Positive</div>
                                    </div>
                                    <div class="col-12 text-center">
                                        <div class="h3 mb-0 font-weight-bold text-gray-800"><?= $total_positive ?></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-2 col-md-6 mb-3">
                        <div class="card border-success shadow h-100 p-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col-12 text-center mb-3">
                                        <div class="text-md font-weight-bold text-success text-uppercase" style="letter-spacing: 1.3px">Discharge</div>
                                    </div>
                                    <div class="col-12 text-center">
                                        <div class="h3 mb-0 font-weight-bold text-gray-800"><?= $total_discharge ?></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-2 col-md-6 mb-3">
                        <div class="card border-danger shadow h-100 p-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col-12 text-center mb-3">
                                        <div class="text-md font-weight-bold text-danger text-uppercase" style="letter-spacing: 1.3px">Death</div>
                                    </div>
                                    <div class="col-12 text-center">
                                        <div class="h3 mb-0 font-weight-bold text-gray-800"><?= $total_dead ?></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-2 col-md-6 mb-3">
                        <div class="card border-dark shadow h-100 p-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col-12 text-center mb-3">
                                        <div class="text-md font-weight-bold text-dark text-uppercase" style="letter-spacing: 1.3px">Active</div>
                                    </div>
                                    <div class="col-12 text-center">
                                        <div class="h3 mb-0 font-weight-bold text-gray-800"><?= $total_active ?></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-1 mb-3"></div>
                </div>
                <hr />
                <div class="row mt-3">
                    <div class="col-12 mb-4">
                        <h2  class="h2 text-primary" style="font-weight: 650">Hospitals and Beds </h2>
                        <p style="font-weight: 800">As On <?= $updated_hosps_det_time ?></p>
                    </div>
                    <div class="col-xl-1 mb-3"></div>
                    <div class="col-xl-2 col-md-6 mb-3">
                        <div class="card border-primary shadow h-100 p-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col-12 text-center mb-3">
                                        <div class="text-md font-weight-bold text-primary text-uppercase" style="letter-spacing: 1.3px">CCC</div>
                                    </div>
                                    <div class="col-12 text-center">
                                        <div class="h3 mb-0 font-weight-bold text-gray-800"><?= $total_ccc ?></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-2 col-md-6 mb-3">
                        <div class="card border-warning shadow h-100 p-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col-12 text-center mb-3">
                                        <div class="text-md font-weight-bold text-warning text-uppercase" style="letter-spacing: 1.3px">DCH</div>
                                    </div>
                                    <div class="col-12 text-center">
                                        <div class="h3 mb-0 font-weight-bold text-gray-800"><?= $total_dch ?></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-2 col-md-6 mb-3">
                        <div class="card border-success shadow h-100 p-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col-12 text-center mb-3">
                                        <div class="text-md font-weight-bold text-success text-uppercase" style="letter-spacing: 1.3px">DCHC</div>
                                    </div>
                                    <div class="col-12 text-center">
                                        <div class="h3 mb-0 font-weight-bold text-gray-800"><?= $total_dchc ?></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-2 col-md-6 mb-3">
                        <div class="card border-danger shadow h-100 p-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col-12 text-center mb-3">
                                        <div class="text-md font-weight-bold text-danger text-uppercase" style="letter-spacing: 1.3px">Total Beds</div>
                                    </div>
                                    <div class="col-12 text-center">
                                        <div class="h3 mb-0 font-weight-bold text-gray-800"><?= $total_beds ?></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-2 col-md-6 mb-3">
                        <div class="card border-dark shadow h-100 p-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col-12 text-center mb-3">
                                        <div class="text-md font-weight-bold text-dark text-uppercase" style="letter-spacing: 1.3px">Available Beds</div>
                                    </div>
                                    <div class="col-12 text-center">
                                        <div class="h3 mb-0 font-weight-bold text-gray-800"><?= $total_available_beds ?></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-1 mb-3"></div>
                </div>
                <hr />
                <div class="container">

                    <div class="row my-2">
                        <div class="col-12">
                            <h2 class="h4 text-primary" style="font-weight: 650">Covid Hospitals and Care Centres</h2><hr />
                        </div>
                        <div class="col-12 p-1 card table-responsive">
                            
                        <iframe width="100%" height="1300px" style="border: none;" src="https://docs.google.com/spreadsheets/d/e/2PACX-1vQ8eklUSQUxxcBUSOBpPPnFh60qFY8aWTkB0AigQAGWZv_MRIXHCHlKmWcWM1kdSg/pubhtml?gid=836232722&amp;single=true&amp;widget=true&amp;headers=false&amp;rand=<?= rand(10000000,999999999999); ?>"></iframe>
                            <div class="row">
                                <div class="col-12 text-left font-weight-bolder">
                                    <h5>Appendix</h5>
                                </div>
                                <div class="col-md-6">
                                    <ul>
                                        <li class="text-left">CCC : Covid Care Centre</li>
                                        <li class="text-left">DCH : Dedicated Covid Hospital</li>
                                        <li class="text-left">DCHC : Dedicated Covid Healthcare</li>
                                    </ul>
                                </div>
                                
                            </div>

                        </div>
                    </div>
                </div>


            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- End of Main Content -->

        <!-- Footer -->

        <footer class="sticky-footer bg-white">
            <hr />
            <div class="container my-auto text-center">
                <img src="<?=APP_BASE_HREF ?>assets/nic.png" height="40px"><br /><br />
                <div class="copyright text-center my-auto">

                    <span>Designed and developed by NIC Parbhani</span>
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
<script>
    function startScroller() {
        scroller();

    }
    function scroller() {
        console.trace();
        $('html, body').animate({ scrollTop: $(document).height() - $(window).height() }, 100000, function() {
            $(this).animate({ scrollTop: 0 }, 100000, scroller());
        });
    }
</script>

</body>

</html>

