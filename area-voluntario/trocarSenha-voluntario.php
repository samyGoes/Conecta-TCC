<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style-trocarSenha-volunatio.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <title>Document</title>
</head>

<body>
    <header>
        <div class="container">
            <nav class="nav-header">
                <img src="" alt="" width="12px" height="12px" />
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
        <div class="div-left">
            <nav class="nav-left">
                <a class="item-a" href=""><i class="fa-regular fa-pen-to-square"></i> Editar Perfil</a>
                <a class="item-a" href=""><i class="fa-solid fa-briefcase"></i>Vagas</a>
                <a class="item-a" href=""><i class="fa-solid fa-key"></i>Trocar Senha</a>
                <a class="item-a" href=""><i class="fa-solid fa-xmark"></i>Desativar Contar</a>
                <a class="item-b" href=""><i class="fa-solid fa-door-open"></i>Sair</a>
            </nav>
        </div>
        <div class="div-right">
            <div class="title-card">
                <h3>TROCAR SENHA</h3>
                <p>Digite uma nova senha. Está não pode ser igual à anterior</p>
            </div>
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
        </div>

    </main>
</body>

</html>