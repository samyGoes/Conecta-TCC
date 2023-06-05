<?php
    require_once 'global.php';
    require_once '../auth/verifica-logado.php';
?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../area-instituicao/css/estilo-arquivo-modelo.css">
        <link rel="stylesheet" href="../area-instituicao/gerenciar-vagas/css/estilo-tabela-voluntarios-confirmados.css">
        <link rel="stylesheet" href="css/estilo-instituicoes-voluntario.css">
         <!-- LINK ICONES -->
         <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <title>Document</title>
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




        <!-- TITULO CONFIGURAÇÕES DO PERFIL -->
        <div class="container-titulo-configuracoes">
            <h1> Configurações do Perfil </h1>
        </div>




        <!-- NAV LATERAL -->
        <nav class="nav-lateral">
            <div class="nav-lateral-sessao-um">
                <i class="fa-solid fa-bars" id="nav-lateral-icon-lista"></i>

                <div class="nav-lateral-box-icon">
                    <a href="editar-perfil-voluntario.php"> <i class="fa-solid fa-pen-to-square"></i> <span class="nav-lateral-topico"> Editar Perfil </span></a>
                </div>

                <div class="nav-lateral-box-icon">
                    <a href="adicionar-causas-voluntario.php"> <i class="fa-sharp fa-solid fa-heart"></i> <span class="nav-lateral-topico"> Adicionar Causas </span></a>
                </div>

                <div class="nav-lateral-box-icon">
                    <a href="vagas-voluntario.php"> <i class="fa-solid fa-briefcase"></i> <span class="nav-lateral-topico"> Vagas </span></a>
                </div>

                <div class="nav-lateral-box-icon">
                    <a href="trocar-senha-voluntario.php"> <i class="fa-solid fa-key"></i> <span class="nav-lateral-topico">Trocar Senha </span></a>
                </div>

                <div class="nav-lateral-box-icon">
                    <a href="excluir-conta-voluntario.php"> <i class="fa-solid fa-xmark" id="nav-lateral-icon-excluir"></i> <span class="nav-lateral-topico">Excluir Conta </span></a>
                </div>
            </div>

            <div class="nav-lateral-sessao-dois">
                <div class="nav-lateral-box-icon">
                    <a href="../auth/logout.php"> <i class="fa-solid fa-door-open" id="nav-lateral-icon-sair"></i> <span class="nav-lateral-topico"> Sair </span></a>
                </div>
            </div>    
        </nav>







        <!-- CONTEUDO  -->
        <main class="main-conteudo">
            <!-- COLOCAR TODO O CONTEÚDO DENTRO DESSA SESSÃO -->
            <!-- <div class="uau"></div> -->

            <div class="main-conteudo-container-titulo">
                <h1> VAGAS </h1>
                <p>  
                    Aqui você verá as listas das vagas para as quais se candidatou e as vagas em que foi
                    requisitado. 
                </p>
            </div>


            <!-- COLOCAR TODO O CONTEÚDO DENTRO DESSA SESSÃO -->
            <div class="conteudo-completo">

                <div class="container-botoes">
                    <div class="box-icon-tabela">
                        <div class="box-info-t"></div>
                        <a href="tabela-vagas-voluntario.php">
                            <div class="fundo-icon" id="icon-table">
                                <div class="box-img-icon"> <img src="img/tabela.png" alt=""></div>
                            </div>
                        </a>
                    </div>

                    <div class="box-icon">
                        <div class="box-info"></div>
                        <a href="card-vagas-voluntario.php">
                            <div class="fundo-icon" id="icon-card">
                                <div class="box-img-icon"> <img src="img/card.png" alt=""></div>
                            </div>
                        </a>
                    </div>
                </div>


                 <!-- TÍTULO 1 -->
            <div class="container-titulo-1 c">
                <h2 class="titulo-voluntarios"> instituições </h2>
                <p class="frase-voluntarios">
                    Esta é a lista de todas as vagas que você se candidatou, você pode ver o status da vaga
                    ou retirar sua candidatura. Para ver a vaga completa clique no nome da vaga.
                </p>
            </div>


                <!-- TABELA 1 -->
                <div class="table">
                    <div class="table-responsive">
                        <div class="funcoes">
                            <div class="funcoes-sessao-1">
                                <i class="fa-solid fa-sliders"></i>
                            </div>
                            <div class="funcoes-sessao-2">
                                <input type="text" name="" id="pesquisar" placeholder="Pesquisar">
                                <i class="fa-solid fa-magnifying-glass" id="icon-lupa"></i>
                            </div>
                        </div>
                        <table>
                            <thead>
                                <tr>
                                    <th> ID </th>
                                    <th> Foto </th>
                                    <th> Nome </th>
                                    <th> Idade </th>
                                    <th> Cidade </th>
                                    <th> UF </th>
                                    <th> Vaga </th>
                                    <th> Chat </th>
                                    <th> Avaliar </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                require_once 'global.php';

                                try 
                                {
                                    
                                    // $idInstituicaoLogada = $_SESSION['codUsuario'];
                                    // $codServico = $_POST['codCategoriaServico']; // Obter o código da vaga do botão clicado
                                    // $listaVoluntario = CandidaturaDao::listarVoluntariosAceitos($idInstituicaoLogada, $codServico); // Passar o código da vaga para a consulta
                                } 
                                catch (Exception $e) 
                                {
                                    echo $e->getMessage();
                                }
                                ?>


                                <?php foreach ($listaVoluntario as $voluntario) { ?>

                                    <!-- <form action="" method="post"> -->
                                        <tr>
                                            <td><?php echo $voluntario['codCandidatura']; ?></td>
                                            <td>
                                                <a href="">
                                                    <div class="box-img-lista">
                                                        <img src="../../area-voluntario/<?php echo $voluntario['fotoVoluntario']; ?>" alt="">
                                                    </div>
                                                </a>
                                            </td>
                                            <td><?php echo $voluntario['nomeVoluntario']; ?></td>
                                            <td>18 anos</td>
                                            <td><?php echo $voluntario['cidadeVoluntario']; ?></td>
                                            <td><?php echo $voluntario['estadoVoluntario']; ?></td>
                                            <td><?php echo $voluntario['nomeservico']; ?></td>
                                            <td> <a href="<?php echo '../auth/redirecionamento-chat-usuario.php?c=' . $c . '&t=' . $t; ?>"> <i id="td-icone-chat" class="fa-solid fa-comment-dots"></i> </a></td>
                                                        
                                            <td>
                                                <form action="" method="post">   
                                                    <input type="hidden" name="codCategoriaServico" value="<?php echo $codServico?>"> 
                                                    <button id="btnModalAvaliar" name="btnAvaliar" class="table-btn-avaliar" value="<?php echo $codServico . $voluntario['codVoluntario']; ?>" onclick="abrirModal('modalAvaliar')"><i id="tabela-icone-avaliacao" class="fa-solid fa-star"></i></button>
                                                </form>
                                            </td>
                                        </tr>
                                    <!-- </form> -->


                                <?php } ?>
                            </tbody>
                        </table>

                    </div>
                </div>

                <a class="link-voltar-anterior" href="tabela-vagas-preenchidas-instituicao.php"> Voltar para a página anterior. </a>
            </div>
        </main>





        


        <script type="module" src="imports/side-bar.js"></script>
        <script type="module" src="../imports/nav-drop-down.js"></script>
        <script type="module" src="imports/box-info.js"></script>
        <script type="module" src="../imports/nav-drop-down-notificacao.js"></script> 
        <script type="module" src="../imports/nova-notificacao.js"></script>
    </body>
</html>