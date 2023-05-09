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
        <link rel="stylesheet" href="css/estilo-vaga-completa.css">
        <!-- LINK ICONES -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <title> Vaga Completa </title>
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
                    <li> <i class="fa-sharp fa-solid fa-heart" id="topicos-icon-fixo"></i> <a href="instituicoes.php" class="cabecalho-menu-item">instituições</a></li>
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




        <!-- CONTEUDO  -->
        <div class="container-titulo">
            <h1 class="titulo"> Vaga Completa </h1>
            <p class="frase">
                Aqui você verá todas as informações da vaga selecionada. Caso tenha interesse considere se candidatar
                clicando no botão "candidatar-se" logo abaixo.
            </p>
        </div>

        <?php
            $consulta = CandidaturaDao::buscaCandidaturaBotao($_SESSION['codUsuario'],$_SESSION['vaga']['codServico']);
        ?>


        <div class="conteudo-completo">      

            <div class="card-completo">
                <!-- DADOS DA INSTITUIÇÃO -->
                
                <div class="titulos-card">
                    <h1><?php echo ($_SESSION['vaga']['nomeservico']); ?></h1> 
                    <h7><?php echo ($_SESSION['vaga']['nomeInstituicao']); ?></h7>
                                    
                    <div class="descricao-da-vaga">
                        <p><?php echo ($_SESSION['vaga']['descServico']); ?></p>
                    </div>
                </div>

                <div class="info-ende">
                    <div class="topico-informacoes">
                        <div class="titulo"><i class="fa-solid fa-circle-info"></i> <h6> Informações</h6></div>   
                        <div class="topico-informacoes-texto">

                            <div class="divisa-de-topicos-info">
                                <p>Horário:<span><?php echo ($_SESSION['vaga']['horarioServico']); ?></span></p>
                                <p>Período:<span><?php echo ($_SESSION['vaga']['periodoServico']); ?></span></p>
                                <p>Tipo de vaga:<span><?php echo ($_SESSION['vaga']['tipoServico']); ?></span></p>
                            </div>
                        
                            <div class="divisao-de-topicos-info">
                                <p>Data de início:<span><?php echo ($_SESSION['vaga']['dataInicioServico']); ?></span></p>
                                <p>Habilidade:<span>
                                    <?php
                                        $habilidades = $_SESSION['habilidade']['nomeHabilidade'];
                                        $habilidades = array_unique(explode(",", $habilidades));
                                        echo implode(", ", $habilidades);
                                    ?>
                                </span></p>
                            </div>       
                        </div>                 

                    </div>

                    <div class="topico-endereco">
                        <div class="titulo"><i class="fa-sharp fa-solid fa-location-dot"></i><h6> Endereço</h6></div>
                        <div class="topico-informacoes-texto">
                            <p><?php echo ($_SESSION['vaga']['logradouroLocalServico'] . " " . $_SESSION['vaga']['numeroLocalServico'] . ", " . $_SESSION['vaga']['bairroLocalServico'] . " - " . $_SESSION['vaga']['cidadeLocalServico'] . " " . $_SESSION['vaga']['estadoLocalServico'] . ", " . $_SESSION['vaga']['paisLocalServico']);
                            ?></p>
                        </div>
                    </div>         
                </div>           
                

                <!-- CAUSAS -->
                <div class="causas">
                    <div class="titulo">
                        <i class="fa-sharp fa-solid fa-heart"></i> <h6 >Causas ajudadas</h6>
                    </div>
                    <div class="tipo-causas">
                        <?php
                        if (!is_null($_SESSION['causa']['nomeCausa'])) 
                        {
                            $causas = $_SESSION['causa']['nomeCausa'];
                            $causas = array_unique(explode(",", $causas));
                        

                            foreach($causas as $causa)
                            { 
                                ?>
                                <a href=><button id=tipo-causas-1><?php echo $causa ?></button></a>
                                <?php 
                            }
                        }
                        ?>
                    </div>
                </div>
                <form action="../area-voluntario/candidatura.php" method="POST">
                    <div class="area-candidatar">
                            <p>Candidate-se a esta vaga para ajudar em nossa causa!</p>
                            <?php
                                if (!empty($_SESSION['nomeUsuario']))
                                {
                                    if($consulta)
                                    {
                                        $disabled = "disabled";
                                        $id = "habilitado";  //colocar o nome da classe ou id do botão habilitado  
                            
                                    }
                                    else
                                    {
                                        $disabled = "";
                                        $id = "desabilitado";//colocar o nome da classe ou id do botão desabilitado  
                                    }
                                    //chamar a variavel no botão e estilizar cada um de forma personalizada
                            ?>
                                    <button id="<?php echo $id ?>" type="submit" <?php echo $disabled ?> >candidatar-se</button>
                            <?php
                                }
                                else
                                {
                            ?>
                                    <button type="submit">candidatar-se</button>
                            <?php
                                }
                                
                            ?>
                    </div>
                </form>
            </div>
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

        <!-- DROP DOWN NAV BAR-->
        <script type="module" src="../imports/nav-drop-down.js"></script>
    </body>

</html>