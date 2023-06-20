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
    <link rel="stylesheet" href="css/estilo-tabela-voluntarios-confirmados.css">
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



      <!-- MODAL AVALIAÇÃO -->
      <?php
        
        if(isset($_GET['avaliacao']))
        {
            if($_GET['avaliacao'] === 'sucesso')
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
                                <p class="modal-titulo-cadastro"> Avaliação realizada com sucesso!<i class="fa-sharp fa-solid fa-circle-check"></i></p>
                                <p class="modal-frase-cadastro"> Você acabou de avaliar um Voluntário, sua avaliação contará muita para nossa plataforma. </p>
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
                <h2 class="titulo-voluntarios"> Voluntários Confirmados </h2>
                <p class="frase-voluntarios">
                    Esta lista mostra todos os voluntários que já estão confirmados a alguma de suas vagas.
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
                                <th> Avaliar </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            require_once 'global.php';

                            try {
                                
                                $idInstituicaoLogada = $_SESSION['codUsuario'];
                                $codServico = $_POST['codCategoriaServico']; // Obter o código da vaga do botão clicado
                                $listaVoluntario = CandidaturaDao::listarVoluntariosAceitos($idInstituicaoLogada, $codServico); // Passar o código da vaga para a consulta
                            } catch (Exception $e) {
                                echo $e->getMessage();
                            }
                            ?>

                            <?php foreach ($listaVoluntario as $voluntario) { 
                                $t = 'Voluntario';
                                $c = $voluntario['codVoluntario'];
                                ?>
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
                                        <td><?php echo $voluntario['idade']?> anos </td>
                                        <td><?php echo $voluntario['cidadeVoluntario']; ?></td>
                                        <td><?php echo $voluntario['estadoVoluntario']; ?></td>
                                        <td><?php echo $voluntario['nomeservico']; ?></td>     
                                        <td>
                                            <form action="" method="post">   
                                                <!-- <input type="hidden" name="codCategoriaServico" value="<?//php echo $codCategoriaServico?>">  -->
                                                <button type="submit" id="btnModalAvaliar" name="btnModalAvaliar" class="table-btn-avaliar" value="<?php echo $c; ?>" ><i id="tabela-icone-avaliacao" class="fa-solid fa-star"></i></button>
                                                <!-- onclick="abrirModal('modalAvaliar')" -->
                                            </form>
                                        </td>
                                    </tr>

                            <?php } ?>
                        </tbody>
                    </table>

                </div>
            </div>

            <a class="link-voltar-anterior" href="tabela-vagas-preenchidas-instituicao.php"> Voltar para a página anterior. </a>
        </div>



        <!-- MODAL AVALIAÇÂO -->
        <div id="modalAvaliar" class="modal">
            <div class="form" id="form">

                <div class="modal-sessao-1">
                    <i id="icone-fechar-modal" class="fa-solid fa-xmark"></i>
                    <h2 class="modal-titulo" id="modal-titulo"> Avaliação </h2>
                    <p class="modal-frase">Aqui você poderá avaliar o voluntário.</p>

                    <form class="form-modal" action="" method="POST" id="form-modal">
                        <div class="modal-input-box">
                            <div class="rating">
                                <input type="radio" id="star1" name="estrela" value="5">
                                <label for="star1"><i class="fa-solid fa-star"></i></label>
                                <input type="radio" id="star2" name="estrela" value="4">
                                <label for="star2"><i class="fa-solid fa-star"></i></label>
                                <input type="radio" id="star3" name="estrela" value="3">
                                <label for="star3"><i class="fa-solid fa-star"></i></label>
                                <input type="radio" id="star4" name="estrela" value="2">
                                <label for="star4"><i class="fa-solid fa-star"></i></label>
                                <input type="radio" id="star5" name="estrela" value="1">
                                <label for="star5"><i class="fa-solid fa-star"></i></label>
                            </div>
                        </div>
                        <?php

                        $valorBotao = $c;
                        ?>
                        
                        <!-- <input type="hidden" name="codCategoriaServico" value="<?//php echo $codCategoriaServico?>"> -->
                        <div class="btn-confirmed" id="btn-confirmed"><button name="btnAvaliar" class="modal-btn-confirmar" type="submit" value="<?php echo $valorBotao; ?>">Avaliar</button></div>

                    </form>

                    <?php
                        require_once 'global.php';

                        if(isset($_POST['estrela'])){
                            $numavaliacao = $_POST['estrela'];
                            $codVoluntario = $_POST['btnAvaliar'];
                            try { 
                                $avaliacao = AvaliarDao::avaliarVoluntario($codVoluntario, $numavaliacao);
                                echo "<script>window.location.href = 'tabela-voluntarios-confirmados.php?avaliacao=sucesso';</script>";
                            } catch (Exception $e) {
                                echo $e->getMessage();
                            }

                        }
                    ?>
                    <!-- <a onclick="fecharModal('modalAvaliar')" class="voltar-anterior" id="voltarA" href=""> Voltar para a página anterior </a> -->
                </div>

                 <div class="modal-sessao-2">
                    <h2 class="modal-titulo" id="modal-titulo"> Verificação concluída </h2>
                    <p class="modal-frase"> A verificação foi feita com sucesso! Agora você já pode alterar sua senha. </p>
                    <div class="btn-confirmed" id="btn-confirmed"><button onclick="fecharModal('modalAvaliar')" class="modal-btn-confirmar" id="fecharModal"> FECHAR </button></div>
                </div>
            </div>
        </div>
    </main>



    <script type="module" src="../imports/side-bar.js"></script>
    <script type="module" src="../../imports/nav-drop-down.js"></script>
    <script type="module" src="../../imports/nav-drop-down-notificacao.js"></script>
    <script src="js/avaliacao.js"></script>
</body>

</html>