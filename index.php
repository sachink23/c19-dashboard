<?php
require_once "include.php";
$db = new \PDOCon\Db();
$con = $db->con();
$stmt = $con->query("SELECT * FROM hospital_master");
$hospitals = $stmt->fetchAll(PDO::FETCH_ASSOC);

$stmt = $con->query("SELECT sum(tests) as total_tests, sum(positive) as total_positive,  sum(death) as total_dead, sum(discharge) as total_discharge FROM progressive");
$res = $stmt->fetchAll(PDO::FETCH_ASSOC);

$stmt = $con->query("SELECT count(*) as ccc FROM hospital_master WHERE type = 'CCC'");
$ccc_count = $stmt->fetchAll(PDO::FETCH_ASSOC)[0]["ccc"];


$stmt = $con->query("SELECT count(*) as dch FROM hospital_master WHERE type = 'DCH'");
$dch_count = $stmt->fetchAll(PDO::FETCH_ASSOC)[0]["dch"];


$stmt = $con->query("SELECT count(*) as dchc FROM hospital_master WHERE type = 'DCHC'");
$dchc_count = $stmt->fetchAll(PDO::FETCH_ASSOC)[0]["dchc"];

$stmt = $con->query("SELECT sum(number_of_beds) as no_beds, sum(number_of_occ_beds) as occ_beds FROM hospital_master");
$beds = $stmt->fetchAll(PDO::FETCH_ASSOC);
$total_beds_count = $beds[0]["no_beds"] ?? 0;
$available_beds_count = $total_beds_count - ($beds[0]["occ_beds"] ?? 0);
die($templates->render("homepage", [
    "total_tests" => $res[0]["total_tests"] ?? 0,
    "total_positive" => $res[0]["total_positive"] ?? 0,
    "total_discharge" => $res[0]["total_discharge"] ?? 0,
    "total_active" => $res[0]["total_positive"] - ($res[0]["total_discharge"] + $res[0]["total_dead"]),
    "total_dead" => $res[0]["total_dead"] ?? 0,
    "total_ccc" => $ccc_count,
    "total_dch" => $dch_count,
    "total_dchc" => $dchc_count,
    "total_beds" => $total_beds_count,
    "total_available_beds" => $available_beds_count,
    "hospitals" => $hospitals
]));
