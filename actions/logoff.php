<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_destroy();
print_r($_SESSION);
//header("Location: /index.php");
