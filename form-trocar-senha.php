<!DOCTYPE html>
<html lang="pt-br">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/style-trocar-senha.css">
        <title>Login</title>
    </head>

    <body class="body">



        <!-- FORM TROCAR SENHA -->
        <div class="container">
            <div class="form-image">
                <img src="img/laco-2.jpg" alt="">
            </div>
            <div class="form">
                <form action="" method="post" id="formularioLogin">
                    <div class="form-header">
                        <div class="title">
                            <h1>Trocar Senha</h1>
                            <p> 
                                Sua nova senha não pode ser a mesma que a anterior e deve conter no mínimo 8
                                caracteres, sendo eles letras maiúsculas, minúsculas e símbolos.
                            </p>
                        </div>
                    </div>
                    <div class="input-group">
                        <div class="input-box">
                            <label for="senha">Nova senha</label>
                            <input type="password" name="senha" id="senha" placeholder="Digite a nova senha">
                            <small>Mínino de até 8 caracteres</small>
                        </div>
                        <div class="input-box">
                            <label for="senhaC">Confirmar nova senha</label>
                            <input type="password" name="confSenha" id="confSenha" placeholder="Confirme a nova senha">
                            <small>Mínino de até 8 caracteres</small>
                        </div>
                       
                    </div>
                    <div class="continue-button">
                        <button name="btn" class="botao-enviar" type="submit">Confirmar</button>   
                    </div>
                </form>

                <a class="voltar" href="form-login.php">Voltar para o login</a>
            </div>
        </div>




        <script src="js/mascaraLoginUsuario.js"></script>
        <script type="module" src="js/main.js"></script>
        <!-- <script type="module" src="js/envia-email-login.js"></script> -->
    </body>

</html>