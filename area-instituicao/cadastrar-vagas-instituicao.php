<?php include "../auth/verifica-logado.php";?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/cadastrar-vagas-instituicao.css">
    <title>Cadastrar Vagas instituição</title>
</head>

<body>
    <main>
        <div class="formulario">
            <form action="">
                <div class="coluna1">
                    <label for="nome">Nome</label>
                    <input type="text" name="nome" id="nome" placeholder="Digite o nome da vaga">
                    <label for="dataInicio">Data de Início</label>
                    <input type="text" name="dataInicio" id="dataInicio" placeholder="Digite a data de início">
                    <label for="Periodo">Periodo</label>
                    <input type="text" name="periodo" id="periodo" placeholder="Digite o periodo">
                    <label for="habilidades">Habilidades</label>
                    <select name="habilidades" id="habilidades">
                        <option value="">aa</option>
                    </select>
                    <label for="cep">CEP</label>
                    <input type="text" name="cep" id="cep" placeholder="Digite seu CEP">
                    <label for="bairro">Bairro</label>
                    <input type="text" name="bairro" id="bairro" placeholder="Digite seu bairro">
                    <label for="estado">Estado</label>
                    <input type="text" name="estado" id="estado" placeholder="Digite seu">
                </div>
                <div class="coluna3">
                    <label for="horario">Horário</label>
                    <input type="text" name="horario" id="horario" placeholder="Digite o horário">
                    <label for="causas">Causas</label>
                    <select name="causas" id="causas">
                        <option value="bbb">bbb</option>
                    </select>
                    <label for="logradouro">Logradrouro</label>
                    <input type="text" name="logradouro" id="logradouro" placeholder="Digite o logradouro">
                    <label for="complemento">Complemento</label>
                    <input type="text" name="complemento" id="complemento" placeholder="Digite o complemento">
                    <label for="pais">País</label>
                    <input type="text" name="pais" id="pais" placeholder="Digite o país">
                </div>
                <div class="coluna4">
                    <label for="tipoVaga">Tipo de Vaga</label>
                    <select name="tipoVaga" id="tipoVaga">
                        <option value="ccc">ccc</option>
                    </select>
                    <label for="quantidadeVaga">Quantidade de Vagas</label>
                    <input type="text" name="quantidadeVaga" id="quantidadeVaga" placeholder="Digite a quantidade de vagas">
                    <label for="numero">Número</label>
                    <input type="text" name="numero" id="numero" placeholder="Digite o número">
                    <label for="cidade">Cidade</label>
                    <input type="text" name="cidade" id="cidade" placeholder="Digite a cidade">
                </div>


            </form>
        </div>
    </main>
</body>

</html>