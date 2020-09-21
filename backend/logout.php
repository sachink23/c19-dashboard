<?php
    require_once "../include.php";
    logout();
    pageInfo("success", "Logged Out Successfully");
    header("Location: ../login.php");
