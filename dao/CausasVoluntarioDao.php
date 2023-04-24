<?php
    require_once 'global.php';

    class CausasVoluntarioDao
    {
        public static function cadastrar($causaVoluntario)
        {
            $conexao = Conexao :: conectar();

            $prepareStatement = $conexao -> prepare ( "INSERT INTO  tbcausavoluntario(codVoluntario, codCategoriaServico) 
            VALUES(?,?)");

            $prepareStatement -> bindValue (1, $causaVoluntario -> getCodVoluntario());
            $prepareStatement -> bindValue (2, $causaVoluntario -> getCodCategoria());
            $prepareStatement -> execute();

            $idVaga = $conexao->lastInsertId();

            foreach ($causaVoluntario->getCodCategoria() as $causaV) {
                $prepareStatement = $conexao->prepare("INSERT INTO  tbcausavoluntario (codCausaVoluntario, codCategoriaServico) 
                VALUES (?,?)");
                $prepareStatement->bindValue(1, $idVaga);
                $prepareStatement->bindValue(2, $causaV);
                $prepareStatement->execute();
              }
        }
    }
?>