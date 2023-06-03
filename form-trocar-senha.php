<!DOCTYPE html>
<html lang="pt-br">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/style-trocar-senha.css">
        <!-- <link rel="stylesheet" href="css/estilo-modal-confirmacao.css"> -->
        <link rel="stylesheet" href="css/estilo-modal-fechar.css">
        <title> Trocar Senha</title>
    </head>

    <body class="body">





        <!-- MODAL VERIFICAÇÃO FEITA COM SUCESSO -->
        <!-- <div id="modal" class="modal">
            <div class="modal-form" id="modal-form">
                <div class="modal-sessao-2">
                    <h2 class="modal-titulo" id="modal-titulo"> Verificação concluída </h2>
                    <p id="modal-frase"> A verificação foi feita com sucesso! Agora você já pode alterar sua senha. </p>
                    <div class="btn-confirmed" id="btn-confirmed"><button class="btn-fechar" id="btn-fechar"> FECHAR </button></div>
                </div>       
            </div>
        </div> -->


        <!-- AVISO TROCAR SENHA -->
        <?php
        
            if(isset($_GET['verificacao']))
            {
                if($_GET['verificacao'] === 'sucesso')
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
                                    <p class="modal-titulo-cadastro">Verificação realizada com sucesso!<i class="fa-sharp fa-solid fa-circle-check"></i></p>
                                    <p class="modal-frase-cadastro"> Agora é só trocar sua senha. </p>
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






        <!-- FORM TROCAR SENHA -->
        <div class="container">
            <div class="form-image">
                <img src="img/foto-trocar-senha.jpg" alt="">
            </div>
            <div class="form">
                <form action="update-senha.php" method="post" id="formularioLogin">
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
                            <label for="confSenha">Confirmar nova senha</label>
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




        <script type="module" src="js/main-3.js"></script>
    </body>

</html>