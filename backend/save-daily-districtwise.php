<?php

use PDOCon\Db;

require_once "../include.php";

if (!isLogin($_SESSION["user"]["username"], $_SESSION["user"]["password"])) {
    pageInfo("info","Login Required!");
    header("Location: ../login.php");
    exit;
}

if (!(
    isset($_POST["tests"]) &&
    isset($_POST["positive"]) &&
    isset($_POST["discharge"]) &&
    isset($_POST["death"]) &&
    isset($_POST["date"]) &&
    isset($_POST["time"])
)) {
    pageInfo("warning   ", "Invalid Input");
    header("Location: ../admin/?path=daily-districtwise-data-entry");
    exit;
}
$db = new Db();

$con = $db->con();
$con->beginTransaction();
$time = date("Y-m-d H:i:s", strtotime($_POST["date"] ." ". $_POST["time"]));

try {

    $stmt = $con->prepare("DELETE FROM progressive WHERE date = ?");
    $stmt->execute([$_POST["date"]]);


    $stmt = $con->prepare("INSERT into progressive (date, tests, positive, discharge, death, updated_on) values (?, ?, ?, ?, ?, ?)");
    $stmt->execute([
            $_POST["date"],
            $_POST["tests"],
            $_POST["positive"],
            $_POST["discharge"],
            $_POST["death"],
            $time
    ]);
    $con->commit();;
    pageInfo("success", "Data Entry Successful for ". $time);
    header("Location: ../admin/?path=daily-districtwise-data-entry");
    exit;
} catch (PDOException $e) {
    $con->rollback();
    pageInfo("warning", "Data Entry Failed for ". $time . " ". $e);
    header("Location: ../admin/?path=daily-districtwise-data-entry");
    exit;
}


