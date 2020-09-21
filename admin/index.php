<?php

require_once __DIR__."/../include.php";

if (!isLogin($_SESSION["user"]["username"], $_SESSION["user"]["password"])) {
    pageInfo("info","Login Required!");
    header("Location: ../login.php");
    exit;
}

if (isset($_GET["path"])) {
    if ($_GET["path"] == "manage-hospitals") {
        die($templates->render("admin/hospitals"));
    }
    if ($_GET["path"] == "daily-talukawise-data-entry") {
        die($templates->render("admin/daily-talukawise-data-entry"));
    }
}
die($templates->render("admin/home"));