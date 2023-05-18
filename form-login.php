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



        <?php
        
            if(isset($_GET['cadastro']))
            {
                if($_GET['cadastro'] === 'sucesso')
                {
                    //echo "<script>alert('Cadastro feito com sucesso. Agora é só acessar sua conta fazendo o login!');</script>";
                    echo ' <script>
                        document.addEventListener("DOMContentLoaded", function() {
                        // cria o elemento HTML do modal
                        const modal = document.createElement("div");
                        modal.id = "modal";
                        modal.innerHTML = `
                            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"
                            integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A=="
                            crossorigin="anonymous" referrerpolicy="no-referrer" />
                            <div id="modal-content">
                                <p>Cadastro realizado com sucesso!<i class="fa-sharp fa-solid fa-circle-check"></i></p>
                            </div>
                            `;
                
                        // adiciona o modal como filho do body (ou de outro elemento HTML)
                        document.body.appendChild(modal);
                
                        //adiciona a tag style do modal
                        const style = document.createElement("style");
                        style.innerHTML = `
                        #modal {
                        position: fixed;
                        bottom: 20px;
                        right: 20px;
                        box-shadow: #b4d8e6 3px 3px 4px 1px;
                        z-index: 9999;
                        transition: visibility 0s, opacity 0.5s ease;
                        border: #4567a5 solid 1px;
                        visibility: hidden;
                        opacity: 0;
                        border-radius: 0.5rem;
                        }
                
                        #modal-content {
                        padding: 10px;
                        }
                    
                        #modal.show {
                        visibility: visible;
                        opacity: 1;
                        }
                    
                        p {
                        font-family: Poppins, sans-serif;
                        font-size: 15px;
                        display: flex;
                        align-items: center;
                        justify-content: center;
                        gap: 5px;
                        }
                    
                        p>i {
                        font-size: 1.3rem;
                        color: green;
                        }
                        `;
                    
                        document.head.appendChild(style);
                    });
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
        <div id="modal" class="modal">
            <div class="modal-form" id="modal-form">
                <div class="modal-sessao-2">
                    <h2 class="modal-titulo" id="modal-titulo"> Troca de senha feita com sucesso </h2>
                    <p id="modal-frase"> A troca de senha foi feita com sucesso! Agora você já pode acessar sua conta com a nova senha </p>
                    <div class="btn-confirmed" id="btn-confirmed"><button class="btn-fechar" id="btn-fechar"> FECHAR </button></div>
                </div>       
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
            </div>
        </div>




        <script src="js/mascaraLoginUsuario.js"></script>
        <script type="module" src="js/main.js"></script>
        <script type="module" src="imports/envia-email-login.js"></script>
    </body>

</html>