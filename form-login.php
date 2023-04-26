<!DOCTYPE html>
<html lang="pt-br">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/style-login.css">
        <link rel="stylesheet" href="css/estilo-modal-confirmacao.css">
        <title>Login</title>

         <!-- BIBLIOTECA QUE PERMITE ENVIAR EMAIL -->
         <script src="https://cdn.emailjs.com/sdk/2.3.2/email.min.js"></script>
    </head>

    <body class="body">




        <!-- MODAL CONFIRMAÇÃO DE ACESSO -->
        <div id="modal" class="modal">
            <div class="modal-form" id="modal-form">
                
                <div class="modal-sessao-0">
                    <h2 class="modal-titulo" id="modal-titulo"> Trocar senha </h2>
                    <p class="modal-frase"> Digite seu email para que um código de verificação seja enviado no seu email. </p>

                    <form class="form-modal-email" action="" method="POST" id="form-modal-email">
                        <div class="modal-input-box-email">
                            <label for="email" class="modal-senha"> Email </label>
                            <input placeholder="Digite seu email" type="email" name="email" id="email" class="modal-input-senha">
                        </div>
                        <div class="btn-confirmed"><button id="verifica-email" type="submit"> ENVIAR </button></div>
                    </form>
                    <a class="voltar-login" href="#"> Voltar para o login </a>
                </div>

                <div class="modal-sessao-1">
                    <h2 class="modal-titulo" id="modal-titulo"> Confirmação de acesso </h2>
                    <p class="modal-frase"> Digite o código de verificação enviado no seu email para que você possa ter acesso a troca de senha. </p>
                    
                    <form class="form-modal" action="" method="POST" id="form-modal">
                        <div class="modal-input-box">
                            <label for="codigo" class="modal-senha"> Código </label>
                            <input placeholder="Digite o código" type="text" name="codigo" id="codigo" class="modal-input-senha">
                        </div>
                        <div class="btn-confirmed" id="btn-confirmed"><button class="modal-btn-confirmar" type="submit">Confirmar</button></div>
                    </form>

                    <a class="voltar-login" href="#"> Voltar para o login </a>
                </div>

                <!-- <div class="modal-sessao-2">
                    <h2 class="modal-titulo" id="modal-titulo"> Verificação concluída </h2>
                    <p class="modal-frase"> A verificação foi feita com sucesso! Agora você já pode alterar sua senha. </p>
                    <div class="btn-confirmed" id="btn-confirmed"><button class="modal-btn-confirmar" id="btn-fechar"> FECHAR </button></div>
                </div>  -->
            </div>
        </div>





        <!-- FORM LOGIN -->
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
                            <a class="link-esqueceu-senha" href="#"> Esqueceu a senha? </a>
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
        <script type="module" src="js/main.js"></script>
        <!-- <script type="module" src="js/envia-email-login.js"></script> -->
    </body>

</html>