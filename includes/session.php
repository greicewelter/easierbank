<?php
print_r($_SESSION);
if (!isset($_SESSION['usuario'])) {
    header("Location: /index.php");
}

$usuario = unserialize($_SESSION['usuario']);
