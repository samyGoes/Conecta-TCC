<?php
    require_once 'global.php';
    require_once '../auth/verifica-logado.php';
?>
<!DOCTYPE html>
<html lang="pt-br">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- LINKS CSS -->
        <link rel="stylesheet" href="../area-instituicao/css/estilo-arquivo-modelo.css">
        <link rel="stylesheet" href="css/estilo-editar-perfil-voluntario.css">

        <!-- LINK ICONES -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"
            integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A=="
            crossorigin="anonymous" referrerpolicy="no-referrer" />
        <title> Configurações do Perfil     - Editar Perfil </title>
    </head>

    <body>

         <!-- BARRA DE NAVEGAÇÂO -->
         <nav class="cabecalho">
            <div class="logo">
                <img src="../img/logo-conecta.png">
            </div>

            <!-- BOTÃO PRA ESCONDER E APARECER OS TÓPICOS -->
            <input type="checkbox" id="check">
            <label for="check" class="checkbtn"> <i class="fas fa-bars"></i> </label>

            <!-- TÓPICOS -->
            <ul class="topicos-sessao-completa">
                <ul class="topicos">
                    <li> <i class="fa-solid fa-house" id="topicos-icon-fixo"></i> <a href="../index.php" class="cabecalho-menu-item">Início</a></li>
                    <li> <i class="fa-solid fa-person" id="topicos-icon-fixo"></i> <a href="../voluntarios/voluntarios.php" class="cabecalho-menu-item">voluntários</a></li>
                    <li> <i class="fa-sharp fa-solid fa-heart" id="topicos-icon-fixo"></i> <a href="../instituicoes/instituicoes.php" class="cabecalho-menu-item">instituições</a></li>
                    <li> <i class="fa-solid fa-briefcase" id="topicos-icon-fixo"></i> <a href="../vagas/vagas.php" class="cabecalho-menu-item">Vagas</a></li>
                    <li> <i class="fa fa-file-text" aria-hidden="true" id="topicos-icon-fixo"></i> <a href="../sobre-nos/sobre-nos.php" class="cabecalho-menu-item">sobre nós</a></li>
                    <li> <i class="fa-solid fa-phone" id="topicos-icon-fixo"></i> <a href="../contato/contato.php" class="cabecalho-menu-item">contato</a></li>
                </ul>

                <ul class="topicos-sessao-login">
                    <?php 
                        if (empty($_SESSION['nomeUsuario'])) 
                        {
                    ?>
                            <li class="topicos-sessao-login-linha">
                                <a href="<?php echo 'form-login.php' ?>" class="cabecalho-menu-item" id="cabecalho-menu-item-login">
                                    <i class="fa-solid fa-user" id="topicos-icon-fixo-dif"></i> login 
                                </a>
                            </li>
                    <?php 
                        } 
                        else 
                        { 
                            $nomeCompleto = $_SESSION['nomeUsuario'];
                            if($_SESSION['tipoPerfil']=='Voluntario')
                            {
                                $nomeArray = explode(" ", $nomeCompleto);
                                $primeiroNome = $nomeArray[0];
                            }
                            else
                            {
                                $nomeArray = explode(" ", $nomeCompleto);
                                $primeiroNome = $nomeArray[0]." ".$nomeArray[1];  
                            }                        
                    ?>
                            <li class="topicos-sessao-login-linha">
                                <div class="box-topicos-sessao-login-linha">
                                    <?php        

                                        require_once 'global.php';
                                        include 'diretorios-notificacao.php';
                                        try 
                                        {
                                            $idVoluntarioLogado = $_SESSION['codUsuario'];
                                            $notificacoes = VoluntarioDao::notificacoes($idVoluntarioLogado);
                                            //$novaNotificacao = InstituicaoDao::novaNotificacao($idInstituicaoLogada);
                                            //$diretorio = diretorios($linha['arquivo']);
                                            //print_r($links);
                                        } 
                                        catch (Exception $e) 
                                        {
                                            echo $e->getMessage();
                                        }

                                        if(empty($notificacoes)) 
                                        {
                                    ?>
                                                <div class="box-sininho">
                                                    <i id="nav-sininho-sub-topicos" class="fa-solid fa-bell"></i>
                                                </div>       
                                                <ul class="sub-topicos-sininho sem-resultado">
                                                    <li> 
                                                        <div class="sub-topicos-sininho-linha sem-resultado">
                                                            <p class="sub-topicos-sininho-linha-sem-resultado"> Sem notificações...</p>
                                                        </div>                                          
                                                    </li>
                                                </ul>
                                    <?php

                                        }
                                        else
                                        {
                                    ?>
                                            <div class="box-sininho">
                                                <div class="nova-notificacao-bolinha"></div>
                                                <i id="nav-sininho-sub-topicos" class="fa-solid fa-bell"></i>                                         
                                            </div>

                                            <ul class="sub-topicos-sininho">
                                    <?php
                                                foreach($notificacoes as $linha)
                                                {
                                                    $primeiraIteracao = true; 
                                                    foreach($linha as $titulo => $frase)
                                                    {
                                                        if($primeiraIteracao)
                                                        {                                     
                                                            $titulos = array_keys($linha); // Obter as chaves do array $linha
                                                            $primeiroTitulo = $titulos[0]; // Obter o primeiro título
                                                        
                                                            $frases = array_values($linha); // Obter os valores do array $linha
                                                            $primeiraFrase = $frases[0];
                                    ?>                                           
                                                            <li> 
                                                                <div class="sub-topicos-sininho-linha">
                                                                    <a class="sub-topicos-sininho-linha-titulo" href="<?php echo diretorios($linha['arquivo']) . $linha['arquivo'] ?>"> <?php echo $primeiroTitulo; ?> </a>
                                                                    <a class="sub-topicos-sininho-linha-frase" href="<?php echo diretorios($linha['arquivo']) . $linha['arquivo'] ?>"> <?php echo $primeiraFrase; ?> </a>
                                                                </div>                                          
                                                            </li>                     
                                    <?php
                                                            $primeiraIteracao = false;
                                                        }
                                                    }
                                                }
                                    ?>
                                            </ul>
                                    <?php
                                        }
                                    ?>
                                    <p class="cabecalho-menu-item" id="cabecalho-menu-item-usuario">
                                        Olá, <?php echo $primeiroNome ?> <span id="nav-seta-sub-topicos"> 🢓 </span>
                                    </p>
                                </div>
                                
                                <ul class="sub-topicos">
                                    <li> <a href="../auth/redirecionamento-perfil-usuario.php"> Meu Perfil </a></li>
                                    <li> <a href=""> Vagas </a> </li>
                                    <li> <a href="../auth/configuracao-perfil-usuario.php"> Configurações </a></li>
                                    <li> <a href="../auth/logout.php"> Sair </a></li>
                                </ul>
                            </li>
                    <?php 
                        } 
                    ?>
                </ul>
            </ul>
        </nav>




        <!-- TITULO CONFIGURAÇÕES DO PERFIL -->
        <div class="container-titulo-configuracoes">
            <h1> Configurações do Perfil </h1>
        </div>




      
        <!-- NAV LATERAL -->
        <nav class="nav-lateral">
            <div class="nav-lateral-sessao-um">
                <i class="fa-solid fa-bars" id="nav-lateral-icon-lista"></i>

                <div class="nav-lateral-box-icon">
                    <a href="form-editar-perfil-voluntario.php"> <i class="fa-solid fa-pen-to-square"></i> <span class="nav-lateral-topico"> Editar Perfil </span></a>
                </div>

                <div class="nav-lateral-box-icon">
                    <a href="form-adicionar-causas-voluntario.php"> <i class="fa-sharp fa-solid fa-heart"></i> <span class="nav-lateral-topico"> Adicionar Causas </span></a>
                </div>

                <div class="nav-lateral-box-icon">
                    <a href="tabela-vagas-voluntario.php"> <i class="fa-solid fa-briefcase"></i> <span class="nav-lateral-topico"> Vagas </span></a>
                </div>

                <div class="nav-lateral-box-icon">
                    <a href="form-trocar-senha-voluntario.php"> <i class="fa-solid fa-key"></i> <span class="nav-lateral-topico">Trocar Senha </span></a>
                </div>

                <div class="nav-lateral-box-icon">
                    <a href="form-excluir-conta-voluntario.php"> <i class="fa-solid fa-xmark" id="nav-lateral-icon-excluir"></i> <span class="nav-lateral-topico">Excluir Conta </span></a>
                </div>
            </div>

            <div class="nav-lateral-sessao-dois">
                <div class="nav-lateral-box-icon">
                    <a href="../auth/logout.php"> <i class="fa-solid fa-door-open" id="nav-lateral-icon-sair"></i> <span class="nav-lateral-topico"> Sair </span></a>
                </div>
            </div>    
        </nav>




        <!-- MODAL EDIÇÃO -->
        <?php
        
            if(isset($_GET['edicao']))
            {
                if($_GET['edicao'] === 'sucesso')
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
                                    <p class="modal-titulo-cadastro">Edição realizada com sucesso!<i class="fa-sharp fa-solid fa-circle-check"></i></p>
                                    <p class="modal-frase-cadastro"> Entre no seu perfil para ver como ficaram as alterações. </p>
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
                


        <!-- CONTEUDO  -->
        <main class="main-conteudo">
            <!-- COLOCAR TODO O CONTEÚDO DENTRO DESSA SESSÃO -->
            <!-- <div class="uau"></div> -->
            <div class="main-conteudo-container-titulo">
                <h1>EDITAR PERFIL</h1>
                <p>
                    Digite as novas informações que deseja inserir. Agora você também pode adicionar uma
                    descrição e uma foto de perfil.
                </p>
            </div>

            <div class="form">
                <form class="container" action="update-voluntario.php" method="post" enctype="multipart/form-data">
                    <div class="input-group">
                        <div class="input-box" id="input-nome-email">
                            <div id="input-nome">
                                <label for="">Nome</label>
                                <input type="text" name="nome" id="nome" placeholder="Digite seu nome"
                                    value="<?php echo $_SESSION['dadoPerfil']['nomeVoluntario'] ?>" />
                            </div>
                            <div id="input-email">
                                <label for="">Email</label>
                                <input type="email" name="email" id="email" placeholder="Digite seu email"
                                    value="<?php echo$_SESSION['dadoPerfil']['emailVoluntario'] ?>" />
                            </div>
                        </div>

                        <div class="input-box" id="input-telefones">
                            <div id="input-telefone">
                                <label for="">Telefone (Fixo)</label>
                                <input type="tel" name="telefone1" id="telefone" placeholder="(xx)xxxx-xxxx"
                                    value="<?php echo $_SESSION['dadoPerfil']['telefone1'] ?>" />
                            </div>
                            <div id="input-telefone-2">
                                <label for="">Telefone (Cel)</label>
                                <input type="tel" name="telefone2" id="telefone-2" placeholder="(xx)xxxxx-xxxx"
                                    value="<?php echo $_SESSION['dadoPerfil']['telefone2']; ?>" />
                            </div>
                        </div>

                        <div class="input-box" id="input-endereco">
                            <div id="input-cep">
                                <label for=" ">CEP</label>
                                <input type="text " name="cep" id="cep" placeholder="Digite seu CEP"
                                    value="<?php echo $_SESSION['dadoPerfil']['cepVoluntario'] ?>" />
                            </div>
                            <div id="input-num">
                                <label for="">Número</label>
                                <input type="text" name="numeroCasa" id="num" placeholder="Digite o n°"
                                    value="<?php echo $_SESSION['dadoPerfil']['numLogVoluntario'] ?>" />
                            </div>
                            <div id="input-log">
                                <label for="">Logradouro</label>
                                <input type="text" name="log" id="log"
                                    value="<?php echo $_SESSION['dadoPerfil']['logVoluntario'] ?>" />
                            </div>                        
                        </div>

                        <div class="input-box" id="input-endereco-cont">
                            <div id="input-bairro">
                                <label for=" ">Bairro</label>
                                <input type="text" name="bairro" id="bairro"
                                    value="<?php echo  $_SESSION['dadoPerfil']['bairroVoluntario'] ?>" />
                            </div>
                            <div id="input-cidade">
                                <label for="cidade">Cidade</label>
                                <input type="text" name="cidade" id="cidade" value="<?php echo $_SESSION['dadoPerfil']['cidadeVoluntario'] ?>">
                            </div>
                            <div id="input-estado">
                                <label for="uf">Estado</label>
                                <input type="text" name="uf" id="uf"  value="<?php echo $_SESSION['dadoPerfil']['estadoVoluntario'] ?>">
                            </div>
                        </div>

                        <div class="input-box" id="input-endereco-cont-2">
                            <div id="input-comp">
                                <label for=" ">Complemento</label>
                                <input type="text" name="complemento" id="comp" placeholder="Digite o complemento"
                                    value="<?php echo  $_SESSION['dadoPerfil']['compVoluntario'] ?>" />
                            </div>
                            <div id="input-pais">
                                <label for="">País</label>
                                <input type="text" name="pais" id="pais" placeholder="Digite seu pais"  value="<?php echo $_SESSION['dadoPerfil']['paisVoluntario'] ?>">
                            </div>
                            <div id="input-btn-foto">
                                <span>Foto</span>
                                <label id="label" for="foto">Selecione uma foto</label>
                                <input type="file" accept="image/*" id="foto" name="foto">
                            </div>
                        </div>

                        <div class="input-box" id="input-foto-desc">
                            <div id="input-desc">
                                <label for="">Descrição</label>
                                <textarea name="desc" id="desc" cols="83" rows="10" placeholder="Digite sua descriçao"><?php echo  $_SESSION['dadoPerfil']['descVoluntario'] ?></textarea>
                            </div>
                            <div class="div-image">
                                <div class="image">
                                    <img src="<?php echo ($_SESSION['dadoPerfil']['fotoVoluntario']) ?>" id="img" alt="user-instituição">
                                </div>
                            </div>
                        </div>
                    </div>
                    <a href=""><div class="continue-button">
                        <button type="submit">SALVAR</button>
                    </a>
                    </div>
                </form>
            </div>


        </main>




        <!-- SCRIPTS  -->
            <!--Máscaras do formulário-->
            <script src="../js/mascarasForm.js"></script>
            <script>
                adicionarMascaraTelefone('#telefone');
                adicionarMascaraTelefone('#telefone-2');
                adicionarMascaraCep('#cep'); 

            </script>

        <script src="../area-voluntario/js/button-image.js"></script>
        <script src="../js/endereco-auto.js"></script>
        <script type="module" src="imports/side-bar.js"></script>
        <script type="module" src="../imports/nav-drop-down.js"></script>
        <script type="module" src="../imports/nav-drop-down-notificacao.js"></script> 
        
    </body>

</html>