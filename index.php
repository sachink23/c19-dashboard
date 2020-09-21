<?php
require_once "include.php";
$db = new \PDOCon\Db();
$con = $db->con();
$stmt = $con->query("SELECT * FROM hospital_master");
$hospitals = $stmt->fetchAll(PDO::FETCH_ASSOC);

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
    "total_available_beds" => 542,
    "hospitals" => $hospitals
]));
