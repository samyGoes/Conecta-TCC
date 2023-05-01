<?php
    require_once 'global.php';
    require_once '../auth/verifica-logado.php';

    $t=$_SESSION['tipoPerfil'];
    $c=$_SESSION['codUsuario']; 
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../area-instituicao/css/estilo-arquivo-modelo.css">
    <link rel="stylesheet" href="css/estilo-card-vagas.css">
    <!-- LINK ICONES -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Document</title>
</head>

<body class="body">

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
                    <li class="topicos-sessao-login-linha"><a href="../form-login.php" class="cabecalho-menu-item"
                            id="cabecalho-menu-item-login">
                            <i class="fa-solid fa-user" id="topicos-icon-fixo-dif"></i> login </a> <span
                            id="nav-seta-sub-topicos"> 🢓 </span></i>
                        <ul class="sub-topicos">
                            <li> <a href="<?php echo '../auth/redirecionamento-perfil.php?c=' . $c . '&t=' . $t; ?>"> Meu Perfil </a></li>
                            <li> <a href="vagas.php"> Vagas </a> </li>
                            <li> <a href="form-editar-perfil-voluntario.php"> Configurações </a></li>
                            <li> <a href="../auth/logout.php"> Sair </a></li>
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
                    <a href="form-editar-perfil-voluntario.php"> <i class="fa-solid fa-pen-to-square"></i> <span class="nav-lateral-topico"> Editar Perfil </span></a>
                </div>

                <div class="nav-lateral-box-icon">
                    <a href="form-adicionar-causas-voluntario.php"> <i class="fa-sharp fa-solid fa-heart"></i> <span class="nav-lateral-topico"> Adicionar Causas </span></a>
                </div>

                <div class="nav-lateral-box-icon">
                    <a href="tabela-vagas-voluntario.php"> <i class="fa-solid fa-briefcase"></i> <span class="nav-lateral-topico"> Vagas </span></a>
                </div>

                <div class="nav-lateral-box-icon">
                    <a href="form-trocar-senha-voluntario.php"> <i class="fa-solid fa-key"></i> <span class="nav-lateral-topico">Trocar Senha </span></a>
                </div>

                <div class="nav-lateral-box-icon">
                    <a href="form-excluir-conta-voluntario.php"> <i class="fa-solid fa-xmark" id="nav-lateral-icon-excluir"></i> <span class="nav-lateral-topico">Excluir Conta </span></a>
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

        <div class="main-conteudo-container-titulo">
            <h1> VAGAS </h1>
            <p>
                Aqui você verá as listas das vagas para as quais se candidatou e as vagas em que foi
                requisitado.
            </p>
        </div>

        <!-- COLOCAR TODO O CONTEÚDO DENTRO DESSA SESSÃO -->
        <div class="conteudo-completo">

            <!-- BOTÕES CARD E TABELA -->
            <div class="container-botoes">   
                <div class="box-icon-tabela">
                    <div class="box-info-t"></div>
                    <a href="tabela-vagas-voluntario.php"> <div class="fundo-icon" id="icon-table"> <div class="box-img-icon"> <img src="img/tabela.png" alt=""></div> </div> </a>
                </div>    

                <div class="box-icon">
                    <div class="box-info"></div>
                    <a href="card-vagas-voluntario.php"> <div class="fundo-icon" id="icon-card"> <div class="box-img-icon"> <img src="img/card.png" alt=""></div> </div> </a>           
                </div>                         
            </div>



                <!-- TÍTULO 1 -->
                <div class="container-titulo-1 c">
                    <h2 class="titulo-voluntarios"> Vagas em que se Candidatou </h2>
                    <p class="frase-voluntarios">
                        Esta é a lista de todas as vagas que você se candidatou, você pode ver o status da vaga
                        ou retirar sua candidatura. Para ver a vaga completa clique no nome da vaga.
                    </p>
                </div>



                <!-- PESQUISA -->
                <div class="pesquisa-instituicao">
                    <i class="fa-solid fa-sliders"></i>         
                    <input type="text" placeholder="Pesquisar...">
                </div>



                <!-- CARDS 1 -->          
                <div class="container-cards">
                    <?php
                        try {
                            $listaVaga = ServicoDao::listarVaga($_SESSION['codUsuario']);
                        } catch (Exception $e) {
                            echo $e->getMessage();
                        }

                        $vetor = array
                        (
                            'professor',
                            'motorista particular',
                            'atendente',
                            'cozinheira',
                            'recepcionista',
                            'professor de espanhol e Professor de inglês'
                        );

                    ?>
                    <?php 
                        //foreach ($listaVaga as $vaga) 
                        foreach($vetor as $i)
                        {
                    ?>
                            <div class="card">                       
                                <div class="box-status">
                                    <div class="status-bolinha"></div>
                                    <p class="status"> Pendente </p>
                                </div>      
                                <div class="card-conteudo">
                                    <a href=""> <p class="card-nome-vaga"> <?php echo($i); //echo $vaga['nomeservico']; ?> </p> </a>                                  
                                </div>      
                                <button class="card-btn-rejeitar"> retirar </button>
                            </div>
                    <?php
                        }
                    ?>
                </div>
             
               


                <!-- TÍTULO 2 -->
                <div class="container-titulo-1">
                    <h2 class="titulo-voluntarios"> Vagas em que foi Requisitado </h2>
                    <p class="frase-voluntarios">
                        Esta é a lista de todas as vagas que você foi requisitado, você pode aceitar a vaga
                        ou rejeitá-la. Para ver a vaga completa clique no nome da vaga.
                    </p>
                </div>


                <!-- PESQUISA -->
                <div class="pesquisa-instituicao">
                    <i class="fa-solid fa-sliders"></i>
                    <input type="text" placeholder="Pesquisar...">
                </div>




                <!-- CARD 2 -->
                <div class="container-cards">
                    <?php
                        
                        // try {
                        //     $listaVaga = ServicoDao::listarVaga($_SESSION['codUsuario']);
                        // } catch (Exception $e) {
                        //     echo $e->getMessage();
                        // }
                    ?> 
                    <?php 
                        //foreach ($listaVaga as $vaga) 
                        foreach($vetor as $i)
                        {
                    ?>
                            <div class="card dois">                         
                                <div class="card-conteudo dois">
                                    <a href=""> <p class="card-nome-vaga"> <?php echo($i); //echo $vaga['nomeservico']; ?> </p> </a>                          
                                </div>     
                                <div class="card-botoes">
                                    <button class="card-btn-chamar"> aceitar </button>
                                    <button class="card-btn-rejeitar r"> rejeitar </button>
                                </div>    
                            </div>
                    <?php
                        }
                    ?>
                </div>
        </div>

    </main>








    <script type="module" src="../area-instituicao/js/main.js"></script>
    <script src="js/main.js"></script>
    <!-- <script src="js/box-info.js"></script> -->
</body>

</html>