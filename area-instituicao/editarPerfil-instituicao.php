<?php include "../auth/verifica-logado.php";?>
<?php 
     require_once 'global.php'; 
?>
<!DOCTYPE html>
<html lang="pt-br">
<meta charset="UTF-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<link rel="stylesheet" href="../area-instituicao/css/style-editarPerfil-insituicao.css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"
    integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
<title>Editar Perfil</title>
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
                <a href="#"><i class="fa-solid fa-user"></i>OLÁ, <?php echo $_SESSION['nomeUsuario']; ?></a>
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

        <div class="form">
            <form class="container" action="cadastra-produto.php" method="post" enctype="multipart/form-data">
                <div class="form-header">
                    <div class="form-title">
                        <h2>EDITAR PERFIL</h2>
                        <h4>Digite as novas informações que deseja alterar</h4>
                    </div>
                </div>

                <div class="input-group">
                    <div class="input-box">
                        <div>
                            <label for="">Nome</label>
                            <input type="text" name="nome" id="nome" placeholder="Digite seu nome" value="<?php echo $_SESSION['nomeUsuario']; ?>" />
                        </div>
                        <div>
                            <label for="">Email</label>
                            <input type="email" name="email" id="email" placeholder="Digite seu email" value="<?php echo $_SESSION['emailUsuario']; ?>" />
                        </div>
                    </div>

                    <div class="input-box">
                        <div>
                            <label for="">Telefone (Fixo)</label>
                            <input type="tel" name="telefone" id="telefone" placeholder="(xx)xxxx-xxxx" value="<?php echo $_SESSION['numFoneUsuario1']; ?>"  />
                        </div>
                        <div>
                            <label for="">Telefone (Cel)</label>
                            <input type="tel" name="telefone-2" id="telefone-2" placeholder="(xx)xxxxx-xxxx" value="<?php echo $_SESSION['numFoneUsuario2']; ?>" />
                        </div>
                    </div>

                    <div class="input-box">
                        <div>
                            <label for="">Logradouro</label>
                            <input type="text" name="log" id="log" placeholder="Digite sua rua, avenida" value="<?php echo $_SESSION['logUsuario']; ?>" />
                        </div>
                        <div>
                            <label for="">Número</label>
                            <input type="text" name="número" id="num" placeholder="Digite o n°"  value="<?php echo $_SESSION['numLogUsuario']; ?>"  />
                        </div>
                        <div>
                            <label for=" ">CEP</label>
                            <input type="text " name="cep" id="cep" placeholder="Digite seu CEP" value="<?php echo $_SESSION['cepUsuario']; ?>"  />
                        </div>
                    </div>

                    <div class="input-box">
                        <div>
                            <label for=" ">Bairro</label>
                            <input type="text" name="bairro" id="bairro" placeholder="Digite seu bairro" value="<?php echo $_SESSION['bairroUsuario']; ?>"  />
                        </div>
                        <div>
                            <label for="cidade">Cidade</label>
                            <select name="cidade" id="cidade">
                                <option disabled value="">Selecione sua cidade</option>
                                <option value="São Paulo"<?php if($_SESSION['cidadeUsuario'] == 'São Paulo') echo 'selected'; ?>>São Paulo</option>
                                <option value="Rio de Janeiro"<?php if($_SESSION['cidadeUsuario'] == 'Rio de Janeiro') echo 'selected'; ?>>Rio de Janeiro</option>
                                <option value="Belo Horizonte"<?php if($_SESSION['cidadeUsuario'] == 'Belo Horizonte') echo 'selected'; ?>>Belo Horizonte</option>
                            </select>
                        </div>
                        <div>
                            <label for="uf">Estado</label>
                            <select name="uf" id="uf">
                                <option disabled value="">Selecione seu estado</option>
                                <option value="SP"<?php if($_SESSION['estadoUsuario'] == 'SP') echo 'selected'; ?>>SP</option>
                                <option value="RJ"<?php if($_SESSION['estadoUsuario'] == 'RJ') echo 'selected'; ?>>RJ</option>
                                <option value="BH"<?php if($_SESSION['estadoUsuario'] == 'BH') echo 'selected'; ?>>BH</option>
                            </select>
                        </div>
                    </div>

                    <div class="input-box">
                        <div>
                            <label for=" ">Complemento</label>
                            <input type="text" name="complemento" id="comp" placeholder="Digite o complemento" value="<?php echo $_SESSION['compUsuario']; ?>" />
                        </div>
                        <div>
                            <label for="">País</label>
                            <select name="Pais" id="pais">
                                <option disabled>Selecione seu país</option>
                                <option value="Brasil"<?php if($_SESSION['paisUsuario'] == 'Brasil') echo 'selected'; ?>>Brasil</option>
                                <option value="Japão"<?php if($_SESSION['paisUsuario'] == 'Japão') echo 'selected'; ?>>Japão</option>
                                <option value="Portugal"<?php if($_SESSION['paisUsuario'] == 'Portugal') echo 'selected'; ?>>Portugal</option>
                            </select>
                        </div>
                        <div>
                            <label for="">Foto</label>
                            <input type="file" accept="" id="foto"
                                placeholder="Clique aqui para escolher uma foto">
                        </div>
                    </div>

                    <div class="input-box">
                        <div>
                            <label for="">Descrição</label>
                            <textarea name="" id="desc" cols="83" rows="10" width="570px" height="90px" placeholder="Digite sua descriçao" value="<?php echo $_SESSION['descUsuario']; ?>"></textarea>
                        </div>
                        <div>
                            <img src="img/user.png" id="img" width="100px" height="100px" alt="">
                        </div>
                    </div>
                </div>

                <div class="continue-button">
                    <button type="submit"><a href="">SALVAR</a></button>
                </div>
            </form>
        </div>

    </main>

    <script src="js/menu-toggle.js"></script>
    <script src="js/cidadesEstado.js"></script>
</body>
</html>