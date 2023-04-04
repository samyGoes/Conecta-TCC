<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="css/estili-instituicoes-cadastradas.css">
    <title>ADM</title>
</head>

<body>
    <header>
        <h1>Instituiçóes cadastradas</h1>
    </header>
    <main>

        <div class="table-responsive">
            <table>
                <thead>
                    <tr>
                        <td style="text-align: left; margin-left: 3%; display: flex; border: none; gap: 10px;">
                            <div class="selecionar-todos">
                                <span>Selecionar Todos</span>
                            </div>
                            <div class="checkbox">
                                <input type="checkbox" name="selectTodos" id="selectTodos">
                            </div>
                            <div class="icon"><i class="fa-solid fa-circle-xmark"></i></div>
                        </td>
                        <td colspan="7" style="border: none; text-align: right;">
                            <input type="text" placeholder="Pesquisar..."> <i class="fa-solid fa-magnifying-glass"></i>
                        </td>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th>
                        </th>
                        <th>
                            ID
                        </th>
                        <th>
                            Foto
                        </th>
                        <th>
                            Nome
                        </th>
                        <th>
                            Email
                        </th>
                        <th>
                            Cidade
                        </th>
                        <th>
                            UF
                        </th>
                        <th>
                            País
                        </th>
                    </tr>
                    <tr>
                        <?php
                        for ($i = 1; $i < +5; $i++) {
                        ?>
                            <td>
                                <input type="checkbox" name="select" id="select">
                            </td>
                            <td>
                                1
                            </td>
                            <td>
                                <img src="img/user.png" alt="">
                            </td>
                            <td>
                                Flor do Norte
                            </td>
                            <td>
                                marcoserick@gmail.com
                            </td>
                            <td>
                                São Paulo
                            </td>
                            <td>
                                SP
                            </td>
                            <td>
                                Brasil
                            </td>
                    </tr>
                <?php
                        }
                ?>
                </tbody>
            </table>
        </div>
    </main>
</body>

</html>