<?php

require_once __DIR__."/../include.php";

if (!isLogin($_SESSION["user"]["username"], $_SESSION["user"]["password"])) {
    pageInfo("info","Login Required!");
    header("Location: ../login.php");
    exit;
}
$db = new \PDOCon\Db();
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
        if ($_GET["path"] == "daily-talukawise-data-entry") {
            die($templates->render("admin/daily-talukawise-data-entry"));
        }
    }
} catch (PDOException $e) {
    pageInfo("warning", "Database Error!!!!");
}
die($templates->render("admin/home"));