<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style-form-voluntario-instituicao.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Cadastro do Voluntário </title>
</head>

<body class="body">
    <div class="image-fundo">
        <!-- <div id="form1"> -->
        <div class="container" id="primeiro-conteudo-v">
            <div class="form-image">
                <img src="img/mao4.jpg" alt="">
            </div>
            <div class="form">
              
                <!-- TÍTULO -->
                <div class="form-header">
                    <div class="title">
                        <h1 class="titulo-cadastro">Cadastro do Voluntário</h1>
                    </div>
                </div>

                <!-- BOTÕES PARA MUDAR OS CAMPOS DO FORMULÁRIO -->
                <div class="select-button">
                    <button id="botao-dados-pessoais" type="button">Dados pessoais</button>
                    <button id="botao-endereco" type="button">Endereço</button>
                </div>

                <!-- FORMULÁRIO COMPLETO -->
                <form class="formulario-completo" id="formulario-voluntario" action="cadastra-voluntario.php" method="POST">
                      <!-- SETAS -->
                    <i id="seta-direita" class="fa-solid fa-arrow-right"></i>
                    <i id="seta-esquerda" class="fa-solid fa-arrow-left"></i>
                    <div id="formulario1">
                        <div class="input-group" id="input-group-v">
                            <div class="input-box">
                                <label for="name">Nome Completo</label>
                                <input type="text" name="nome" class="inputs required" id="name" oninput="nameValidate()" placeholder="Digite seu nome">
                                <span class="span-required"></span>

                            </div>
                            <div class="input-box">
                                <label for="date">Data de Nascimento</label>
                                <!-- <input type="date" name="date" class="inputs required" id="date" pattern="\d{2}/\d{2}/\d{4}" placeholder="Digite sua data de nasc..." oninput="dateValidate()"> -->
                                <input type="text" name="date" class="inputs required" id="date" placeholder="Digite sua data de nasc..." >
                                <span class="span-required"></span>
                            </div>
                            <div class="input-box">
                                <label for="cpf">CPF</label>
                                <input type="text" name="cpf" class="inputs required" id="cpf" placeholder="Digite seu CPF" oninput="cpfValidate()">
                                <span class="span-required"></span>
                            </div>
                            <div class="input-box">
                                <label for="telefone">Telefone</label>
                                <input type="text" name="telefone1" class="inputs required" id="telefone" placeholder="Digite seu telefone" >
                                <span class="span-required"></span>
                            </div>
                            <div class="input-box">
                                <label for="telefone">Telefone (opcional)</label>
                                <input type="text" name="telefone2" class="inputs required" id="telefone2" placeholder="Digite seu telefone" >
                                <span class="span-required"></span>
                            </div>
                            <div class="input-box">
                                <label for="email">Email</label>
                                <input type="email" name="email" class="inputs required" oninput="emailValidate()" id="email" placeholder="Digite seu email">
                                <span class="span-required"></span>
                            </div>
                            <div class="input-box">
                                <label for="senha">Senha</label>
                                <input type="password" name="senha" class="inputs required" id="senha" placeholder="Digite sua senha" oninput="passwordValidate()">
                                <span class="span-required"></span>
                            </div>
                            <div class="input-box">
                                <label for="senha">Confirmar senha</label>
                                <input type="password" name="confSenha" class="inputs required" id="confSenha" placeholder="Digite sua senha" oninput="confirmPassword()">
                                <span class="span-required"></span>
                            </div>

                            <div class="input-box" id="input-box-switch">
                                <label for=""> Deixar meu perfil público</label>
                                <div class="switch-container">
                                    <input class="input-switch" type="checkbox" name="switch" id="switch">
                                    <label class="switch" for="switch"></label>
                                </div>
                            </div>

                            <div class="input-box" id="input-box-termos">
                                <div class="aa">
                                    <input type="checkbox" name="" id="">
                                    <label for=""> <a href="termos-de-uso.php"> Aceito os termos de uso. </a></label>   
                                </div>                        
                            </div>
                        </div>
                    </div>


                    <!-- ENDEREÇO -->
                    <div id="formulario2" style="display: none;">
                        <div class="input-group" id="input-group-v">
                            <div class="input-box">
                                <label for="cep">CEP</label>
                                <input type="text" name="cep" class="inputs required" id="cep" placeholder="Digite seu CEP">
                            </div>
                            <div class="input-box">
                                <label for="numeroCasa">Número</label>
                                <input type="text" name="numLog" class="inputs required" id="numeroCasa" placeholder="Digite o n° da sua casa">
                            </div>
                            <div class="input-box">
                                <label for="logradouro">Logradouro</label>
                                <input type="text" name="logradouro" class="inputs required" id="logradouro" readonly>
                            </div>
                            <div class="input-box">
                                <label for="bairro">Bairro</label>
                                <input type="text" name="bairro" class="inputs required" id="bairro" readonly>
                            </div>
                            <div class="input-box">
                                <label for="comp">Complemento</label>
                                <input type="text" name="complemento" class="inputs required" id="comp" placeholder="Digite o complemento">
                            </div>
                            <div class="input-box">
                                <label for="uf">Estado</label>
                                <input name="uf" class="inputs required" id="uf" readonly>
                            </div>
                            <div class="input-box">
                                <label for="cidade">Cidade</label>
                                <input name="cidade" class="inputs required" id="cidade" readonly>
                            </div>
                            <div class="input-box">
                                <label for="pais">País</label>
                                <input name="pais" class="inputs required" id="pais" placeholder="Digite seu país">
                            </div>
                            <div class="input-box">
                                <div class="div-vazia-kk"></div>
                            </div>
                        </div>
                        <br>
                    </div>
                    <div class="continue-button">
                        <button type="submit">CADASTRAR</button>
                        <a href="opcao-cadastro.php">Voltar para opções de cadastro</a>
                    </div>
                </form>

                <div class="box-img-logo-conecta">
                    <img src="img/logo-conecta-variante.png" alt="">
                </div>
            </div>
        </div>
        <!-- </div> -->
    </div>


