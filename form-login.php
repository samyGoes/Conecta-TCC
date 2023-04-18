<!DOCTYPE html>
<html lang="pt-br">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/style-login.css">
        <title>Login</title>
    </head>

    <body class="body">
        <div class="container">
            <div class="form-image">
                <img src="img/laco-2.jpg" alt="">
            </div>
            <div class="form">
                <form action="auth/loginUsuario.php" method="post" id="formularioLogin">
                    <div class="form-header">
                        <div class="title">
                            <h1>LOGIN</h1>
                        </div>
                    </div>
                    <div class="input-group">
                        <div class="input-box">
                            <label for="email">CPF ou CNPJ</label>
                            <input type="text" name="login" id="login" placeholder="Digite seu CPF ou CNPJ">
                        </div>
                        <div class="input-box">
                            <label for="senha">Senha</label>
                            <input type="password" name="senha" id="senha" oninput="validate()" placeholder="Digite sua senha">
                        </div>
                    </div>
                    <div class="continue-button">
                        <button name="btn" class="botao-enviar" type="submit">Entrar</button>   
                    </div>
                </form>

                <a href="opcao-cadastro.php"><button class="botao-cadastrar">Cadastre-se</button></a>
                <a class="voltar" href="index.php">Voltar para o início</a>
            </div>
        </div>
        <script src="js/mascaraLoginUsuario.js"></script>
    </body>

</html>