<?php

require_once 'global.php';
include "../../auth/verifica-logado.php";

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/estilo-arquivo-modelo.css">
    <link rel="stylesheet" href="./css/estilo-chat.css">
    <!-- LINK ICONES -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title> Configurações do Perfil - Voluntários Disponíveis</title>
</head>

<body class="body">

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
                <li> <i class="fa-solid fa-house" id="topicos-icon-fixo"></i> <a href="../../index.php" class="cabecalho-menu-item">Início</a></li>
                <li> <i class="fa-solid fa-person" id="topicos-icon-fixo"></i> <a href="../../voluntarios/voluntarios.php" class="cabecalho-menu-item">voluntários</a></li>
                <li> <i class="fa-sharp fa-solid fa-heart" id="topicos-icon-fixo"></i> <a href="../../instituicoes/instituicoes.php" class="cabecalho-menu-item">instituições</a></li>
                <li> <i class="fa-solid fa-briefcase" id="topicos-icon-fixo"></i> <a href="../../vagas/vagas.php" class="cabecalho-menu-item">Vagas</a></li>
                <li> <i class="fa fa-file-text" aria-hidden="true" id="topicos-icon-fixo"></i> <a href="../../sobre-nos/sobre-nos.php" class="cabecalho-menu-item">sobre nós</a></li>
                <li> <i class="fa-solid fa-phone" id="topicos-icon-fixo"></i> <a href="../../contato/contato.php" class="cabecalho-menu-item">contato</a></li>
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
                    if ($_SESSION['tipoPerfil'] == 'Voluntario') {
                        $nomeArray = explode(" ", $nomeCompleto);
                        $primeiroNome = $nomeArray[0];
                    } else {
                        $nomeArray = explode(" ", $nomeCompleto);
                        $primeiroNome = $nomeArray[0] . " " . $nomeArray[1];
                    }
                ?>
                    <li class="topicos-sessao-login-linha">
                        <a href="#" class="cabecalho-menu-item" id="cabecalho-menu-item-usuario">
                            Olá, <?php echo $primeiroNome ?> <span id="nav-seta-sub-topicos"> 🢓 </span>
                        </a>
                        <ul class="sub-topicos">
                            <li> <a href="auth/redirecionamento-perfil-usuario.php"> Meu Perfil </a></li>
                            <li> <a href=""> Vagas </a> </li>
                            <li> <a href="../../auth/configuracao-perfil-usuario.php"> Configurações </a></li>
                            <li> <a href="../../auth/logout.php"> Sair </a></li>
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
                <a href="../form-editar-perfil-instituicao.php"> <i class="fa-solid fa-pen-to-square"></i> <span class="nav-lateral-topico"> Editar Perfil
                    </span></a>
            </div>

            <div class="nav-lateral-box-icon">
                <a href="../form-adicionar-fotos-instituicao.php"> <i class="fa-solid fa-camera"></i> <span class="nav-lateral-topico"> Adicionar Fotos
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
                <a href="../editar-excluir-vagas/tabela-editar-vagas-instituicao.php"> <i class="fa-solid fa-pen-to-square"></i> <span class="nav-lateral-topico"> Vagas
                    </span></a>
            </div>

            <div class="nav-lateral-box-icon">
                <a href="dashboard-instituicao.php"> <i class="fa-solid fa-gear"></i> <span class="nav-lateral-topico"> Gerenciar Vagas
                    </span></a>
            </div>

            <div class="nav-lateral-box-icon">
                <a href="../form-trocar-senha-instituicao.php"> <i class="fa-solid fa-key"></i> <span class="nav-lateral-topico">Trocar Senha </span></a>
            </div>

            <div class="nav-lateral-box-icon">
                <a href="../form-excluir-conta-instituicao.php"> <i class="fa-solid fa-xmark" id="nav-lateral-icon-excluir"></i> <span class="nav-lateral-topico">Excluir Conta </span></a>
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
            <h1> GERENCIAR VAGAS </h1>
            <p>
                Veja todas as informações necessárias para o gerenciamento de suas vagas e
                possíveis voluntários.
            </p>
        </div>

        <!-- COLOCAR TODO O CONTEÚDO DENTRO DESSA SESSÃO -->
        <div class="conteudo-completo">

            <div class="container-botoes">
                <a href="dashboard-instituicao.php" class="btn-dashboard"> <button> Dashboard </button></a>
                <a href="tabela-voluntarios-instituicao.php" class="btn-voluntarios"> <button> Voluntários Disponíveis </button></a>
                <a href="tabela-voluntarios-rejeitados-instituicao.php" class="btn-v-r"> <button> Voluntários Recusados </button></a>
                <a href="tabela-vagas-preenchidas-instituicao.php" class="btn-vagas"> <button> Vagas Preenchidas </button></a>
            </div>




            <!-- TÍTULO 1 -->
            <div class="container-titulo-1">
                <h2 class="titulo-voluntarios"> Chat </h2>
                <p class="frase-voluntarios">
                    Converse com o voluntário para que ambos possam resolver como funcionará o serviço e se tudo está de acordo com o esperado.
                </p>
            </div>

            <div class="chat-container" id="chat-container">
                <div class="chat-header">
                    <div class="nome-user">
                        <img src="../img-instituicao/5.jpg" alt="img">
                        <h2 class="chat-titulo" id="chat-titulo"> <?php echo $primeiroNome ?> </h2>
                    </div>
                    <div class="pesquisar-chat">
                        <input type="text" name="pesquisar" id="pesquisar" placeholder="Pesquisar" style="color: white;">
                        <i class="fa-solid fa-magnifying-glass" id="icon-lupa"></i>
                    </div>
                </div>
                <div class="scroll-chat" id="scroll-chat">
                    <div class="main-chat">
                        <div class="mensagens" id="mensagens">
                            <div class="area-voluntario">
                                <div class="foto-voluntario">
                                    <img src="../img-instituicao/6.jpg" alt="foto">
                                </div>
                                <div class="voluntario">
                                    <div class="mensagem-voluntario">
                                        <div class="conteudo-mensagem">
                                            <h4> Sâmilly</h4>
                                            <p>Como seria refente asos horarios</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="chat-footer">
                    <div class="fundo-footer">
                        <div class="enviar-mensagem">
                            <input type="text" name="enviar-mensagem" id="enviar-mensagem" placeholder="Mensagem...">
                        </div>
                        <button type="" class="button-send" id="btn1" onclick="sendMessage()">
                            <i class="fa-solid fa-paper-plane"></i>
                        </button>
                    </div>
                </div>
            </div>

            <a class="link-voltar-anterior" href="tabela-voluntarios-confirmados.php"> Voltar para a página anterior. </a>
        </div>
    </main>
    <script>
        // function sendMessage() {
        //     var scroll = document.getElementById("scroll-chat")
        //     var input = document.getElementById("enviar-mensagem");
        //     var message = input.value;

        //     if (message !== "") {
        //         var chatbox = document.getElementById("mensagens");
        //         var newMessage = document.createElement("div");
        //         newMessage.className = "area-instituicao";
        //         newMessage.innerHTML = '<div class="area-instituicao"><div class="instituicao"><div class="mensagem-instituicao"><div class="conteudo-mensagem"><h4><?php echo $primeiroNome ?></h4><p>' + message + '</p></div></div></div><div class="foto-instituicao"><img src="../img-instituicao/9.JPG" alt="foto"></div></div>';
        //         chatbox.appendChild(newMessage);

        //         input.value = "";

        //         scroll.scrollTop = scroll.scrollHeight; // Rolar a barra de rolagem para baixo
        //     }
        // }

        var conn = new WebSocket('ws://localhost:3000');

        conn.onopen = function(e) {
            //console.log("Connection established!");
        };

        conn.onmessage = function(e) {
            //console.log(e.data);
            showMessages('other', e.data);
        };

        //conn.send('Hello World!');
        ///////////////////////////////////////////////
        var inp_message = document.getElementById('enviar-mensagem');
        var btn_env = document.getElementById('btn1');
        var area_content = document.getElementById('mensagens');
        var scroll = document.getElementById("scroll-chat");

        btn_env.addEventListener('click', function() {
            if (inp_message.value != '') {
                var msg = {
                    'msg': inp_message.value
                };
                msg = JSON.stringify(msg);

                conn.send(msg);

                showMessages('me', msg);

                inp_message.value = '';

                scroll.scrollTop = scroll.scrollHeight; // Rolar a barra de rolagem para baixo
            }
        });


        function showMessages(how, data) {
            data = JSON.parse(data);

            console.log(data);

            if (how == 'me') {
                var img_src = "../img-instituicao/9.jpg";
            } else if (how == 'other') {
                var img_src = "assets/imgs/Icon awesome-rocketchat-1.png";
            }

            var div = document.createElement('div');
            div.setAttribute('class', 'area-instituicao');

            var div_instituicao = document.createElement('div');
            div_instituicao.setAttribute('class', 'instituicao');

            var div_mensagem = document.createElement('div');
            div_mensagem.setAttribute('class', 'mensagem-instituicao');

            var div_conteudo = document.createElement('div');
            div_conteudo.setAttribute('class', 'conteudo-mensagem');

            var h4 = document.createElement('h4');
            h4.textContent = data.name;

            var p = document.createElement('p');
            p.textContent = data.msg;

            div_conteudo.appendChild(h4);
            div_conteudo.appendChild(p);

            div_mensagem.appendChild(div_conteudo);
            div_instituicao.appendChild(div_mensagem);

            var div_foto = document.createElement('div');
            div_foto.setAttribute('class', 'foto-instituicao');

            var img = document.createElement('img');
            img.setAttribute('src', img_src);
            img.setAttribute('alt', 'foto');

            div_foto.appendChild(img);

            div.appendChild(div_instituicao);
            div.appendChild(div_foto);

            area_content.appendChild(div);

            scroll.scrollTop = scroll.scrollHeight; // Rolar a barra de rolagem para baixo
        }
    </script>


    <script type="module" src="../imports/side-bar.js"></script>
    <script type="module" src="../../imports/nav-drop-down.js"></script>
</body>

</html>