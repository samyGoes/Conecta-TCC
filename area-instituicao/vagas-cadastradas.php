<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/estilo-vagas-cadastradas-instituicao.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Document</title>
</head>

<body>
    <div class="cards">
        <?php
        for ($i = 1; $i <= 3; $i++) {
        ?>
            <div class="card-carrossel-dois">
                <div class="content-it">
                    <div class="header-card-carrossel-it">
                        <i id="icon-maps-flip" style="display:none" class="fa-solid fa-location-dot fa-flip"></i>
                        <i id="icon-maps" class="fa-solid fa-location-dot"></i>
                        <p> São Paulo </p>
                    </div>
                    <div class="fundo">
                        <div class="fundo-img">
                            <img src="img/user2.png">
                        </div>
                        <div class="title-2">
                            <p> ONG abraço </p>
                        </div>
                    </div>

                    <div class="title-3">
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Corporis consequatur numquam, neque hic quaerat sint, quae optio odit adipisci nemo quo laboriosam quam tenetur eveniet laudantium, illum eius ipsa voluptate!</p>
                    </div>
                    <a href="#"><button class="card-carrossel-botao" id="botao-it">
                            VER
                        </button></a>
                </div>
            </div>
        <?php
        }
        ?>

    </div>

    <script src="../area-voluntario/js/carrossel-vagas.js"></script>
</body>

</html>