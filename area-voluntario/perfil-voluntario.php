<?php

include('../model/Conexao.php');
require_once '../dao/global.php';

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- LINK CSS -->
    <link rel="stylesheet" href="../area-voluntario/css/style.css">
    <!-- LINK ICONES -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <title>PERFIL VOLUNTARIO</title>
</head>

<body>
    <!-- BARRA DE NAVEGAÇÂO -->
    <nav class="cabecalho">
        <div class="logo">
            <p>logo</p>
        </div>
        <!-- BOTÃO PRA ESCONDER E APARECER OS TÓPICOS -->
        <input type="checkbox" id="check">
        <label for="check" class="checkbtn">
            <i class="fas fa-bars"></i>
        </label>

        <ul class="topicos">
            <li> <a href="" class="cabecalho-menu-item">Início</a> </li>
            <li> <a href="" class="cabecalho-menu-item">voluntarios</a> </li>
            <li> <a href="" class="cabecalho-menu-item">instituições</a> </li>
            <li> <a href="" class="cabecalho-menu-item">Vagas</a> </li>
            <li> <a href="" class="cabecalho-menu-item">sobre nós</a> </li>
            <li> <a href="" class="cabecalho-menu-item">contato</a> </li>
            <li> <a href="" class="cabecalho-menu-item" id="cabecalho-menu-item-login"><i class="fa-solid fa-user"></i>login</a> </li>
        </ul>
    </nav>

    <!-- LINK NAVBAR RESPONSIVA OPEN SOURCE -->
    <!-- https://github.com/euronaldoreis/navbar-menu-responsive -->





    <!-- CONTEUDO PRINCIPAL -->
    <main>
        <div class="container">
            <h1 id="container-titulo">Perfil do Voluntário</h1>
            <p> Aqui você poderá ver todas as informações sobre o voluntário 2023.</p>
        </div>

        <section class="card-completo">

            <?php
            $conectar = Conexao::conectar();
            session_start();

            $info = $conectar->prepare("SELECT * FROM tbVoluntario");


            $info = $conectar->query("SELECT nomeVoluntario,dataNascVoluntario, emailVoluntario,numFoneVoluntario,
                                             cidadeVoluntario, estadoVoluntario, paisVoluntario FROM tbVoluntario
                                            INNER JOIN tbFoneVoluntario ON tbFoneVoluntario.codVoluntario = tbVoluntario.codVoluntario");

            $result = $info->fetch(PDO::FETCH_ASSOC); // um array que vai percorrer por todos os nomes//

            ?>

            <!-- DADOS DDO VOLUNTARIO -->
            <div class="card">
                <div class="titulo-card">
                    <div class="icon-titulo-card">
                        <i class="fa-solid fa-user"></i>
                        <h6> dados do voluntário </h6>
                    </div>
                    <div class="seta-ocultar"> 🢓 </div>
                </div>

                <div class="ocultar-sessao">
                    <div class="dados-pessoais-1">
                        <div class="img-user">
                            <img src="img/user2.png">
                        </div>
                        <div class="dados-pessoais-1-stars">
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                        </div>
                        <p>
                            <?php //verifica se o fetch retorna alguma linha com os dados da consulta// 
                            //$linha = mysqli_num_rows($result);
                            if ($result) {
                                $nomeVoluntario = $result['nomeVoluntario'];
                                $dataNascVoluntario = $result['dataNascVoluntario'];
                                $emailVoluntario = $result['emailVoluntario'];
                                $numFoneVoluntario = $result['numFoneVoluntario'];
                                $cidadeVoluntario = $result['cidadeVoluntario'];
                                $estadoVoluntario = $result['estadoVoluntario'];
                                $paisVoluntario = $result['paisVoluntario'];

                                echo ($nomeVoluntario);
                            } else {
                                echo "Instituição não encontrada.";
                            }
                            ?>
                        </p>
                    </div>

                    <div class="dados-pessoais-2">
                        <p class="dados">idade: <span><?php echo ($dataNascVoluntario); ?></span></p>
                        <p class="dados">email: <span><?php echo ($emailVoluntario); ?></span></p>
                        <p class="dados">telefone: <span><?php echo ($numFoneVoluntario); ?></span></p>
                        <p class="dados">Localidade: <span><?php echo ($cidadeVoluntario . " - " . $estadoVoluntario . ", " . $paisVoluntario); ?></span></p>
                    </div>
                </div>
            </div>


            <!-- DESCRIÇÃO -->
            <div class="descricao">
                <!-- <button id="mostrar-menos"style="width: 4rem; background-color:blueviolet"> aa</button> -->
                <div class="card">
                    <div class="titulo-card">
                        <div class="icon-titulo-card">
                            <i class="fa fa-file-text" aria-hidden="true"></i>
                            <h6>descrição</h6>
                        </div>
                        <div class="seta-ocultar-desc"> 🢓 </div>
                    </div>
                    <div class="ocultar-sessao-desc">
                        <div class="texto">
                            <p>Olá, meu nome é João, sou de Recife, Pernambuco. Sou estudante de Engenharia Elétrica e
                                trabalho part-time como programador. Minhas principais habilidades são programação, lógica
                                de programação, eletrônica, matemática, física e robótica. Adoro aventuras, fazer trilhas e
                                curtir a natureza. Além disso, sou bastante curioso, sempre querendo aprender coisas novas.
                                Gosto de ler sobre diversos assuntos e adoro ouvir música. Acredito que o conhecimento é
                                algo que nos leva cada vez mais longe, por isso sempre procuro me aprimorar.</p>
                        </div>
                    </div>
                </div>
            </div>


            <!-- CAUSAS -->
            <div class="causas">
                <div class="card">
                    <div class="titulo-card"> <!-- id="titulo-card-carrossel" -->
                        <div class="icon-titulo-card">
                            <i class="fa-sharp fa-solid fa-heart"></i>
                            <h6>Causas ajudadas</h6>
                        </div>
                        <div class="seta-ocultar-causa"> 🢓 </div>
                    </div>
                    <div class="ocultar-sessao-causa">
                        <div class="tipo-causas">
                            <a href=""><button id="tipo-causas-1">mulheres</button></a>
                            <a href=""><button id="tipo-causas-2">crianças</button></a>
                            <a href=""><button id="tipo-causas-3">idosos</button></a>
                            <a href=""><button id="tipo-causas-1">animais</button></a>
                        </div>
                    </div>
                </div>
            </div>



            <!-- SERVIÇOS PRESTADOS -->
            <div class="servicos-prestados">
                <div class="titulo-card">
                    <div class="icon-titulo-card">
                        <i class="fa-solid fa-briefcase"></i>
                        <h6>SERVIÇOS PRESTADOS </h6> <a>Clique para ver mais</a>
                    </div>
                    <div class="seta-ocultar-vaga"> 🢓 </div>
                </div>
                <div class="ocultar-sessao-vaga">
                    <div class="container-carrossel">
                        <div class="carrossel">

                            <!-- SETAS -->
                            <div class="arrow-left control"> ◀ </div>
                            <div class="arrow-right control"> ▶ </div>

                            <div class="slider">
                                <div class="cards">
                                    <?php
                                    for ($j = 1; $j <= 9; $j++) {
                                    ?>
                                        <div class="card-carrossel">
                                            <p class="titulo-card-carrossel"> Atendende </p>
                                            <div class="texto-card">
                                                <p> Duração: <span> 1 mês </span> </p>
                                                <p> Período: <span> A combinar </span> </p>
                                                <p> Cidade: <span> São Paulo </span> </p>
                                            </div>
                                            <a href="#"><button class="card-carrossel-botao">
                                                    VER
                                                </button></a>
                                        </div>
                                    <?php
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <!-- INSTITUIÇÕES TRABALHADAS -->
            <div class="instituicoes-trabalhadas">
                <div class="titulo-card" id="titulo-card-carrossel">
                    <div class="icon-titulo-card">
                        <i class="fa-solid fa-camera"></i>
                        <h6> INSTITUIÇÕES TRABALHADAS </h6>
                    </div>
                    <div class="seta-ocultar-foto"> 🢓 </div>
                </div>
                <div class="ocultar-sessao-foto">
                    <div class="container-carrossel">
                        <div class="carrossel">

                            <!-- SETAS -->
                            <div class="arrow-left-dois control-dois" id="seta-it"> ◀ </div>
                            <div class="arrow-right-dois control-dois" id="seta-it"> ▶ </div>

                            <div class="slider">
                                <div class="cards">
                                    <?php
                                    for ($i = 1; $i <= 9; $i++) {
                                    ?>
                                        <div class="card-carrossel-dois">
                                            <div class="content-it">
                                                <div class="header-card-carrossel-it">
                                                    <i id="icon-maps-flip" style="display:none" class="fa-solid fa-location-dot fa-flip"></i>
                                                    <i id="icon-maps" class="fa-solid fa-location-dot"></i>
                                                    <p> São Paulo </p>
                                                </div>
                                                <div class="fundo">
                                                    <div class="fundo-img">
                                                        <img src="img/user2.png">
                                                    </div>
                                                </div>
                                                <div class="title-2">
                                                    <p> ONG abraço </p>
                                                </div>
                                                <a href="#"><button class="card-carrossel-botao" id="botao-it">
                                                        VER
                                                    </button></a>
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
            </div>

            <!-- REQUISITAR VOLUNTÁRIO  -->
            <div class="requisitar">
                <p> Agora que você já viu o perfil do voluntário considere requisitá-lo a uma de suas vagas.</p>
                <button> REQUISITAR </button>
            </div>


        </section>
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
        <div class="medias-sociais">
            <a href=""><img src="img/youtube.png" alt=""></a>
            <a href=""><img src="img/instagram.png" alt=""></a>
            <a href=""><img src="img/twitter.png" alt=""></a>
            <a href=""><img src="img/github.png" alt=""></a>
        </div>
    </footer>





    <script src="js/carrossel-vagas.js"></script>
    <script src="js/carrossel-fotos.js"></script>
    <script src="js/ocultar-sessao.js"></script>
</body>

</html>