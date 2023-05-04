<!DOCTYPE html>
<html lang="pt-br">

  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style-opcao-cadastro.css" />
    <title> Opções de Cadastro </title>
  </head>

  <body>

  

    <main>
      <div class="image-header"></div>

      <div class="container">
        <div class="titles">
          <h1>PARA <label>CRIAR UMA CONTA</label> SELECIONE UMA OPÇÃO</h1>
          <h3>Você é um voluntário ou uma instituição?</h3>
        </div>

        <div class="buttons-rows">
          <a href="form-voluntario.php"><button id="btn-voluntario" class="button-confirm">VOLUNTÁRIO</button></a>
          <a href="form-instituicao.php"><button id="btn-instituicao" class="button-confirm">INSTITUIÇÃO</button></a>
        </div>
      
        <div class="link">
          <a class="voltar" href="form-login.php">Voltar para o login </a>
        </div>

      </div>

      <div class="image-footer"></div>
    </main>


    
    <script src="js/opcao-cadastro.js"></script>
  </body>

</html>