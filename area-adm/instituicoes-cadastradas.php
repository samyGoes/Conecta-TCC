<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="css/estili-instituicoes-cadastradas.css">
    <title>ADM</title>
</head>

    <body>
        <header>
            <nav>
                <div class="nav-lateral">
                    <div class="nav-lateral-sessao-1">
                        <div class="fundo">
                            <div class="nav-box-img">
                                <img src="img/user.png" alt="">
                            </div>
                            <p> Olá, adm </p>
                        </div>

                        <a class="nav-topicos" id="nav-topicos-dash" href=""> <i class="fa-solid fa-chart-line"></i> Dashboard </a>
                        <a class="nav-topicos" href=""> <i id="nav-icones" class="fa-solid fa-hand-holding-heart"></i>Instituições </a>
                        <a class="nav-topicos" href=""> <i class="fa-sharp fa-solid fa-heart"></i> Causas </a>
                        <a class="nav-topicos" href=""> <i id="nav-icones" class="fa-solid fa-briefcase"></i> Vagas </a>
                        <a class="nav-topicos" href=""> <i id="nav-icones" class="fa-solid fa-hand"></i> Voluntários </a>
                    </div>

                    <div class="nav-lateral-sessao-2">

                        <a href="logout.php"> <button class="botao-sair"> <i class="fa-solid fa-door-open"></i> </button></a>
                    </div>
                </div>
            </nav>
        </header>

        <main>


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
                            } catch(Exception $e) {
                                echo $e->getMessage();
                            }
                        ?>
                            <tr>
                            <?php foreach($listaInstituicao as $instituicao){ ?>   
                                <td> <input type="checkbox" name="checkbox" id="checkbox"> </td>
                                <td> <?php echo $instituicao['codInstituicao'];?> </td>
                                <td>
                                    <div class="box-img-lista">
                                        <img src="img/user-cinza.png" alt="">
                                    </div>                        
                                </td>
                                <td><?php echo $instituicao['nomeInstituicao'];?></td>
                                <td> <?php echo $instituicao['emailInstituicao'];?> </td>
                                <td> <?php echo $instituicao['cidadeInstituicao'];?> </td>
                                <td> <?php echo $instituicao['estadoInstituicao'];?> </td>
                                <td> <?php echo $instituicao['paisInstituicao'];?> </td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </main>

        <script src="js/script.js"></script>
    </body>
</html>