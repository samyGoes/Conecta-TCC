<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href=".//css/estilo-index.css">
    <link rel="stylesheet" href=".//css/estilo-navbar-rodape.css">
    <link rel="stylesheet" href=".//css/estilo-teste.css">
    <link rel="stylesheet" href=".//css/estilo-contato.css">
    <title>Document</title>
</head>

<body>
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
                <li> <i class="fa-solid fa-house" id="topicos-icon-fixo"></i> <a href="index.php" class="cabecalho-menu-item">Início</a></li>
                <li> <i class="fa-solid fa-person" id="topicos-icon-fixo"></i> <a href="voluntarios/voluntarios.php" class="cabecalho-menu-item">voluntários</a></li>
                <li> <i class="fa-sharp fa-solid fa-heart" id="topicos-icon-fixo"></i> <a href="instituicoes/instituicoes.php" class="cabecalho-menu-item">instituições</a></li>
                <li> <i class="fa-solid fa-briefcase" id="topicos-icon-fixo"></i> <a href="vagas/vagas.php" class="cabecalho-menu-item">Vagas</a></li>
                <li> <i class="fa fa-file-text" aria-hidden="true" id="topicos-icon-fixo"></i> <a href="sobre-nos/sobre-nos.php" class="cabecalho-menu-item">sobre nós</a></li>
                <li> <i class="fa-solid fa-phone" id="topicos-icon-fixo"></i> <a href="contato/contato.php" class="cabecalho-menu-item">contato</a></li>
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
                                Olá, <?php echo $primeiroNome ?> <span id="nav-seta-sub-topicos"> 🢓 </span>
                            </p>
                        </div>

                        <ul class="sub-topicos">
                            <li> <a href="auth/redirecionamento-perfil-usuario.php"> Meu Perfil </a></li>
                            <li> <a href=""> Vagas </a> </li>
                            <li> <a href="auth/configuracao-perfil-usuario.php"> Configurações </a></li>
                            <li> <a href="auth/logout.php"> Sair </a></li>
                        </ul>
                    </li>
                <?php
                }
                ?>
            </ul>
        </ul>
    </nav>

    <!-- MAIN -->
    <main>
        <div class="titulo">
            <h1>Contato</h1>
            <h3>Envie uma mensagem a nós atraves deste formulário</h3>
        </div>
        <div class="formulario">
            <form action="" method="POST">
                <div class="input-box-1">

                    <label for="">Nome</label>
                    <input type="text" name="nome">

                    <label for="">Email</label>
                    <input type="text" name="email">

                </div>

                <div class="input-box-2">

                    <label for="">Idade</label>
                    <input type="text" name="idade">

                    <label for="">Estado</label>
                    <input type="text" name="estado">

                </div>

                <label for="">Mensagem</label>
                <textarea rows="10" cols="70"></textarea>

                <div class="btn-enviar">
                    <button type="submit">enviar</button>
                </div>

            </form>
        </div>

        <div class="info">
            <div class="text">
                <h3>Outras formas de contato</h3>
            </div>
            <div class="email-numero">
                <div class="grupo-1">
                    <h6>Email</h6>
                    <p>conectaFromAion@gmail.com</p>
                </div>
                <div class="grupo-2">
                    <h6>Telefone</h6>
                    <p>(11)00000-0000</p>
                </div>
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
                    <a href="sobre-nos/sobre-nos.php">
                        <h5>Sobre Nós</h5>
                    </a>
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


</body>

</html>