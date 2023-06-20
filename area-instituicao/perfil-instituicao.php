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
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="../css/estilo-navbar-rodape.css">
    
    <!-- LINK ICONES -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <title> Perfil Instituição </title>
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
                                            $idInstituicaoLogada = $_SESSION['codUsuario'];
                                            $notificacoes = InstituicaoDao::notificacoes($idInstituicaoLogada);
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

    <!-- LINK NAVBAR RESPONSIVA OPEN SOURCE -->
    <!-- https://github.com/euronaldoreis/navbar-menu-responsive -->

    <!-- CONTEUDO PRINCIPAL -->
    <main>
        <div class="container">
            <h1 id="container-titulo">Perfil da Instituição</h1>
            <p> Aqui você poderá ver todas as informações sobra a instituição.</p>
        </div>

        <section class="card-completo">
            <!-- DADOS DA INSTITUIÇÃO -->  
            <div class="card">
                <div class="titulo-card">
                    <div class="icon-titulo-card">
                        <i class="fa-solid fa-user"></i>
                        <h6> dados da instituição </h6>
                    </div>
                    <div class="seta-ocultar"> 🢓 </div>
                </div>

                <div class="ocultar-sessao">
                    <div class="dados-pessoais-1">
                        <div class="img-user">
                            <img src="<?php echo ($_SESSION['dadoPerfil']['fotoInstituicao']) ?>">
                        </div>
                        <?php 
                            require_once 'global.php';

                            $codInstituicao = $_SESSION['dadoPerfil']['codInstituicao'];

                            try {
                                $row = AvaliarDao::mostrarAvaliacaoInstituicao($codInstituicao);
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
                                echo($_SESSION['dadoPerfil']['nomeInstituicao']);
                             ?> 
                        </p>
                    </div>

                    <div class="info">
                        <div class="topico-endereco">
                            <div class="topico-icon">
                                <i class="fa-sharp fa-solid fa-location-dot"></i>
                                <p>endereço</p>
                            </div>
                            <p class="endereco">
                                <?php
                                echo ($_SESSION['dadoPerfil']['logInstituicao'] . ", " . $_SESSION['dadoPerfil']['numLogInstituicao'] . " - " . $_SESSION['dadoPerfil']['cidadeInstituicao'] . " " . $_SESSION['dadoPerfil']['estadoInstituicao'] . " - " . $_SESSION['dadoPerfil']['cepInstituicao'] . ", " . $_SESSION['dadoPerfil']['bairroInstituicao'] . ", " . $_SESSION['dadoPerfil']['paisInstituicao']);
                                ?>
                            </p>
                        </div>

                        <div class="topico-contato">
                            <div class="topico-icon">
                                <i class="fa-solid fa-phone"></i>
                                <p>contato</p>
                            </div>
                            <div class="dados-ende-conta">
                                <div class="email-fone" id="email">
                                    <p id="topico-email-fone">Email</p>
                                    <p>
                                        <?php
                                        echo ($_SESSION['dadoPerfil']['emailInstituicao']);
                                        ?>
                                    </p>
                                </div>

                                <div class="email-fone" id="telefone">
                                    <p class="topico-telefone" id="topico-email-fone">Telefone</p>
                                    <div class="telefones">
                                        <p>
                                            <?php
                                                echo($_SESSION['dadoPerfil']['telefone1'])
                                            ?>
                                        </p>
                                        <p>
                                            <?php
                                            
                                            ?>
                                        </p>
                                    </div>

                                </div>
                            </div>
                        </div>
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
                            <p><?php echo($_SESSION['dadoPerfil']['descInstituicao']) ?></p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- FOTOS -->
            <div class="fotos">
                <div class="titulo-card" id="titulo-card-carrossel">
                    <div class="icon-titulo-card">
                        <i class="fa-solid fa-camera"></i>
                        <h6>FOTOS</h6> <a href="galeria-fotos-instituicao.php">Ver mais</a>
                    </div>
                    <div class="seta-ocultar-foto"> 🢓 </div>
                </div>
                <div class="ocultar-sessao-foto">
                    <div class="container-carrossel">
                        <div class="carrossel">

                            <!-- SETAS -->
                            <div class="arrow-left-dois control-dois"> ◀ </div>
                            <div class="arrow-right-dois control-dois"> ▶ </div>

                            <div class="slider">
                                <div class="cards">
                                    <?php
                                        require_once 'global.php';

                                        $codInstituicao = $_SESSION['dadoPerfil']['codInstituicao'];
                                        $fotos = GaleriaInstituicaoDao::listar($codInstituicao);
                                       
                                        foreach ($fotos as $foto) {
                                    ?>
                                        <div class="card-carrossel-dois">
                                            <div class="content-fotos">
                                                <img src="<?php echo $foto['fotosInstituicao']; ?>">
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

                                    $listaCausas = CategoriaServicoDao::listarCausaPerfil($_SESSION['dadoPerfil']['codInstituicao']);
                                } catch (Exception $e) {
                                    echo $e->getMessage();
                                }
                            ?>
                             <?php foreach ($listaCausas as $causas) { ?>
                            <a href=""><button id="tipo-causas-1"><?php echo $causas['nomeCategoria']; ?></button></a>
                            <?php
                             }
                             ?>
                        </div>
                    </div>
                </div>
            </div>



            <!-- VAGAS -->
            <div class="vagas">
                <div class="titulo-card">
                    <div class="icon-titulo-card">
                        <i class="fa-solid fa-briefcase"></i>
                        <h6>VAGAS </h6> <a>Ver mais</a>
                    </div>
                    <div class="seta-ocultar-vaga"> 🢓 </div>
                </div>
                <div class="ocultar-sessao-vaga">
                    <div class="container-carrossel-servicos">
                        <div class="carrossel">

                            <!-- SETAS -->
                            <div class="arrow-left control"> ◀ </div>
                            <div class="arrow-right control"> ▶ </div>

                            <div class="slider">
                                <div class="cards">
                                <?php
                                    require_once 'global.php';
                                    try {
                                        $listaVaga = ServicoDao::listarVaga($_SESSION['dadoPerfil']['codInstituicao']);
                                    } catch (Exception $e) {
                                        echo $e->getMessage();
                                    }
                                    ?>
                                    <?php foreach ($listaVaga as $vaga) {?>
                                        <div class="card-carrossel">
                                            <div class="box-titulo-card">
                                                <p class="titulo-card-carrossel"> <?php echo $vaga['nomeservico']; ?> </p>
                                            </div>
                                            
                                            <div class="texto-card">
                                                <p> Duração: <span> 1 mês </span> </p>
                                                <p> Período: <span><?php echo $vaga['periodoServico']; ?></span> </p>
                                                <p> Cidade: <span> <?php echo $vaga['cidadeLocalServico']; ?> </span> </p>
                                            </div>
                                            <form action="../vagas/redirecionar-vaga-completa.php" method="post">
                                                <input type="hidden" name="id" value="<?php echo $vaga['codServico']; ?>">
                                                <a href="#"><button class="card-carrossel-botao">
                                                    VER
                                                </button></a>
                                            </form>
                                        </div>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
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
                            <a href="../form-login-adm.php"><li>Login</li></a>
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

</body>

</html>