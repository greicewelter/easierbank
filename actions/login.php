<?php
include_once "../includes/conecta.php";

session_start();

//print_r($_POST);
$email = $_POST['email'];
$senha = $_POST['senha'];
$senha = md5($senha);
print_r($senha);
print_r($email);



$consulta = $con->prepare("select * from clientes where email = '$email' and senha = '$senha'");
$consulta->execute();
$result = $consulta->fetch(PDO::FETCH_ASSOC);
print_r($result);

if(isset($result) && isset($result['id'])){
    
}else{
    $menssage = [
       'tipo' => 'alert-warning',
       'mensagem' => 'Usuário ou senha inválido!',
    ];
    $_SESSION['ALERT'] = serialize($menssagem);

    header("Location: /index.php");
}
//$consulta = $con->query("select * from clientes where email = '$email' and senha = '$senha'");
// $registro = $consulta->fetch(PDO::FETCH_OBJ);
// print_r($registro);
 //


//header("Location: /dashboard.php");
