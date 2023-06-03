<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="css/estilo-instituicoes-cadastradas.css">
    <link rel="stylesheet" href="css/arquivo-modelo.css">
    <title>ADM - Instituições</title>
</head>

<body>


    <!-- NAV LATERAL -->
    <nav class="nav-lateral">
        <div class="nav-lateral-sessao-um">
            <i class="fa-solid fa-bars" id="nav-lateral-icon-lista"></i>
            <div class="nav-lateral-box-icon">
                <a href="dashboard.php"> <i class="fa-solid fa-chart-line"></i> <span class="nav-lateral-topico"> Dashboard
                    </span></a>
            </div>

            <div class="nav-lateral-box-icon">
                <a href="instituicoes-cadastradas.php"> <i class="fa-solid fa-hand-holding-heart"></i> <span class="nav-lateral-topico"> Instituições
                    </span></a>
            </div>

            <div class="nav-lateral-box-icon">
                <a href="habilidades-cadastradas.php"> <i class="fa-solid fa-wrench"></i> <span class="nav-lateral-topico">
                        Habilidades </span></a>
            </div>

            <div class="nav-lateral-box-icon">
                <a href="causas-cadastradas.php"> <i class="fa-sharp fa-solid fa-heart"></i> <span class="nav-lateral-topico"> Causas
                    </span></a>
            </div>
            <div class="nav-lateral-box-icon">
                <a href="vagas-cadastradas.php"> <i class="fa-solid fa-briefcase"></i> <span class="nav-lateral-topico"> Vagas
                    </span></a>
            </div>

            <div class="nav-lateral-box-icon">
                <a href="voluntarios-cadastrados.php"> <i class="fa-solid fa-person"></i> <span class="nav-lateral-topico"> Voluntários
                    </span></a>
            </div>
        </div>

        <div class="nav-lateral-sessao-dois">
            <div class="nav-lateral-box-icon">
                <a href="logout.php"> <i class="fa-solid fa-door-open" id="nav-lateral-icon-sair"></i> <span class="nav-lateral-topico"> Sair </span></a>
            </div>
        </div>
    </nav>

    <!-- TITULO CONFIGURAÇÕES DO PERFIL -->
    <div class="container-titulo-configuracoes">
        <div class="box-img-logo-conecta">
            <img src="../img/logo-conecta-variante.png" alt="">
        </div>
        <!-- <h1> Configurações do Perfil </h1> -->
        <ul class="topicos-sessao-login">
            <li class="topicos-sessao-login-linha">
                <div class="box-topicos-sessao-login-linha">
                    <i id="nav-sininho-sub-topicos" class="fa-solid fa-bell"></i>

                    <?php
                    $notInstituicaoTitulo = array(
                        'Nova Candidatura',
                        'Nova Mensagem',
                        'Nova Avaliação',
                        'Nova Avaliação'
                    );

                    $notInstituicaoFrase = array(
                        'Um voluntário se candidatou a vaga de professor de inglês.',
                        'Você tem uma nova mensagem do voluntário João.',
                        'Um voluntário fez uma avaliação sua.',
                        'Um voluntário fez uma avaliação sua.'
                    );

                    ?>
                    <ul class="sub-topicos-sininho">
                        <?php
                        foreach ($notInstituicaoTitulo as $notificacoes => $notInstituicaoTitulo) {
                        ?>
                            <li>
                                <div class="sub-topicos-sininho-linha">
                                    <a class="sub-topicos-sininho-linha-titulo" href="#"> <?php echo ($notInstituicaoTitulo); ?> </a>
                                    <a class="sub-topicos-sininho-linha-frase" href="#"> <?php echo ($notInstituicaoFrase[$notificacoes]); ?> </a>
                                </div>
                            </li>
                        <?php
                        }
                        ?>
                    </ul>
                    <p class="cabecalho-menu-item" id="cabecalho-menu-item-usuario">
                        Olá, adm <span id="nav-seta-sub-topicos"> 🢓 </span>
                    </p>
                </div>

                <ul class="sub-topicos">
                    <li> <a href="../auth/redirecionamento-perfil-usuario.php"> Meu Perfil </a></li>
                    <li> <a href=""> Vagas </a> </li>
                    <li> <a href="../auth/configuracao-perfil-usuario.php"> Configurações </a></li>
                    <li> <a href="../auth/logout.php"> Sair </a></li>
                </ul>
            </li>
        </ul>
    </div>







    <!-- CONTEUDO  -->
    <main class="main-conteudo">
        <!-- COLOCAR TODO O CONTEÚDO DENTRO DESSA SESSÃO -->


        <div class="main-conteudo-container-titulo">
            <h1>INSTITUIÇÕES</h1>
            <p>Aqui você verá todas as instituições cadastradas no site. Você também pode filtrar ou pesquisar
                pela instituição que deseja. Também tem como opção bloquear alguma instituição caso ela esteja
                violando alguma das diretrizes.
            </p>
        </div>
        <div class="gerarPdf">
            <a href="geracaoPdf/gerar_pdf_Instituicoes.php"><button> <i class="fa-solid fa-file-pdf"></i>Gerar pdf </button></a>
        </div>

        <div class="table">
            <div class="table-responsive">
                <div class="funcoes">
                    <div class="funcoes-sessao-1">
                        <span>Selecionar todos</span>
                        <input type="checkbox" name="selecionar-todos" id="selecionar-todos">
                        <i class="fa-solid fa-circle-xmark" id="icone-x"></i>
                    </div>
                    <div class="funcoes-sessao-2">
                        <input type="text" name="" id="pesquisar" placeholder="Pesquisar">
                        <i class="fa-solid fa-magnifying-glass" id="icon-lupa"></i>
                    </div>
                </div>
                <table>
                    <thead>
                        <tr>
                            <th> </th>
                            <th> ID </th>
                            <th> Foto </th>
                            <th> Nome </th>
                            <th> Email </th>
                            <th> Cidade </th>
                            <th> UF</th>
                            <th> País </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        require_once 'global.php';
                        try {
                            $listaInstituicao = InstituicaoDao::listar();
                        } catch (Exception $e) {
                            echo $e->getMessage();
                        }
                        ?>
                        <tr>
                            <?php foreach ($listaInstituicao as $instituicao) { ?>
                                <td> <input type="checkbox" name="checkbox" id="checkbox"> </td>
                                <td> <?php echo $instituicao['codInstituicao']; ?> </td>
                                <td>
                                    <div class="box-img-lista">
                                        <img src="../area-instituicao/<?php echo $instituicao['fotoInstituicao']; ?>">
                                    </div>
                                </td>
                                <td><?php echo $instituicao['nomeInstituicao']; ?></td>
                                <td> <?php echo $instituicao['emailInstituicao']; ?> </td>
                                <td> <?php echo $instituicao['cidadeInstituicao']; ?> </td>
                                <td> <?php echo $instituicao['estadoInstituicao']; ?> </td>
                                <td> <?php echo $instituicao['paisInstituicao']; ?> </td>
                        </tr>
                    <?php
                            }
                    ?>
                    </tbody>
                </table>
            </div>
        </div>
    </main>

    <script src="js/script.js"></script>
    <script type="module" src="../area-instituicao/imports/side-bar.js"></script>                                
    <script type="module" src="../imports/nav-drop-down.js"></script>
    <script type="module" src="../imports/nav-drop-down-notificacao.js"></script>
</body>

</html>