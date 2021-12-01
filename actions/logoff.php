<?php
include_once './includes/init.php';

session_destroy();
$_SESSION = [];
header("Location: /index.php");
