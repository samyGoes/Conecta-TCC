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
    <link rel="stylesheet" href="../css/estilo-navbar-rodape.css">
    <link rel="stylesheet" href="css/estilo.css">
    <!-- LINK ICONES -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title> Instituições </title>
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
                <li class="topicos-sessao-login-linha"><a href="../form-login.php" class="cabecalho-menu-item" id="cabecalho-menu-item-login">
                        <i class="fa-solid fa-user" id="topicos-icon-fixo-dif"></i> login </a> <span id="nav-seta-sub-topicos"> 🢓 </span></i>
                    <ul class="sub-topicos">
                        <li> <a href=""> Meu Perfil </a></li>
                        <li> <a href=""> Vagas </a> </li>
                        <li> <a href=""> Configurações </a></li>
                        <li> <a href="../auth/logout.php"> Sair </a></li>
                    </ul>
                </li>
            </ul>
        </ul>
    </nav>






    <!-- PESQUISA -->
    <div class="pesquisa-instituicao">
        <input type="text" placeholder="Pesquisar...">
    </div>



    <!-- CONTEUDO  -->
    <div class="container-titulo">
        <h1 class="titulo"> Vagas </h1>
        <p class="frase">
            Aqui você verá as vagas disponiveis no momento, selecione uma das vagas para visualizar todas as informações.
            Você também pode filtrar para que encontre a vaga ideal para você. Confira os filtros abaixo.
        </p>
    </div>




    <!-- FILTROS -->
    <form class="form-filtro" method="POST" action="">
        <!-- CAUSAS -->
        <div class="box-filtro-causas">
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
                        <input type="checkbox" name="causas" id="causas">
                        <label for="causas"> <?php echo $causas['nomeCategoria']; ?> </label>
                    </div>

                <?php
                }
                ?>
            </div>
        </div>

        <!-- HABILIDADES -->
        <div class="box-filtro-causas">
            <div class="filtro-habilidade"> HABILIDADES </div>
            <div class="box-habilidade">
                <?php
                try {
                    $listaHabilidade = HabilidadeServicoDao::listar();
                } catch (Exception $e) {
                    echo $e->getMessage();
                }
                ?>
                <?php foreach ($listaHabilidade as $habilidade) { ?>
                    <div class="box-habilidade-checkbox">
                        <input type="checkbox" name="habilidade[]" id="habilidade" value=<?php echo
                                                                                            $habilidade['codHabilidadeServico']; ?>>
                        <label for="habilidade">
                            <?php echo $habilidade['nomeHabilidadeServico']; ?>
                        </label>
                    </div>

                <?php
                }
                ?>
            </div>
        </div>

        <!-- SELECT ESTADOS E CIDADES -->
        <select class="select-estados" name="estados" id="estados">
            <option selected disabled> Selecione o estado... </option>
        </select>

        <select class="select-cidade" name="cidades" id="cidades">
            <option selected disabled> Selecione a cidade... </option>
        </select>
    </form>




    <div class="cards">
        <?php

        try {
            $listaVaga = ServicoDao::listarVagaAdm();
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
                            <img src="../area-instituicao/<?php echo $vaga['fotoInstituicao']; ?>">
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
                            <a href="#"><button class="card-carrossel-botao" id="botao-it">
                                    VER VAGA
                                </button></a>
                        </form>
                    </div>
                </div>
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
                        <a href="login-adm.php">
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
    <script src="./js/script.js"></script>
    <script src="../voluntarios/js/cidade-estados.js"></script>
    <script type="module" src="../js/main-2.js"></script>
</body>

</html>