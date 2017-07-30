<?php

require_once './database/CustomerDatabase.php';

if (isset($_POST['login'])) {

    try {
        $db = new CustomerDatabase();
        $res = $db->selectUserLogin($_POST['userLogin'], $_POST['passwordLogin']);
        $user = $res->fetchObject();
        if (empty($user)) {
            $error = "E-Mail oder Passwort falsch!";
            header('Location: start.php');
        } else {
            $id = $user->customerID;
            $_SESSION['started'] = true;
            $_SESSION['userid'] = $id;
            header('Location: start.php');
        }
    } catch (Exception $exception) {

        session_destroy();
        $error = $exception->getMessage();
    }
} elseif (isset($_POST['logout'])) {
    unset($_SESSION['started']);
    unset($_SESSION['role']);
    unset($_SESSION['userid']);
    session_destroy();
}


$page = "./templates/login_template.php";
include_once './shared/master.php';