<script src="js/valida-voluntario.js"></script>  
    <script src="js/endereco-auto.js"></script>
    <!--Máscaras do formulário-->
    <script src="js/mascarasForm.js"></script>
    <script>
        adicionarMascaraTelefone('#telefone');
        adicionarMascaraTelefone('#telefone2');
        adicionarMascaraCpf('#cpf');
        adicionarMascaraCep('#cep'); 

    </script>

 




    <script>
        const form1 = document.querySelector("#formulario1");
        const form2 = document.querySelector("#formulario2");
        const botaoDados = document.querySelector("#botao-dados-pessoais");
        const botaoEndereco = document.querySelector("#botao-endereco");
        const setaDireita = document.querySelector("#seta-direita");
        const setaEsquerda = document.querySelector("#seta-esquerda");
        

        botaoEndereco.addEventListener('click', function() {
            // oculta o Formulário 1
            form1.style.display = 'none';

            // exibe o Formulário 2
            form2.style.display = 'flex';

            // MUDAR COR DO BOTÃO QUANDO TIVER NA SESSÃO RESPECTIVA  
            botaoEndereco.style.backgroundColor = "#cf8a3f";
            botaoEndereco.style.color = "#fff";

            botaoDados.style.backgroundColor = "#fff";
            botaoDados.style.color = "#cf8a3f";

            //SETAS
            setaDireita.style.display = "none"
            setaEsquerda.style.display = "block"
        });

        botaoDados.addEventListener('click', function() {

            // exibe o Formulário 1
            form1.style.display = 'flex';

            //oculta o Formulário 2
            form2.style.display = 'none';

            // MUDAR COR DO BOTÃO QUANDO TIVER NA SESSÃO RESPECTIVA
            botaoDados.style.backgroundColor = "#cf8a3f";
            botaoDados.style.color = "#fff";

            botaoEndereco.style.backgroundColor = "#fff";
            botaoEndereco.style.color = "#cf8a3f";

            // SETAS
            setaEsquerda.style.display = "none"
            setaDireita.style.display = "block"
        });

        setaDireita.addEventListener('click', function() {
            // oculta o Formulário 1
            form1.style.display = 'none';

            // exibe o Formulário 2
            form2.style.display = 'flex';

            // MUDAR COR DO BOTÃO QUANDO TIVER NA SESSÃO RESPECTIVA  
            botaoEndereco.style.backgroundColor = "#cf8a3f";
            botaoEndereco.style.color = "#fff";

            botaoDados.style.backgroundColor = "#fff";
            botaoDados.style.color = "#cf8a3f";

            //SETAS
            setaDireita.style.display = "none"
            setaEsquerda.style.display = "block"
        })

        setaEsquerda.addEventListener('click', function() {

            // exibe o Formulário 1
            form1.style.display = 'flex';

            //oculta o Formulário 2
            form2.style.display = 'none';

            // MUDAR COR DO BOTÃO QUANDO TIVER NA SESSÃO RESPECTIVA
            botaoDados.style.backgroundColor = "#cf8a3f";
            botaoDados.style.color = "#fff";

            botaoEndereco.style.backgroundColor = "#fff";
            botaoEndereco.style.color = "#cf8a3f";
            setaEsquerda.style.display = "none"
            setaDireita.style.display = "block"
        })
    </script>
</body>

</html>