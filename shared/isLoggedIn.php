<?php
session_start();
if (!isset($_SESSION['started'])) {
    session_destroy();
    header('Location: start.php');
    exit();
}
