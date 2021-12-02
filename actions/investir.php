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

    $stmt =  $con->prepare('INSERT INTO carteiras (cliente_id, investimento_id, data_inicial, data_final, valor) 
                            VALUES(:cliente_id, :investimento_id, :data_inicial, :data_final, :valor)');
    $stmt->execute(array(
        ':cliente_id'      => $usuario['id'],
        ':investimento_id' => $investimento,
        ':data_inicial'    => date('Y-m-d'),
        ':data_final'      => $result['data_vencimento'],
        ':valor'           => $valor,
    ));

    if ($stmt->rowCount()) {
        $menssage = [
            'tipo' => 'alert-success',
            'mensagem' => 'Investimento realizado com sucesso!',
        ];

        $_SESSION['alert'] = serialize($menssage);

        header("Location: /carteira.php");
        die;
    } else {
        $menssage = [
            'tipo' => 'alert-warning',
            'mensagem' => "Erro ao realizar investimento, tente novamente.",
        ];

        $_SESSION['alert'] = serialize($menssage);

        header("Location: /investir.php?id=$investimento");
        die;
    }
