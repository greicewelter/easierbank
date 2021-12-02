 <?php
    include_once '../includes/start.php';
    include_once '../includes/conecta.php';
    include_once '../includes/session.php';

    $valor = $_POST['valor'];
    $investimento = $_POST['investimento'];

    $consulta = $con->prepare("select * from investimentos where id = '$investimento'");
    $consulta->execute();
    $result = $consulta->fetch(PDO::FETCH_ASSOC);

    if (empty($result)) {
        $menssage = [
            'tipo' => 'alert-warning',
            'mensagem' => 'Investimento não encontrado!',
        ];


        $_SESSION['alert'] = serialize($menssage);

        header("Location: /investimento.php");
        die;
    }

    if (floatval($valor) < floatval($result['valor_minimo'])) {
        $menssage = [
            'tipo' => 'alert-warning',
            'mensagem' => 'Valor inferior do minimo recomendado!',
        ];

        $_SESSION['alert'] = serialize($menssage);

        header("Location: /investir.php?id=$investimento");
        die;
    }

    $consulta = $con->prepare("select sum(valor) as total from carteiras where cliente_id = '{$usuario['id']}'");
    $consulta->execute();
    $carteira = $consulta->fetch(PDO::FETCH_ASSOC);

    if (floatval($usuario['saldo']) < (floatval($carteira['total']) + floatval($valor))) {
        $saldoDisponivel = floatval($usuario['saldo']) - floatval($carteira['total']);
        $saldoDisponivel = $saldoDisponivel < 0 ? 0 : $saldoDisponivel;
        $menssage = [
            'tipo' => 'alert-warning',
            'mensagem' => "Saldo insuficiente! Saldo Disponível: R$ $saldoDisponivel",
        ];

        $_SESSION['alert'] = serialize($menssage);

        header("Location: /investir.php?id=$investimento");
        die;
    }




    print_r($result);
    // print_r($_POST);
    // print_r($usuario);
    // print_r($carteira);
