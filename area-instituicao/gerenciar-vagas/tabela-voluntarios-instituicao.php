<?php

require_once 'global.php';
include "../../auth/verifica-logado.php";

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/estilo-arquivo-modelo.css">
    <link rel="stylesheet" href="css/estilo-tabela-voluntarios.css">
    <link rel="stylesheet" href="css/estilo-modal-avaliacao.css">
    <!-- LINK ICONES -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title> Configurações do Perfil - Voluntários Disponíveis</title>
</head>

<body class="body">

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
                <?php if (empty($_SESSION['nomeUsuario'])) { ?>
                    <li class="topicos-sessao-login-linha">
                        <a href="<?php echo 'form-login.php' ?>" class="cabecalho-menu-item" id="cabecalho-menu-item-login">
                            <i class="fa-solid fa-user" id="topicos-icon-fixo-dif"></i> login
                        </a>
                    </li>
                <?php } else {
                    $nomeCompleto = $_SESSION['nomeUsuario'];
                    if ($_SESSION['tipoPerfil'] == 'Voluntario') {
                        $nomeArray = explode(" ", $nomeCompleto);
                        $primeiroNome = $nomeArray[0];
                    } else {
                        $nomeArray = explode(" ", $nomeCompleto);
                        $primeiroNome = $nomeArray[0] . " " . $nomeArray[1];
                    }
                ?>
                    <li class="topicos-sessao-login-linha">
                        <div class="box-topicos-sessao-login-linha">
                            <?php

                            require_once 'global.php';
                            include 'diretorios-notificacao.php';
                            try {
                                $idInstituicaoLogada = $_SESSION['codUsuario'];
                                $notificacoes = InstituicaoDao::notificacoes($idInstituicaoLogada);
                                //$novaNotificacao = InstituicaoDao::novaNotificacao($idInstituicaoLogada);
                                //$diretorio = diretorios($linha['arquivo']);
                                //print_r($links);
                            } catch (Exception $e) {
                                echo $e->getMessage();
                            }

                            if (empty($notificacoes)) {
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

                            } else {
                            ?>
                                <div class="box-sininho">
                                    <div class="nova-notificacao-bolinha"></div>
                                    <i id="nav-sininho-sub-topicos" class="fa-solid fa-bell"></i>
                                </div>

                                <ul class="sub-topicos-sininho">
                                    <?php
                                    foreach ($notificacoes as $linha) {
                                        $primeiraIteracao = true;
                                        foreach ($linha as $titulo => $frase) {
                                            if ($primeiraIteracao) {
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


                            <p href="#" class="cabecalho-menu-item" id="cabecalho-menu-item-usuario">
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
                <?php } ?>
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
                <a href="../form-adicionar-fotos-instituicao.php"> <i class="fa-solid fa-camera"></i> <span class="nav-lateral-topico"> Adicionar Fotos
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
                <a href="tabela-voluntarios-instituicao.php"> <i class="fa-solid fa-gear"></i> <span class="nav-lateral-topico"> Gerenciar Vagas
                    </span></a>
            </div>

            <div class="nav-lateral-box-icon">
                <a href="../form-trocar-senha-instituicao.php"> <i class="fa-solid fa-key"></i> <span class="nav-lateral-topico">Trocar Senha </span></a>
            </div>

            <div class="nav-lateral-box-icon">
                <a href="../form-excluir-conta-instituicao.php"> <i class="fa-solid fa-xmark" id="nav-lateral-icon-excluir"></i> <span class="nav-lateral-topico">Excluir Conta </span></a>
            </div>
        </div>

        <div class="nav-lateral-sessao-dois">
            <div class="nav-lateral-box-icon">
                <a href="../auth/logout.php"> <i class="fa-solid fa-door-open" id="nav-lateral-icon-sair"></i> <span class="nav-lateral-topico"> Sair </span></a>
            </div>
        </div>
    </nav>







    <!-- MODAL CANDIDATURA ACEITA E RECUSADA -->
    <?php

    if (isset($_GET['candidatura'])) {
        if ($_GET['candidatura'] === 'true') {
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
                                <p class="modal-titulo-cadastro">Chamada realizada com sucesso!<i class="fa-sharp fa-solid fa-circle-check"></i></p>
                                <p class="modal-frase-cadastro"> Entre no menu <a href="tabela-vagas-preenchidas-instituicao.php" class="modal-frase-cadastro-link"> Vagas Preenchidas </a> para ver os voluntários chamados. </p>
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

                            .modal-frase-cadastro-link
                            {
                                color: #4567a5;
                                font-weight: 500;
                                transition: all 0.5s ease;
                            }

                            .modal-frase-cadastro-link:hover
                            {
                                color: #cf8a3f;
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
    if (isset($_GET['candidatura'])) {
        if ($_GET['candidatura'] === 'recusada') {
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
                                <p class="modal-titulo-cadastro">Recusa realizada com sucesso!<i class="fa-sharp fa-solid fa-circle-check"></i></p>
                                <p class="modal-frase-cadastro"> Entre no menu <a href="tabela-voluntarios-rejeitados-instituicao.php" class="modal-frase-cadastro-link"> Voluntários Recusados </a> para ver os voluntários que você recusou. Lá você também poderá retirar a recusa.</p>
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

                            .modal-frase-cadastro-link
                            {
                                color: #4567a5;
                                font-weight: 500;
                                transition: all 0.5s ease;
                            }

                            .modal-frase-cadastro-link:hover
                            {
                                color: #cf8a3f;
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
                        }, 10000);

                    </script>';
        }
    }
    ?>




    <!-- CONTEUDO  -->
    <main class="main-conteudo">

        <div class="main-conteudo-container-titulo">
            <h1> GERENCIAR VAGAS </h1>
            <p>
                Veja todas as informações necessárias para o gerenciamento de suas vagas e
                possíveis voluntários.
            </p>
        </div>

        <!-- COLOCAR TODO O CONTEÚDO DENTRO DESSA SESSÃO -->
        <div class="conteudo-completo">

            <div class="container-botoes">
                <a href="tabela-voluntarios-instituicao.php" class="btn-voluntarios"> <button> Voluntários Disponíveis </button></a>
                <a href="tabela-voluntarios-rejeitados-instituicao.php" class="btn-v-r"> <button> Voluntários Recusados </button></a>
                <a href="tabela-vagas-preenchidas-instituicao.php" class="btn-vagas"> <button> Vagas Preenchidas </button></a>
            </div>




            <!-- TÍTULO 1 -->
            <div class="container-titulo-1">
                <h2 class="titulo-voluntarios"> Voluntários Candidatos </h2>
                <p class="frase-voluntarios">
                    Esta é a lista de todos os voluntários que se candidataram a alguma vaga da sua
                    instituição. Para ver o perfil do mesmo clique na foto do voluntário. Você também
                    pode chamar este voluntário para a vaga correspondente ou rejeitá-lo.
                </p>
            </div>



            <!-- TABELA 1 -->
            <div class="table">
                <div class="table-responsive">
                    <div class="funcoes">
                        <div class="funcoes-sessao-1">
                            <i class="fa-solid fa-sliders"></i>
                        </div>
                        <div class="funcoes-sessao-2">
                            <form action="" method="post">
                                <input type="text" name="pesquisar" id="pesquisar" placeholder="Pesquisar">
                                <button onclick="pesquisa()" class="fa-solid fa-magnifying-glass" id="icon-lupa"></button>
                            </form>
                        </div>
                    </div>


                    <table>
                        <thead>
                            <tr>
                                <th> ID </th>
                                <th> Foto </th>
                                <th> Nome </th>
                                <th> Idade </th>
                                <th> Cidade </th>
                                <th> UF </th>
                                <th> Vaga </th>
                                <th>Chat</th>
                                <th></th>
                                <th> </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            require_once 'global.php';

                            try {

                                $idInstituicaoLogada = $_SESSION['codUsuario'];
                                $listaVoluntario = CandidaturaDao::listar($idInstituicaoLogada); // Passar o código da vaga para a consulta
                            } catch (Exception $e) {
                                echo $e->getMessage();
                            }
                            ?>

                            <?php foreach ($listaVoluntario as $voluntario) {
                                $t = 'Voluntario';
                                $c = $voluntario['codVoluntario'];
                            ?>
                                <form action="" method="post">
                                    <tr>
                                        <td><?php echo $voluntario['codCandidatura']; ?></td>
                                        <td>
                                            <a href="">
                                                <div class="box-img-lista">
                                                    <img src="../../area-voluntario/<?php echo $voluntario['fotoVoluntario']; ?>" alt="">
                                                </div>
                                            </a>
                                        </td>
                                        <td><?php echo $voluntario['nomeVoluntario']; ?></td>
                                        <td><?php echo $voluntario['idade'];?> anos</td>
                                        <td><?php echo $voluntario['cidadeVoluntario']; ?></td>
                                        <td><?php echo $voluntario['estadoVoluntario']; ?></td>
                                        <td><?php echo $voluntario['nomeservico']; ?></td>
                                        <td>
                                                <a href="<?php echo '../../auth/redirecionamento-chat-instituicao.php?c=' . $c . '&t=' . $t; ?>"> <i id="td-icone-chat" class="fa-solid fa-comment-dots"></i> </a>
                                        </td>
                                        <td><button name="btnChamar" type="submit" class="table-btn-chamar" value="<?php echo $voluntario['codCandidatura']; ?>">chamar</button></td>
                                        <td><button name="btnRecusar" type="submit" class="table-btn-recusar" value="<?php echo $voluntario['codCandidatura']; ?>">recusar</button></td>
                                    </tr>
                                </form>

                                <?php
                                if (isset($_POST['btnChamar']) && $_POST['btnChamar'] == $voluntario['codCandidatura']) {
                                    $codCandidatura = $_POST['btnChamar'];
                                    try {
                                        $statusCandidatura = CandidaturaDao::aceitarCandidatura($codCandidatura);
                                        echo "<script>window.location.href = 'tabela-voluntarios-instituicao.php?candidatura=true';</script>";
                                    } catch (Exception $e) {
                                        echo $e->getMessage();
                                    }
                                } elseif (isset($_POST['btnRecusar']) && $_POST['btnRecusar'] == $voluntario['codCandidatura']) {
                                    $codCandidatura = $_POST['btnRecusar'];
                                    try {
                                        $statusCandidatura = CandidaturaDao::recusarCandidatura($codCandidatura);
                                        echo "<script>window.location.href = 'tabela-voluntarios-instituicao.php?candidatura=recusada';</script>";
                                    } catch (Exception $e) {
                                        echo $e->getMessage();
                                    }
                                }
                                ?>
                            <?php } ?>
                        </tbody>
                    </table>


                </div>
            </div>







        <!-- 
             TÍTULO 2 
            <div class="container-titulo-1">
                <h2 class="titulo-voluntarios"> Voluntários Requisitados </h2>
                <p class="frase-voluntarios">
                    Esta é a lista de todos os voluntários que você requisitou a alguma vaga da sua
                    instituição. Para ver o perfil do mesmo clique na foto do voluntário. Você também
                    pode ver o status de confirmação do voluntário ou retirar a requisição se o status
                    ainda estiver como "pendente".
                </p>
            </div>



             TABELA 2 
            <div class="table">
                <div class="table-responsive">
                    <div class="funcoes">
                        <div class="funcoes-sessao-1">
                            <i class="fa-solid fa-sliders"></i>
                        </div>
                        <div class="funcoes-sessao-2">
                            <input type="text" name="" id="pesquisar" placeholder="Pesquisar">
                            <i class="fa-solid fa-magnifying-glass" id="icon-lupa"></i>
                        </div>
                    </div>
                    <table>
                        <thead>
                            <tr>
                                <th> ID </th>
                                <th> Foto </th>
                                <th> Nome </th>
                                <th> Idade </th>
                                <th> Cidade </th>
                                <th> UF </th>
                                <th> Vaga </th>
                                <th>Chat</th>
                                <th> Status </th>
                                <th> </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            // require_once 'global.php';
                            // try {
                            //     $listaVoluntario = VoluntarioDao::listar();
                            // } catch (Exception $e) {
                            //     echo $e->getMessage();
                            // }
                            ?>
                            <tr>
                                <?php //foreach ($listaVoluntario as $voluntario) { ?>
                                    <td> <?php //echo $voluntario['codVoluntario']; ?> </td>
                                    <td>
                                        <a href="">
                                            <div class="box-img-lista">
                                                <img src="img/user-cinza.png" alt="">
                                            </div>
                                        </a>
                                    </td>
                                    <td><?php //echo $voluntario['nomeVoluntario']; ?></td>
                                    <td> 18 anos</td>
                                    <td> <?php //echo $voluntario['cidadeVoluntario']; ?> </td>
                                    <td> <?php //echo $voluntario['estadoVoluntario']; ?> </td>
                                    <td> Professor </td>
                                    <td>
                                        <form action="" method="post">
                                            <input type="hidden" name="codCategoriaServico" value="<? //php echo $codCategoriaServico
                                                                                                        ?>"> 
                                            <a href="<?php //echo '../../auth/redirecionamento-chat-usuario.php?c=' . $c . '&t=' . $t; ?>"> <i id="td-icone-chat" class="fa-solid fa-comment-dots"></i> </a>
                                        </form>
                                    </td>
                                    <td>
                                        <div class="box-status">
                                            <div class="status-bolinha"></div>
                                            <p class="status"> Pendente </p>
                                        </div>
                                    </td>
                                    <td> <button class="table-btn-recusar"> retirar </button> </td>
                            </tr>
                        <?php
                               // }
                        ?>
                        </tbody>
                    </table>
                </div>
            </div> -->

        </div>

    </main>








    <script type="module" src="../imports/side-bar.js"></script>
    <script type="module" src="../../imports/nav-drop-down.js"></script>
    <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/2.2.3/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script type="text/javascript" src="../../js/pesquisa.js"></script>
    <script type="module" src="../../imports/nav-drop-down-notificacao.js"></script>
    <script>
        $(document).ready(function() {
            $('#form-pesquisa').submit(function(event) {
                event.preventDefault();

                var pesquisa = $('#pesquisar').val();

                $.ajax({
                    url: '../../dao/CandidaturaDao.php',
                    type: 'POST',
                    data: {
                        pesquisar: pesquisa
                    },
                    success: function(data) {
                        $('.lista-voluntario').html(data);
                    }
                });
            });
        });
    </script>
    <!-- <script src='js/envia-email-login.js'></script> -->

</body>

</html>