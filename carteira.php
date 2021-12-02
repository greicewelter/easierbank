<?php include_once './includes/start.php';
include_once './includes/session.php';
include_once './includes/conecta.php';


$consulta = $con->prepare("select * from carteiras ");
$consulta->execute();
$result = $consulta->fetchAll();
// print_r($result);


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
            <b>Minha Carteira</b>
        </p>
    </div>

    <div class="container">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col" class="text-center">Investimento</th>
                    <th scope="col" class="text-center">Valor</th>
                    <th scope="col" class="text-center">Data Inicial</th>
                    <th scope="col" class="text-center">Data Final</th>
                    <th scope="col" class="text-center"></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row" class="align-middle">1</th>
                    <td class="align-middle">Lideranças Femininas</td>
                    <td class="text-right align-middle">R$ 100</td>
                    <td class="text-right align-middle">10/02/2021</td>
                    <td class="text-right align-middle">10/02/2022</td>
                    <td class="text-center align-middle">
                        <a class="btn btn-easier mr-2" href="/investir.php?id=<?php echo 'f'; ?>">Detalhes</a>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

    <?php include_once './includes/footer.php' ?>
</body>

</html>