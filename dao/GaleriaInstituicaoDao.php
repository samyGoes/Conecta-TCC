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

        public static function listar($cod)
        {
            $conexao = Conexao::conectar();
            $querySelect = $conexao->prepare("SELECT  fotosInstituicao FROM tbFotosInstituicao WHERE codInstituicao = ?");
            $querySelect->bindValue(1, $cod);
            $querySelect->execute();
            $resultado = $querySelect->fetchAll(PDO::FETCH_ASSOC); 
            return $resultado; 
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