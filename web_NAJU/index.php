<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Login</title>
</head>

<body>
    <div class="main container-fluid">
        <!-- pag de login -->
        <div class="container" id="card-login">
            <div class="row justify-content-center" id="div-espacoForms">
                <div class="col-md-6">
                    <h2 class="text-justify" id="titulo">Bem-vindo de volta!</h2>
                    <h3 class="text-justify" id="subtitulo">Escreva suas credenciais para acessar sua conta</h3>
                    <form action="login.php" method="POST" id="forms_estilo">
                        <div class="form-group">
                            <label for="username">Username:<br></label>
                            <input type="text" class="form-control" name="username" required id="text-input">
                        </div><br>
                        <div class="form-group">
                            <label for="password">Password:<br></label>
                            <input type="password" class="form-control" name="password" required id="text-input">
                        </div><br>
                        <div>
                            <input type="checkbox" class="form-control" required id="text-checkbox">
                            <label for="checkbox">Li e aceito os termos e diretrizes.</label>
                        </div>
                        <button type="submit" class="btn btn-primary mt-3 text-center" id="estilo_botao">
                            <text>Acessar</text>
                        </button><br>
                    </form>
                </div>
            </div>
        </div>
        <div class="imagem_naju">
        </div>
    </div>
</body>

</html>