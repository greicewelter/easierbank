<?php
include_once "../includes/start.php";
include_once "../includes/conecta.php";

$email = $_POST['email'];
$senha = $_POST['senha'];
$senha = md5($senha);

$consulta = $con->prepare("select id, nome, email from clientes where email = '$email' and senha = '$senha'");
$consulta->execute();
$result = $consulta->fetch(PDO::FETCH_ASSOC);

if (isset($result) && isset($result['id'])) {
    $_SESSION['usuario'] = serialize($result);

    header("Location: /dashboard.php");

    die;
} else {
    $menssage = [
        'tipo' => 'alert-warning',
        'mensagem' => 'Usuário ou senha inválido!',
    ];

    $_SESSION['alert'] = serialize($menssage);

    header("Location: /index.php");
    die;
}
