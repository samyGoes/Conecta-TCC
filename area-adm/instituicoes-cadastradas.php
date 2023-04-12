<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="css/estilo-instituicoes-cadastradas.css">
    <title>ADM</title>
</head>

<body>
    <header>
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
                    <li> <i class="fa-solid fa-person" id="topicos-icon-fixo"></i> <a href="voluntarios.php" class="cabecalho-menu-item">voluntários</a></li>
                    <li> <i class="fa-sharp fa-solid fa-heart" id="topicos-icon-fixo"></i> <a href="../instituicoes/instituicoes.php" class="cabecalho-menu-item">instituições</a></li>
                    <li> <i class="fa-solid fa-briefcase" id="topicos-icon-fixo"></i> <a href="../vagas/vagas.php" class="cabecalho-menu-item">Vagas</a></li>
                    <li> <i class="fa fa-file-text" aria-hidden="true" id="topicos-icon-fixo"></i> <a href="../sobre-nos/sobre-nos.php" class="cabecalho-menu-item">sobre nós</a></li>
                    <li> <i class="fa-solid fa-phone" id="topicos-icon-fixo"></i> <a href="../contato/contato.php" class="cabecalho-menu-item">contato</a></li>
                </ul>

                <ul class="topicos-sessao-login">
                    <li class="topicos-sessao-login-linha"><a href="../form-login.php" class="cabecalho-menu-item" id="cabecalho-menu-item-login">
                            <i class="fa-solid fa-user" id="topicos-icon-fixo-dif"></i> login </a> <span id="nav-seta-sub-topicos"> 🢓 </span></i>
                        <ul class="sub-topicos">
                            <li> <a href="perfil-voluntario.php"> Meu Perfil </a></li>
                            <li> <a href=""> Vagas </a> </li>
                            <li> <a href="editar-perfil.php"> Configurações </a></li>
                            <li> <a href="logout.php"> Sair </a></li>
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
                    <a href=""> <i class="fa-solid fa-pen-to-square"></i> <span class="nav-lateral-topico"> Editar Perfil
                        </span></a>
                </div>

                <div class="nav-lateral-box-icon">
                    <a href=""> <i class="fa-sharp fa-solid fa-heart"></i> <span class="nav-lateral-topico"> Cadastrar
                            Causas </span></a>
                </div>

                <div class="nav-lateral-box-icon">
                    <a href=""> <i class="fa-solid fa-wrench"></i> <span class="nav-lateral-topico"> Cadastrar Habilidades
                        </span></a>
                </div>
                <div class="nav-lateral-box-icon">
                    <a href=""> <i class="fa-solid fa-newspaper"></i> <span class="nav-lateral-topico"> Cadastrar Vagas
                        </span></a>
                </div>

                <div class="nav-lateral-box-icon">
                    <a href=""> <i class="fa-solid fa-pen-to-square"></i> <span class="nav-lateral-topico"> Editar Vagas
                        </span></a>
                </div>

                <div class="nav-lateral-box-icon">
                    <a href=""> <i class="fa-solid fa-gear"></i> <span class="nav-lateral-topico"> Gerenciar Vagas
                        </span></a>
                </div>

                <div class="nav-lateral-box-icon">
                    <a href=""> <i class="fa-solid fa-key"></i> <span class="nav-lateral-topico">Trocar Senha </span></a>
                </div>

                <div class="nav-lateral-box-icon">
                    <a href=""> <i class="fa-solid fa-xmark" id="nav-lateral-icon-excluir"></i> <span class="nav-lateral-topico">Excluir Conta </span></a>
                </div>
            </div>

            <div class="nav-lateral-sessao-dois">
                <div class="nav-lateral-box-icon">
                    <a href=""> <i class="fa-solid fa-door-open" id="nav-lateral-icon-sair"></i> <span class="nav-lateral-topico"> Sair </span></a>
                </div>
            </div>
        </nav>







        <!-- CONTEUDO  -->
        <main class="main-conteudo">
            <!-- COLOCAR TODO O CONTEÚDO DENTRO DESSA SESSÃO -->


            <h1>Instituições Cadastradas</h1>


            <div class="table-responsive">
                <div class="funcoes">
                    <div class="funcoes-sessao-1">
                        <span>Selecionar todos</span>
                        <input type="checkbox" name="selecionar-todos" id="selecionar-todos">
                        <i class="fa-solid fa-circle-xmark" id="icone-x"></i>
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
                            <th> Foto </th>
                            <th> Nome </th>
                            <th> Email </th>
                            <th> Cidade </th>
                            <th> UF</th>
                            <th> País </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        require_once 'global.php';
                        try {
                            $listaInstituicao = ListarInstituicoes::listar();
                        } catch (Exception $e) {
                            echo $e->getMessage();
                        }
                        ?>
                        <tr>
                            <?php foreach ($listaInstituicao as $instituicao) { ?>
                                <td> <input type="checkbox" name="checkbox" id="checkbox"> </td>
                                <td> <?php echo $instituicao['codInstituicao']; ?> </td>
                                <td>
                                    <div class="box-img-lista">
                                        <img src="img/user-cinza.png" alt="">
                                    </div>
                                </td>
                                <td><?php echo $instituicao['nomeInstituicao']; ?></td>
                                <td> <?php echo $instituicao['emailInstituicao']; ?> </td>
                                <td> <?php echo $instituicao['cidadeInstituicao']; ?> </td>
                                <td> <?php echo $instituicao['estadoInstituicao']; ?> </td>
                                <td> <?php echo $instituicao['paisInstituicao']; ?> </td>
                        </tr>
                    <?php
                            }
                    ?>
                    </tbody>
                </table>
            </div>

            <h1>Instituições Cadastradas</h1>


            <div class="table-responsive">
                <div class="funcoes">
                    <div class="funcoes-sessao-1">
                        <span>Selecionar todos</span>
                        <input type="checkbox" name="selecionar-todos" id="selecionar-todos">
                        <i class="fa-solid fa-circle-xmark" id="icone-x"></i>
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
                            <th> Foto </th>
                            <th> Nome </th>
                            <th> Email </th>
                            <th> Cidade </th>
                            <th> UF</th>
                            <th> País </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        require_once 'global.php';
                        try {
                            $listaInstituicao = ListarInstituicoes::listar();
                        } catch (Exception $e) {
                            echo $e->getMessage();
                        }
                        ?>
                        <tr>
                            <?php foreach ($listaInstituicao as $instituicao) { ?>
                                <td> <input type="checkbox" name="checkbox" id="checkbox"> </td>
                                <td> <?php echo $instituicao['codInstituicao']; ?> </td>
                                <td>
                                    <div class="box-img-lista">
                                        <img src="img/user-cinza.png" alt="">
                                    </div>
                                </td>
                                <td><?php echo $instituicao['nomeInstituicao']; ?></td>
                                <td> <?php echo $instituicao['emailInstituicao']; ?> </td>
                                <td> <?php echo $instituicao['cidadeInstituicao']; ?> </td>
                                <td> <?php echo $instituicao['estadoInstituicao']; ?> </td>
                                <td> <?php echo $instituicao['paisInstituicao']; ?> </td>
                        </tr>
                    <?php
                            }
                    ?>
                    </tbody>
                </table>
            </div>


        </main>



    </header>

    <script src="js/script.js"></script>
</body>

</html>