<?php include_once './includes/start.php';
include_once './includes/session.php';
include_once './includes/conecta.php';

$consulta = $con->prepare("select c.*, i.nome from carteiras c inner join investimentos i on i.id=c.investimento_id");
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
            <b>Minha Carteira</b>
        </p>
    </div>

    <div class="container">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col" class="text-center">Investimento</th>
                    <th scope="col" class="text-center">Data Inicial</th>
                    <th scope="col" class="text-center">Data Final</th>
                    <th scope="col" class="text-center">Valor</th>
                    <th scope="col" class="text-center"></th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($result)) {
                    $total = 0;
                    foreach ($result as $k => $carteira) {
                        $total += floatval($carteira['valor']);  ?>
                        <tr>
                            <th scope="row" class="align-middle"><?php echo $k + 1 ?></th>
                            <td class="align-middle"><?php echo $carteira['nome'] ?></td>
                            <td class="text-right align-middle"><?php echo date_format(date_create($carteira['data_inicial']), "d/m/Y"); ?></td>
                            <td class="text-right align-middle"><?php echo date_format(date_create($carteira['data_final']), "d/m/Y"); ?></td>
                            <td class="text-right align-middle">R$ <?php echo number_format($carteira['valor'], 2); ?></td>
                            <td class="text-center align-middle">
                                <a class="btn btn-easier mr-2" href="/investir.php?id=<?php echo $carteira['investimento_id'] ?>">Detalhes</a>
                            </td>
                        </tr>
                    <?php } ?>
                    <tr>
                        <td class="text-right" colspan="4">
                            <b>Total Investido:</b>
                        </td>
                        <td class="text-right">R$ <?php echo number_format($total, 2); ?></td>
                        <td></td>
                    </tr>
                <?php  } else { ?>
                    <tr>
                        <td colspan="6" class="text-center align-middle">Você ainda não possui investimentos.</td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>

    <?php include_once './includes/footer.php' ?>
</body>

</html>