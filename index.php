<?php
    require_once 'global.php';
    include "auth/loginUsuario.php";
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- LINKS CSS -->
    <link rel="stylesheet" href="css/estilo-index.css">
    <link rel="stylesheet" href="css/estilo-navbar-rodape.css">
    <link rel="stylesheet" href="css/estilo-teste.css">

    <!-- LINK ICONES -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"
        integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title> Início </title>
</head>

<body>
    <!-- BARRA DE NAVEGAÇÂO -->
    
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
                <li> <i class="fa-solid fa-phone" id="topicos-icon-fixo"></i> <a href="contato.php" class="cabecalho-menu-item">contato</a></li>
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
    <div class="cabecalho-completo">
        <div class="box-cabecalho-conteudo">
            <div class="conteudo-direita">
                <div class="titulo-conteudo-direita">
                    <h1> Doe Seu Tempo Com a Conecta </h1>
                </div>
                <div class="conteudo-escrito-direita">
                    <p>
                        Conheça a Conecta, um portal para voluntários e instituições, tendo como objetivo
                        incentivar o trabalho voluntário, facilitar o acesso e informar a população sobre um
                        assunto de extrema importância.
                    </p>
                </div>
                <div class="continuar-botao">
                    <a href="opcao-cadastro.php"><button id="">junte-se a nós</button></a>
                </div>
            </div>
            <div class="foto-pessoas-cabecalho"><img src="img/pessoas-header.png" alt=""></div>
        </div>     
    </div>




    <main class="conteudo-completo">
       
        <div class="container-1">
            <div class="titulo-container-conteudo-1">
                <h1>Um pouco sobre o trabalho voluntário</h1>
            </div>

            <div class="card-conteudo-1">
                <div class="conteudo-imagem-1">
                    <img src="img/mao-coracao.jpg" alt="">
                </div>

                <div class="conteudo-escrito-1">
                    <div class="titulo-conteudo-escrito">
                        <h1>O que é o trabalho voluntário?</h1>
                    </div>
                    <div class="texto-conteudo-escrito">
                        <p>Voluntário é a pessoa que se interessa e dispõe parte do seu tempo para executar algum trabalho de bem estar para a sociedade ou 
                            mesmo em outro campo, utilizando suas habilidades e competências para fazer alguma diferença na situação atual.Felizmente o número de pessoas se voluntariando vem crescendo, um aumento de 23% de 
                             2011 a 2021 (Pesquisa Voluntariado no Brasil, 2021), porém a quantidade de pessoas ainda é pouca se comparada à população total do Brasil com cerca
                              de 214 milhões de pessoas. A falta de informação, de conhecimento sobre as instituições ou até mesmo meios de engajamento
                             e divulgação dos serviços por parte das instituições é um obstáculo para o crescimento dos índices.
                        </p>
                    </div>
                    <div class="botao-conteudo-escrito">
                        <a href="voluntarios/voluntarios.php"><button id="">voluntários</button></a>
                    </div>

                </div>
            </div>
        </div>

        <div class="container-2">
            <div class="box-cards">
                <div class="card">

                    <div class="card-box-icon">
                        <i id="icon-fechar" class="fa-solid fa-xmark"></i>
                    </div>
                    
                    <h1> O que é? </h1>
                    <p>                       
                        Em meio a atual circustância da sociedade, a necessidade de amparo da população mais afetada é, 
                        por parte, suprida por meio da contribuição do terceiro setor, sendo estes ONGs (Organizações não Governamentais),
                        OSCs (Organizações da Sociedade Civil) e OSCIPs (Organizações da Sociedade Civil de Interesse Público), instituições que 
                        não tem como objetivo fins lucrativos, mas sim o foco em desenvolver ações que garantam os direitos da população, que, no geral, 
                        são desamparadas pelo poder público, seja em assistência social, alimentar,
                        educacional, políticas públicas, meio ambiente, entre muitas outras. 
                    </p>
                    <a class="card-link" href="instituicoes/instituicoes.php"> Conheça as Instituições disponíveis </a>
                </div>
            </div>
            
                         
                    
            <div class="fundo-circulo">       
                <h1 class="fundo-titulo"> Saiba um pouco mais sobre o Terceiro Setor</h1>
                <div class="corta-coracao">
                    <div class="coracoes"></div>
                </div>
                <div class="circulo"></div> 
                <div class="sombra-circulo"></div>                  
                <div class="box-img"></div> 
                <button class="container-2-botao"> SAIBA SOBRE </button>
                <div class="img-maos"></div>
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
                        <p>Você irá aperfeiçoar suas habilidades</p>
                    </div>
                </div>

                <div class="experiencia">
                    <div class="imagem-experiencia">
                        <img src="img/experiencia.png" alt="">
                    </div>
                    <div class="conteudo-escrito-experiencias">
                        <p>Obterá experiância dentro de alguma área de atuação</p>
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
            

            <!-- CARROUSEL -->
            <div class="container-carrossel-completo">
                <div class="container-carrossel">
                    <div class="carrossel">

                        <!-- SETAS -->
                        <div class="arrow-left-dois control-dois"> ◀ </div>
                        <div class="arrow-right-dois control-dois"> ▶ </div>

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
                                            <div class="card-fundo">
                                                <div class="fundo-img">
                                                    <img src="area-instituicao/<?php echo $vaga['fotoInstituicao']; ?>">
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
                                                <form action="vagas/redirecionar-vaga-completa.php" method="post">
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
                    <a href="sobre-nos/sobre-nos.php"><h5>Sobre Nós</h5></a>
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



    <!-- CARROSSEL -->
    <script type="module" src="imports/carrossel.js"></script>
    <!-- DROP DOWN NAV BAR -->
    <script type="module" src="imports/nav-drop-down.js"></script>
    <script type="module" src="imports/nav-drop-down-notificacao.js"></script>

    <script src="js/mundo.js"></script>

</body>

</html>