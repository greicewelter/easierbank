<?php
include_once './includes/init.php';

session_destroy();
print_r($_SESSION);
//header("Location: /index.php");
