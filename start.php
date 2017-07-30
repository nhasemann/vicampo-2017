<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
session_start();

if (isset($_POST['logout'])) {
    unset($_SESSION['started']);
    unset($_SESSION['role']);
    unset($_SESSION['userid']);
    session_destroy();
}

$page = "./templates/start_template.php";
include_once './shared/master.php';