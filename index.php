<?php
require_once "include.php";

die($templates->render("homepage", [
    "total_tests" => 35102,
    "total_positive" => 4486,
    "total_discharge" => 3519,
    "total_active" => 779,
    "total_dead" => 188,
    "total_ccc" => 351,
    "total_dch" => 86,
    "total_dchc" => 35,
    "total_beds" => 1331,
    "total_available_beds" => 542
]));
