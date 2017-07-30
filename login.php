<?php
require_once './database/CustomerDatabase.php';
session_start();
$db = new CustomerDatabase();
if (isset($_POST['login'])) {
    try {
        $res = $db->selectUserLogin($_POST['userLogin'], $_POST['passwordLogin']);
        $user = $res->fetchObject();
        if (empty($user)) {
            $error = "E-Mail oder Passwort falsch!";
            header('Location: start.php');
        } else {
            session_start();
            $id = $user->customerID;
            $_SESSION['started'] = true;
            $_SESSION['userid'] = $id;
            header('Location: products.php');
        }
    } catch (Exception $exception) {

        $error = $exception->getMessage();
    }
} elseif (isset($_POST['logout'])) {
    unset($_SESSION['started']);
}


$page = "./templates/login_template.php";
include_once './shared/master.php';