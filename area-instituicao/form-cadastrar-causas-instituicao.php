<?php include "../auth/verifica-logado.php"; ?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/estilo-arquivo-modelo.css">
    <link rel="stylesheet" href="css/estilo-causasCadastradas-instituicao.css">
    <link rel="stylesheet" href="css/cadastrarCausas.css">
    <!-- LINK ICONES -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Document</title>
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
                <li> <i class="fa-solid fa-house" id="topicos-icon-fixo"></i> <a href="../index.php" class="cabecalho-menu-item">Início</a></li>
                <li> <i class="fa-solid fa-person" id="topicos-icon-fixo"></i> <a href="../voluntarios/voluntarios.php" class="cabecalho-menu-item">voluntários</a></li>
                <li> <i class="fa-sharp fa-solid fa-heart" id="topicos-icon-fixo"></i> <a href="../instituicoes/instituicoes.php" class="cabecalho-menu-item">instituições</a></li>
                <li> <i class="fa-solid fa-briefcase" id="topicos-icon-fixo"></i> <a href="../vagas/vagas.php" class="cabecalho-menu-item">Vagas</a></li>
                <li> <i class="fa fa-file-text" aria-hidden="true" id="topicos-icon-fixo"></i> <a href="../sobre-nos/sobre-nos.php" class="cabecalho-menu-item">sobre nós</a></li>
                <li> <i class="fa-solid fa-phone" id="topicos-icon-fixo"></i> <a href="../contato/contato.php" class="cabecalho-menu-item">contato</a></li>
            </ul>

            <ul class="topicos-sessao-login">
                <li class="topicos-sessao-login-linha"><a href="../form-login.php" class="cabecalho-menu-item" id="cabecalho-menu-item-login">
                        <i class="fa-solid fa-user" id="topicos-icon-fixo-dif"></i> login </a> <span id="nav-seta-sub-topicos"> 🢓 </span></i>
                    <ul class="sub-topicos">
                        <li> <a href="perfil-instituicao.php"> Meu Perfil </a></li>
                        <li> <a href="editar-excluir-vagas/"> Vagas </a> </li>
                        <li> <a href="editar-perfil-instituicao.php"> Configurações </a></li>
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
                <a href="form-editar-perfil-instituicao.php"> <i class="fa-solid fa-pen-to-square"></i> <span class="nav-lateral-topico"> Editar Perfil
                    </span></a>
            </div>

            <div class="nav-lateral-box-icon">
                <a href="form-cadastrar-causas-instituicao.php"> <i class="fa-sharp fa-solid fa-heart"></i> <span class="nav-lateral-topico"> Cadastrar
                        Causas </span></a>
            </div>

            <div class="nav-lateral-box-icon">
                <a href="form-cadastrar-habilidades-instituicao.php"> <i class="fa-solid fa-wrench"></i> <span class="nav-lateral-topico"> Cadastrar Habilidades
                    </span></a>
            </div>
            <div class="nav-lateral-box-icon">
                <a href="form-cadastrar-vagas-instituicao.php"> <i class="fa-solid fa-newspaper"></i> <span class="nav-lateral-topico"> Cadastrar Vagas
                    </span></a>
            </div>

            <div class="nav-lateral-box-icon">
                <a href="editar-excluir-vagas/editar-vagas-instituicao.php"> <i class="fa-solid fa-pen-to-square"></i> <span class="nav-lateral-topico"> Editar Vagas
                    </span></a>
            </div>

            <div class="nav-lateral-box-icon">
                <a href="gerenciar-vagas/dashboard-instituicao.php"> <i class="fa-solid fa-gear"></i> <span class="nav-lateral-topico"> Gerenciar Vagas
                    </span></a>
            </div>

            <div class="nav-lateral-box-icon">
                <a href="form-trocar-senha-instituicao.php"> <i class="fa-solid fa-key"></i> <span class="nav-lateral-topico">Trocar Senha </span></a>
            </div>

            <div class="nav-lateral-box-icon">
                <a href="form-excluir-conta-instituicao.php"> <i class="fa-solid fa-xmark" id="nav-lateral-icon-excluir"></i>
                    <span class="nav-lateral-topico">Excluir Conta </span></a>
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
            <h1>CADASTRAR CAUSAS</h1>
            <p>Cadastre as causas para quais você esteja auxiliando. Você também pode editá-las ou exclui-las</p>
        </div>


     
        <div class="card">
            <div class="card-1">
                <p>Escreva o nome da causa que deseja cadastrar</p>
                <div class="card-cadastrar">
                    <form class="card-form" action="cadastrar-causas.php" method="POST">
                        <div class="input-box">
                            <label for="" id="label">Nome</label>
                            <input type="text" name="nome" id="nome" placeholder="Digite a causa">
                        </div>
                        <div class="continue-button">
                            <button type="submit">CADASTRAR</button>
                        </div>
                    </form>
                </div>
            </div>
           
            <div class="card-2">
                <p>Aqui está a lista de todas as causas cadastradas</p>
                <div class="table">
                    <div class="table-responsive">
                        <div class="funcoes">
                            <div class="funcoes-sessao-1">
                                <span>Selecionar todos</span>
                                <input type="checkbox" name="selecionar-todos" id="selecionar-todos">
                            </div>
                            <div class="funcoes-sessao-2">
                                <i class="fa-regular fa-pen-to-square" id="icone-lapis"></i>
                                <i class="fa-solid fa-trash-can" id="icone-lixo"></i>
                            </div>
                        </div>
                        <table>
                            <thead>
                                <tr>
                                    <th> </th>
                                    <th>ID</th>
                                    <th>Causas</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                require_once 'global.php';
                                try {
                                    $listaCausas = CategoriaServicoDao::listar($_SESSION['codUsuario']);
                                } catch (Exception $e) {
                                    echo $e->getMessage();
                                }
                                ?>
                                <tr>
                                    <?php foreach ($listaCausas as $causas) { ?>
                                        <td> <input type="checkbox" name="checkbox" id="checkbox"> </td>
                                        <td>
                                            <?php echo $causas['codCategoriaServico']; ?>
                                        </td>
                                        <td>
                                            <?php echo $causas['nomeCategoria']; ?>
                                        </td>
                                </tr>
                            <?php
                                    }
                            ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

           

        </div>
        <!-- COLOCAR TODO O CONTEÚDO DENTRO DESSA SESSÃO -->
    </main>







    <!-- NAVS  -->
    <script src="js/script.js"></script>
    <!-- CHECKBOX -->
    <script src="js/checkbox.js"></script>
</body>

</html>