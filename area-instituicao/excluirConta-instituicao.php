<?php include "../auth/verifica-logado.php";?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../area-instituicao/css/style-excluirConta-instituicao.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <title>Excluir Conta</title>
</head>

<body>
    <header>
        <div class="menu-section on">
            <div class="menu-toggle">
                <div class="one"></div>
                <div class="two"></div>
                <div class="three"></div>
            </div>
            <nav class="navigation-header">
                <a href="#">INICÍO</a>
                <a href="#">VOLUNTARIO</a>
                <a href="#">INSTITUIÇÕES</a>
                <a href="#">VAGAS</a>
                <a href="#">SOBRE NÓS</a>
                <a href="#">CONTATO</a>
                <a href="#"><i class="fa-solid fa-user"></i>OLÁ,(NOME)</a>
            </nav>
        </div>
    </header>

    <div class="title">
        <h3>Configuração do Perfil</h3>
    </div>

    <main>
        <nav class="navigation-left" id="menu">
            <ul class="navbar">
                <li>
                    <a href="">
                        <span class="icon"><i class="fa-regular fa-pen-to-square"></i></span>
                        <span class="title-nav">Editar Perfil</span>
                    </a>
                </li>
                <li>
                    <a class href="">
                        <span class="icon"><i class="fa-solid fa-heart"></i> </span>
                        <span class="title-nav">Cadastrar Causas</span>
                    </a>
                </li>
                <li>
                    <a href="">
                        <span class="icon"><i class="fa-solid fa-newspaper"></i></span>
                        <span class="title-nav">Cadastrar Vagas</span>
                    </a>
                </li>
                <li>
                    <a href="">
                        <span class="icon"><i class="fa-solid fa-briefcase"></i></span>
                        <span class="title-nav">Vagas</span>
                    </a>
                </li>
                <li>
                    <a href="">
                        <span class="icon"><i class="fa-solid fa-gear"></i></span>
                        <span class="title-nav">Gerenciar Vagas</span>
                    </a>
                </li>
                <li>
                    <a href="">
                        <span class="icon"><i class="fa-solid fa-key"></i></span>
                        <span class="title-nav">Trocar Senha</span>
                    </a>
                </li>
                <li>
                    <a href="">
                        <span class="icon"><i class="fa-solid fa-xmark"></i></span>
                        <span class="title-nav">Excluir Senha</span>
                    </a>
                </li>
                <li>
                    <a href="" class="exit">
                        <span class="icon"><i class="fa-solid fa-door-open"></i></span>
                        <span class="title-nav">Sair</span>
                    </a>
                </li>
            </ul>
        </nav>
        </div>
        <div class="div-card">
            <div class="title-card">
                <h2>EXCLUIR CONTA</h2>
                <p>Para excluir sua conta, digite seu email e senha</p>
            </div>
            <div class="card">
                <div class="input-group">
                    <div class="input-box">
                        <label for="email">Email</label>
                        <input type="email" name="email" id="email" placeholder="Digite seu email">
                    </div>
                    <div class="input-box">
                        <label for="senha">Senha</label>
                        <input type="password" name="senha" id="senha" placeholder="Digite sua senha">
                    </div>
                </div>
                <div class="continue-button">
                    <button class="button">excluir</button>
                </div>
            </div>
        </div>
    </main>

    <script src="../area-instituicao/js/menu-toggle.js"></script>

</body>

</html>