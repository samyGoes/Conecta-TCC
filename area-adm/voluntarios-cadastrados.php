<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="css/estilo-voluntarios-cadastrados.css">
    <title>ADM</title>
</head>

<body>


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
        <div class="main-conteudo-container-titulo">
            <h1>EDITAR PERFIL</h1>
            <p>Digite as novas informações que deseja inserir</p>
        </div>



        <div class="table">
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
                            $listaVoluntario = VoluntarioDao::listar();
                        } catch (Exception $e) {
                            echo $e->getMessage();
                        }
                        ?>
                        <tr>
                            <?php foreach ($listaVoluntario as $voluntario) { ?>
                                <td> <input type="checkbox" name="checkbox" id="checkbox"> </td>
                                <td> <?php echo $voluntario['codVoluntario']; ?> </td>
                                <td>
                                    <div class="box-img-lista">
                                        <img src="img/user-cinza.png" alt="">
                                    </div>
                                </td>
                                <td><?php echo $voluntario['nomeVoluntario']; ?></td>
                                <td> <?php echo $voluntario['emailVoluntario']; ?> </td>
                                <td> <?php echo $voluntario['cidadeVoluntario']; ?> </td>
                                <td> <?php echo $voluntario['estadoVoluntario']; ?> </td>
                                <td> <?php echo $voluntario['paisVoluntario']; ?> </td>
                        </tr>
                    <?php
                            }
                    ?>
                    </tbody>
                </table>
            </div>
        </div>


    </main>
    <script src="js/script.js"></script>
    <script src="../area-voluntario/js/script.js"></script>
</body>

</html>