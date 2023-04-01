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
                <img src="img/laco.jpg" alt="">
            </div>
            <div class="form">
                <form action="dao/login.php" method="post" id="formulario">
                    <div class="form-header">
                        <div class="title">
                            <h1>LOGIN</h1>
                        </div>
                    </div>
                    <div class="input-group">
                        <div class="input-box">
                            <label for="email">Email</label>
                            <input type="email" name="email" id="email" placeholder="Digite seu email">
                        </div>
                        <div class="input-box">
                            <label for="senha">Senha</label>
                            <input type="password" name="password" id="password" placeholder="Digite sua senha">
                        </div>
                    </div>
                    <div class="continue-button">
                        <button name="btn" class="botao-enviar" type="submit">Entrar</button>   
                    </div>
                </form>

                <a href="opcao-cadastro.php"><button class="botao-cadastrar">Cadastre-se</button></a>
                <a class="voltar" href="#">Voltar para o início</a>
            </div>
        </div>
    </body>

</html>