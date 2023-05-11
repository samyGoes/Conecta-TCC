<?php
require_once 'global.php';
include "../../auth/verifica-logado.php";
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/estilo-arquivo-modelo.css">
    <link rel="stylesheet" href="css/estilo-tabela-vagas-cadastradas-instituicao.css">
    <link rel="stylesheet" href="css/estilo-modal-exclusao.css">
    <!-- LINK ICONES -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title> Configurações do Perfil - Editar Vagas </title>
</head>

<body>

    <!-- BARRA DE NAVEGAÇÂO -->
    <nav class="cabecalho">
        <div class="logo">
            <img src="../../img/logo-conecta.png">
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
                <?php if (empty($_SESSION['nomeUsuario'])) { ?>
                    <li class="topicos-sessao-login-linha">
                        <a href="<?php echo 'form-login.php' ?>" class="cabecalho-menu-item" id="cabecalho-menu-item-login">
                            <i class="fa-solid fa-user" id="topicos-icon-fixo-dif"></i> login 
                        </a>
                    </li>
                <?php } else { 
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
                        <a href="#" class="cabecalho-menu-item" id="cabecalho-menu-item-usuario">
                            Olá, <?php echo $primeiroNome ?> <span id="nav-seta-sub-topicos"> 🢓 </span>
                        </a>
                        <ul class="sub-topicos">
                            <li> <a href="../../auth/redirecionamento-perfil-usuario.php"> Meu Perfil </a></li>
                            <li> <a href=""> Vagas </a> </li>
                            <li> <a href="../../auth/configuracao-perfil-usuario.php"> Configurações </a></li>
                            <li> <a href="../../auth/logout.php"> Sair </a></li>
                        </ul>
                    </li>
                <?php } ?>
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
                <a href="../editar-excluir-vagas/tabela-editar-vagas-instituicao.php"> <i class="fa-solid fa-pen-to-square"></i> <span class="nav-lateral-topico"> Editar Vagas
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
                <a href="../form-excluir-conta-instituicao.php"> <i class="fa-solid fa-xmark" id="nav-lateral-icon-excluir"></i> <span class="nav-lateral-topico">Excluir Conta </span></a>
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

    
        <!-- MODAL EXCLUIR VAGA -->
        <div id="container-modal" class="container-modal">
            <div class="modal-responsive" id="modal-responsive">
                <div class="fade" id="fade">
                    <div class="modal" id="modal">
                        <label for="" class="modal-titulo" id="modal-titulo"> 
                            Deseja realmente excluir a vaga? Uma vez excluída você não poderá mais restaurá-la.
                        </label>
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



        <div class="main-conteudo-container-titulo">
            <h1>Editar Vagas</h1>
            <p>
                Aqui você verá todas as vagas que cadastrou. Para alterar alguma de suas vagas selecione 
                a vaga que deseja e clica no ícone de editar ou de excluir.
            </p>
        </div>


        <!-- BOTÕES PARA TIPO DE VISUALIZAÇÃO -->
        <div class="container-botoes">     
            <div class="box-icon-tabela">
                <div class="box-info-t"></div>
                <a href="tabela-editar-vagas-instituicao.php"> <div class="fundo-icon" id="icon-table"> <div class="box-img-icon"> <img src="../../area-voluntario/img/tabela.png" alt=""></div> </div> </a>
            </div>  
                        
            <div class="box-icon">
                <div class="box-info"></div>
                <a href="cards-editar-vagas-instituicao.php"> <div class="fundo-icon" id="icon-card"> <div class="box-img-icon"> <img src="../../area-voluntario/img/card.png" alt=""></div> </div> </a>           
            </div>                 
        </div>





        <!-- TABELA --> 
        <div class="table">
            <div class="table-responsive">
                <div class="funcoes">
                    <div class="funcoes-sessao-1">
                        <span>Selecionar todos</span>
                        <input type="checkbox" name="selecionar-todos" id="selecionar-todos">
                        <div class="funcoes-sessao-1-UD">
                            <a href="form-editar-vagas-instituicao.php"> <i class="fa-regular fa-pen-to-square" id="icone-lapis"></i></a>
                            <div class="conteiner-botao-excluir"><i class="fa-solid fa-trash-can" id="icone-lixo"></i></div>
                        </div>                   
                    </div>

                    <div class="funcoes-sessao-2">
                        <input type="text" name="" id="pesquisar" placeholder="Pesquisar">
                        <i class="fa-solid fa-magnifying-glass" id="icon-lupa"></i>
                    </div>
                </div>
                <table>
                    <thead>
                        <tr>
                            <th> </th>
                            <th> ID </th>
                            <th> Nome </th>
                            <th>Período</th>
                            <th>Horário</th>
                            <th>Causas</th>
                            <th>Habilidades</th>
                            <th>Cidade</th>
                            <th>UF</th>
                            <th>País</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        try {
                            $listaVaga = ServicoDao::listarVaga($_SESSION['codUsuario']);
                        } catch (Exception $e) {
                            echo $e->getMessage();
                        }
                        ?>
                        <tr>
                            <?php foreach ($listaVaga as $vaga) { ?>
                                <td> <input type="checkbox" name="checkbox" id="checkbox"> </td>
                                <td> <?php echo $vaga['codServico']; ?> </td>
                                <td> <?php echo $vaga['nomeservico']; ?></td>
                                <td> <?php echo $vaga['periodoServico']; ?></td>
                                <td> <?php echo $vaga['horarioServico']; ?></td>
                                <td> <?php echo $vaga['causas']; ?></td>
                                <td> <?php echo $vaga['habilidades']; ?> </td>
                                <td> <?php echo $vaga['cidadeLocalServico']; ?> </td>
                                <td> <?php echo $vaga['estadoLocalServico']; ?></td>
                                <td> <?php echo $vaga['paisLocalServico']; ?></td>
                        </tr>
                    <?php
                            }
                    ?>
                    </tbody>
                </table>
            </div>
        </div>
      
    </main>







    <script src="js/modal-exclusao.js"></script>
    <script type="module" src="../imports/side-bar.js"></script>
    <script type="module" src="../../imports/nav-drop-down.js"></script>
    <script type="module" src="../imports/box-info.js"></script>
    <script type="module" src="../imports/check-box.js"></script>
    
</body>

</html>