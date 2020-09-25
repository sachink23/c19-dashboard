<?php
require_once "include.php";
$db = new \PDOCon\Db();

$logged_in = false;

if (isset($_SESSION["user"])) {

    $logged_in = isLogin($_SESSION["user"]["username"], $_SESSION["user"]["password"]);

}

$con = $db->con();
$stmt = $con->query("SELECT * FROM hospital_master");
$hospitals = $stmt->fetchAll(PDO::FETCH_ASSOC);

$stmt = $con->query("SELECT sum(tests) as total_tests, sum(positive) as total_positive,  sum(death) as total_dead, sum(discharge) as total_discharge, max(updated_on) as last_update FROM progressive");
$res = $stmt->fetchAll(PDO::FETCH_ASSOC);

$last_update_talukawise = $res[0]["last_update"] ?? "NOT AVAILABLE";
if ($last_update_talukawise != "NOT AVAILABLE") {
    $last_update_talukawise = date("d/m/Y h:i:s A", strtotime($last_update_talukawise));
}



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

$stmt_ = $con->query("SELECT max(updated_on) as update_last FROM hospital_master");
$upd = $stmt_->fetchAll(PDO::FETCH_ASSOC)[0]["update_last"] ?? "NOT AVAILABLE";
if ($upd != "NOT AVAILABLE") {
    $upd = date("d/m/Y h:i:s A", strtotime($upd));
}
die($templates->render("display", [
    "logged_in" => $logged_in,
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
    "hospitals" => $hospitals,
    "updated_hosps_det_time" => $upd,
    "last_talukawise_update" => $last_update_talukawise,
]));
