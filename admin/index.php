<?php

require_once __DIR__."/../include.php";

if (!isLogin($_SESSION["user"]["username"], $_SESSION["user"]["password"])) {
    pageInfo("info","Login Required!");
    header("Location: ../login.php");
    exit;
}

if (isset($_GET["path"])) {
    if ($_GET["path"] == "form1") {

    }
    if ($_GET["path"] == "form2") {

    }
}
die($templates->render("admin/home"));