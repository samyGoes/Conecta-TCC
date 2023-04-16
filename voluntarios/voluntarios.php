<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../instituicoes/css/estilo.css" text-type="text/css">
        <link rel="stylesheet" href="../css/estilo-navbar-rodape.css">
         <!-- LINK ICONES -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <title> Instituições </title>
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
                    <li> <i class="fa-sharp fa-solid fa-heart" id="topicos-icon-fixo"></i> <a href="instituicoes.php" class="cabecalho-menu-item">instituições</a></li>
                    <li> <i class="fa-solid fa-briefcase" id="topicos-icon-fixo"></i> <a href="../vagas/vagas.php" class="cabecalho-menu-item">Vagas</a></li>
                    <li> <i class="fa fa-file-text" aria-hidden="true" id="topicos-icon-fixo"></i> <a href="../sobre-nos/sobre-nos.php" class="cabecalho-menu-item">sobre nós</a></li>
                    <li> <i class="fa-solid fa-phone" id="topicos-icon-fixo"></i> <a href="../contato/contato.php" class="cabecalho-menu-item">contato</a></li>  
                </ul>
               
                <ul class="topicos-sessao-login">
                    <li class="topicos-sessao-login-linha"><a href="../form-login.php" class="cabecalho-menu-item" id="cabecalho-menu-item-login">
                        <i class="fa-solid fa-user" id="topicos-icon-fixo-dif"></i> login </a> <span id="nav-seta-sub-topicos"> 🢓 </span></i>
                        <ul class="sub-topicos">
                            <li> <a href="../area-instituicao/perfil-instituicao.php"> Meu Perfil </a></li>
                            <li> <a href=""> Vagas </a> </li>
                            <li> <a href="editar-perfil.php"> Configurações </a></li>
                            <li> <a href="logout.php"> Sair </a></li>
                        </ul>
                    </li>
                </ul>
            </ul>
        </nav>






        <!-- PESQUISA -->
        <div class="pesquisa-instituicao">
            <input type="text" placeholder="Pesquisar...">
        </div>



        <!-- CONTEUDO  -->
        <div class="container-titulo">
            <h1 class="titulo"> Voluntários </h1>
            <p class="frase"> 
                Aqui você verá os perfis de todos os voluntários disponíveis. Você também pode 
                filtrar para que encontre o voluntário ideal ou pesquisar pelo nome do voluntário. 
                Confira os filtros abaixo:
            </p>
        </div>





        <!-- FILTROS -->
        <form class="form-filtro" method="POST" action="">
            <!-- CAUSAS -->
            <div class="box-filtro-causas">
                <div class="filtro-causas" id="filtro-causas"> CAUSAS </div>
                <div class="box-causas" id="box-causas">
                    <?php 
                        for($i = 1; $i <= 10; $i++)
                        {
                    ?>      
                            <div class="box-causas-checkbox">
                                <input type="checkbox" name="causas" id="causas"> 
                                <label for="causas"> Mulheres </label>
                            </div>
                        
                    <?php
                        }
                    ?>  
                </div>
            </div>
            
            <!-- SELECT ESTADOS E CIDADES -->
            <select class="select-estados" name="estados" id="estados">
                <option selected disabled> Selecione o estado... </option>
            </select>
    
            <select class="select-cidades" name="cidades" id="cidades">
                <option selected disabled> Selecione a cidade... </option>
            </select>
        </form>           



    


     

        <!-- LISTA DE INSTITUIÇÕES CADASTRADAS -->
        <div class="lista-voluntario">
            <?php
                require_once 'global.php';
                try {
                    $listaVoluntario = VoluntarioDao::listar();
                } catch (Exception $e) {
                    echo $e->getMessage();
                }
            ?>
                
            <?php 
                foreach ($listaVoluntario as $voluntario) 
                {
            ?>
                    <div class="lista-voluntario-linha">
                        <div id="localizacao"><i class="fa-solid fa-location-dot"></i><p> <?php echo $voluntario['cidadeVoluntario'].","; ?> <span class="estado-pais"> <?php echo $voluntario['estadoVoluntario']."-".$voluntario['paisVoluntario']; ?> </span></p></div>   

                        <div class="lista-item" id="lista-item-nome"> 

                            <a href="../area-voluntario/perfil-voluntario.php">
                            <div class="box-img"> <img src="../area-voluntario/<?php echo $voluntario['fotoVoluntario']; ?>"> </div> 
                            </a>  
                            <div class="lista-item-sessao-1">
                                <a href=""> <p class="nome">  <?php echo $voluntario['nomeVoluntario']; ?> </p> </a>
                                <a href=""> <p class="email"> <?php echo $voluntario['emailVoluntario']; ?> </p> </a>
                            </div>  

                            <div class="lista-item-sessao-2">
                                <a href=""> <p class="descricao"> 
                                    There are many variations of passages of Lorem Ipsum available, 
                                    but the majority have suffered alteration in some form, by injected humour, or randomised 
                                    words which don't look even slightly believable.  
                                </p> </a>
                            </div>

                        </div>     
                        <div class="lista-item-2">
                            <?php 
                                for($i = 1; $i <= 4; $i++)
                                {
                            ?>     
                                    <a href=""><button id="tipo-causas-1">mulheres</button></a>
                            <?php
                                }
                            ?>
                        </div>             
                    </div>                 
            <?php
                }
            ?>
        </div>
       



        
        <!-- RODAPÉ -->
        <footer>
            <div class="container-footer">
                <div class="footer-sessao" id="footer-sessao-1">
                    <div class="footer-col" id="footer-col-adm">
                        <h5>Adm</h5>
                        <ul>
                            <a href="login-adm.php"><li>Login</li></a>
                        </ul>
                    </div>
                    <div class="footer-col">
                        <h5>Contato</h5>
                        <ul>
                            <li>Tel: (11)0000-0000</li>
                            <li>Email: conecta@gmail.com</li>
                        </ul>
                    </div>
                </div>
               <div class="footer-sessao" id="footer-sessao-2">
                    <div class="footer-col" id="footer-col-causas">
                        <h5>Causas em Destaque</h5>
                        <ul id="lista-causas">
                            <div class="col">
                                <li>- Fome</li>
                                <li>- Criaças</li>
                                <li>- Animais</li>
                            </div>
                            <div class="col" id="col-ultima">
                                <li>- Moradores de rua</li>
                                <li>- LGBTQIAP+</li>
                                <li>- Mulheres</li>
                            </div>
                            
                        </ul>
                    </div>
                    <div class="footer-col" id="footer-col-sobre">
                        <h5>Sobre Nós</h5>
                        <ul>
                            <li>Nos conheca um pouco <br> mais.</li>
                        </ul>
                    </div>
               </div>
                
            </div>
            <div class="midias-sociais">
                <div class="box-icon">
                    <i class="fa-brands fa-youtube"></i>
                </div> 
                <div class="box-icon">
                    <i class="fa-brands fa-instagram"></i>
                </div> 
                <div class="box-icon">
                    <i class="fa-brands fa-twitter"></i>
                </div> 
                <div class="box-icon-git">
                    <i class="fa-brands fa-github" id="icon-git"></i>
                </div>
            </div>
        </footer>





        <!-- CRÉDITOS -->
        <!-- <a href="https://www.flaticon.com/free-icons/arrow" title="arrow icons">Arrow icons created by th studio - Flaticon</a> -->

        <!-- SCRIPTS -->
        <script src="js/script.js"></script>
    </body>
</html>