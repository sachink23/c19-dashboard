<?php
use PDOCon\Db;

require_once "../include.php";

if (!isLogin($_SESSION["user"]["username"], $_SESSION["user"]["password"])) {
    pageInfo("info","Login Required!");
    header("Location: ../login.php");
    exit;
}
if (!isset($_GET["hid"])) {
    pageInfo("warning", "Invalid hospital info to delete");
    header("Location: ../admin/?path=manage-hospitals");
    exit();
}
$db = new Db();
$con = $db->con();
try {
    $stmt = $con->prepare("DELETE FROM hospital_master WHERE hospital_id = ?");
    $stmt->execute([$_GET["hid"]]);
    pageInfo("success", "Successfully Deleted Hospital!!");
    header("Location: ../admin/?path=manage-hospitals");
    exit();
} catch (PDOException $e) {
    pageInfo("warning", "Failed, Database Error");
    header("Location: ../admin/?path=edit-hospital&hid=".$_GET["hid"]);
    exit();
}