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
    <!-- LINK CSS -->
    <link rel="stylesheet" href="../area-voluntario/css/style.css">
    <link rel="stylesheet" href="../css/estilo-navbar-rodape.css">
    <!-- LINK ICONES -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <title> Perfil Voluntário </title>
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
                <?php 
                    if (empty($_SESSION['nomeUsuario'])) 
                    {
                ?>
                        <li class="topicos-sessao-login-linha">
                            <a href="<?php echo '../form-login.php' ?>" class="cabecalho-menu-item" id="cabecalho-menu-item-login">
                                <i class="fa-solid fa-user" id="topicos-icon-fixo-dif"></i> login 
                            </a>
                        </li>
                <?php 
                    } 
                    else 
                    { 
                        $nomeCompleto = $_SESSION['nomeUsuario'];
                        if($_SESSION['tipoPerfil']=='Voluntario')
                        {
                            $nomeArray = explode(" ", $nomeCompleto);
                            $primeiroNome = $nomeArray[0];
                        }
                        else
                        {
                            $nomeArray = explode(" ", $nomeCompleto);
                            $primeiroNome = $nomeArray[0]." ".$nomeArray[1];  
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






    <!-- CONTEUDO PRINCIPAL -->
    <main>
        <div class="container">
            <h1 id="container-titulo">Perfil do Voluntário</h1>
            <p> Aqui você poderá ver todas as informações sobre o voluntário.</p>
        </div>

        <section class="card-completo">

            <!-- DADOS DO VOLUNTARIO -->
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
                            <img src="<?php echo $_SESSION['dadoPerfil']['fotoVoluntario'] ?>">
                        </div>

                        <?php 
                            require_once 'global.php';

                            $codVoluntario = $_SESSION['dadoPerfil']['codVoluntario'];

                            try {
                                $row = AvaliarDao::mostrarAvaliacaoVoluntario($codVoluntario);
                            } catch (Exception $e) {
                                echo $e->getMessage();
                            }

                        ?>
                        <div class="dados-pessoais-1-stars">
                            <?php 
                                for($star = 1; $star<=$row; $star++){
                                    echo "<i class='fa-solid fa-star'></i>";
                                }
                            ?>
                        </div>
                        <p>
                            <?php
                            echo ($_SESSION['dadoPerfil']['nomeVoluntario']);
                            ?>
                        </p>
                    </div>

                    <div class="dados-pessoais-2">
                        <p class="dados">idade: <span><?php echo ($_SESSION['dadoPerfil']['idade'] . " anos") ?></span></p>
                        <p class="dados" id="dados-email">email: <span><?php echo ($_SESSION['dadoPerfil']['emailVoluntario']) ?></span></p>
                        <!-- <p class="dados">telefone: <span><?php //echo ($_SESSION['dadoPerfil']['telefone1']) ?></span></p>
                        <p class="dados">Localidade: <span><?php // echo ($_SESSION['dadoPerfil']['cidadeVoluntario'] . " - " . $_SESSION['dadoPerfil']['estadoVoluntario'] . ", " . $_SESSION['dadoPerfil']['paisVoluntario']); ?></span></p> -->
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
                            <p>
                                <?php
                                echo ($_SESSION['dadoPerfil']['descVoluntario'])
                                ?>
                            </p>
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
                            <?php
                            try {
                                $codVoluntario = $_SESSION['dadoPerfil']['codVoluntario'];
                                $listar = CausasVoluntarioDao::listar($codVoluntario);
                            } catch (Exception $e) {
                                echo $e->getMessage();
                            }
                            ?>
                            <?php foreach ($listar as $causas) { ?>
                                <a href=""><button id="tipo-causas-1"><?php echo $causas['nomeCategoria']; ?></button></a>
                            <?php
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>



            <!-- SERVIÇOS PRESTADOS -->
            <div class="servicos-prestados">
                <div class="titulo-card">
                    <div class="icon-titulo-card">
                        <i class="fa-solid fa-briefcase"></i>
                        <h6>SERVIÇOS PRESTADOS </h6> <a>Ver mais</a>
                    </div>
                    <div class="seta-ocultar-vaga"> 🢓 </div>
                </div>
                <div class="ocultar-sessao-vaga">
                    <div class="container-carrossel" style="display: none;">
                        <div class="carrossel">

                            <!-- SETAS -->
                            <div class="arrow-left control"> ◀ </div>
                            <div class="arrow-right control"> ▶ </div>

                            <?php

                                $nomeServico = array
                                (
                                    'Professor de Dança do Ventre',
                                    'Cozinheiro',
                                    'Atendente Geral',
                                    'Recepcionista'
                                );

                                $duracaoServico = array
                                (
                                    '1 mês',
                                    '3 meses',
                                    '1 semana',
                                    '2 semanas'
                                );

                                $periodoServico = array
                                (
                                    'A combinar',
                                    'Manhã',
                                    'Manhã ou tarde',
                                    'Noite'
                                );

                                $cidadeServico = array
                                (
                                    'São Paulo',
                                    'Rio de Janeiro',
                                    'São Paulo',
                                    'São Paulo'
                                )

                            ?>

                            <div class="slider">
                                <div class="cards">
                                    <?php
                                        foreach($nomeServico as $dados => $servico) 
                                        {
                                    ?>
                                            <div class="card-carrossel">
                                                <div class="box-titulo-card">
                                                    <p class="titulo-card-carrossel"> <?php echo $servico; ?> </p>
                                                </div>
                                                <div class="texto-card">
                                                    <p> Duração: <span> <?php echo $duracaoServico[$dados]; ?> </span> </p>
                                                    <p> Período: <span> <?php echo $periodoServico[$dados]; ?> </span> </p>
                                                    <p> Cidade: <span> <?php echo $cidadeServico[$dados]; ?> </span> </p>
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
                    <div class="container-carrossel" style="display: none;">
                        <div class="carrossel">

                            <!-- SETAS -->
                            <div class="arrow-left-dois control-dois" id="seta-it"> ◀ </div>
                            <div class="arrow-right-dois control-dois" id="seta-it"> ▶ </div>

                            <div class="slider">
                                <div class="cards">
                                    <?php
                                    for ($i = 1; $i <= 3; $i++) {
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
            <!-- <div class="requisitar">
                <p class="text-requisitar"> Agora que você já viu o perfil do voluntário considere requisitá-lo a uma de suas vagas.</p>
                <button id="requisitar"> REQUISITAR </button> -->

                <!-- Modal -->
                <div id="meuModal" class="modal">
                    <div class="modal-conteudo">
                        <span class="fechar">&times;</span>
                        <h1 class="modal-titulo">Requisição de Voluntário</h1>
                        <p class="modal-texto">Selecione as vagas para as quais deseja atribuir a este voluntário.</p>
                        <div class="selecione-button ">
                            <form class="form-filtro" method="POST" action="../area-instituicao/enviar_solicitacao.php">
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
                        </div>
                        <div class="footer-modal">
                            <div class="box-filtro-vaga">
                                <div class="clique-fora-h">
                                    <div class="filtro-vaga"> Selecione a vagas... </div>
                                    <div class="box-vaga">
                                        <?php
                                        try {
                                            $listaHabilidade = HabilidadeServicoDao::listar();
                                        } catch (Exception $e) {
                                            echo $e->getMessage();
                                        }
                                        ?>
                                        <?php foreach ($listaHabilidade as $habilidade) { ?>
                                            <div class="box-vaga-checkbox">
                                                <input type="checkbox" name="vaga[]" id="vaga" value=<?php echo
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
                            </div>
                            <button type="submit" nome='requisitar' id="meuBotao">Confirmar</button>
                        </div>
                    </div>
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




    <script src="js/ocultar-sessao.js"></script>
    <script type="module" src="imports/carrossel.js"></script>
    <script type="module" src="../imports/nav-drop-down.js"></script>
    <script type="module" src="../imports/nav-drop-down-notificacao.js"></script> 

    <script>
        // Associar o evento de clique ao botão e ao botão de fechar
        // document.getElementById("requisitar").addEventListener("click", abrirModal);
        // document.querySelector(".fechar").addEventListener("click", fecharModal);

        // // Função para abrir o modal
        // function abrirModal() {
        //     document.getElementById("meuModal").style.display = "block";
        // }

        // // Função para fechar o modal
        // function fecharModal() {
        //     document.getElementById("meuModal").style.display = "none";
        // }



        // // DROP DOWN DO BOTÃO DAS CAUSAS/HABILIDADE + MUDANDO BOTÃO DE COR
        // const botaoCausas = document.querySelector(".filtro-causas");
        // const boxCausas = document.querySelector(".box-causas");
        // const botaoHabilidade = document.querySelector(".filtro-habilidade");
        // const boxHabilidade = document.querySelector(".box-habilidade");
        // const botaoVaga = document.querySelector(".filtro-vaga");
        // const boxVaga = document.querySelector(".box-vaga");
        // const dropCausas = document.querySelector('.clique-fora');

        // botaoCausas.addEventListener("click", function() {
        //     if (boxCausas.style.display == "none" || boxCausas.style.display === "") {
        //         boxCausas.style.display = "flex";
        //     } else {
        //         boxCausas.style.display = "none";
        //         botaoCausas.style.color = "#000";
        //         botaoCausas.style.borderColor = "#000";
        //     }
        // });

        // document.addEventListener('click', function(event) {
        //     const target = event.target;
        //     if (!dropCausas.contains(target)) {
        //         boxHabilidade.style.display = "none";
        //         botaoHabilidade.style.color = "#000";
        //         botaoHabilidade.style.borderColor = "#000";
        //     }
        // });

        // botaoHabilidade.addEventListener("click", function() {
        //     if (boxHabilidade.style.display == "none" || boxHabilidade.style.display === "") {
        //         boxHabilidade.style.display = "flex";
        //     } else {
        //         boxHabilidade.style.display = "none";
        //         botaoHabilidade.style.color = "#fff";
        //         botaoHabilidade.style.borderColor = "#000";
        //     }
        // });

        // document.addEventListener('click', function(event) {
        //     const target = event.target;
        //     if (!dropCausas.contains(target)) {
        //         boxCausas.style.display = "none";
        //         botaoCausas.style.color = "#fff";
        //         botaoCausas.style.borderColor = "#000";
        //     }
        // });

        // botaoVaga.addEventListener("click", function() {
        //     if (boxVaga.style.display == "none" || boxVaga.style.display === "") {
        //         boxVaga.style.display = "flex";
        //         botaoVaga.style.color = "#000";
        //         botaoVaga.style.borderColor = "#4567a5";
        //     } else {
        //         boxVaga.style.display = "none";
        //         botaoVaga.style.color = "#000";
        //         botaoVaga.style.borderColor = "#000";
        //     }
        // });

        // document.addEventListener('click', function(event) {
        //     const target = event.target;
        //     if (!dropCausas.contains(target)) {
        //         boxVaga.style.display = "none";
        //         botaoVaga.style.backgroundColor = "#d6ebfd";
        //         botaoVaga.style.color = "#000";
        //         botaoVaga.style.borderColor = "#000";
        //     }
        // });

        
    </script>

</body>

</html>