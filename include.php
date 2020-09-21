<?php

use League\Plates\Engine;
use PDOCon\Db;

require_once "vendor/autoload.php";

require_once "db.php";

define("APP_ROOT", __DIR__);

define("APP_NAME", "Daily Covid Reporting System");

define("APP_NAME_SHORT", "DCRS");

define("APP_DESC", "Covid reporting system for Parbhani district");

define("VIEWS_ROOT", APP_ROOT . "/views/");


define("APP_SALT", "SomeCoolSalt");

define("APP_BASE_HREF", "/");

session_start();

$templates = new Engine(VIEWS_ROOT);

$templates->addFolder("admin", VIEWS_ROOT . "admin/");

date_default_timezone_set("Asia/Kolkata");



function pageInfo($type, $content)
{
    $_SESSION["PAGE_INFO_EXISTS"] = TRUE;
    $_SESSION["PAGE_INFO_TYPE"] = strtolower($type);
    $_SESSION["PAGE_INFO"] = $content;
}

function clearPageInfo()
{
    unset($_SESSION["PAGE_INFO_EXISTS"]);
    unset($_SESSION["PAGE_INFO_TYPE"]);
    unset($_SESSION["PAGE_INFO"]);
}

function hashPass($password) {
    return hash_hmac("md5", $password, APP_SALT);
}

function isLogin($username, $password) {
    try {
        $db = new Db();
        $con = $db->con();
        $stmt = $con->prepare("SELECT * FROM users WHERE username = ? and password = ?");
        $stmt->execute([trim($username), $password]);
        $res = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if (count($res) == 1) {
            $_SESSION["user"] = $res[0];
            $_SESSION["logged_in"] = true;
            return true;
        } else {
            logout();
            return false;
        }
    } catch(PDOException $e) {
        return false;
    }

}
function logout() {
    unset($_SESSION["user"]);
    unset($_SESSION["logged_in"]);
    session_destroy();
    session_start();
}