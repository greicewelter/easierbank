<!doctype html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <title>Easier Bank</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/default.css" rel="stylesheet">
    <link href="assets/css/login.css" rel="stylesheet">
</head>

<body>
    <div class="container">
        <div class="text-center">
            <img class="m-4" src="assets/img/logo.png" width="120">
        </div>

        <div class="text-center">
            <h3>Venha Investir com a gente</h3>
            <h3>Easier Bank, aqui você vem primeiro</h3>
        </div>

        <div class="mb-4 mt-4">
            <form class="card form-signin" method="POST" action="/actions/login.php">
                <label for="inputEmail" class="sr-only">E-mail</label>
                <input type="email" id="inputEmail" class="form-control" placeholder="E-mail" required autofocus autocomplete="off">
                <label for="inputPassword" class="sr-only">Senha</label>
                <input type="password" id="inputPassword" class="form-control" placeholder="Senha" required>
                <button class="btn btn-lg btn-block mt-4 btn-easier" type="submit">Login</button>
            </form>
        </div>

        <?php include_once './includes/footer.php' ?>
    </div>
</body>

</html>