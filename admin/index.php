<?php

use PDOCon\Db;

require_once "../include.php";

if (!isLogin($_SESSION["user"]["username"], $_SESSION["user"]["password"])) {
    pageInfo("info","Login Required!");
    header("Location: ../login.php");
    exit;
}
$db = new Db();
$con = $db->con();
try {
    if (isset($_GET["path"])) {
        if ($_GET["path"] == "manage-hospitals") {
            $stmt = $con->query("SELECT * FROM hospital_master");
            $hospitals = $stmt->fetchAll(PDO::FETCH_ASSOC);
            die($templates->render("admin/hospitals", [
                "hospitals" => $hospitals
            ]));
        }


        if ($_GET["path"] == "daily-districtwise-data-entry") {
            $stmt = $con->query("SELECT * FROM progressive ORDER BY date DESC");

            $reports = $stmt->fetchAll(PDO::FETCH_ASSOC);

            die($templates->render("admin/district-wise", [
                "reports" => $reports
            ]));
        }
        if ($_GET["path"] == "daily-talukawise-data-entry") {
            $stmt = $con->query("SELECT sum(positive) as total_positive,  sum(death) as total_death, sum(discharge) as total_discharge, taluka FROM daily GROUP BY taluka");
            $tals = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $talukas = array();
            foreach ($tals as $taluka) {
                $talukas[strtolower($taluka["taluka"])] = [
                    "positive" => $taluka["total_positive"],
                    "death" => $taluka["total_death"],
                    "discharge" => $taluka["total_discharge"],
                    "active" => $taluka["total_positive"] - ($taluka["total_death"] + $taluka["total_discharge"])
                ];
            }
            die($templates->render("admin/daily-talukawise-data-entry", [
                "talukas" => $talukas
            ]));
        }
        if ($_GET["path"] == "edit-hospital") {
            if (!isset($_GET["hid"])) {
                pageInfo("danger", "Invalid Hospital Selected");
                header("Location: ./?path=manage-hospitals");
                exit;
            }
            $stmt = $con->prepare("SELECT * FROM hospital_master WHERE hospital_id = ?");
            $stmt->execute([$_GET["hid"]]);
            $hospitals = $stmt->fetchAll(PDO::FETCH_ASSOC);
            if (count($hospitals) == 1) {
                $hospital = $hospitals[0];
                die($templates->render("admin/edit-hospital", [
                    "hospital" => $hospital
                ]));
            } else {
                pageInfo("danger", "Invalid Hospital Selected");
                header("Location: ./?path=manage-hospitals");
                exit;
            }
        }
    }
} catch (PDOException $e) {
    pageInfo("warning", "Database Error!!!!");
}
header("Location: ./?path=daily-districtwise-data-entry");
