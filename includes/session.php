<?php

if (!isset($_SESSION['usuario'])) {
    $menssage = [
        'tipo' => 'alert-warning',
        'mensagem' => 'Efetue o login para acessar!',
    ];

    $_SESSION['alert'] = serialize($menssage);

    header("Location: /index.php");
    die;
}
$usuario = unserialize($_SESSION['usuario']);
