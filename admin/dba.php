<?php

use PDOCon\Db;

require_once __DIR__."/../include.php";

if (!isLogin($_SESSION["user"]["username"], $_SESSION["user"]["password"])) {
    pageInfo("info","Login Required!");
    header("Location: ../login.php");
    exit;
}
if (isset($_POST["query"])) {
    $_SESSION["Q"] = $_POST["query"];
    $db = new db;
    $con = $db->con();
    try {
        $q = $con->query(trim($_POST["query"]));
        if ($q) {
            $d = "Successfully Executed Query!";
            try {
                $_SESSION["Q_DATA"] = $q->fetchAll(PDO::FETCH_ASSOC);
            } catch (PDOException $e) {
                $_SESSION["Q_DATA"] = [];
            }
            pageInfo("success", $d);
        } else {
            pageInfo("warning", "Failed!");
        }

    } catch (PDOException $e) {
        pageInfo("danger", $e->getMessage());
    }

}

die($templates->render("admin/dba", [
    "query" => $_SESSION["Q"] ?? "",
    "data" => $_SESSION["Q_DATA"] ?? []
]));

