<?php
     require_once 'global.php';  
     require_once '../../auth/verifica-logado.php';
?>
<!DOCTYPE html>
<html lang="pt-br">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- LINKS CSS -->
        <link rel="stylesheet" href="../css/estilo-arquivo-modelo.css">
        <link rel="stylesheet" href="css/estilo-vaga-completa.css">
        <link rel="stylesheet" href="css/estilo-modal-exclusao.css">

        <!-- LINK ICONES -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"
            integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A=="
            crossorigin="anonymous" referrerpolicy="no-referrer" />
        <title>VAGA - Editar vagas</title>
    </head>

    <body>

         <!-- BARRA DE NAVEGAÇÂO -->
         <nav class="cabecalho">
            <div class="logo">
                <p> Conecta </p>
            </div>

            <!-- BOTÃO PRA ESCONDER E APARECER OS TÓPICOS -->
            <input type="checkbox" id="check">
            <label for="check" class="checkbtn"> <i class="fas fa-bars"></i> </label>

            <!-- TÓPICOS -->
            <ul class="topicos-sessao-completa">
                <ul class="topicos">
                    <li> <i class="fa-solid fa-house" id="topicos-icon-fixo"></i> <a href="../../index.php" class="cabecalho-menu-item">Início</a></li>
                    <li> <i class="fa-solid fa-person" id="topicos-icon-fixo"></i> <a href="../../voluntarios/voluntarios.php" class="cabecalho-menu-item">voluntários</a></li>
                    <li> <i class="fa-sharp fa-solid fa-heart" id="topicos-icon-fixo"></i> <a href="../../instituicoes/instituicoes.php" class="cabecalho-menu-item">instituições</a></li>
                    <li> <i class="fa-solid fa-briefcase" id="topicos-icon-fixo"></i> <a href="../../vagas/vagas.php" class="cabecalho-menu-item">Vagas</a></li>
                    <li> <i class="fa fa-file-text" aria-hidden="true" id="topicos-icon-fixo"></i> <a href="../../sobre-nos/sobre-nos.php" class="cabecalho-menu-item">sobre nós</a></li>
                    <li> <i class="fa-solid fa-phone" id="topicos-icon-fixo"></i> <a href="../../contato/contato.php" class="cabecalho-menu-item">contato</a></li>
                </ul>

                <ul class="topicos-sessao-login">
                    <li class="topicos-sessao-login-linha"><a href="../form-login.php" class="cabecalho-menu-item"
                            id="cabecalho-menu-item-login">
                            <i class="fa-solid fa-user" id="topicos-icon-fixo-dif"></i> login </a> <span
                            id="nav-seta-sub-topicos"> 🢓 </span></i>
                        <ul class="sub-topicos">
                            <li> <a href="perfil-voluntario.php"> Meu Perfil </a></li>
                            <li> <a href=""> Vagas </a> </li>
                            <li> <a href="../editar-perfil-instituicao-atualizado.php"> Configurações </a></li>
                            <li> <a href="../../auth/logout.php"> Sair </a></li>
                        </ul>
                    </li>
                </ul>
            </ul>
        </nav>




        <!-- TITULO CONFIGURAÇÕES DO PERFIL -->
        <div class="container-titulo-configuracoes">
            <h1> Configurações do Perfil </h1>
        </div>




        <!-- NAV LATERAL -->
        <nav class="nav-lateral">
            <div class="nav-lateral-sessao-um">
                <i class="fa-solid fa-bars" id="nav-lateral-icon-lista"></i>

                <div class="nav-lateral-box-icon">
                    <a href="../form-editar-perfil-instituicao.php"> <i class="fa-solid fa-pen-to-square"></i> <span class="nav-lateral-topico"> Editar Perfil
                        </span></a>
                </div>

                <div class="nav-lateral-box-icon">
                    <a href="../form-cadastrar-causas-instituicao.php"> <i class="fa-sharp fa-solid fa-heart"></i> <span class="nav-lateral-topico"> Cadastrar
                            Causas </span></a>
                </div>

                <div class="nav-lateral-box-icon">
                    <a href="../form-cadastrar-habilidades-instituicao.php"> <i class="fa-solid fa-wrench"></i> <span class="nav-lateral-topico"> Cadastrar Habilidades
                        </span></a>
                </div>
                <div class="nav-lateral-box-icon">
                    <a href="../form-cadastrar-vagas-instituicao.php"> <i class="fa-solid fa-newspaper"></i> <span class="nav-lateral-topico"> Cadastrar Vagas
                        </span></a>
                </div>

                <div class="nav-lateral-box-icon">
                    <a href="../editar-excluir-vagas/editar-vagas-instituicao.php"> <i class="fa-solid fa-pen-to-square"></i> <span class="nav-lateral-topico"> Editar Vagas
                        </span></a>
                </div>

                <div class="nav-lateral-box-icon">
                    <a href="../gerenciar-vagas/dashboard-instituicao.php"> <i class="fa-solid fa-gear"></i> <span class="nav-lateral-topico"> Gerenciar Vagas
                        </span></a>
                </div>

                <div class="nav-lateral-box-icon">
                    <a href="../form-trocar-senha-instituicao.php"> <i class="fa-solid fa-key"></i> <span class="nav-lateral-topico">Trocar Senha </span></a>
                </div>

                <div class="nav-lateral-box-icon">
                    <a href="../form-excluir-conta-instituicao.php"> <i class="fa-solid fa-xmark" id="nav-lateral-icon-excluir"></i> <span
                            class="nav-lateral-topico">Excluir Conta </span></a>
                </div>
            </div>

            <div class="nav-lateral-sessao-dois">
                <div class="nav-lateral-box-icon">
                    <a href="../auth/logout.php"> <i class="fa-solid fa-door-open" id="nav-lateral-icon-sair"></i> <span
                            class="nav-lateral-topico"> Sair </span></a>
                </div>
            </div>
        </nav>







        <!-- CONTEUDO  -->
        <main class="main-conteudo">
            
            <div class="main-conteudo-container-titulo">
                <h1>VAGA</h1>
                <p> 
                    Aqui está a sua vaga completa, veja todas as informações que desejar. Você também
                    pode editá-la ou excluí-la.
                </p>
            </div>         

            <!-- COLOCAR TODO O CONTEÚDO DENTRO DESSA SESSÃO -->

            <!-- CONTEUDO PRINCIPAL -->

            <!-- MODAL EXCLUIR VAGA -->
            <div id="container-modal" class="container-modal">
                <div class="modal-responsive" id="modal-responsive">
                    <div class="fade" id="fade">
                        <div class="modal" id="modal">
                            <label for="" class="modal-titulo" id="modal-titulo"> Deseja realmente excluir a vaga? </label>
                            <div class="btn-exit" id="btn-exit">
                            <form action="delete-vaga-instituicao.php" method="post">
                                 <button type="submit" id="excluir">excluir</button>
                            </form>
                                <button type="submit" id="cancelar">cancelar</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="conteudo-completo">

                <div class="conteiner-botoes">
                <a href="form-editar-vagas-instituicao.php"><button class="conteiner-botao-editar">EDITAR</button></a> 
                    <button class="conteiner-botao-excluir">EXCLUIR</button>
                </div>         
        
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

                    <div class="area-candidatar">
                        <p>Candidate-se a esta vaga para ajudar em nossa causa!</p>
                        <button>candidatar-se</button>
                    </div>
                </div>
            </div>

        </main>







        <!-- SCRIPTS -->
        <script src="../js/script.js"></script>
        <script src="js/modal-exclusao.js"></script>

    </body>

</html>