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
    <link rel="stylesheet" href="css/estilo-cards-vagas-cadastradas-instituicao.css">
    <!-- LINK ICONES -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Document</title>
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
                <li class="topicos-sessao-login-linha"><a href="../form-login.php" class="cabecalho-menu-item" id="cabecalho-menu-item-login">
                        <i class="fa-solid fa-user" id="topicos-icon-fixo-dif"></i> login </a> <span id="nav-seta-sub-topicos"> 🢓 </span></i>
                    <ul class="sub-topicos">
                        <li> <a href="perfil-voluntario.php"> Meu Perfil </a></li>
                        <li> <a href=""> Vagas </a> </li>
                        <li> <a href="../editar-perfil-instituicao-atualizado.php"> Configurações </a></li>
                        <li> <a href="../../auth/logout.php"> Sair </a></li>
                    </ul>
                </li>
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
                <a href="../form-cadastrar-causas-instituicao.php"> <i class="fa-sharp fa-solid fa-heart"></i> <span class="nav-lateral-topico"> Cadastrar
                        Causas </span></a>
            </div>

            <div class="nav-lateral-box-icon">
                <a href="../form-cadastrar-habilidades-instituicao.php"> <i class="fa-solid fa-wrench"></i> <span class="nav-lateral-topico"> Cadastrar Habilidades
                    </span></a>
            </div>
            <div class="nav-lateral-box-icon">
                <a href="../form-cadastrar-vagas-instituicao.php"> <i class="fa-solid fa-newspaper"></i> <span class="nav-lateral-topico"> Cadastrar Vagas
                    </span></a>
            </div>

            <div class="nav-lateral-box-icon">
                <a href="../editar-excluir-vagas/editar-vagas-instituicao.php"> <i class="fa-solid fa-pen-to-square"></i> <span class="nav-lateral-topico"> Editar Vagas
                    </span></a>
            </div>

            <div class="nav-lateral-box-icon">
                <a href="../gerenciar-vagas/dashboard-instituicao.php"> <i class="fa-solid fa-gear"></i> <span class="nav-lateral-topico"> Gerenciar Vagas
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






    <!-- CONTEUDO  -->
    <main class="main-conteudo">

        <div class="main-conteudo-container-titulo">
            <h1>Editar Vagas</h1>
            <p>
                Aqui você verá todas as vagas que cadastrou. Selecione uma das vagas para visualizá-la, edita-la ou excluí-la.
            </p>
        </div>


        <!-- BOTÕES PARA TIPO DE VISUALIZAÇÃO -->
        <div class="container-botoes">     
            <div class="box-icon-tabela">
                <div class="box-info-t"></div>
                <a href="tabela-editar-vagas-instituicao.php"> <div class="fundo-icon" id="icon-table"> <div class="box-img-icon"> <img src="../../area-voluntario/img/tabela.png" alt=""></div> </div> </a>
            </div>  
                        
            <div class="box-icon">
                <div class="box-info"></div>
                <a href="cards-editar-vagas-instituicao.php"> <div class="fundo-icon" id="icon-card"> <div class="box-img-icon"> <img src="../../area-voluntario/img/card.png" alt=""></div> </div> </a>           
            </div>                 
        </div>




        <!-- CARDS -->
        <div class="container-cards">
            <div class="cards">
                <?php

                try {
                    $listaVaga = ServicoDao::listarVaga($_SESSION['codUsuario']);
                } catch (Exception $e) {
                    echo $e->getMessage();
                }
                ?>
                <?php
                foreach ($listaVaga as $vaga) {
                ?>
                    <div class="card-carrossel-dois">
                        <div class="content-it">
                            <div class="header-card-carrossel-it">
                                <i id="icon-maps-flip" style="display:none" class="fa-solid fa-location-dot fa-flip"></i>
                                <i id="icon-maps" class="fa-solid fa-location-dot"></i>
                                <p><?php echo $vaga['cidadeLocalServico']; ?></p>
                            </div>
                            <div class="fundo">
                                <div class="fundo-img">
                                    <img src="../<?php echo $vaga['fotoInstituicao']; ?>">
                                </div>
                                <div class="title-1">
                                    <p><?php echo $vaga['nomeInstituicao']; ?></p>
                                </div>
                            </div>
                            <div class="box-conteudo-card">
                                <div class="title-2">
                                    <p><?php echo $vaga['nomeservico']; ?></p>
                                </div>
                                <div class="title-3">
                                    <p><?php echo $vaga['descServico']; ?></p>
                                </div>
                                <form action="redirecionar-vaga-completa.php" method="post">
                                    <input type="hidden" name="id" value="<?php echo $vaga['codServico']; ?>">
                                    <button class="card-carrossel-botao" id="botao-it" type="submit">
                                        VER VAGA
                                    </button>
                                </form>
                            </div>
                            
                        </div>
                    </div>
                <?php
                }
                ?>

            </div>
        </div>
      
    </main>







    <!-- <script src="../area-voluntario/js/carrossel-vagas.js"></script> -->
    <script type="module" src="../js/main.js"></script>
    <script type="module" src="../js/box-info.js"></script>
</body>

</html>