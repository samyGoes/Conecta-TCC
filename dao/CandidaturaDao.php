<?php 
  
    require_once 'global.php';

    class CandidaturaDao
    {

        public static function cadastrar($candidatura)
        {
            $conexao = Conexao :: conectar();

            $prepareStatement = $conexao -> prepare ( "INSERT INTO tb(nomeCategoria) 
            VALUES(?)");

            $prepareStatement -> bindValue ();
            $prepareStatement -> execute(); 
        }
    }
?>