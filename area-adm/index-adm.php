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
        <div class="nav-lateral">
            <div class="nav-lateral-sessao-1">
                <div class="fundo">
                    <div class="nav-box-img">
                        <img src="img/user.png" alt="">
                    </div>       
                    <p> Olá, adm </p>
                </div>
                
                <a class="nav-topicos" id="nav-topicos-dash" href=""> <i class="fa-solid fa-chart-line"></i> Dashboard </a>
                <a class="nav-topicos" href=""> <i id="nav-icones" class="fa-sharp fa-solid fa-heart"></i> Instituições </a>
                <a class="nav-topicos" href=""> <i id="nav-icones" class="fa-solid fa-person"></i> Voluntários </a>
                <a class="nav-topicos" href=""> <i id="nav-icones" class="fa-solid fa-briefcase"></i> Vagas </a>
            </div>

            <div class="nav-lateral-sessao-2">
                <a href="logout.php"> <button class="botao-sair"> SAIR </button></a>
            </div>      
        </div>



        <!-- CORPO  -->
        <main>

            <div class="conteudo-principal">
                <div class="card">
                    <div class="titulo-card">
                        <i id="nav-icones" class="fa-solid fa-person"></i><p>Total de Voluntários</p> 
                    </div>
                    <div class="card-dados">
                        <p> 12.000 </p>
                    </div>
                </div>

                <div class="card">
                    <div class="titulo-card">
                        <i id="nav-icones" class="fa-solid fa-person"></i><p>Total de Voluntários</p> 
                    </div>
                    <div class="card-dados">
                        <p> 12.000 </p>
                    </div>
                </div>


                <div class="card">
                    <div class="titulo-card">
                        <i id="nav-icones" class="fa-solid fa-person"></i><p>Total de Voluntários</p> 
                    </div>
                    <div class="card-dados">
                        <p> 12.000 </p>
                    </div>
                </div>

            </div>
          
        </main>




        <!-- <script src="js/script.js"></script> -->
    </body>
</html>