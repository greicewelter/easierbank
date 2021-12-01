<?php
include_once './includes/start.php';
include_once './includes/session.php';

$tipoInvestimento = $_GET['inv'] == "f" ? 'Fixa' : 'Variável';

$arrInvestimentos = [
    [
        'id' => 1,
        'nome' => 'ESG Global Dolar',
        'imagem' => 'investimento1.png',
        'descricao' => '
            <b>Acumulado do ano:</b> 17,22% </br>
            <b>Últimos mês:</b> 0,87% </br>
            <b>Aplicação Mínima:</b> R$ 100 </br></br>
            <b>Taxa de admin.:</b> 0,50% ao ano </br>
            <b>Investimento para:</b> longo prazo </br>
            <b>Grau de risco (de 0 a 100):</b> 30
        ',
    ],
    [
        'id' => 2,
        'nome' => 'Lideranças Femininas',
        'imagem' => 'investimento2.jpg',
        'descricao' => '
            <b>Acumulado do ano:</b> 13,80% </br>
            <b>Últimos mês:</b> -4,39% </br>
            <b>Aplicação Mínima:</b> R$ 100 </br></br>
            <b>Taxa de admin.:</b> 0,50% ao ano </br>
            <b>Investimento para:</b> longo prazo </br>
            <b>Grau de risco (de 0 a 100):</b> 33
        ',
    ],
    [
        'id' => 3,
        'nome' => 'Saúde Global FIM',
        'imagem' => 'investimento3.jpg',
        'descricao' => '
            <b>Acumulado do ano:</b> 9,22%</br>
            <b>Últimos mês:</b> -5,11%</br>
            <b>Aplicação Mínima:</b> R$ 100</br></br>
            <b>Taxa de admin.:</b> 0,50% ao ano</br>
            <b>Investimento para:</b> longo prazo</br>
            <b>Grau de risco (de 0 a 100):</b> 16
        ',
    ],
    [
        'id' => 4,
        'nome' => 'Tecnologia FIM',
        'imagem' => 'investimento4.jpg',
        'descricao' => '
            <b>Acumulado no ano:</b> 14,38%</br>
            <b>Últimos mês:</b> -5,79%</br>
            <b>Aplicação Mínima:</b> R$ 100</br></br>
            <b>Taxa de admin.:</b> 0,50% ao ano</br>
            <b>Investimento para:</b> longo prazo</br>
            <b>Grau de risco (de 0 a 100):</b> 33
        ',
    ],
    [
        'id' => 5,
        'nome' => 'Bolsa Chinesa FIM',
        'imagem' => 'investimento5.jpg',
        'descricao' => '
            <b>Acumulado do ano:</b> -15,18%</br>
            <b>Últimos mês:</b> -1,07%</br>
            <b>Aplicação Mínima:</b> R$ 100</br></br>
            <b>Taxa de admin.:</b> 0,50% ao ano</br>
            <b>Investimento para:</b> longo prazo</br>
            <b>Grau de risco (de 0 a 100):</b> 40
        ',
    ],
    [
        'id' => 6,
        'nome' => 'Investimento 6',
        'imagem' => 'investimento6.jpg',
        'descricao' => 'Investimento 6',
    ],
    [
        'id' => 7,
        'nome' => 'Investimento 7',
        'imagem' => 'investimento7.jpg',
        'descricao' => 'Investimento 7',
    ],
    [
        'id' => 8,
        'nome' => 'Investimento 8',
        'imagem' => 'investimento8.jpg',
        'descricao' => 'Investimento 8',
    ],
    [
        'id' => 9,
        'nome' => 'Investimento 9',
        'imagem' => 'investimento9.jpg',
        'descricao' => 'Investimento 9',
    ],
];

if ($_GET['inv'] == "f") {
    $arrInvestimentos = [
        [
            'id' => 1,
            'nome' => 'CDB 300% do CDI',
            'imagem' => 'investimento4.jpg',
            'descricao' => '
                <b>Taxa de rentabilidade:</b> 300% CDI<br/>
                <b>Carência:</b> 1 dia<br/>
                <b>Vencimento:</b> Fev/2022<br/>
                <b>Investimento máximo por CPF:</b> R$ 7.000,00*<br/>
                <b>Investimento mínimo por CPF:</b> R$ 500,00',
        ],
    ];
}

?>
<!doctype html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <title>Easier Bank</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/pricing.css" rel="stylesheet">
    <link href="assets/css/default.css" rel="stylesheet">
</head>

<body>
    <?php include_once './includes/menu.php' ?>
    <?php include_once './includes/alert.php' ?>

    <div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
        <p class="h2">
            <b>Investimento Renda <?php echo $tipoInvestimento; ?></b>
        </p>
        <p class="lead">Aqui você podera escolher a menlhor opção de investimento</p>
    </div>

    <div class="container">
        <div class="card-deck text-center">
            <?php
            if (!empty($arrInvestimentos)) {
                foreach ($arrInvestimentos as $k => $investimento) { ?>
                    <div class="card mb-4" style="width: 18rem;">
                        <img class="card-img-top img-inv <?php echo ($k + 1) == count($arrInvestimentos) && ($k + 1) % 3 != 0 ? '' : 'img-not-final' ?>" src="./assets/img/investimentos/<?php echo $investimento['imagem'] ?>">
                        <div class="card-body">
                            <h4 class="card-title">
                                <?php echo $investimento['nome'] ?>
                            </h4>
                            <div class="card-text mb-3">
                                <?php echo $investimento['descricao'] ?>
                            </div>
                            <a href="#" class="btn btn-easier">Investir</a>
                        </div>
                    </div>
            <?php
                }
            }
            ?>
        </div>
    </div>

    <?php include_once './includes/footer.php' ?>
</body>

</html>