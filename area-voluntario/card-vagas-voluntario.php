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
    <link rel="stylesheet" href="../area-instituicao/css/estilo-arquivo-modelo.css">
    <link rel="stylesheet" href="css/estilo-card-vagas.css">
    <!-- LINK ICONES -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title> Configurações do Perfil - Vagas </title>
</head>

<body class="body">

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
                if (empty($_SESSION['nomeUsuario'])) {
                ?>
                    <li class="topicos-sessao-login-linha">
                        <a href="<?php echo 'form-login.php' ?>" class="cabecalho-menu-item" id="cabecalho-menu-item-login">
                            <i class="fa-solid fa-user" id="topicos-icon-fixo-dif"></i> login
                        </a>
                    </li>
                <?php
                } else {
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








    <!-- CONTEUDO  -->
    <main class="main-conteudo">

        <div class="main-conteudo-container-titulo">
            <h1> VAGAS </h1>
            <p>
                Aqui você verá as listas das vagas para as quais se candidatou e as vagas em que foi
                requisitado.
            </p>
        </div>

        <!-- COLOCAR TODO O CONTEÚDO DENTRO DESSA SESSÃO -->
        <div class="conteudo-completo">

            <!-- BOTÕES CARD E TABELA -->
            <div class="container-botoes">
                <div class="box-icon-tabela">
                    <div class="box-info-t"></div>
                    <a href="tabela-vagas-voluntario.php">
                        <div class="fundo-icon" id="icon-table">
                            <div class="box-img-icon"> <img src="img/tabela.png" alt=""></div>
                        </div>
                    </a>
                </div>

                <div class="box-icon">
                    <div class="box-info"></div>
                    <a href="card-vagas-voluntario.php">
                        <div class="fundo-icon" id="icon-card">
                            <div class="box-img-icon"> <img src="img/card.png" alt=""></div>
                        </div>
                    </a>
                </div>
            </div>



            <!-- TÍTULO 1 -->
            <div class="container-titulo-1 c">
                <h2 class="titulo-voluntarios"> Vagas em que se Candidatou </h2>
                <p class="frase-voluntarios">
                    Esta é a lista de todas as vagas que você se candidatou, você pode ver o status da vaga
                    ou retirar sua candidatura. Para ver a vaga completa clique no nome da vaga.
                </p>
            </div>



            <!-- PESQUISA -->
            <div class="pesquisa-instituicao">
                <i class="fa-solid fa-sliders"></i>
                <input type="text" placeholder="Pesquisar...">
            </div>



            <!-- CARDS 1 -->
            <div class="container-cards">
                <?php
                require_once 'global.php';
                $codVoluntario = $_SESSION['codUsuario'];

                try {
                    $listaVagasCandidatadas = CandidaturaDao::vagasCandidatadasVoluntario($codVoluntario);
                } catch (Exception $e) {
                    echo $e->getMessage();
                }

                ?>
                <?php
                
                foreach ($listaVagasCandidatadas as $vagaCandidatada) {
                    $codCandidatura = $vagaCandidatada['codCandidatura'];
                    $codServico = $vagaCandidatada['codServico'];
                    $status = $vagaCandidatada['statusCandidatura'];

                    $servico = ServicoDao::obterServicoPorCodigo($codServico);
                    $nomeVaga = $servico['nomeservico'];

                ?>
                    <form action="" method="post">
                        <div class="card">
                            <div class="box-status">
                                <?php
                                $bolinhaClass = '';
                                if ($status == 'pendente') {
                                    $bolinhaClass = 'status-bolinha-pendente';
                                } elseif ($status == 'aceito') {
                                    $bolinhaClass = 'status-bolinha-aceito';
                                } elseif ($status == 'recusado') {
                                    $bolinhaClass = 'status-bolinha-recusado';
                                }
                                ?>
                                <div class="status-bolinha <?php echo $bolinhaClass ?>"></div>
                                <?php
                                if ($status == 'pendente') {
                                    echo '<p class="status"> Pendente </p>';
                                } elseif ($status == 'aceito') {
                                    echo '<p class="status"> Aceito </p>';
                                } elseif ($status == 'recusado') {
                                    echo '<p class="status"> Recusado </p>';
                                }
                                ?>
                            </div>
                            <div class="card-conteudo">
                                <a href="">
                                    <p class="card-nome-vaga"> <?php echo $servico['nomeservico'];; ?> </p>
                                </a>
                            </div>
                            <button class="card-btn-rejeitar" name="btnRetirar" type="submit" value="<?php echo $codCandidatura; ?>"> retirar </button>

                        </div>
                    </form>
                    <?php
                }
                    ?>

            </div>
           
            <?php
            if (isset($_POST['btnRetirar']) && $_POST['btnRetirar'] == $codCandidatura) {
                $codCandidatura = $_POST['btnRetirar'];
                try {
                    $statusCandidatura = CandidaturaDao::retirarCandidatura($codCandidatura);
                    echo "<script>window.location.href = 'tabela-vagas-voluntario.php??';</script>";
                } catch (Exception $e) {
                    echo $e->getMessage();
                }
            }

            ?>

            


            <!-- 

             TÍTULO 2 
            <div class="container-titulo-1">
                <h2 class="titulo-voluntarios"> Vagas em que foi Requisitado </h2>
                <p class="frase-voluntarios">
                    Esta é a lista de todas as vagas que você foi requisitado, você pode aceitar a vaga
                    ou rejeitá-la. Para ver a vaga completa clique no nome da vaga.
                </p>
            </div>


             PESQUISA 
            <div class="pesquisa-instituicao">
                <i class="fa-solid fa-sliders"></i>
                <input type="text" placeholder="Pesquisar...">
            </div>




             CARD 2 
            <div class="container-cards">
                <?php

                // try {
                //     $listaVaga = ServicoDao::listarVaga($_SESSION['codUsuario']);
                // } catch (Exception $e) {
                //     echo $e->getMessage();
                // }
                ?>
                <?php
                //foreach ($listaVaga as $vaga) 
                //foreach ($vetor as $i) {
                ?>
                    <div class="card dois">
                        <div class="card-conteudo dois">
                            <a href="">
                                <p class="card-nome-vaga"> <?php //echo ($i); //echo $vaga['nomeservico']; 
                                                            ?> </p>
                            </a>
                        </div>
                        <div class="card-botoes">
                            <button class="card-btn-chamar"> aceitar </button>
                            <button class="card-btn-rejeitar r"> rejeitar </button>
                        </div>
                    </div>
                <?php
                //}
                ?>
            </div>
            -->
        </div>

    </main>








    <script type="module" src="imports/side-bar.js"></script>
    <script type="module" src="../imports/nav-drop-down.js"></script>
    <script type="module" src="imports/box-info.js"></script>
    <script type="module" src="../imports/nav-drop-down-notificacao.js"></script>
</body>

</html>