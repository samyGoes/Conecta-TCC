<?php include "../auth/verifica-logado.php"; ?>
<?php
require_once 'global.php';
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/estilo-form-cadastrar-vagas-instituicao.css">
    <link rel="stylesheet" href="css/estilo-arquivo-modelo.css">
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
                <a href="editar-perfil-instituicao-atualizado.php"> <i class="fa-solid fa-pen-to-square"></i> <span class="nav-lateral-topico"> Editar Perfil
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
                <a href="excluir-conta-instituicao-atualizado.php"> <i class="fa-solid fa-xmark" id="nav-lateral-icon-excluir"></i> <span class="nav-lateral-topico">Excluir Conta </span></a>
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
        <!-- <div class="uau"></div> -->
        <div class="main-conteudo-container-titulo">
            <h1>Cadastrar Vagas</h1>
            <p>
                Aqui você pode cadastrar as vagas da sua instituição
            </p>
        </div>

        <div class="form">
            <form class="container" action="cadastrar-vagas.php" method="post" enctype="multipart/form-data">
                <div class="input-group">
                    <div class="input-box">
                        <div>
                            <label for="">Nome</label>
                            <input type="text" name="nome" id="nome" placeholder="Digite seu nome" value="<?php echo $_SESSION['nomeUsuario']; ?>" />
                        </div>
                        <div>
                            <label for="">Período</label>
                            <input type="text" name="periodo" id="periodo" placeholder="Digite o período" value="<?php echo $_SESSION['numFoneUsuario1']; ?>" />
                        </div>
                    </div>

                    <div class="input-box">

                        <div>
                            <label for="">Data de início</label>
                            <input type="text" name="dataInicio" id="dataInicio" placeholder="Digite a data de inicio" value="<?php echo $_SESSION['nomeUsuario']; ?>" />
                        </div>

                        <div>
                            <label for="">Horário</label>
                            <input type="text" name="horario" id="horario" placeholder="Digite o horário" value="<?php echo $_SESSION['numFoneUsuario2']; ?>" />
                        </div>
                    </div>

                    <div class="input-box">
                        <div>
                            <label for="">Quantidade de Vagas</label>
                            <input type="text" name="quantidadeVaga" id="quantidadeVagas">
                        </div>
                        <div>
                            <label for=" ">Tipo de Vaga</label>
                            <select name="tipoVaga" id="tipoVaga">
                                <option value="presencial">presencial</option>
                                <option value="híbrido">Híbrido</option>
                                <option value="ead">EAD</option>
                            </select>
                        </div>
                        <div>
                            <label for="">Habilidades</label>
                            <div class="box-filtro-causas">
                                <div class="filtro-habilidade"> Habilidades </div>
                                <div class="box-habilidade">
                                    <?php
                                    for ($i = 1; $i <= 10; $i++) {
                                    ?>
                                        <div class="box-habilidade-checkbox">
                                            <input type="checkbox" name="habilidade" id="habilidade">
                                            <label for="habilidade"> Mulheres </label>
                                        </div>

                                    <?php
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>

                        <div>
                            <label for="">Causas</label>
                            <div class="box-filtro-causas">
                                <div class="filtro-causas"> CAUSAS </div>
                                <div class="box-causas">
                                    <?php
                                    for ($i = 1; $i <= 10; $i++) {
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

                        </div>

                    </div>

                    <div class="input-box">
                        <div>
                            <label for="">CEP</label>
                            <input type="text" name="cep" id="cep" placeholder="Digite o n°" value="<?php echo $_SESSION['numLogUsuario']; ?>" />
                        </div>
                        <div>
                            <label for="">Número</label>
                            <input type="text" name="numeroCasa" id="num" placeholder="Digite o n°" value="<?php echo $_SESSION['numLogUsuario']; ?>" />
                        </div>
                        <div>
                            <label for="">Logradoura</label>
                            <input type="text" name="logradouro" id="logradouro" value="<?php echo $_SESSION['numLogUsuario']; ?>" />
                        </div>
                        <div>
                            <label for=" ">Bairro</label>
                            <input type="text" name="bairro" id="bairro" value="<?php echo $_SESSION['bairroUsuario']; ?>" />
                        </div>
                    </div>

                    <div class="input-box">

                        <div>
                            <label for="cidade">Cidade</label>
                            <input type="text" name="cidade" id="cidade">
                            <!--<select name="cidade" id="cidade">
                                <option disabled value="">Selecione sua cidade</option>
                                <option value="São Paulo" <?php if ($_SESSION['cidadeUsuario'] == 'São Paulo')
                                                                echo 'selected'; ?>>São Paulo</option>
                                <option value="Rio de Janeiro" <?php if ($_SESSION['cidadeUsuario'] == 'Rio de Janeiro')
                                                                    echo 'selected'; ?>>Rio de Janeiro</option>
                                <option value="Belo Horizonte" <?php if ($_SESSION['cidadeUsuario'] == 'Belo Horizonte')
                                                                    echo 'selected'; ?>>Belo Horizonte</option>
                            </select>-->
                        </div>
                        <div>
                            <label for="uf">Estado</label>
                            <input type="text" name="uf" id="uf">
                            <!--<select name="uf" id="uf">
                                    <option disabled value="">Selecione seu estado</option>
                                    <option value="SP" <?php if ($_SESSION['estadoUsuario'] == 'SP')
                                                            echo 'selected'; ?>>SP
                                    </option>
                                    <option value="RJ" <?php if ($_SESSION['estadoUsuario'] == 'RJ')
                                                            echo 'selected'; ?>>RJ
                                    </option>
                                    <option value="BH" <?php if ($_SESSION['estadoUsuario'] == 'BH')
                                                            echo 'selected'; ?>>BH
                                    </option>
                                </select>-->
                        </div>
                        <div>
                            <label for=" ">Complemento</label>
                            <input type="text" name="complemento" id="comp" placeholder="Digite o complemento" value="<?php echo $_SESSION['compUsuario']; ?>" />
                        </div>
                    </div>

                    <div class="input-box">
                        <div>
                            <label for="">País</label>
                            <input type="text" name="pais" id="pais" placeholder="Digite seu pais">
                            <!--<select name="pais" id="pais">
                                <option disabled>Selecione seu país</option>
                                <option value="Brasil" <?php if ($_SESSION['paisUsuario'] == 'Brasil')
                                                            echo 'selected'; ?>>
                                    Brasil</option>
                                <option value="Japão" <?php if ($_SESSION['paisUsuario'] == 'Japão')
                                                            echo 'selected'; ?>>
                                    Japão</option>
                                <option value="Portugal" <?php if ($_SESSION['paisUsuario'] == 'Portugal')
                                                                echo 'selected'; ?>>Portugal</option>
                            </select>-->
                        </div>
                    </div>
                    <div class="input-box">
                        <div>
                            <label for="">Descrição</label>
                            <textarea name="desc" id="desc" cols="70" rows="10" placeholder="Digite sua descriçao" value="<?php echo $_SESSION['descUsuario']; ?>"></textarea>
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
                botaoCausas.style.backgroundColor = "#4567a5";
                botaoCausas.style.color = "#fff";
                botaoCausas.style.borderColor = "#4567a5";
            } else {
                boxCausas.style.display = "none";
                botaoCausas.style.backgroundColor = "#d6ebfd";
                botaoCausas.style.color = "#000";
                botaoCausas.style.borderColor = "#000";
            }
        });

        botaoHabilidade.addEventListener("click", function() {
            if (boxHabilidade.style.display == "none") {
                boxHabilidade.style.display = "flex";
                botaoHabilidade.style.backgroundColor = "#4567a5";
                botaoHabilidade.style.color = "#fff";
                botaoHabilidade.style.borderColor = "#4567a5";
            } else {
                boxHabilidade.style.display = "none";
                botaoHabilidade.style.backgroundColor = "#d6ebfd";
                botaoHabilidade.style.color = "#000";
                botaoHabilidade.style.borderColor = "#000";
            }
        });
    </script>

        <script src="../js/endereco-auto.js"></script>
    <script src="js/script.js"></script>
    <script src="../area-voluntario/js/button-image.js"></script>
</body>

</html>