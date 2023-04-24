<?php

    require_once '../auth/verifica-logado.php';
    require_once 'global.php';

    //Cadastrando as causas que o voluntario apoia
    try
    {
        $causaVoluntario = new CausaVoluntario ;

        $causaVoluntario -> setCodCategoria($_POST['causas']);
        $causaVoluntario -> setCodVoluntario($_SESSION['codUsuario']);


        $cadastrar = CausasVoluntarioDao:: cadastrar($causaVoluntario);
     
    }
    catch(Exception $e)
    {
        echo "Erro cadastra-instituição";
        echo '<pre>';
            echo($e);
        echo '</pre>';
         
    }

?>