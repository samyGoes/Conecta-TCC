<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/estilo.css" text-type="text/css">
        <title> Voluntários </title>
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
                    <li> <i class="fa-solid fa-house" id="topicos-icon-fixo"></i> <a href="" class="cabecalho-menu-item">Início</a> <div class="box-nav-img"> <img src="img/mao-nav.png"></div></li>
                    <li> <i class="fa-solid fa-person" id="topicos-icon-fixo"></i> <a href="" class="cabecalho-menu-item">voluntários</a> <div class="box-nav-img"> <img src="img/mao-nav.png"></div> </li>
                    <li> <i class="fa-sharp fa-solid fa-heart" id="topicos-icon-fixo"></i> <a href="" class="cabecalho-menu-item">instituições</a> <div class="box-nav-img"> <img src="img/mao-nav.png"></div> </li>
                    <li> <i class="fa-solid fa-briefcase" id="topicos-icon-fixo"></i> <a href="" class="cabecalho-menu-item">Vagas</a> <div class="box-nav-img"> <img src="img/mao-nav.png"></div> </li>
                    <li> <i class="fa fa-file-text" aria-hidden="true" id="topicos-icon-fixo"></i> <a href="" class="cabecalho-menu-item">sobre nós</a> <div class="box-nav-img"> <img src="img/mao-nav.png"></div> </li>
                    <li> <i class="fa-solid fa-phone" id="topicos-icon-fixo"></i> <a href="" class="cabecalho-menu-item">contato</a> <div class="box-nav-img"> <img src="img/mao-nav.png"></div> </li>  
                </ul>
               
                <ul class="topicos-sessao-login">
                    <li class="topicos-sessao-login-linha"><a href="" class="cabecalho-menu-item" id="cabecalho-menu-item-login">
                        <i class="fa-solid fa-user" id="topicos-icon-fixo-dif"></i> login </a> <span id="nav-seta-sub-topicos"> 🢓 </span> <div class="box-nav-img"> <img src="img/mao-nav.png"></div> </i>
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






        <!-- CONTEUDO  -->
        <div class="container-titulo">
            <h1 class="titulo"> Voluntários </h1>
            <p class="frase"> Aqui você verá os perfis de todos os voluntários disponíveis. Você também pode filtrar para que encontre o 
                voluntário ideal para você. Confira os filtros abaixo:
            </p>
        </div>

        <div class="filtros">
            <button class="filtro-causas"> CAUSAS </button>
            <div class="box-causas">
            <?php 
                for($i = 1; $i <= 6; $i++)
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

            <div class="box-select">
                <label class="filtro-cidade" for="estados"> Estado: </label>
                <select class="select-estados" name="estados" id="estados">
                    <option value=""> Selecione um estado </option>
                </select>
            </div>  

            <div class="box-select">
                <label class="filtro-cidade" for="cidades"> Cidade: </label>
                <select class="select-cidade" name="cidades" id="cidades">
                    <option value=""> Selecione uma cidade </option>
                </select>
            </div>           
        </div>
     
        <table class="lista-voluntario">
            <tbody>
            <?php 
                for($i = 1; $i <=5; $i++)
                {
            ?>
                    <tr class="lista-voluntario-linha">
                        <td> <div class="box-img"> <img src="img/user2.png"> </div> </td>
                        <td> Sâmily goes </td>
                        <td> 20 anos </td>
                        <td> smilygoes@gmail.com </td>
                        <td>São Paulo - SP, Brasil </td>
                    </tr>             
            <?php
                }
            ?>
            </tbody>
        </table>



        
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
            <div class="medias-sociais">
                <a href=""><img src="img/youtube.png" alt=""></a>
                <a href=""><img src="img/instagram.png" alt=""></a>
                <a href=""><img src="img/twitter.png" alt=""></a>
                <a href=""><img src="img/github.png" alt=""></a>
            </div>
        </footer>


        <!-- <script type="text/javascript" src="js/estados-cidades.json"></script> -->
        <script src="js/script.js"></script>
        <script type="text/javascript" src="jquery-1.7.1.min.js"></script>
        <script src="js/select.js"></script>
    </body>
</html>