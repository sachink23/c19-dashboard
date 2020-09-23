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

    $con->beginTransaction();

    $stmt = $con->prepare("DELETE FROM progressive WHERE date = ?");
    $stmt->execute([$_POST["date"]]);

    $stmt = $con->prepare("DELETE FROM daily WHERE date = ?");
    $stmt->execute([$_POST["date"]]);

    $talukas = [
        "gangakhed",
        "jintur",
        "manwath",
        "selu",
        "sonpeth",
        "palam",
        "parbhani",
        "pathri",
        "purna",
        "other"
    ];
    $stmt = $con->prepare("SELECT sum(positive) as p, sum(discharge) as di, sum(death) as d FROM daily WHERE taluka = ?");
    $stmt2 = $con->prepare("INSERT INTO daily (date, taluka, positive, discharge, death, active, updated_on) values (?, ?, ?, ?, ?, ?, ?)");
    $district_positive = 0;
    $district_discharge = 0;
    $district_death = 0;
    $district_active = 0;
    $district_tests = $_POST["tests"];
    $time = date("Y-m-d H:i:s", strtotime($_POST["date"] . " ".$_POST["time"] ));

    foreach ($talukas as $taluka) {
        $stmt->execute([$taluka]);
        $res = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $active = (($res["p"] ?? 0) + ($_POST["positive_".$taluka] ?? 0)) - ((($res["di"] ?? 0) + $_POST["discharge_".$taluka] ?? 0) + (($res["d"] ?? 0) + ($_POST["death_".$taluka] ?? 0)));
        $stmt2->execute([
            $_POST["date"],
            $taluka,
            $_POST["positive_".$taluka] ?? 0,
            $_POST["discharge_".$taluka] ?? 0,
            $_POST["death_".$taluka] ?? 0,
            $active ?? 0,
            $time
        ]);
        $district_positive += ($_POST["positive_".$taluka] ?? 0);
        $district_discharge += ($_POST["discharge_".$taluka] ?? 0);
        $district_death += ($_POST["death_".$taluka] ?? 0);
        $district_active += ($active ?? 0);
    }
    $stmt = $con->prepare("INSERT INTO progressive (date, tests, positive, discharge, death, active, updated_on) VALUES (?,?,?,?, ?, ?, ?) ");
    $stmt->execute([
        $_POST["date"],
        $district_tests,
        $district_positive,
        $district_discharge,
        $district_death,
        $district_active,
        $time
    ]);
    $con->commit();
    pageInfo("success", "Data Entry Successful!");
    header("Location: ../admin/?path=daily-talukawise-data-entry");
    exit;
} catch (PDOException $e) {
    $con->rollBack();
    pageInfo("warning", "Data Entry Failed! Database Error!!!");
    header("Location: ../admin/?path=daily-talukawise-data-entry");
    exit;
}

