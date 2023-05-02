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

        public static function listar(){
            $conexao = Conexao :: conectar();
            $querySelect = "SELECT codVoluntario, nomeVoluntario, cidadeVoluntario, estadoVoluntario, paisVoluntario, fotoVoluntario FROM tbCandidatura
            INNER JOIN tbVoluntario ON tbCandidatura.codVoluntario = tbVoluntario.codVoluntario";
            //"SELECT codVoluntario, nomeVoluntario, descVoluntario, emailVoluntario, cidadeVoluntario, estadoVoluntario, paisVoluntario, fotoVoluntario FROM tbVoluntario";
            $resultado = $conexao -> query($querySelect);
            $lista = $resultado -> fetchAll();
            return $lista;
        }
    }
?>