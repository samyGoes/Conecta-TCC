<?php
    require_once 'global.php';
    require_once '../auth/verifica-logado.php';
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/estilo-arquivo-modelo.css">
    <link rel="stylesheet" href="css/estilo-causasCadastradas-instituicao.css">
    <link rel="stylesheet" href="css/estilo-modal-cadastro.css">
    <link rel="stylesheet" href="css/cadastrarCausas.css">
    <!-- LINK ICONES -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title> Configurações do Perfil - Cadastrar Habilidades </title>
</head>

<body>

    <!-- BARRA DE NAVEGAÇÂO -->
    <nav class="cabecalho">
        <div class="logo">
            <img src="../img/logo-conecta.png">
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
                <?php if (empty($_SESSION['nomeUsuario'])) { ?>
                    <li class="topicos-sessao-login-linha">
                        <a href="<?php echo 'form-login.php' ?>" class="cabecalho-menu-item" id="cabecalho-menu-item-login">
                            <i class="fa-solid fa-user" id="topicos-icon-fixo-dif"></i> login 
                        </a>
                    </li>
                <?php } else { 
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
                        <a href="#" class="cabecalho-menu-item" id="cabecalho-menu-item-usuario">
                            Olá, <?php echo $primeiroNome ?> <span id="nav-seta-sub-topicos"> 🢓 </span>
                        </a>
                        <ul class="sub-topicos">
                            <li> <a href="auth/redirecionamento-perfil-usuario.php"> Meu Perfil </a></li>
                            <li> <a href=""> Vagas </a> </li>
                            <li> <a href="../auth/configuracao-perfil-usuario.php"> Configurações </a></li>
                            <li> <a href="../auth/logout.php"> Sair </a></li>
                        </ul>
                    </li>
                <?php } ?>
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
                <a href="editar-excluir-vagas/tabela-editar-vagas-instituicao.php"> <i class="fa-solid fa-pen-to-square"></i> <span class="nav-lateral-topico"> Editar Vagas
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

        <div class="main-conteudo-container-titulo">
            <h1>CADASTRAR HABILIDADES</h1>
            <p>Cadastre as habilidades necessárias, você poderá atribuí-las as vagas para que encontre voluntários com
                as habilidades necessárias para cada vaga. Você também pode editá-las ou excluí-las. </p>
        </div>


        <!-- CARD -->
        <div class="card">
            <div class="card-1">
                <p>Escreva o nome da Habilidade que deseja cadastrar</p>
                <div class="card-cadastrar">
                    <form class="card-form" action="cadastrar-habilidades.php" method="POST">
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
                <p>Aqui está a lista de todas as habilidades cadastradas</p>
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
    <script>
        // cria o elemento HTML do modal
        const modal = document.createElement("div");
        modal.id = "modal";
        modal.innerHTML = `
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"
    integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
  <div id="modal-content">
    <p>Cadastro realizado com sucesso!<i class="fa-sharp fa-solid fa-circle-check"></i></p>
  </div>
`;

        // adiciona o modal como filho do body (ou de outro elemento HTML)
        document.body.appendChild(modal);

        //adiciona a tag style do modal
        const style = document.createElement("style");
        style.innerHTML = `
      #modal {
      position: fixed;
      bottom: 20px;
      right: 20px;
      box-shadow: #b4d8e6 3px 3px 4px 1px;
      z-index: 9999;
      transition: visibility 0s, opacity 0.5s ease;
      border: #4567a5 solid 1px;
      visibility: hidden;
      opacity: 0;
      border-radius: 0.5rem;
    }

    #modal-content {
      padding: 10px;
    }

    #modal.show {
      visibility: visible;
      opacity: 1;
    }

    p {
      font-family: Poppins, sans-serif;
      font-size: 15px;
      display: flex;
      align-items: center;
      justify-content: center;
      gap: 5px;
    }

    p>i {
      font-size: 1.3rem;
      color: green;
    }
    `;

        document.head.appendChild(style);

        // adiciona o listener de evento ao botão de cadastro
        const btn = document.getElementById("cadastro-btn");

        btn.addEventListener("click", function() {
            // assume que você tem algum código que realiza o cadastro aqui

            // depois que o cadastro é realizado com sucesso:
            modal.classList.add("show");

            // remove a classe 'show' após 1 segundo
            setTimeout(() => {
                modal.classList.remove("show");
            }, 1000);
        });
    </script>
    <script src="/js/modal-cadastro-vaga.js"></script>
    <script type="module" src="imports/side-bar.js"></script>
    <script type="module" src="../imports/nav-drop-down.js"></script>
    <script type="module" src="imports/check-box.js"></script>
</body>

</html>