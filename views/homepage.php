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
                        <a role="button" href="login.php" class="btn btn-outline-info float-right">Login</a>
                    </div>
                    <div class="col-12 mb-4">
                        <h1 class="h3 text-danger" style="font-weight: 800">COVID-19</h1>
                        <hr />
                        <h2 class="h4 text-primary" style="font-weight: 650">Parbhani District Dashboard</h2>
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
                                        <div class="h4 mb-0 font-weight-bold text-gray-800"><?= $total_tests ?></div>
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
                                        <div class="h4 mb-0 font-weight-bold text-gray-800"><?= $total_positive ?></div>
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
                                        <div class="h4 mb-0 font-weight-bold text-gray-800"><?= $total_discharge ?></div>
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
                                        <div class="h4 mb-0 font-weight-bold text-gray-800"><?= $total_dead ?></div>
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
                                        <div class="h4 mb-0 font-weight-bold text-gray-800"><?= $total_active ?></div>
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
                        <h2 class="h4 text-primary" style="font-weight: 650">Hospitals and Beds</h2>
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
                                        <div class="h4 mb-0 font-weight-bold text-gray-800"><?= $total_ccc ?></div>
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
                                        <div class="h4 mb-0 font-weight-bold text-gray-800"><?= $total_dch ?></div>
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
                                        <div class="h4 mb-0 font-weight-bold text-gray-800"><?= $total_dchc ?></div>
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
                                        <div class="h4 mb-0 font-weight-bold text-gray-800"><?= $total_beds ?></div>
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
                                        <div class="h4 mb-0 font-weight-bold text-gray-800"><?= $total_available_beds ?></div>
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
                        <h2 class="h4 text-primary" style="font-weight: 650">List of Available Beds In Hospitals</h2><hr />
                    </div>
                    <div class="col-12 table-responsive">
                        <table class="table table-bordered text-center bg-light">
                            <thead class="thead-inverse bg-dark text-light">
                            <tr>
                                <th>Sr No.</th>
                                <th>Hospital Name</th>
                                <th>Type</th>
                                <th>Gov/Pvt</th>
                                <th>Total Beds</th>
                                <th>Occupied Beds</th>
                                <th>Available Beds</th>
                                <th>Updated On</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $i = 0; foreach ($hospitals as $hospital):?>
                                <tr>
                                    <td><?= ++$i ?></td>
                                    <td><?= $hospital["hospital_name"] ?></td>
                                    <td><?= $hospital["type"] ?></td>
                                    <td><?= $hospital["is_gov"] == 1 ? "GOV":"PVT" ?></td>
                                    <td><?= $hospital["number_of_beds"] ?></td>
                                    <td><?= $hospital["number_of_occ_beds"] ?></td>
                                    <td><?= $hospital["number_of_beds"] - $hospital["number_of_occ_beds"] ?></td>
                                    <td><?= date("d/m/Y h:i:s A", strtotime($hospital["updated_on"])) ?></td>

                                </tr>
                            <?php endforeach; ?>

                            </tbody>
                        </table>
                    </div>
                </div>
                </div>


            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- End of Main Content -->

        <!-- Footer -->
        <footer class="sticky-footer bg-white">
            <div class="container my-auto">
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

<!-- Page level plugins -->
<script src="<?= APP_BASE_HREF ?>theme/vendor/chart.js/Chart.min.js"></script>

<!-- Page level custom scripts -->
<script src="<?= APP_BASE_HREF ?>theme/js/demo/chart-area-demo.js"></script>
<script src="<?= APP_BASE_HREF ?>theme/js/demo/chart-pie-demo.js"></script>

</body>

</html>

