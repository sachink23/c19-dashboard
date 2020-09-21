<?php

use PDOCon\Db;

require_once "../include.php";
if (!isset($_POST["username"]) || !isset($_POST["password"])) {
    pageInfo("danger", "Please Enter Valid Email Id Or Password");
    header("Location: ../login.php");
    exit;
}
if (isLogin($_POST["username"], hashPass($_POST["password"]))) {
    header("Location: ../admin/");
    exit;
} else {
    pageInfo("danger", "Please Enter Valid Email Id Or Password");
    header("Location: ../login.php");
    exit;
}

