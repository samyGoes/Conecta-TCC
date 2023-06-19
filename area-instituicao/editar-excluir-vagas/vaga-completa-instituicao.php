<?php
     require_once 'global.php';  
     require_once '../../auth/verifica-logado.php';
?>
<!DOCTYPE html>
<html lang="pt-br">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- LINKS CSS -->
        <link rel="stylesheet" href="../css/estilo-arquivo-modelo.css">
        <link rel="stylesheet" href="css/estilo-vaga-completa.css">
        <link rel="stylesheet" href="css/estilo-modal-exclusao.css">

        <!-- LINK ICONES -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"
            integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A=="
            crossorigin="anonymous" referrerpolicy="no-referrer" />
        <title>VAGA - Editar vagas</title>
    </head>

    <body>

         <!-- BARRA DE NAVEGAÇÂO -->
         <nav class="cabecalho">
            <div class="logo">
                <img src="../../img/logo-conecta.png">
            </div>

            <!-- BOTÃO PRA ESCONDER E APARECER OS TÓPICOS -->
            <input type="checkbox" id="check">
            <label for="check" class="checkbtn"> <i class="fas fa-bars"></i> </label>

            <!-- TÓPICOS -->
            <ul class="topicos-sessao-completa">
                <ul class="topicos">
                    <li> <i class="fa-solid fa-house" id="topicos-icon-fixo"></i> <a href="../../index.php" class="cabecalho-menu-item">Início</a></li>
                    <li> <i class="fa-solid fa-person" id="topicos-icon-fixo"></i> <a href="../../voluntarios/voluntarios.php" class="cabecalho-menu-item">voluntários</a></li>
                    <li> <i class="fa-sharp fa-solid fa-heart" id="topicos-icon-fixo"></i> <a href="../../instituicoes/instituicoes.php" class="cabecalho-menu-item">instituições</a></li>
                    <li> <i class="fa-solid fa-briefcase" id="topicos-icon-fixo"></i> <a href="../../vagas/vagas.php" class="cabecalho-menu-item">Vagas</a></li>
                    <li> <i class="fa fa-file-text" aria-hidden="true" id="topicos-icon-fixo"></i> <a href="../../sobre-nos/sobre-nos.php" class="cabecalho-menu-item">sobre nós</a></li>
                    <li> <i class="fa-solid fa-phone" id="topicos-icon-fixo"></i> <a href="../../contato/contato.php" class="cabecalho-menu-item">contato</a></li>
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
                                            $idInstituicaoLogada = $_SESSION['codUsuario'];
                                            $notificacoes = InstituicaoDao::notificacoes($idInstituicaoLogada);
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
                                    <li> <a href="../../auth/redirecionamento-perfil-usuario.php"> Meu Perfil </a></li>
                                    <li> <a href=""> Vagas </a> </li>
                                    <li> <a href="../../auth/configuracao-perfil-usuario.php"> Configurações </a></li>
                                    <li> <a href="../../auth/logout.php"> Sair </a></li>
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
                    <a href="../form-editar-perfil-instituicao.php"> <i class="fa-solid fa-pen-to-square"></i> <span class="nav-lateral-topico"> Editar Perfil
                        </span></a>
                </div>

                <div class="nav-lateral-box-icon">
                    <a href="../form-adicionar-fotos-instituicao.php"> <i class="fa-solid fa-camera"></i> <span
                            class="nav-lateral-topico"> Adicionar Fotos
                        </span></a>
                </div>


                <div class="nav-lateral-box-icon">
                    <a href="../form-cadastrar-causas-instituicao.php"> <i class="fa-sharp fa-solid fa-heart"></i> <span class="nav-lateral-topico"> Solicitar
                            Causas </span></a>
                </div>

                <div class="nav-lateral-box-icon">
                    <a href="../form-cadastrar-habilidades-instituicao.php"> <i class="fa-solid fa-wrench"></i> <span class="nav-lateral-topico"> Solicitar Habilidades
                        </span></a>
                </div>

                <div class="nav-lateral-box-icon">
                    <a href="../editar-excluir-vagas/tabela-editar-vagas-instituicao.php"> <i class="fa-solid fa-briefcase"></i> <span class="nav-lateral-topico"> Vagas
                        </span></a>
                </div>

                <div class="nav-lateral-box-icon">
                    <a href="../gerenciar-vagas/tabela-voluntarios-instituicao.php"> <i class="fa-solid fa-gear"></i> <span class="nav-lateral-topico"> Gerenciar Vagas
                        </span></a>
                </div>

                <div class="nav-lateral-box-icon">
                    <a href="../form-trocar-senha-instituicao.php"> <i class="fa-solid fa-key"></i> <span class="nav-lateral-topico">Trocar Senha </span></a>
                </div>

                <div class="nav-lateral-box-icon">
                    <a href="../form-excluir-conta-instituicao.php"> <i class="fa-solid fa-xmark" id="nav-lateral-icon-excluir"></i> <span
                            class="nav-lateral-topico">Excluir Conta </span></a>
                </div>
            </div>

            <div class="nav-lateral-sessao-dois">
                <div class="nav-lateral-box-icon">
                    <a href="../auth/logout.php"> <i class="fa-solid fa-door-open" id="nav-lateral-icon-sair"></i> <span
                            class="nav-lateral-topico"> Sair </span></a>
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
                                <p class="modal-frase-cadastro"> Veja todas as informações editadas aqui. </p>
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
            
            <div class="main-conteudo-container-titulo">
                <h1>VAGA</h1>
                <p> 
                    Aqui está a sua vaga completa, veja todas as informações que desejar. Você também
                    pode editá-la ou excluí-la.
                </p>
            </div>         

            <!-- COLOCAR TODO O CONTEÚDO DENTRO DESSA SESSÃO -->

            <!-- CONTEUDO PRINCIPAL -->

            <!-- MODAL EXCLUIR VAGA -->
            <div id="container-modal" class="container-modal">
                <div class="modal-responsive" id="modal-responsive">
                    <div class="fade" id="fade">
                        <div class="modal" id="modal">
                            <label for="" class="modal-titulo" id="modal-titulo"> 
                                Deseja realmente excluir a vaga? Uma vez excluída você não poderá mais restaurá-la.
                            </label>
                            <div class="btn-exit" id="btn-exit">
                            <form action="delete-vaga-instituicao.php" method="post">
                                 <button type="submit" id="excluir">excluir</button>
                            </form>
                                <button type="submit" id="cancelar">cancelar</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="conteudo-completo">

                <div class="conteiner-botoes">
                <a href="form-editar-vagas-instituicao.php"><button class="conteiner-botao-editar">EDITAR</button></a> 
                    <button class="conteiner-botao-excluir">EXCLUIR</button>
                </div>         
        
                <div class="card-completo">
                    <!-- DADOS DA INSTITUIÇÃO -->
                    
                    <div class="titulos-card">
                        <h1><?php echo ($_SESSION['vaga']['nomeservico']); ?></h1> 
                        <h7><?php echo ($_SESSION['vaga']['nomeInstituicao']); ?></h7>
                                        
                        <div class="descricao-da-vaga">
                            <p><?php echo ($_SESSION['vaga']['descServico']); ?></p>
                        </div>
                    </div>
    
                    <div class="info-ende">
                        <div class="topico-informacoes">
                            <div class="titulo"><i class="fa-solid fa-circle-info"></i> <h6> Informações</h6></div>   
                            <div class="topico-informacoes-texto">

                                <div class="divisa-de-topicos-info">
                                    <p>Horário:<span><?php echo (" " . $_SESSION['vaga']['horarioServico']); ?></span></p>
                                    <p>Período:<span><?php echo (" " . $_SESSION['vaga']['periodoServico']); ?></span></p>
                                    <p>Tipo de vaga:<span><?php echo (" " . $_SESSION['vaga']['tipoServico']); ?></span></p>
                                </div>
                               
                                <div class="divisao-de-topicos-info">
                                    <p>Data de início:<span><?php echo (" " . $_SESSION['vaga']['dataInicioServico']); ?></span></p>
                                    <p>Habilidade:<span>
                                        <?php
                                            $habilidades = $_SESSION['habilidade']['nomeHabilidade'];
                                            $habilidades = array_unique(explode(",", $habilidades));
                                            echo implode(", ", $habilidades);
                                        ?>
                                    </span></p>
                                </div>       
                            </div>                 
         
                        </div>

                        <div class="topico-endereco">
                            <div class="titulo"><i class="fa-sharp fa-solid fa-location-dot"></i><h6> Endereço</h6></div>
                            <div class="topico-informacoes-texto">
                                <p><?php echo ($_SESSION['vaga']['logradouroLocalServico'] . " " . $_SESSION['vaga']['numeroLocalServico'] . ", " . $_SESSION['vaga']['bairroLocalServico'] . " - " . $_SESSION['vaga']['cidadeLocalServico'] . " " . $_SESSION['vaga']['estadoLocalServico'] . ", " . $_SESSION['vaga']['paisLocalServico']);
                                ?></p>
                            </div>
                        </div>         
                    </div>           
                    

                    <!-- CAUSAS -->
                    <div class="causas">
                        <div class="titulo">
                            <i class="fa-sharp fa-solid fa-heart"></i> <h6 >Causas ajudadas</h6>
                        </div>
                        <div class="tipo-causas">
                            <?php
                            if (!is_null($_SESSION['causa']['nomeCausa'])) 
                            {
                                $causas = $_SESSION['causa']['nomeCausa'];
                                $causas = array_unique(explode(",", $causas));
                              

                                foreach($causas as $causa)
                                { 
                                    ?>
                                    <a href=><button id=tipo-causas-1><?php echo $causa ?></button></a>
                                    <?php 
                                }
                            }
                            ?>
                        </div>
                    </div>

                    <!-- <div class="area-candidatar">
                        <p>Candidate-se a esta vaga para ajudar em nossa causa!</p>
                        <button>candidatar-se</button>
                    </div> -->
                </div>
            </div>

        </main>







        <!-- SCRIPTS -->
        <!-- <script src="js/modal-exclusao.js"></script> -->
        <script type="module" src="../imports/side-bar.js"></script>
        <script type="module" src="../../imports/nav-drop-down.js"></script>
        <script type="module" src="../../imports/nav-drop-down-notificacao.js"></script> 
        <script src="js/modal-exclusao.js"></script>
    </body>

</html>