<?php include "verifica-logado.php";?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/estilo.css">
         <!-- LINK ICONES -->
         <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <title>Document</title>
    </head>
    <body>

    
        <!-- NAV LATERAL -->
        <nav class="nav-lateral">
            <div class="nav-lateral-sessao-1">  
                <div class="box-icon">
                    <i class="fa-solid fa-chart-line"></i><a class="nav-topicos" id="nav-topicos-dash" href="">  Dashboard </a>
                </div>       
               
                <a class="nav-topicos" href=""> <i id="nav-icones" class="fa-sharp fa-solid fa-heart"></i> Instituições </a>
                <a class="nav-topicos" href=""> <i id="nav-icones" class="fa-solid fa-person"></i> Voluntários </a>
                <a class="nav-topicos" href=""> <i id="nav-icones" class="fa-solid fa-briefcase"></i> <p class="p-topicos"> Vagas </p></a>
            </div>

            <p class="aaaa"> AAAAA </p>
            <div class="nav-lateral-sessao-2">
                <a href="logout.php"> <button class="botao-sair"> SAIR </button></a>
            </div>      
        </nav>



        <!-- CORPO  -->
        <main class="main">
            <div class="conteudo-principal"> aaaaaaaa</div>
          


            
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
        </main>




        <script>
            const botao = document.querySelector(".aaaa");
            const nav = document.querySelector(".nav-lateral");
            const topicos = document.querySelector(".p-topicos");
            const main = document.querySelector(".main");

            botao.addEventListener("click", function()
            {
                if(nav.style.width == "17rem")
                {
                    nav.style.width = "5rem";
                    main.style.marginLeft = "5rem";
                    if(nav.style.width == "5rem")
                    {
                        topicos.style.display = "none";
                    }
                }
                else
                {
                    nav.style.width = "17rem";
                    main.style.marginLeft = "17rem";
                }
            });

        </script>
        <!-- <script src="js/script.js"></script> -->
    </body>
</html>