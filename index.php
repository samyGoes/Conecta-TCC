
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- LINKS CSS -->
    <link rel="stylesheet" href="css/estilo-index.css">
    <link rel="stylesheet" href="css/estilo-navbar-rodape.css">

    <!-- LINK ICONES -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"
        integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title> INÍCIO </title>
</head>

<body>

    <!-- BARRA DE NAVEGAÇÂO -->
    <header class="cabecalho-completo">
        <nav class="cabecalho">
            <div class="logo">
                <img src="img/logo-conecta.png">
            </div>

            <!-- BOTÃO PRA ESCONDER E APARECER OS TÓPICOS -->
            <input type="checkbox" id="check">
            <label for="check" class="checkbtn"> <i class="fas fa-bars"></i> </label>

            <!-- TÓPICOS -->
            <ul class="topicos-sessao-completa">
                <ul class="topicos">
                    <li> <i class="fa-solid fa-house" id="topicos-icon-fixo"></i> <a href="index.php"
                            class="cabecalho-menu-item">Início</a></li>
                    <li> <i class="fa-solid fa-person" id="topicos-icon-fixo"></i> <a href="voluntarios/voluntarios.php"
                            class="cabecalho-menu-item">voluntários</a></li>
                    <li> <i class="fa-sharp fa-solid fa-heart" id="topicos-icon-fixo"></i> <a
                            href="instituicoes/instituicoes.php" class="cabecalho-menu-item">instituições</a></li>
                    <li> <i class="fa-solid fa-briefcase" id="topicos-icon-fixo"></i> <a href="vagas/vagas.php"
                            class="cabecalho-menu-item">Vagas</a></li>
                    <li> <i class="fa fa-file-text" aria-hidden="true" id="topicos-icon-fixo"></i> <a
                            href="sobre-nos/sobre-nos.php" class="cabecalho-menu-item">sobre nós</a></li>
                    <li> <i class="fa-solid fa-phone" id="topicos-icon-fixo"></i> <a href="contato/contato.php"
                            class="cabecalho-menu-item">contato</a></li>
                </ul>

                <ul class="topicos-sessao-login">
                    <li class="topicos-sessao-login-linha"><a href="form-login.php" class="cabecalho-menu-item"
                            id="cabecalho-menu-item-login">
                            <i class="fa-solid fa-user" id="topicos-icon-fixo-dif"></i> login </a> <span
                            id="nav-seta-sub-topicos"> 🢓 </span></i>
                        <ul class="sub-topicos">
                            <li> <a href="<?php echo 'auth/redirecionamento-perfil.php?c=' . $c . '&t=' . $t; ?>"> Meu
                                    Perfil </a></li>
                            <li> <a href=""> Vagas </a> </li>
                            <li> <a href=""> Configurações </a></li>
                            <li> <a href="auth/logout.php"> Sair </a></li>
                        </ul>
                    </li>
                </ul>
            </ul>
        </nav>
        <div class="conteudo-cabecalho">
            <div class="conteudo-esquerda">

            </div>
            <div class="conteudo-direita">
                <div class="titulo-conteudo-direita">
                    <h1>O Trabalho Voluntário Aliado <br>as ONGs</h1>
                    <p>Conheça as Conecta, um portal para voluntários <br> e instituições, tendo como objetivo
                        incentivar o <br> trabalho voluntário, facilitar o acesso e informar <br> a população sobre um
                        assunto de extrema <br> importancia</p>
                </div>
                <div class="continuar-botao">
                    <a href="opcao-cadastro.php"><button id="">junte-se a nós</button></a>
                </div>
                <div class="conteudo-imagem">
                    <img src="img/mao-azul.png" alt="">
                </div>
            </div>
        </div>

    </header>




    <main class="conteudo-completo">
        <!-- TITULO DO PRIMEIRO CONTEUDO-->
        <div class="container-1">

            <div class="titulo-container-conteudo-1">
                <h1>Um pouco sobre o trabalho voluntário</h1>
            </div>
            <!-- CONTEUDO 1 -->
            <div class="card-conteudo-1">
                <!-- CARD -->
                <div class="conteudo-imagem-1">
                    <img src="img/mao-coracao.jpg" alt="">
                </div>

                <div class="conteudo-escrito-1">

                    <div class="titulo-conteudo-escrito">
                        <h1>O que é o trabalho voluntário?</h1>
                    </div>

                    <div class="texto-conteudo-escrito">
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quas omnis aperiam ab earum
                            molestiae
                            dolores quisquam sequi exercitationem, minus voluptas inventore ut alias quis doloribus
                            laboriosam et repellat itaque. Fugit. Lorem ipsum dolor sit amet consectetur adipisicing
                            elit.
                            Delectus, autem. In, vero! Ex, quod delectus animi excepturi adipisci iusto optio nemo
                            explicabo. Lorem ipsum dolor sit amet consectetur adipisicing elit. Atque ad quisquam, eos
                            ducimus magni odio aliquam ratione sit numquam inventore iure nisi recusandae molestiae ab
                            omnis suscipit error sunt accusantium?

                        </p>
                    </div>

                    <div class="botao-conteudo-escrito">
                        <a href="voluntarios/voluntarios.php"><button id="">voluntários</button></a>
                    </div>

                </div>
            </div>
        </div>

        <div class="container-2">

            <div class="titulo-container-conteudo-2">
                <h1>Um pouco sobre o Terceiro Setor</h1>
            </div>

            <div class="card-conteudo-2">
                <div class="conteudo-vazio"></div>

                <div class="conteudo-escrito-2">

                    <div class="titulo-conteudo-escrito-2">
                        <h1>O que é o Terceiro Setor?</h1>
                    </div>

                    <div class="texto-conteudo-escrito-2">
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quas omnis aperiam ab earum
                            molestiae
                            dolores quisquam sequi exercitationem, minus voluptas inventore ut alias quis doloribus
                            laboriosam et repellat itaque. Fugit. Lorem ipsum dolor sit amet consectetur adipisicing
                            elit.
                            Delectus, autem. In, vero! Ex, quod delectus animi excepturi adipisci iusto optio nem.
                        </p>
                    </div>

                    <div class="botao-conteudo-escrito-2">
                        <a href="instituicoes/instituicoes.php"><button id="">instituições</button></a>
                    </div>

                </div>
            </div>

        </div>
        <div class="container-3">

            <div class="titulo-container-conteudo-3">
                <h1>Por que ser um voluntário?</h1>
            </div>
            <div class="topicos-container-3">
                <div class="habilidade">
                    <div class="imagem-habilidade">
                        <img src="img/habilidade.png" alt="">
                    </div>
                    <div class="conteudo-escrito-habiliidade">
                        <p>Você ira aperfeiçoar suas habilidades</p>
                    </div>
                </div>

                <div class="experiencia">
                    <div class="imagem-experiencia">
                        <img src="img/experiencia.png" alt="">
                    </div>
                    <div class="conteudo-escrito-experiencias">
                        <p>Obtera experiencia dentro de alguma area de atuação</p>
                    </div>
                </div>

                <div class="curriculo">
                    <div class="imagem-curriculo">
                        <img src="img/curriculo.png" alt="">
                    </div>
                    <div class="conteudo-escrito-curriculo">
                        <p>Poderá adicionar este componente em seu currículo</p>
                    </div>
                </div>
            </div>

        </div>

        <div class="container-4">
            <div class="titulo-container-4">
                <h1>Seja um Voluntário</h1>
                <p>Agora que você já sabe como funciona e da importância de ajudar, considere se candidatar a uma vaga.
                </p>
            </div>


            <!--CAROUSEL COM OS CARDS DE VAGAS-->
            <div class="container-carrossel-completo">
                <div class="container-carrossel">
                    <div class="carrossel">

                        <!-- SETAS -->
                        <div class="arrow-left control"> ◀ </div>
                        <div class="arrow-right control"> ▶ </div>

                        <div class="slider">
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
                                                <i id="icon-maps-flip" style="display:none"
                                                    class="fa-solid fa-location-dot fa-flip"></i>
                                                <i id="icon-maps" class="fa-solid fa-location-dot"></i>
                                                <p>
                                                    <?php echo $vaga['cidadeLocalServico']; ?>
                                                </p>
                                            </div>
                                            <div class="fundo">
                                                <div class="fundo-img">
                                                    <img src="<?php echo $vaga['fotoInstituicao']; ?>">
                                                </div>
                                                <div class="title-1">
                                                    <p>
                                                        <?php echo $vaga['nomeInstituicao']; ?>
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="box-conteudo-card">
                                                <div class="title-2">
                                                    <p>
                                                        <?php echo $vaga['nomeservico']; ?>
                                                    </p>
                                                </div>
                                                <div class="title-3">
                                                    <p>
                                                        <?php echo $vaga['descServico']; ?>
                                                    </p>
                                                </div>
                                                <form action="redirecionar-vaga-completa.php" method="post">
                                                    <input type="hidden" name="id"
                                                        value="<?php echo $vaga['codServico']; ?>">
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
                    </div>
                </div>
            </div>



            <div class="botao-vagas">
                <a href="vagas/vagas.php"> <button id="">mais vagas</button></a>
            </div>
        </div>

    </main>





    <!-- RODAPÉ -->
    <footer>
        <div class="container-footer">
            <div class="footer-sessao" id="footer-sessao-1">
                <div class="footer-col" id="footer-col-adm">
                    <h5>Adm</h5>
                    <ul>
                        <a href="form-login-adm.php">
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




    <script type="module" src="js/main-2.js"></script>
    <script src="js/carrossel-vagas.js"></script>
</body>

</html>