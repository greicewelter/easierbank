<?php
include_once './includes/start.php';
include_once './includes/session.php';
include_once './includes/conecta.php';

$id = $_GET['id'];
$consulta = $con->prepare("select * from investimentos where id='$id'");
$consulta->execute();
$result = $consulta->fetch(PDO::FETCH_ASSOC);

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
            <b><?php echo $result['nome'] ?></b>
        </p>
        <p><?php echo $result['descricao'] ?></p>
    </div>

    <div class="container">
        <form class="form-inline form-investir" method="post" action="/actions/investir.php">
            <input type="hidden" name="investimento" value="<?php echo $result['id'] ?>">
            <div class="form-group mx-sm-3">
                <label for="inputPassword2" class="sr-only">Valor</label>
                <input name="valor" type="text" class="form-control" placeholder="Valor">
            </div>
            <a class="btn btn-easier mr-2" href="/investimento.php?inv=<?php echo $result['tipo']; ?>">Cancelar</a>
            <button type="submit" class="btn btn-easier">Investir</button>
        </form>
    </div>

    <?php include_once './includes/footer.php' ?>
</body>

</html>