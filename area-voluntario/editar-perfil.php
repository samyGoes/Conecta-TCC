<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style-editar-perfil.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"
        integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Editar Perfil</title>
</head>

<body>
    <header class="cabecalho">
        <div class="container-fluid">
            <nav class="nav-cabecalho">
                <img src="img/imagem-perfil.jpg" alt="" width="12px" height="12px">
                <a href="#">INICÍO</a>
                <a href="#">VOLUNTARIO</a>
                <a href="#">INSTITUIÇÕES</a>
                <a href="#">VAGAS</a>
                <a href="#">SOBRE NÓS</a>
                <a href="#">CONTATO</a>
                <a href="#">OLÁ,(NOME)</a>
            </nav>
        </div>
    </header>

    <div class="title">
        <h3>Configuração do Perfil</h3>
    </div>

    <main class="main-container">
        <div class="div-left">
            <nav class="container">
                <a class="item-a" href=""><i class="fa-regular fa-pen-to-square"></i> Editar Perfil</a>
                <a class="item-a" href=""><i class="fa-solid fa-briefcase"></i>Vagas</a>
                <a class="item-a" href=""><i class="fa-solid fa-key"></i>Trocar Senha</a>
                <a class="item-a" href="../model/delete.php"><i class="fa-solid fa-xmark"></i>Desativar Contar</a>
                <a class="item-b" href=""><i class="fa-solid fa-door-open"></i>Sair</a>
            </nav>
        </div>

        <div class="div-right">
            <div class="title-2">
                <h2>EDITAR PERFIL</h2>
                <p>Digite as novas informações que deseja alterar</p>
            </div>
            <form class="form-config">
                <div class="box-form-1">
                    <div>
                        <label for="">Foto</label>
                        <button type="submit" id="buttonPhoto">Clique para escolher uma foto</button>
                    </div>
                    <div>
                        <label for="">Nome</label>
                        <input type="text" class="" id="Nome" placeholder="Digite seu nome...">
                    </div>
                </div>

                <div class="box-form-2">
                    <div>
                        <label for="">Email</label>
                        <input type="email" class="" id="Email" placeholder="Digite seu email...">
                    </div>
                    <div>
                        <label for="">Telefone</label>
                        <input type="number" class="" id="Telefone" placeholder="Digite seu telefone">
                    </div>
                </div>

                <div class="box-form-3">
                    <div>
                        <label for="">Logradouro</label>
                        <input type="text" class="" id="Logradouro" placeholder="Digite sua rua, avenida...">
                    </div>
                    <diV>
                        <label for="">Número</label>
                        <input type="number" class=" " id="Número" placeholder="Digite o número da sua casa...">
                    </div>
                    <diV>
                        <label for=" ">CEP</label>
                        <input type="number " class=" " id="CEP" placeholder="Digite seu CEP...">
                    </div>

                </div>

                <div class="box-form-4">
                    <div>
                        <label for=" ">Bairro</label>
                        <input type="text" class="" id="Bairro" placeholder="Digite seu bairro">
                    </div>
                    <div>
                        <label for="cidade">Cidade</label>
                        <select name="cidade" id="cidade">
                            <option value="">Selecione sua cidade</option>
                        </select>
                    </div>
                    <div>
                        <label for="uf">Estado</label>
                        <select name="uf" id="uf">
                            <option value="">Selecione seu estado</option>
                        </select>
                    </div>
                </div>
                <div class="box-form-5">
                    <div>
                        <label for=" ">Complemento</label>
                        <input type="text" class=" " id="Complemento " placeholder="Digite seu complemento...">
                    </div>
                    <div>
                        <label for=" ">País</label>
                        <select name="Pais" id="selectCountry">
                            <option value="">Selecione seu país</option>
                        </select>
                    </div>
                </div>
                <button type="submit" id="buttonConfirm">SALVAR</button>
            </form>
        </div>
    </main>
    <script src="js/js.editar.js"></script>
</body>

</html>