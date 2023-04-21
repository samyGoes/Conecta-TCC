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
                <a href="editar-excluir-vagas/editar-vagas-instituicao.php"> <i class="fa-solid fa-pen-to-square"></i>
                    <span class="nav-lateral-topico"> Editar Vagas
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
                        <div>
                            <div class="box-filtro-causas">
                                <label for="">Causas</label>
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

                    <div class="input-box">
                        <div>
                            <label for="">Período</label>
                            <input type="text" name="periodo" id="periodo" placeholder="Digite o período" value="<?php echo $_SESSION['vaga']['periodoServico'] ?>" />
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
                            <input type="text" name="cidade" id="cidade" readonly value="<?php echo $_SESSION['vaga']['cidadeLocalServico'] ?>" >
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

    <script>
        // DROP DOWN DO BOTÃO DAS CAUSAS/HABILIDADE + MUDANDO BOTÃO DE COR
        const botaoCausas = document.querySelector(".filtro-causas");
        const botaoHabilidade = document.querySelector(".filtro-habilidade");
        const boxCausas = document.querySelector(".box-causas");
        const boxHabilidade = document.querySelector(".box-habilidade")

        botaoCausas.addEventListener("click", function() {
            if (boxCausas.style.display == "none") {
                boxCausas.style.display = "flex";
            } else {
                boxCausas.style.display = "none";
            }
        });

        botaoHabilidade.addEventListener("click", function() {
            if (boxHabilidade.style.display == "none") {
                boxHabilidade.style.display = "flex";
            } else {
                boxHabilidade.style.display = "none";
            }
        });
    </script>

    <script src="../js/endereco-auto.js"></script>
    <script src="js/script.js"></script>
    <script src="../area-voluntario/js/button-image.js"></script>
</body>

</html>