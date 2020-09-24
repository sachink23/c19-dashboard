<?php

use PDOCon\Db;

require_once "../include.php";

if (!isLogin($_SESSION["user"]["username"], $_SESSION["user"]["password"])) {
    pageInfo("info","Login Required!");
    header("Location: ../login.php");
    exit;
}
if (
    isset($_POST["hospital_name"]) &&
    isset($_POST["hospital_type"]) &&
    isset($_POST["hospital_gov_priv"]) &&
    isset($_POST["hospital_subdist"]) &&
    isset($_POST["hospital_add"]) &&
    isset($_POST["contact_person"]) &&
    isset($_POST["contact_number"]) &&
    isset($_POST["total_beds"]) &&
    isset($_POST["o2_beds"]) &&
    isset($_POST["vent_beds"])
) {
    if ($_POST["total_beds"] < $_POST["o2_beds"] ||  $_POST["total_beds"] < $_POST["vent_beds"]) {
        pageInfo("danger", "Invalid For Beds!");
        header("Location: ../admin/?path=edit-hospital&hid=".$_GET["hid"]);
        exit;
    }

    $db = new Db();
    $con = $db->con();

    $stmt = $con->prepare("UPDATE hospital_master SET hospital_name = ?, type = ?, is_gov = ?, taluka = ?, number_of_beds = ?, number_of_o2_beds = ?, number_of_ventilator_beds = ?, number_of_occ_beds = ?, address = ?, contact_person = ?, contact_number = ?, updated_on = updated_on WHERE hospital_id = ?");
    try {
        $res = $stmt->execute([
            $_POST["hospital_name"],
            $_POST["hospital_type"],
            $_POST["hospital_gov_priv"] == "g" ? 1:0,
            $_POST["hospital_subdist"],
            $_POST["total_beds"],
            $_POST["o2_beds"],
            $_POST["vent_beds"],
            0,
            $_POST["hospital_add"],
            $_POST["contact_person"],
            $_POST["contact_number"],
            $_GET["hid"]
        ]);
        if ($res) {
            pageInfo("success", "Successfully Edited Hospital!");
            header("Location: ../admin/?path=edit-hospital&hid=".$_GET["hid"]);
            exit;
        }
    } catch (PDOException $e) {
        pageInfo("waring", "Database Error, Failed to edit Hospital!");
        header("Location: ../admin/?path=edit-hospital&hid=".$_GET["hid"]);
        exit;
    }

}
pageInfo("danger", "Invalid Input");
header("Location: ../admin/?path=edit-hospital&hid=".$_GET["hid"]);
