<?php
include_once './includes/start.php';
include_once './includes/session.php';
include_once './includes/conecta.php';

$tipoInvestimento = $_GET['inv'] == "f" ? 'Fixa' : 'Variável';
$tipo = $_GET['inv'] == "f" ? 'f' : 'v';

$consulta = $con->prepare("select * from investimentos where tipo = '$tipo'");
$consulta->execute();
$result = $consulta->fetchAll();




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
            if (!empty($result)) {
                foreach ($result as $k => $investimento) { ?>
                    <div class="card mb-4" style="width: 18rem;">
                        <img class="card-img-top img-inv <?php echo ($k + 1) == count($result) && ($k + 1) % 3 != 0 ? '' : 'img-not-final' ?>" src="./assets/img/investimentos/investimento<?php echo $investimento['id'] ?>.jpg">
                        <div class="card-body">
                            <h4 class="card-title">
                                <?php echo $investimento['nome'] ?>
                            </h4>
                            <div class="card-text mb-3">
                                <?php echo $investimento['descricao'] ?>
                            </div>
                            <a href="/investir.php?id=<?php echo $investimento['id']; ?>" class="btn btn-easier">Investir</a>
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