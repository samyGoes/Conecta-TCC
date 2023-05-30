<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="css/estilo-dashboard.css">
    <link rel="stylesheet" href="css/arquivo-modelo.css">
    <title>ADM</title>
</head>

<body>

    <!-- NAV LATERAL -->
    <nav class="nav-lateral">
        <div class="nav-lateral-sessao-um">
            <i class="fa-solid fa-bars" id="nav-lateral-icon-lista"></i>
            <div class="nav-lateral-box-icon">
                <a href="dashboard.php"> <i class="fa-solid fa-chart-line"></i> <span class="nav-lateral-topico"> Dashboard
                    </span></a>
            </div>

            <div class="nav-lateral-box-icon">
                <a href="instituicoes-cadastradas.php"> <i class="fa-solid fa-hand-holding-heart"></i> <span class="nav-lateral-topico"> Instituições
                    </span></a>
            </div>

            <div class="nav-lateral-box-icon">
                <a href="habilidades-cadastradas.php"> <i class="fa-solid fa-wrench"></i> <span class="nav-lateral-topico">
                        Habilidades </span></a>
            </div>

            <div class="nav-lateral-box-icon">
                <a href="causas-cadastradas.php"> <i class="fa-sharp fa-solid fa-heart"></i> <span class="nav-lateral-topico"> Causas
                    </span></a>
            </div>
            <div class="nav-lateral-box-icon">
                <a href="vagas-cadastradas.php"> <i class="fa-solid fa-briefcase"></i> <span class="nav-lateral-topico"> Vagas
                    </span></a>
            </div>

            <div class="nav-lateral-box-icon">
                <a href="voluntarios-cadastrados.php"> <i class="fa-solid fa-person"></i> <span class="nav-lateral-topico"> Voluntários
                    </span></a>
            </div>
        </div>

        <div class="nav-lateral-sessao-dois">
            <div class="nav-lateral-box-icon">
                <a href="logout.php"> <i class="fa-solid fa-door-open" id="nav-lateral-icon-sair"></i> <span class="nav-lateral-topico"> Sair </span></a>
            </div>
        </div>
    </nav>



    <!-- CONTEUDO  -->
    <main class="main-conteudo">
        <!-- COLOCAR TODO O CONTEÚDO DENTRO DESSA SESSÃO -->
        <div class="main-conteudo-container-titulo">
            <h1>DASHBOARD</h1>
            <p>Aqui você verá todas as informações necessárias para o gerenciamento do site.</p>
        </div>

        <div class="tudo">
            <div class="conteiner-cards">

                <div class="box-card-sessao-1">

                    <div class="card-topo">
                        <?php
                        require_once 'global.php';

                        try {
                            $row = DashboardDao::SelecionaInstituicao();
                        } catch (Exception $e) {
                            echo $e->getMessage();
                        }
                        ?>

                        <div class="titulo-card"><i class="fa-solid fa-hand-holding-heart"></i> INSTITUÇÕES CADASTRADAS</div>
                        <h1><?php echo ($row[0]); ?></h1>
                    </div>

                    <div class="card-topo">

                        <?php
                        require_once 'global.php';

                        try {
                            $row = DashboardDao::SelecionaVoluntario();
                        } catch (Exception $e) {
                            echo $e->getMessage();
                        }
                        ?>
                        <div class="titulo-card"> <i class="fa-solid fa-person"></i> VOLUNTÁRIOS CADASTRADOS</div>
                        <h1><?php echo ($row[0]); ?></h1>
                    </div>

                    <div class="table">
                        <div class="table-responsive">
                            <div class="funcoes">
                                <i class="fa-solid fa-star"></i>
                                <div class="pra-guardar-titulos-tabela">
                                    <div class="titulo-table"> MELHORES AVALIAÇÕES</div>
                                    <div class="subtitulo-table">Instituições</div>
                                </div>
                            </div>
                            <table>
                                <tbody>
                                <?php


                                    require_once 'global.php';

                                    try {
                                        $row = DashboardDao::melhoresInstituicoes();
                                    } catch (Exception $e) {
                                        echo $e->getMessage();
                                    }
                                    ?>
                                    <?php
                                        foreach ($row as $instituicao) {
                                    ?> <tr>
                                            <td>
                                                <div class="td-divisao">
                                                    <div class="box-img"><img src="../area-instituicao/<?php echo $instituicao['fotoInstituicao']; ?>"></div>
                                                    <div class=".td-text">
                                                        <?php echo $instituicao['nomeInstituicao']; ?>
                                                    </div>
                                                </div>
                                            </td>
                                            <td> <?php echo $instituicao['estrelas']; ?></td>
                                        </tr>
                                    <?php
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="table">

                        <div class="table-responsive">
                            <div class="funcoes">
                                <i class="fa-solid fa-star"></i>
                                <div class="pra-guardar-titulos-tabela">
                                    <div class="titulo-table"> MELHORES AVALIAÇÕES</div>
                                    <div class="subtitulo-table"> Voluntários</div>
                                </div>
                            </div>
                            <table>
                                <tbody>
                                    <?php


                                    require_once 'global.php';

                                    try {
                                        $row = DashboardDao::melhoresVoluntarios();
                                    } catch (Exception $e) {
                                        echo $e->getMessage();
                                    }
                                    ?>
                                    <?php foreach ($row as $voluntario) { ?>
                                        <tr>
                                            <td>
                                                <div class="td-divisao">
                                                    <div class="box-img">
                                                        <img src="../area-voluntario/<?php echo $voluntario['fotoVoluntario']; ?>">
                                                    </div>
                                                    <div class=".td-text">
                                                        <?php echo $voluntario['nomeVoluntario']; ?>
                                                    </div>
                                                </div>
                                            </td>
                                            <td> <?php echo $voluntario['estrelas']; ?></td>
                                        </tr>
                                    <?php
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>

                <div class="box-card-sessao-2">

                    <div class="card-grafico">
                        <div class="funcoes">
                            <i class="fa-solid fa-hand-holding-heart"></i>
                            <div class="pra-guardar-titulos-grafico">
                                <div class="titulo-grafico"> FAIXA ETÁRIA</div>
                                <div class="subtitulo-grafico"> Voluntários</div>
                            </div>
                        </div>
                        <?php
                        // definindo porcentagem
                        $width1 = '28%';
                        $width2 = '49%';
                        $width3 = '33%';
                        $width4 = '13%';
                        $width5 = '23%';
                        $width6 = '44%';
                        $width7 = '34%';
                        $width8 = '17%';
                        $total  = 8; // total de barras

                           require_once 'global.php';

                           try{
                              $idade = DashboardDao::porcentagem();
                          } catch (Exception $e) {
                             echo $e->getMessage();
                          }
                          ?>
                         <?php
                         foreach($idade as $numero){
                            echo $numero;
                          }
                        ?>
                        <!-- <div class="table-responsive-grafico"> -->
                        <div class="box-1">
                            <div class="organizador-1">
                                <?php
                                for ($i = 1; $i <= $total; $i++) {
                                    $width = ${'width' . $i};
                                ?>
                                    <div id="barras">
                                        <div class="barra<?= $i ?> " style="width:<?= $width ?>"></div>
                                    </div>
                                <?php } ?>

                            </div>
                            <div class="organizador-2">
                                <div class="anos">
                                    <li>
                                        <ul>0 a 10</ul>
                                        <ul>10 a 20</ul>
                                        <ul>20 a 30</ul>
                                        <ul>30 a 40</ul>
                                        <ul>40 a 50</ul>
                                        <ul>50 a 60</ul>
                                        <ul>60 a 70</ul>
                                        <ul>70+</ul>
                                    </li>
                                </div>
                            </div>
                        </div>

                        <div class="box-2">
                            <div class="porcentagem">
                                <li>
                                    <ul>0%</ul>
                                    <ul>10%</ul>
                                    <ul>30%</ul>
                                    <ul>50%</ul>
                                    <ul>70%</ul>
                                    <ul>90%</ul>
                                    <ul>100%</ul>
                                </li>
                            </div>

                        </div>

                        <!-- </div> -->
                    </div>

                </div>

            </div>
        </div>

    </main>

    <script src="js/script.js"></script>
    <script src="../area-instituicao/js/script.js"></script>
</body>

</html>