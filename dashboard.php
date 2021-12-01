<?php
include_once './includes/init.php';
include_once './includes/session.php';
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
            <b>Bem vindo ao Easier Bank</b>
        </p>
        <p class="lead">Aqui você podera escolher a menlhor opção de investimento</p>
    </div>

    <div class="container">
        <div class="card-deck mb-3 text-center">
            <div class="card mb-4 shadow-sm">
                <div class="card-header">
                    <h4 class="my-0 font-weight-normal">Renda Fixa</h4>
                </div>
                <div class="card-body d-flex flex-column">
                    <ul class="list-unstyled mt-3 mb-4 text-center">
                        <li>
                            <strong>
                                A renda fixa é uma modalidade de investimento
                                onde a rentabilidade é previsível.
                            </strong>
                        </li>
                    </ul>
                    <a class="align-self-end btn btn-lg btn-block btn-easier" href="/investimento.php?inv=f" style="margin-top: auto;">Investir</a>
                </div>
            </div>
            <div class="card mb-4 shadow-sm">
                <div class="card-header">
                    <h4 class="my-0 font-weight-normal">Renda Variável</h4>
                </div>
                <div class="card-body d-flex flex-column">
                    <ul class="list-unstyled mt-3 mb-4 text-center">
                        <li>
                            <strong>
                                A renda varíavel é um tipo de investimento que não
                                garante nem um ganho fixo nem a devolução do total que foi aplicado.
                            </strong>
                        </li>
                    </ul>
                    <a class="align-self-end btn btn-lg btn-block btn-easier" href="/investimento.php?inv=v" style="margin-top: auto;">Investir</a>
                </div>
            </div>
            <div class="card mb-4 shadow-sm">
                <div class="card-header">
                    <h4 class="my-0 font-weight-normal">Carteira</h4>
                </div>
                <div class="card-body d-flex flex-column">
                    <ul class="list-unstyled mt-3 mb-4 text-center">
                        <li>
                            <strong>Aqui você poderá visualizar seus investimento e a rentabilidade.</strong>
                        </li>
                    </ul>
                    <a class="align-self-end btn btn-lg btn-block btn-easier" href="/carteira.php" style="margin-top: auto;">Visualizar</a>
                </div>
            </div>
        </div>
    </div>

    <?php include_once './includes/footer.php' ?>
</body>

</html>