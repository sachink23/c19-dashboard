<?php

require_once __DIR__ . "/include.php";
if (isset($_SESSION["user"])) {

    if (isLogin($_SESSION["user"]["username"], $_SESSION["user"]["password"])) {
        header("Location: ./admin/");
        exit;
    }
}
die($templates->render("login"));
