<?php
require_once 'global.php';
include "../auth/loginUsuario.php";
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../instituicoes/css/estilo.css" text-type="text/css">
    <link rel="stylesheet" href="../css/estilo-navbar-rodape.css">
    <!-- LINK ICONES -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title> Voluntários </title>
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
                <li> <i class="fa-solid fa-person" id="topicos-icon-fixo"></i> <a href="voluntarios.php" class="cabecalho-menu-item">voluntários</a></li>
                <li> <i class="fa-sharp fa-solid fa-heart" id="topicos-icon-fixo"></i> <a href="../instituicoes/instituicoes.php" class="cabecalho-menu-item">instituições</a></li>
                <li> <i class="fa-solid fa-briefcase" id="topicos-icon-fixo"></i> <a href="../vagas/vagas.php" class="cabecalho-menu-item">Vagas</a></li>
                <li> <i class="fa fa-file-text" aria-hidden="true" id="topicos-icon-fixo"></i> <a href="../sobre-nos/sobre-nos.php" class="cabecalho-menu-item">sobre nós</a></li>
                <li> <i class="fa-solid fa-phone" id="topicos-icon-fixo"></i> <a href="../contato.php" class="cabecalho-menu-item">contato</a></li>
            </ul>

            <ul class="topicos-sessao-login">
                <?php
                if (empty($_SESSION['nomeUsuario'])) {
                ?>
                    <li class="topicos-sessao-login-linha">
                        <a href="<?php echo '../form-login.php' ?>" class="cabecalho-menu-item" id="cabecalho-menu-item-login">
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
                                    $tipoPerfil = $_SESSION['tipoPerfil'];
                                    $id =  $_SESSION['codUsuario'];

                                    if($tipoPerfil === "Voluntario")
                                    {
                                        $notificacoes = VoluntarioDao::notificacoes($id);
                                    }
                                    else
                                    {
                                        $notificacoes = InstituicaoDao::notificacoes($id);
                                    }  
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


    <!-- PESQUISA -->
    <div class="pesquisa-instituicao">
        <form action="" id="form-pesquisa" method="post">
            <div class="box-input-pesquisa">
                <input type="text" name="pesquisar" id="pesquisar" placeholder="Pesquisar">
                <button type="submit" class="fa-solid fa-magnifying-glass" id="icon-lupa"></button>
            </div>
        </form>
    </div>



    <!-- CONTEUDO  -->
    <div class="container-titulo">
        <h1 class="titulo"> Voluntários </h1>
        <p class="frase">
            Aqui você verá os perfis de todas as instituições disponíveis. Você também pode
            filtrar para que encontre a instituição que deseja ou pesquisar pelo nome da instituição.
            Confira os filtros abaixo:
        </p>
    </div>





    <!-- FILTROS -->
    <form class="form-filtro" method="GET" action="voluntarios.php">
        <!-- CAUSAS -->
        <div class="box-filtro-causas">

            <div class="clique-fora">
                <div class="filtro-causas"> CAUSAS </div>
                <div class="box-causas">
                    <?php
                    require_once 'global.php';
                    try {
                        $listaCausas = CategoriaServicoDao::listar();
                    } catch (Exception $e) {
                        echo $e->getMessage();
                    }
                    ?>
                    <?php foreach ($listaCausas as $causas) { ?>
                        <div class="box-causas-checkbox">
                            <input class="checkbox-causas" type="checkbox" name="causas" id="causas">
                            <label for="causas"> <?php echo $causas['nomeCategoria']; ?> </label>
                        </div>

                    <?php
                    }
                    ?>
                </div>
            </div>
        </div>

        <!-- SELECT ESTADOS E CIDADES -->
        <select class="select-estados-i" name="estados" id="estados">
            <option selected disabled> Selecione o estado... </option>
        </select>

        <select class="select-cidade-i" name="cidades" id="cidades">
            <option selected disabled> Selecione a cidade... </option>
        </select>
    </form>








    <!-- LISTA DE VOLUNTÁRIOS CADASTRADAS -->
    <div id="resultado-lista-voluntario" class="lista-voluntario">
        <?php
        require_once 'global.php';

        $tipoPerfil = isset($_SESSION['tipoPerfil']) ? $_SESSION['tipoPerfil'] : '';
        $id = isset($_SESSION['codUsuario']) ? $_SESSION['codUsuario'] : '';
        
        try {
            // Verificar se os filtros foram enviados via método GET
            if (!empty($_GET['causas']) || !empty($_GET['estado']) || !empty($_GET['cidade'])) {
                // Recuperar os valores dos filtros do $_GET
                $causas = $_GET['causas'] ?? '';
                $estado = $_GET['estado'] ?? '';
                $cidade = $_GET['cidade'] ?? '';
        
                $listaVoluntario = VoluntarioDao::listarFiltro($causas, $estado, $cidade);
            } else {
                // Verificar se os filtros foram removidos
                if (isset($_GET['causas']) || isset($_GET['estado']) || isset($_GET['cidade'])) {
                    $listaVoluntario = VoluntarioDao::listarFiltro($causas, $estado, $cidade);
                } else if (empty($_SESSION['codUsuario'])) {
                    // Chamar o método listar() da DAO para obter a pesquisa padrão com todos os resultados
                    $listaVoluntario = VoluntarioDao::listarPadrao();
                } else if ($tipoPerfil === "Voluntario") {
                    $listaVoluntario = VoluntarioDao::listarPadrao();
                } else {
                    $listaVoluntario = VoluntarioDao::listarPrivados();
                }
            }
        } catch (Exception $e) {
            echo $e->getMessage();
        }
        
        ?>

        <?php
        foreach ($listaVoluntario as $voluntario) {
            $t = 'Voluntario';
            $c = $voluntario['codVoluntario'];
            try {
                $listarCausas = CausasVoluntarioDao::listarVoluntariosCausas($c);
            } catch (Exception $e) {
                echo $e->getMessage();
            }

        ?>
            <div class="lista-voluntario-linha">
                <a href="<?php echo '../auth/redirecionamento-perfil.php?c=' . $c . '&t=' . $t; ?>">
                    <div id="localizacao"><i class="fa-solid fa-location-dot"></i>
                        <p> <?php echo $voluntario['cidadeVoluntario'] . " -"; ?> <span class="estado-pais"> <?php echo $voluntario['estadoVoluntario'] . ", " . $voluntario['paisVoluntario']; ?> </span></p>
                    </div>

                    <div class="lista-item" id="lista-item-nome">

                        <div class="box-img"> <img src="../area-voluntario/<?php echo $voluntario['fotoVoluntario']; ?>"> </div>

                        <div class="lista-item-sessao-1">
                            <a href="">
                                <p class="nome"> <?php echo $voluntario['nomeVoluntario']; ?> </p>
                            </a>
                            <p class="email"> <?php echo $voluntario['emailVoluntario']; ?> </p>
                        </div>

                        <div class="lista-item-sessao-2">
                            <p class="descricao">
                                <?php echo $voluntario['descVoluntario']; ?>
                            </p>
                        </div>

                    </div>
                    <div class="lista-item-2">
                        <?php foreach ($listarCausas as $causas) { ?>
                            <a href=""><button id="tipo-causas-1"><?php echo $causas['nomeCategoria']; ?></button></a>
                        <?php
                        }
                        ?>
                    </div>
                </a>
            </div>
        <?php
        }
        ?>
    </div>





    <!-- RODAPÉ -->
    <footer>
        <div class="container-footer">
            <div class="footer-sessao" id="footer-sessao-1">
                <div class="footer-col" id="footer-col-adm">
                    <h5>Adm</h5>
                    <ul>
                        <a href="../form-login-adm.php">
                            <li>Login</li>
                        </a>
                    </ul>
                </div>
                <div class="footer-col">
                    <h5>Contato</h5>
                    <ul>
                        <li>Tel: (11)0000-0000</li>
                        <li>Email: conecta@gmail.com</li>
                    </ul>
                </div>
            </div>
            <div class="footer-sessao" id="footer-sessao-2">
                <div class="footer-col" id="footer-col-causas">
                    <h5>Causas em Destaque</h5>
                    <ul id="lista-causas">
                        <div class="col">
                            <li>- Fome</li>
                            <li>- Criaças</li>
                            <li>- Animais</li>
                        </div>
                        <div class="col" id="col-ultima">
                            <li>- Moradores de rua</li>
                            <li>- LGBTQIAP+</li>
                            <li>- Mulheres</li>
                        </div>

                    </ul>
                </div>
                <div class="footer-col" id="footer-col-sobre">
                    <h5>Sobre Nós</h5>
                    <ul>
                        <li>Nos conheca um pouco <br> mais.</li>
                    </ul>
                </div>
            </div>

        </div>
        <div class="midias-sociais">
            <div class="box-icon">
                <i class="fa-brands fa-youtube"></i>
            </div>
            <div class="box-icon">
                <i class="fa-brands fa-instagram"></i>
            </div>
            <div class="box-icon">
                <i class="fa-brands fa-twitter"></i>
            </div>
            <div class="box-icon-git">
                <i class="fa-brands fa-github" id="icon-git"></i>
            </div>
        </div>
    </footer>





    <!-- CRÉDITOS -->
    <!-- <a href="https://www.flaticon.com/free-icons/arrow" title="arrow icons">Arrow icons created by th studio - Flaticon</a> -->

    <!-- SCRIPTS -->
    <script src="js/script.js"></script>
    <script src="../js/filtro.js"></script>
    <script src="../voluntarios/js/cidade-estados.js"></script>
    <script type="module" src="../imports/nav-drop-down.js"></script>
    <script type="module" src="../imports/nav-drop-down-notificacao.js"></script>
</body>

</html>