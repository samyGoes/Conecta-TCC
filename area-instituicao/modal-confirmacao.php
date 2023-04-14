<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modal Confirmação</title>
    <link rel="stylesheet" href="css/estilo-modal-confirmacao.css">

</head>

<body>

    <div class="abrir-modal"> <button id="open-modal"> Abrir modal </button></div>

    <div id="modal" class="modal">
        <div class="form" id="form">
            <span class="close">&times;</span>
            <h2 class="titulo" id="titulo"> Confirmação de acesso </h2>

            <form class="form-modal" action="" method="POST" id="form-modal">
                <div class="input-box" id="input-box">
                    <label for="" class="email"> Email </label>
                    <input placeholder="Digite seu email" type="email" name="email" id="email" class="input-email">
                </div>
                <div class="input-box">
                    <label for="" class="senha"> Senha </label>
                    <input placeholder="Digite sua senha" type="password" name="senha" id="senha" class="input-senha">
                </div>
                <div class="btn-confirmed" id="btn-confirmed"><button type="submit">Confirmar</button></div>
            </form>
        </div>
    </div>


    <script src="js/modal.js"></script>
</body>

</html>