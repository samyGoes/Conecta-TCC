<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="css/arquivo-modelo.css">
    <link rel="stylesheet" href="css/estilo-habilidades-cadastradas.css">
    <title>ADM</title>
</head>

<body>

    <!-- NAV LATERAL -->
    <nav class="nav-lateral">
        <div class="nav-lateral-sessao-um">
            <i class="fa-solid fa-bars" id="nav-lateral-icon-lista"></i>
            <!-- <div class="user">
                <div class="box-img-user">
                    <img src="./img/user-branco.png" width="100px" height="100px" alt="">
                </div>

                <p>Olá, ADM!</p>
            </div> -->

            <div class="nav-lateral-box-icon">
                <a href="dashboard.php"> <i class="fa-solid fa-chart-line"></i> <span class="nav-lateral-topico"> Dashboard
                    </span></a>
            </div>

            <div class="nav-lateral-box-icon">
                <a href="instituicoes-cadastradas.php"> <i class="fa-solid fa-hand-holding-heart"></i> <span class="nav-lateral-topico"> Instituições
                    </span></a>
            </div>

            <div class="nav-lateral-box-icon">
                <a href="habilidades-cadastradas.php"> <i class="fa-solid fa-wrench"></i> <span class="nav-lateral-topico">
                        Habilidades </span></a>
            </div>

            <div class="nav-lateral-box-icon">
                <a href="causas-cadastradas.php"> <i class="fa-sharp fa-solid fa-heart"></i> <span class="nav-lateral-topico"> Causas
                    </span></a>
            </div>
            <div class="nav-lateral-box-icon">
                <a href="vagas-cadastradas.php"> <i class="fa-solid fa-briefcase"></i> <span class="nav-lateral-topico"> Vagas
                    </span></a>
            </div>

            <div class="nav-lateral-box-icon">
                <a href="voluntarios-cadastrados.php"> <i class="fa-solid fa-person"></i> <span class="nav-lateral-topico"> Voluntários
                    </span></a>
            </div>
        </div>

        <div class="nav-lateral-sessao-dois">
            <div class="nav-lateral-box-icon">
                <a href="logout.php"> <i class="fa-solid fa-door-open" id="nav-lateral-icon-sair"></i> <span class="nav-lateral-topico"> Sair </span></a>
            </div>
        </div>
    </nav>



    <!-- TITULO CONFIGURAÇÕES DO PERFIL -->
    <div class="container-titulo-configuracoes">
        <div class="box-img-logo-conecta">
            <img src="../img/logo-conecta-variante.png" alt="">
        </div>
        <!-- <h1> Configurações do Perfil </h1> -->
        <ul class="topicos-sessao-login">
            <li class="topicos-sessao-login-linha">
                <div class="box-topicos-sessao-login-linha">
                    <?php        

                        require_once 'global.php';
                        include 'diretorios-notificacao.php';
                        try 
                        {
                            //$idInstituicaoLogada = $_SESSION['codUsuario'];
                            $notificacoes = AdmDao::notificacoes();
                            //$novaNotificacao = InstituicaoDao::novaNotificacao($idInstituicaoLogada);
                            //print_r($links);
                        } 
                        catch (Exception $e) 
                        {
                            echo $e->getMessage();
                        }

                        if(empty($notificacoes)) 
                        {
                        ?>
                                <div class="box-sininho">
                                    <i id="nav-sininho-sub-topicos" class="fa-solid fa-bell"></i>
                                </div>       
                                <ul class="sub-topicos-sininho sem-resultado">
                                    <li> 
                                        <div class="sub-topicos-sininho-linha sem-resultado">
                                            <p class="sub-topicos-sininho-linha-sem-resultado"> Sem notificações...</p>
                                        </div>                                          
                                    </li>
                                </ul>
                        <?php

                        }
                        else
                        {
                        ?>
                            <div class="box-sininho">
                                <div class="nova-notificacao-bolinha"></div>
                                <i id="nav-sininho-sub-topicos" class="fa-solid fa-bell"></i>                                         
                            </div>

                            <ul class="sub-topicos-sininho">
                        <?php
                                foreach($notificacoes as $linha)
                                {
                                    $primeiraIteracao = true; 
                                    foreach($linha as $titulo => $frase)
                                    {
                                        if($primeiraIteracao)
                                        {                                     
                                            $titulos = array_keys($linha); // Obter as chaves do array $linha
                                            $primeiroTitulo = $titulos[0]; // Obter o primeiro título
                                        
                                            $frases = array_values($linha); // Obter os valores do array $linha
                                            $primeiraFrase = $frases[0];
                        ?>                                           
                                            <li> 
                                                <div class="sub-topicos-sininho-linha">
                                                    <a class="sub-topicos-sininho-linha-titulo" href="<?php echo diretorios($linha['arquivo']) . $linha['arquivo'] ?>"> <?php echo $primeiroTitulo; ?> </a>
                                                    <a class="sub-topicos-sininho-linha-frase" href="<?php echo diretorios($linha['arquivo']) . $linha['arquivo'] ?>"> <?php echo $primeiraFrase; ?> </a>
                                                </div>                                          
                                            </li>                     
                        <?php
                                            $primeiraIteracao = false;
                                        }
                                    }
                                }
                        ?>
                            </ul>
                        <?php
                        }
                        ?>
                    <p class="cabecalho-menu-item" id="cabecalho-menu-item-usuario">
                        Olá, adm <span id="nav-seta-sub-topicos"> 🢓 </span>
                    </p>
                </div>

                <ul class="sub-topicos">
                    <li> <a href="../auth/redirecionamento-perfil-usuario.php"> Meu Perfil </a></li>
                    <li> <a href=""> Vagas </a> </li>
                    <li> <a href="../auth/configuracao-perfil-usuario.php"> Configurações </a></li>
                    <li> <a href="../auth/logout.php"> Sair </a></li>
                </ul>
            </li>
        </ul>
    </div>





    <!-- MODAL CADASTRO -->
    <?php

    if (isset($_GET['cadastro'])) {
        if ($_GET['cadastro'] === 'sucesso') {
            echo ' <script>
                        // cria o elemento HTML do modal
                        const modal = document.createElement("div");
                        modal.id = "modal";
                        modal.innerHTML = `
                            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"
                            integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A=="
                            crossorigin="anonymous" referrerpolicy="no-referrer" />
                            <div id="modal-content">
                                <i id="icone-fechar-modal" class="fa-solid fa-xmark"></i>
                                <p class="modal-titulo-cadastro"> Cadastro realizado com sucesso!<i class="fa-sharp fa-solid fa-circle-check"></i></p>
                                <p class="modal-frase-cadastro"> Confira na tabela todas as habilidades cadastradas. </p>
                            </div>
                            `;

                        // adiciona o modal como filho do body (ou de outro elemento HTML)
                        document.body.appendChild(modal);

                        //adiciona a tag style do modal
                        const style = document.createElement("style");
                        const iconFechaModal = document.querySelector("#icone-fechar-modal");

                        style.innerHTML = `
                            #modal 
                            {
                                position: fixed;
                                bottom: 20px;
                                right: -600px;
                                z-index: 9999;
                                transition: all 1s ease;
                                border: #4567a5 solid 1px;
                                border-radius: 0.5rem;
                                background-color: #fff;
                                padding: 1.3rem;
                                max-width: 24rem;
                            }

                            #modal-content 
                            {
                                display: flex;
                                flex-direction: column;
                                gap: 0.4rem;
                                
                                position: relative;
                            }

                            #icone-fechar-modal
                            {
                                position: absolute;
                                right: -9px;
                                top: -11px;
                                color: #525252;
                                cursor: pointer;
                                transition: all 0.5s ease;
                            }

                            #icone-fechar-modal:hover
                            {
                                color: #green;
                            }

                            .modal-titulo-cadastro 
                            {
                                font-family: Poppins, sans-serif;
                                font-size: 15px;
                                color: #000;
                                font-weight: 500;
                                display: flex;
                                gap: 0.4rem;
                            }

                            p>i 
                            {
                                font-size: 1.2rem;
                                color: #1ea41e;
                            }

                            .modal-frase-cadastro
                            {
                                font-family: Poppins, sans-serif;
                                font-size: 13px;
                                color: #2e2e2e;
                                font-weight: 400;
                            }
                            `;

                        document.head.appendChild(style);

                        document.addEventListener("DOMContentLoaded", function()
                        {
                            modal.style.right = "20px";
                        });

                        iconFechaModal.addEventListener("click", function()
                        {
                            modal.remove();
                        });

                        setTimeout(function()
                        {
                            modal.remove();
                        }, 8000);

                    </script>';
        }
    }

    ?>




    <!-- CONTEUDO  -->
    <main class="main-conteudo">
        <!-- COLOCAR TODO O CONTEÚDO DENTRO DESSA SESSÃO -->
        <div class="main-conteudo-container-titulo">
            <h1>HABILIDADES</h1>
            <p>
                Aqui você verá um formulário para o cadastro de novas habilidades e uma tabela com todas as
                habilidades cadastradas. Você também pode filtrar ou pesquisar
                pela habilidade que deseja. Também tem como opção editar ou excluir alguma habilidade.
            </p>
        </div>

        <!-- BOTÕES -->
        <div class="gerarPdf">
            <a href="tabela-solicitacao-habilidade.php"> <button class="hab-solicitadas"> Solicitações </button></a>
            <a href="geracaoPdf/gerar_pdf_Habilidades.php"><button> <i class="fa-solid fa-file-pdf"></i>Gerar pdf </button></a>
        </div>


        <div class="cards">
            <!-- FORM -->
            <div class="card-1">
                <p class="form-frase">Escreva o nome da Habilidade que deseja cadastrar</p>
                <div class="card-cadastrar">
                    <form class="card-form" action="cadastrar-habilidades-adm.php" method="POST">
                        <div class="input-box">
                            <label for="" id="label">Nome</label>
                            <input type="text" name="nome" id="nome" placeholder="Digite a habilidade">
                        </div>
                        <div class="continue-button">
                            <button id="cadastro-btn" type="submit">CADASTRAR</button>
                        </div>
                    </form>
                </div>
            </div>



            <!-- TABELA -->
            <div class="card-2">
                <p class="form-frase" id="card-2">Aqui está a lista de todas as habilidades cadastradas</p>
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
                                    <th>habilidades</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                require_once 'global.php';
                                try {
                                    $listaHabilidade = HabilidadeServicoDao::listar();
                                } catch (Exception $e) {
                                    echo $e->getMessage();
                                }
                                ?>
                                <tr>
                                    <?php foreach ($listaHabilidade as $habilidade) { ?>
                                        <td> <input type="checkbox" name="checkbox" id="checkbox"> </td>
                                        <td>
                                            <?php echo $habilidade['codHabilidadeServico']; ?>
                                        </td>
                                        <td>
                                            <?php echo $habilidade['nomeHabilidadeServico']; ?>
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



    </main>


    
    <script src="js/script.js"></script>
    <script type="module" src="../area-instituicao/imports/side-bar.js"></script>                                
    <script type="module" src="../imports/nav-drop-down.js"></script>
    <script type="module" src="../imports/nav-drop-down-notificacao.js"></script>
</body>

</html>