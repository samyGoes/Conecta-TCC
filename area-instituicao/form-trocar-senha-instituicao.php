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
    <!-- LINKS CSS -->
    <link rel="stylesheet" href="css/estilo-arquivo-modelo.css">
    <link rel="stylesheet" href="css/estilo-trocar-senha-instituicao.css">
    <link rel="stylesheet" href="css/estilo-modal-confirmacao.css">
    <!-- LINK ICONES -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- BIBLIOTECA QUE PERMITE ENVIAR EMAIL -->
    <script src="https://cdn.emailjs.com/sdk/2.3.2/email.min.js"></script>
    <title> CONFIGURAÇÕES DO PERFIL - Trocar senha</title>
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
                <a href="editar-excluir-vagas/editar-vagas-instituicao.php"> <i class="fa-solid fa-pen-to-square"></i> <span class="nav-lateral-topico"> Editar Vagas
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





    <!-- EMAIL E NOME DA PESSOA LOGADA PARA CÓDIGO DE VERIFICAÇÃO DO MODAL -->
    <p style="display: none;" class="email-logado"> <?php echo $_SESSION["emailUsuario"]; ?> </p>
    <p style="display: none;" class="nome-logado"> <?php echo $_SESSION["nomeUsuario"]; ?> </p>



    <!-- CONTEUDO  -->
    <main class="main-conteudo">

        <div class="main-conteudo-container-titulo">
            <h1>TROCAR SENHA</h1>
            <p>
                Digite sua nova senha e confirme-a. Esta não pode ser igual a anterior
                e deve ter no mínimo 8 caracteres com letras maiúsculas, minúsculas, números e caracteres especiais
            </p>
        </div>

        <!-- COLOCAR TODO O CONTEÚDO DENTRO DESSA SESSÃO -->




        <!-- MODAL CONFIRMAÇÃO DE ACESSO -->
        <div id="modal" class="modal">
            <div class="form" id="form">

                <div class="modal-sessao-1">
                    <h2 class="modal-titulo" id="modal-titulo"> Confirmação de acesso </h2>
                    <p class="modal-frase"> Clique <a id="envia-email" href="#"> aqui </a> para que um código de verificação seja enviado no seu email.</p>

                    <form class="form-modal" action="" method="POST" id="form-modal">
                        <div class="modal-input-box">
                            <label for="" class="modal-senha"> Código </label>
                            <input placeholder="Digite o código" type="text" name="senha" id="senha" class="modal-input-senha">
                        </div>
                        <div class="btn-confirmed" id="btn-confirmed"><button class="modal-btn-confirmar" type="submit">Confirmar</button></div>
                    </form>

                    <a class="voltar-anterior" href="#"> Voltar para a página anterior </a>
                </div>

                <div class="modal-sessao-2">
                    <h2 class="modal-titulo" id="modal-titulo"> Verificação concluída </h2>
                    <p class="modal-frase"> A verificação foi feita com sucesso! Agora você já pode alterar sua senha. </p>
                    <div class="btn-confirmed" id="btn-confirmed"><button class="modal-btn-confirmar" id="btn-fechar"> FECHAR </button></div>
                </div>
            </div>
        </div>






        <!-- CARD TROCAR SENHA -->
        <div class="card">
            <div class="input-group">
                <div class="input-box">
                    <label for="email">Nova senha</label>
                    <input type="email" name="email" id="email" placeholder="Digite a nova senha">
                    <small>Mínino de até 8 caracteres</small>
                </div>
                <div class="input-box">
                    <label for="senha">Confirmar nova senha</label>
                    <input type="password" name="senha" id="senha" placeholder="Confirme a nova senha">
                    <small>Mínino de até 8 caracteres</small>
                </div>
            </div>
            <div class="continue-button">
                <button class="button">Salvar</button>
            </div>
        </div>

    </main>







    <!-- SCRIPTS -->
    <script src="js/script.js"></script>
    <script src="js/modal-confirmacao.js"></script>
    <script type="module" src="../area-voluntario/js/main.js"></script>
</body>

</html>