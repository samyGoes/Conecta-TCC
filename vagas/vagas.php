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
    <title> Vagas </title>
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
                            <a href="<?php echo 'form-login.php' ?>" class="cabecalho-menu-item" id="cabecalho-menu-item-login">
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
                                <i id="nav-sininho-sub-topicos" class="fa-solid fa-bell"></i>

                                <?php
                                    $notInstituicaoTitulo = array
                                    (
                                        'Nova Candidatura',
                                        'Nova Mensagem',
                                        'Nova Avaliação',
                                        'Nova Avaliação'
                                    );

                                    $notInstituicaoFrase = array
                                    (
                                        'Um voluntário se candidatou a vaga de professor de inglês.',
                                        'Você tem uma nova mensagem do voluntário João.',
                                        'Um voluntário fez uma avaliação sua.',
                                        'Um voluntário fez uma avaliação sua.'
                                    );

                                ?>
                                <ul class="sub-topicos-sininho">
                                    <?php
                                        foreach($notInstituicaoTitulo as $notificacoes => $notInstituicaoTitulo)
                                        {
                                    ?>
                                            <li> 
                                                <div class="sub-topicos-sininho-linha">
                                                    <a class="sub-topicos-sininho-linha-titulo" href="#"> <?php echo($notInstituicaoTitulo); ?> </a>
                                                    <a class="sub-topicos-sininho-linha-frase" href="#"> <?php echo($notInstituicaoFrase[$notificacoes]); ?> </a>
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




      <!-- MODAL CANDIDATURA -->
      <?php
        
        if(isset($_GET['candidatura']))
        {
            if($_GET['candidatura'] === 'sucesso')
            {
                echo ' <script>
                        // cria o elemento HTML do modal
                        const modal = document.createElement("div");
                        modal.id = "modal";
                        modal.innerHTML = `
                            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"
                            integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A=="
                            crossorigin="anonymous" referrerpolicy="no-referrer" />
                            <div id="modal-content">
                                <i id="icone-fechar-modal" class="fa-solid fa-xmark"></i>
                                <p class="modal-titulo-cadastro">Candidatura realizada com sucesso!<i class="fa-sharp fa-solid fa-circle-check"></i></p>
                                <p class="modal-frase-cadastro"> Para ver as vagas em que se candidatou entre em configurações no menu vagas. </p>
                            </div>
                            `;

                        // adiciona o modal como filho do body (ou de outro elemento HTML)
                        document.body.appendChild(modal);

                        //adiciona a tag style do modal
                        const style = document.createElement("style");
                        const iconFechaModal = document.querySelector("#icone-fechar-modal");

                        style.innerHTML = `
                            #modal 
                            {
                                position: fixed;
                                bottom: 20px;
                                right: -600px;
                                z-index: 9999;
                                transition: all 1s ease;
                                border: #4567a5 solid 1px;
                                border-radius: 0.5rem;
                                background-color: #fff;
                                padding: 1.3rem;
                                max-width: 24rem;
                            }

                            #modal-content 
                            {
                                display: flex;
                                flex-direction: column;
                                gap: 0.4rem;
                                
                                position: relative;
                            }

                            #icone-fechar-modal
                            {
                                position: absolute;
                                right: -9px;
                                top: -11px;
                                color: #525252;
                                cursor: pointer;
                                transition: all 0.5s ease;
                            }

                            #icone-fechar-modal:hover
                            {
                                color: #green;
                            }

                            .modal-titulo-cadastro 
                            {
                                font-family: Poppins, sans-serif;
                                font-size: 15px;
                                color: #000;
                                font-weight: 500;
                                display: flex;
                                gap: 0.4rem;
                            }

                            p>i 
                            {
                                font-size: 1.2rem;
                                color: #1ea41e;
                            }

                            .modal-frase-cadastro
                            {
                                font-family: Poppins, sans-serif;
                                font-size: 13px;
                                color: #2e2e2e;
                                font-weight: 400;
                            }
                            `;

                        document.head.appendChild(style);

                        document.addEventListener("DOMContentLoaded", function()
                        {
                            modal.style.right = "20px";
                        });

                        iconFechaModal.addEventListener("click", function()
                        {
                            modal.remove();
                        });

                        // setTimeout(function()
                        // {
                        //     modal.remove();
                        // }, 8000);

                    </script>';
            }
        }

    ?>
        



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
                            <input type="checkbox" name="causas" id="causas">
                            <label for="causas"> <?php echo $causas['nomeCategoria']; ?> </label>
                        </div>

                    <?php
                    }
                    ?>
                </div>
            </div>          
        </div>

        <!-- HABILIDADES -->
        <div class="box-filtro-causas">
            <div class="clique-fora-h">
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
    <script src="js/script.js"></script>
    <script src="../voluntarios/js/cidade-estados.js"></script>
    <script type="module" src="../imports/nav-drop-down.js"></script>
    <script type="module" src="../imports/nav-drop-down-notificacao.js"></script>  
</body>

</html>