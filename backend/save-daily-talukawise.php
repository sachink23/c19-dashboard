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

    $stmt = $con->prepare("DELETE FROM progressive WHERE date_format(date, 'Y-m-d') = ?");
    $stmt->execute([$_POST["date"]]);

    $stmt = $con->prepare("DELETE FROM daily WHERE date_format(date, 'Y-m-d') = ?");
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
    foreach ($talukas as $taluka) {


    }
    $con->commit();
} catch (PDOException $e) {
    $con->rollBack();
    pageInfo("warning", "Data Entry Failed! Database Error!!!");
    header("Location: ../admin/?path=daily-talukawise-data-entry");
    exit;
}
pageInfo("success", "Data Entry Successful!");
header("Location: ../admin/?path=daily-talukawise-data-entry");
exit;
