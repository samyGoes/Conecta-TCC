<?php
require_once 'global.php';
?>
<?php include "../../auth/verifica-logado.php"; ?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/estilo-form-cadastrar-vagas-instituicao.css">
    <link rel="stylesheet" href="../css/estilo-arquivo-modelo.css">
    <!-- LINK ICONES -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Document</title>
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
                <li> <i class="fa-solid fa-house" id="topicos-icon-fixo"></i> <a href="../index.php" class="cabecalho-menu-item">Início</a></li>
                <li> <i class="fa-solid fa-person" id="topicos-icon-fixo"></i> <a href="../voluntarios/voluntarios.php" class="cabecalho-menu-item">voluntários</a></li>
                <li> <i class="fa-sharp fa-solid fa-heart" id="topicos-icon-fixo"></i> <a href="../instituicoes/instituicoes.php" class="cabecalho-menu-item">instituições</a></li>
                <li> <i class="fa-solid fa-briefcase" id="topicos-icon-fixo"></i> <a href="../vagas/vagas.php" class="cabecalho-menu-item">Vagas</a></li>
                <li> <i class="fa fa-file-text" aria-hidden="true" id="topicos-icon-fixo"></i> <a href="../sobre-nos/sobre-nos.php" class="cabecalho-menu-item">sobre nós</a></li>
                <li> <i class="fa-solid fa-phone" id="topicos-icon-fixo"></i> <a href="../contato/contato.php" class="cabecalho-menu-item">contato</a></li>
            </ul>

            <ul class="topicos-sessao-login">
                <?php 
                    if (empty($_SESSION['nomeUsuario'])) 
                    {
                ?>
                        <li class="topicos-sessao-login-linha">
                            <a href="<?php echo 'form-login.php' ?>" class="cabecalho-menu-item" id="cabecalho-menu-item-login">
                                <i class="fa-solid fa-user" id="topicos-icon-fixo-dif"></i> login 
                            </a>
                        </li>
                <?php 
                    } 
                    else 
                    { 
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
                            <div class="box-topicos-sessao-login-linha">
                                <?php        

                                    require_once 'global.php';
                                    include 'diretorios-notificacao.php';
                                    try 
                                    {
                                        $idInstituicaoLogada = $_SESSION['codUsuario'];
                                        $notificacoes = InstituicaoDao::notificacoes($idInstituicaoLogada);
                                        //$novaNotificacao = InstituicaoDao::novaNotificacao($idInstituicaoLogada);
                                        //$diretorio = diretorios($linha['arquivo']);
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
                                    Olá, <?php echo $primeiroNome ?> <span id="nav-seta-sub-topicos"> 🢓 </span>
                                </p>
                            </div>
                            
                            <ul class="sub-topicos">
                                <li> <a href="../../auth/redirecionamento-perfil-usuario.php"> Meu Perfil </a></li>
                                <li> <a href=""> Vagas </a> </li>
                                <li> <a href="../../auth/configuracao-perfil-usuario.php"> Configurações </a></li>
                                <li> <a href="../../auth/logout.php"> Sair </a></li>
                            </ul>
                        </li>
                <?php 
                    } 
                ?>
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
                <a href="../form-adicionar-fotos-instituicao.php"> <i class="fa-solid fa-camera"></i> <span
                        class="nav-lateral-topico"> Adicionar Fotos
                    </span></a>
            </div>


            <div class="nav-lateral-box-icon">
                <a href="../form-cadastrar-causas-instituicao.php"> <i class="fa-sharp fa-solid fa-heart"></i> <span class="nav-lateral-topico"> Solicitar
                        Causas </span></a>
            </div>

            <div class="nav-lateral-box-icon">
                <a href="../form-cadastrar-habilidades-instituicao.php"> <i class="fa-solid fa-wrench"></i> <span class="nav-lateral-topico"> Solicitar Habilidades
                    </span></a>
            </div>

            <div class="nav-lateral-box-icon">
                <a href="tabela-editar-vagas-instituicao.php"> <i class="fa-solid fa-briefcase"></i>
                    <span class="nav-lateral-topico"> Vagas
                    </span></a>
            </div>

            <div class="nav-lateral-box-icon">
                <a href="../gerenciar-vagas/tabela-voluntarios-instituicao.php"> <i class="fa-solid fa-gear"></i> <span class="nav-lateral-topico"> Gerenciar Vagas
                    </span></a>
            </div>

            <div class="nav-lateral-box-icon">
                <a href="../form-trocar-senha-instituicao.php"> <i class="fa-solid fa-key"></i> <span class="nav-lateral-topico">Trocar Senha </span></a>
            </div>

            <div class="nav-lateral-box-icon">
                <a href="../form-excluir-conta-instituicao.php"> <i class="fa-solid fa-xmark" id="nav-lateral-icon-excluir"></i>
                    <span class="nav-lateral-topico">Excluir Conta </span></a>
            </div>
        </div>

        <div class="nav-lateral-sessao-dois">
            <div class="nav-lateral-box-icon">
                <a href="../../auth/logout.php"> <i class="fa-solid fa-door-open" id="nav-lateral-icon-sair"></i> <span class="nav-lateral-topico"> Sair </span></a>
            </div>
        </div>
    </nav>







    <!-- CONTEUDO  -->
    <main class="main-conteudo">
        <!-- COLOCAR TODO O CONTEÚDO DENTRO DESSA SESSÃO -->
        <!-- <div class="uau"></div> -->
        <div class="main-conteudo-container-titulo">
            <h1>Editar Vagas</h1>
            <p>
                Aqui você poderá editar as informações que desejar da vaga selecionada anteriormente.
            </p>
        </div>

        <div class="form">
            <form class="container" action="update-vaga-instituicao.php" method="post" enctype="multipart/form-data">
                <div class="input-group">
                    <div class="input-box">
                        <div>
                            <label for="">Nome</label>
                            <input type="text" name="nome" id="nome" placeholder="Digite o nome da vaga" value="<?php echo $_SESSION['vaga']['nomeservico']; ?>" />
                        </div>
                        <div>
                        <label for="tipoVaga">Tipo de Vaga</label>
                        <select name="tipoVaga" id="tipoVaga">
                            <option value="Presencial" <?php echo ($_SESSION['vaga']['tipoServico'] == 'Presencial') ? 'selected' : ''; ?>>Presencial</option>
                            <option value="híbrido" <?php echo ($_SESSION['vaga']['tipoServico'] == 'híbrido') ? 'selected' : ''; ?>>Híbrido</option>
                            <option value="ead" <?php echo ($_SESSION['vaga']['tipoServico'] == 'ead') ? 'selected' : ''; ?>>EAD</option>
                        </select>
                        </div>
                    </div>

                    <div class="input-box">
                        <div>
                            <div class="box-filtro-causas">
                                <label for="">Habilidades</label>

                                <div class="clique-fora-h">
                                    <div class="filtro-habilidade"> Selecione as habilidades... </div>
                                    <div class="box-habilidade">
                                        <?php
                                        try {
                                            $habilidadeSelecionada =explode(',', $_SESSION['habilidade']['habilidade_id']);
                                            $listaHabilidade = HabilidadeServicoDao::listar();
                                        } catch (Exception $e) {
                                            echo $e->getMessage();
                                        }
                                        ?>
                                        <?php foreach ($listaHabilidade as $habilidade) { 
                                            // Verifica se a habilidade está na lista de habilidades selecionadas pelo usuário
                                            $marcado = in_array($habilidade['codHabilidadeServico'], $habilidadeSelecionada)
                                            ?>
                                            <div class="box-habilidade-checkbox">
                                                <input type="checkbox" name="habilidade[]" id="habilidade" 
                                                value="<?php echo $habilidade['codHabilidadeServico'] ?>" 
                                                <?php echo $marcado ? 'checked' : ''; ?>>
                                                <label for="habilidade">
                                                    <?php echo $habilidade['nomeHabilidadeServico'] ?>
                                                </label>
                                            </div>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div>
                            <div class="box-filtro-causas">
                                <label for="">Causas</label>

                                <div class="clique-fora">
                                    <div class="filtro-causas"> Selecione as causas... </div>
                                    <div class="box-causas">
                                        <?php
                                        try {
                                            $causaSelecionada =explode(',', $_SESSION['causa']['categoria_id']);
                                            $listaCausa = CategoriaServicoDao::listar();
                                        } catch (Exception $e) {
                                            echo $e->getMessage();
                                        }
                                        ?>
                                        <?php foreach ($listaCausa as $causa) { 
                                            // Verifica se a habilidade está na lista de habilidades selecionadas pelo usuário
                                            $marcado = in_array($causa['codCategoriaServico'], $causaSelecionada)
                                            ?>
                                            <div class="box-causas-checkbox">
                                            <input type="checkbox" name="causas[]" id="causas" 
                                                value="<?php echo $causa['codCategoriaServico'] ?>" 
                                                <?php echo $marcado ? 'checked' : ''; ?>>
                                                <label for="causas">
                                                    <?php echo $causa['nomeCategoria'] ?>
                                                </label>
                                            </div>
                                        <?php
                                        }
                                        ?>
                                    </div>
                                </div>
                            </div>

                        </div>


                    </div>

                    <div class="input-box">
                        <div>
                            <!-- <label for="">Período</label>
                            <input type="text" name="periodo" id="periodo" placeholder="Digite o período" value="<?php //echo $_SESSION['vaga']['periodoServico'] ?>" /> -->
                            <label for="">Período</label>
                            <select name="periodo" id="periodo">
                                <option value="nortuno">Nortuno</option>
                                <option value="matutino">Matutino</Mption>
                                <option value="vespertino">Vespertino</option>
                            </select>
                        </div>
                        <div>
                            <label for="">Data de início</label>
                            <input type="text" name="dataInicio" id="dataInicio" placeholder="Digite a data de inicio" value="<?php echo $_SESSION['vaga']['dataInicioServico'] ?>" />
                        </div>

                        <div>
                            <label for="">Horário</label>
                            <input type="text" name="horario" id="horario" placeholder="Digite o horário" value="<?php echo $_SESSION['vaga']['horarioServico'] ?>" />
                        </div>
                    </div>

                    <div class="input-box">
                        <div>
                            <label for="">Quantidade de Vagas</label>
                            <input type="text" name="quantidadeVaga" id="quantidadeVagas"  placeholder="Digite a quantidade de vagas" value="<?php echo $_SESSION['vaga']['qntdVagaServico'] ?>">
                        </div>
                        <div>
                            <label for="">CEP</label>
                            <input type="text" name="cep" id="cep" placeholder="Digite o CEP°" value="<?php echo $_SESSION['vaga']['cepLocalServico'] ?>" />
                        </div>
                        <div>
                            <label for="">Número</label>
                            <input type="text" name="numeroCasa" id="num" placeholder="Digite o n°" value="<?php echo $_SESSION['vaga']['numeroLocalServico'] ?>" />
                        </div>
                    </div>

                    <div class="input-box">
                        <div>
                            <label for="">Logradouro</label>
                            <input type="text" name="logradouro" id="logradouro" readonly value="<?php echo $_SESSION['vaga']['logradouroLocalServico'] ?>" />
                        </div>
                        <div>
                            <label for=" ">Bairro</label>
                            <input type="text" name="bairro" id="bairro" readonly value="<?php echo $_SESSION['vaga']['bairroLocalServico'] ?>" />
                        </div>

                        <div>
                            <label for="cidade">Cidade</label>
                            <input type="text" name="cidade" id="cidade" readonly value="<?php echo $_SESSION['vaga'] ['cidadeLocalServico'] ?>" >
                        </div>
                    </div>

                    <div class="input-box">
                        <div>
                            <label for="uf">UF</label>
                            <input type="text" name="uf" id="uf" readonly value="<?php echo $_SESSION['vaga']['estadoLocalServico'] ?>" >
                        </div>
                        <div>
                            <label for=" ">Complemento</label>
                            <input type="text" name="complemento" id="comp" placeholder="Digite o complemento" value="<?php echo $_SESSION['vaga']['complementoLocalServico'] ?>" />
                        </div>
                        <div>
                            <label for="">País</label>
                            <input type="text" name="pais" id="pais" placeholder="Digite seu pais" value="<?php echo $_SESSION['vaga']['paisLocalServico'] ?>" >
                        </div>
                    </div>
                    <div class="input-box">
                        <div>
                            <label for="">Descrição</label>
                            <textarea name="desc" id="desc" cols="70" rows="10" placeholder="Digite sua descrição..."><?php echo $_SESSION['vaga']['descServico'] ?></textarea>
                        </div>
                    </div>
                </div>
                <a href="">
                    <div class="continue-button">
                        <button type="submit">SALVAR</button>
                </a>
        </div>
        </form>
    </main>
    

    <!--Máscaras do formulário-->
    <script src="../../js/mascarasForm.js"></script>
    <script>
        adicionarMascaraCep('#cep'); 
        adicionarMascaraHorario('#horario');

    </script>


    <script type="module" src="../imports/side-bar.js"></script>
    <script type="module" src="../../imports/nav-drop-down.js"></script>
    <script type="module" src="../../imports/nav-drop-down-notificacao.js"></script> 
    <script>
        // DROP DOWN DO BOTÃO DAS CAUSAS/HABILIDADE + MUDANDO BOTÃO DE COR
        const botaoCausas = document.querySelector(".filtro-causas");
        const botaoHabilidade = document.querySelector(".filtro-habilidade");
        const boxCausas = document.querySelector(".box-causas");
        const boxHabilidade = document.querySelector(".box-habilidade")
        const dropCausas = document.querySelector('.clique-fora');
        const dropHab = document.querySelector(".clique-fora-h");


        botaoCausas.addEventListener("click", function() 
        {
            if (boxCausas.style.display == "none") 
            {
                boxCausas.style.display = "flex";
            } 
            else 
            {
                boxCausas.style.display = "none";
            }
        });

        document.addEventListener('click', function(event) 
        {
            const target = event.target;
            if (!dropCausas.contains(target)) 
            {
                boxCausas.style.display = "none";
            }
        });

        botaoHabilidade.addEventListener("click", function() 
        {
            if (boxHabilidade.style.display == "none") 
            {
                boxHabilidade.style.display = "flex";
            } 
            else 
            {
                boxHabilidade.style.display = "none";
            }
        });

        document.addEventListener('click', function(eventh) 
        {
            const targetH = eventh.target;
            if (!dropHab.contains(targetH)) 
            {
                boxHabilidade.style.display = "none";
            }
        });
    </script>

    <script src="../js/endereco-auto.js"></script>
    <script type="module" src="../js/main.js"></script>
    <script src="../area-voluntario/js/button-image.js"></script>
</body>

</html>