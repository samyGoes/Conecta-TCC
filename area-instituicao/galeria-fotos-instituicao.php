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
    <link rel="stylesheet" href="./css/estilo-galeria-fotos.css">
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
        <input type="text" placeholder="Pesquisar...">
    </div>



    <!-- CONTEUDO  -->
    <div class="container-titulo">
        <h1 class="titulo"> Galeria de fotos <br> <p class="sub-titulo">ONG Raios de Sol</p> </h1>
        
        <p class="frase">
            Conheça mais sobre a instituição vendo todas as fotos que ela publicou em seu perfil
        </p>
    </div>

    <main>
        <div class="galeria">
            <div class="box-img">
                <img src="../area-instituicao/img/1.jpg" alt="">
            </div>
            <div class="box-img">
                <img src="../area-instituicao/img/1.jpg" alt="">
            </div>
            <div class="box-img">
                <img src="../area-instituicao/img/1.jpg" alt="">
            </div>
            <div class="box-img">
                <img src="../area-instituicao/img/1.jpg" alt="">
            </div>
            <div class="box-img">
                <img src="../area-instituicao/img/3.png" alt="">
            </div>
            <div class="box-img">
                <img src="../area-instituicao/img/1.jpg" alt="">
            </div>
        </div>

        <div class="voltar-perfil">
            <a href="">Voltar para o perfil</a>
        </div>
    </main>


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
    <script src="js/script.js"></script>
    <script type="module" src="../imports/nav-drop-down.js"></script>
    <script type="module" src="../imports/nav-drop-down-notificacao.js"></script>
</body>

</html>