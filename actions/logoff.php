<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if (isset($_SESSION)) {
    session_destroy();
}
session_start();
$_SESSION = [];

header("Location: /index.php");
die;
