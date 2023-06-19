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


        <!-- MODAL CADASTRO FEITO COM SUCESSO -->
        <?php
        
            if(isset($_GET['cadastro']))
            {
                if($_GET['cadastro'] === 'sucesso')
                {
                    echo ' <script>
                            // cria o elemento HTML do modal
                            const modal = document.createElement("div");
                            modal.id = "modal";
                            modal.innerHTML = `
                                <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"
                                integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A=="
                                crossorigin="anonymous" referrerpolicy="no-referrer" />
                                <div id="modal-content">
                                    <i id="icone-fechar-modal" class="fa-solid fa-xmark"></i>
                                    <p class="modal-titulo-cadastro">Cadastro realizado com sucesso!<i class="fa-sharp fa-solid fa-circle-check"></i></p>
                                    <p class="modal-frase-cadastro"> Agora é só acessar sua conta fazendo o login. </p>
                                </div>
                                `;

                            // adiciona o modal como filho do body (ou de outro elemento HTML)
                            document.body.appendChild(modal);

                            //adiciona a tag style do modal
                            const style = document.createElement("style");
                            const iconFechaModal = document.querySelector("#icone-fechar-modal");

                            style.innerHTML = `
                                #modal 
                                {
                                    position: fixed;
                                    bottom: 20px;
                                    right: -600px;
                                    z-index: 9999;
                                    transition: all 1s ease;
                                    border: #4567a5 solid 1px;
                                    border-radius: 0.5rem;
                                    background-color: #fff;
                                    padding: 1.3rem;
                                    max-width: 24rem;
                                }

                                #modal-content 
                                {
                                    display: flex;
                                    flex-direction: column;
                                    gap: 0.4rem;
                                    
                                    position: relative;
                                }

                                #icone-fechar-modal
                                {
                                    position: absolute;
                                    right: -9px;
                                    top: -11px;
                                    color: #525252;
                                    cursor: pointer;
                                    transition: all 0.5s ease;
                                }

                                #icone-fechar-modal:hover
                                {
                                    color: #green;
                                }

                                .modal-titulo-cadastro 
                                {
                                    font-family: Poppins, sans-serif;
                                    font-size: 15px;
                                    color: #000;
                                    font-weight: 500;
                                    display: flex;
                                    gap: 0.4rem;
                                }

                                p>i 
                                {
                                    font-size: 1.2rem;
                                    color: #1ea41e;
                                }

                                .modal-frase-cadastro
                                {
                                    font-family: Poppins, sans-serif;
                                    font-size: 13px;
                                    color: #2e2e2e;
                                    font-weight: 400;
                                }
                                `;

                            document.head.appendChild(style);

                            document.addEventListener("DOMContentLoaded", function()
                            {
                                modal.style.right = "20px";
                            });

                            iconFechaModal.addEventListener("click", function()
                            {
                                modal.remove();
                            });

                            setTimeout(function()
                            {
                                modal.remove();
                            }, 8000);

                        </script>';
                }
            }

        ?>



        <!-- AVISO TROCA DE SENHA FEITA COM SUCESSO -->
        <?php
        
            if(isset($_GET['trocar-senha']))
            {
                if($_GET['trocar-senha'] === 'sucesso')
                {
                    echo ' <script>
                            // cria o elemento HTML do modal
                            const modal = document.createElement("div");
                            modal.id = "modal";
                            modal.innerHTML = `
                                <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"
                                integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A=="
                                crossorigin="anonymous" referrerpolicy="no-referrer" />
                                <div id="modal-content">
                                    <i id="icone-fechar-modal" class="fa-solid fa-xmark"></i>
                                    <p class="modal-titulo-cadastro">Troca de senha realizada com sucesso!<i class="fa-sharp fa-solid fa-circle-check"></i></p>
                                    <p class="modal-frase-cadastro"> Agora é só fazer login com sua nova senha. </p>
                                </div>
                                `;

                            // adiciona o modal como filho do body (ou de outro elemento HTML)
                            document.body.appendChild(modal);

                            //adiciona a tag style do modal
                            const style = document.createElement("style");
                            const iconFechaModal = document.querySelector("#icone-fechar-modal");

                            style.innerHTML = `
                                #modal 
                                {
                                    position: fixed;
                                    bottom: 20px;
                                    right: -600px;
                                    z-index: 9999;
                                    transition: all 1s ease;
                                    border: #4567a5 solid 1px;
                                    border-radius: 0.5rem;
                                    background-color: #fff;
                                    padding: 1.3rem;
                                    width: 24rem;
                                }

                                #modal-content 
                                {
                                    display: flex;
                                    flex-direction: column;
                                    gap: 0.4rem;
                                    
                                    position: relative;
                                }

                                #icone-fechar-modal
                                {
                                    position: absolute;
                                    right: -9px;
                                    top: -11px;
                                    color: #525252;
                                    cursor: pointer;
                                    transition: all 0.5s ease;
                                }

                                #icone-fechar-modal:hover
                                {
                                    color: #green;
                                }

                                .modal-titulo-cadastro 
                                {
                                    font-family: Poppins, sans-serif;
                                    font-size: 15px;
                                    color: #000;
                                    font-weight: 500;
                                    display: flex;
                                    gap: 0.4rem;
                                }

                                p>i 
                                {
                                    font-size: 1.2rem;
                                    color: #1ea41e;
                                }

                                .modal-frase-cadastro
                                {
                                    font-family: Poppins, sans-serif;
                                    font-size: 13px;
                                    color: #2e2e2e;
                                    font-weight: 400;
                                }
                                `;

                            document.head.appendChild(style);

                            document.addEventListener("DOMContentLoaded", function()
                            {
                                modal.style.right = "20px";
                            });

                            iconFechaModal.addEventListener("click", function()
                            {
                                modal.remove();
                            });

                            // setTimeout(function()
                            // {
                            //     modal.remove();
                            // }, 8000);

                        </script>';
                }
            }

        ?>




       

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
                        <div class="btn-confirmed"><button id="verifica-email" type="button"> ENVIAR </button></div>
                    </form>
                    <div class="box-btn-fechar">
                        <a class="btn-fechar" href="#"> Voltar para o login </a>
                    </div>
                    
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

                    <div class="box-btn-fechar">
                        <a class="btn-fechar" href="#"> Voltar para o login </a>
                    </div>
                </div>
            </div>
        </div>









   
        <!-- MODAL TROCA DE SENHA FEITA COM SUCESSO -->
        <!-- <div id="modal" class="modal">
            <div class="modal-form" id="modal-form">
                <div class="modal-sessao-2">
                    <h2 class="modal-titulo" id="modal-titulo"> Troca de senha feita com sucesso </h2>
                    <p id="modal-frase"> A troca de senha foi feita com sucesso! Agora você já pode acessar sua conta com a nova senha </p>
                    <div class="btn-confirmed" id="btn-confirmed"><button class="btn-fechar" id="btn-fechar"> FECHAR </button></div>
                </div>       
            </div>
        </div> -->


            <!-- opopo -->




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
                            <?php

                            if( isset($_GET['status'])){

                                if( isset($_GET['status']) && $_GET['status'] == 'erro1'){
                                    echo '<div class="alerta-erro">Cpf ou senha incorreta!</div>';
                                }
                                if( isset($_GET['status']) && $_GET['status'] == 'erro2'){
                                    echo '<div class="alerta-erro">Cnpj ou senha incorreta!</div>';
                                }
                                if (isset($_GET['status']) && $_GET['status'] == 'erro3'){
                                    echo '<div class="alerta-erro">Cpf ou Cnpj incorretos!</div>';
                                }
                            }
                                   
                            ?>
                            <a class="link-esqueceu-senha" href="#"> Esqueceu a senha? </a>
                        </div>
                       
                    </div>
                    <div class="continue-button">
                        <button name="btn" class="botao-enviar" type="submit">Entrar</button>   
                    </div>
                </form>

                <a href="opcao-cadastro.php"><button class="botao-cadastrar">Cadastre-se</button></a>
                <a class="voltar" href="index.php">Voltar para o início</a>

                <div class="box-img-logo-conecta">
                    <img src="img/logo-conecta-variante.png" alt="">
                </div>
            </div>
        </div>




        <script src="js/mascaraLoginUsuario.js"></script>
        <script type="module" src="imports/envia-email-login.js"></script>
    </body>

</html>