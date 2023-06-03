<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style-login-adm.css">
     <!-- LINK ICONES -->
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Login</title>
</head>

<body class="body">
    <div class="container">
        <div class="form-image">
            <img src="img/login-adm-3.jpg" alt="">
        </div>
        <div class="form">
            <form action="area-adm/valida-login-adm.php" method="post" id="formulario">
                <div class="form-header">
                    <div class="title">
                        <h1>LOGIN</h1>
                    </div>
                </div>
                <div class="input-group">
                    <div class="input-box">
                        <label for="login">Login</label>
                        <input type="text" name="login" id="login" placeholder="Digite seu login">
                    </div>
                    <div class="input-box">
                        <label for="password">Senha</label>
                        <input type="password" name="password" id="password" placeholder="Digite sua senha">
                    </div>
                </div>
                <div class="continue-button">
                    <button class="botao-enviar" type="submit">Entrar</button>   
                </div>
            </form>
            <a class="voltar" href="index.php">Voltar para o início</a>

            <div class="box-img-logo-conecta">
                <img src="img/logo-conecta-variante.png" alt="">
            </div>
        </div>
    </div>
</body>

</html>