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
if (!(
    isset($_POST["hid"]) &&
    isset($_POST["occ_".$_POST["hid"]]) &&
    isset($_POST["time_".$_POST["hid"]]) &&
    isset($_POST["date_".$_POST["hid"]])
))  {
    pageInfo("danger", "Invalid Input");
    header("Location: ../admin/?path=manage-hospitals");
    exit;
}
try {

    $stmt = $con->prepare("UPDATE hospital_master SET number_of_occ_beds = ?, updated_on = ? WHERE hospital_id = ?");
    $stmt->execute([
        $_POST["occ_".$_POST["hid"]],
        date("Y-m-d H:i:s", strtotime($_POST["date_".$_POST["hid"]] ." ".$_POST["time_".$_POST["hid"]])),
        $_POST["hid"]
    ]);

    pageInfo("success", "Data Entry Successful!");
    header("Location: ../admin/?path=manage-hospitals");
    exit;

} catch (PDOException $e) {
    pageInfo("warning", "Data Entry Failed, DB ERROR!");
    header("Location: ../admin/?path=manage-hospitals");
    exit;
}
