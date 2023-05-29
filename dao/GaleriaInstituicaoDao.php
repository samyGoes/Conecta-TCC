<?php

    require_once 'global.php';

    class GaleriaInstituicaoDao
    {
        public static function cadastrar($galeriaInstituicao)
        {
            $conexao = Conexao :: conectar();

            $prepareStatement = $conexao -> prepare ( "INSERT INTO tbFotosInstituicao(fotosInstituicao, codInstituicao) 
            VALUES(?,?)");

            $prepareStatement -> bindValue (1, $galeriaInstituicao -> getFotoGaleria());
            $prepareStatement -> bindValue (2, $galeriaInstituicao -> getIdInstituicao());
            $prepareStatement -> execute();
     
        }

        public static function listar()
        {
            $conexao = Conexao::conectar();
            $querySelect = "SELECT  fotosInstituicao FROM tbFotosInstituicao";
            $resultado = $conexao->query($querySelect);
            $lista = $resultado->fetchAll();
            return $lista;  
        }

        public static function excluir($codFotoInsti)
        {
           $conectar=Conexao::conectar();

           $deleteFotoInsti = $conectar->prepare("DELETE FROM tbFotosInstituicao WHERE idFotosInstituicao = ?");
           $deleteFotoInsti->bindValue(1,$codFotoInsti);
           $deleteFotoInsti->execute();

        }

    }

?>