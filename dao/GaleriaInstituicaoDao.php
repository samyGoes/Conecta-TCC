<?php

    require_once 'global.php';

    class GaleriaInstituicaoDao
    {
        public static function cadastrar($galeriaInstituicao)
        {
            $conexao = Conexao :: conectar();

            $prepareStatement = $conexao -> prepare ( "INSERT INTO tbFotosInstituicao(idFotosIntituicao, fotosInstituicao, codintituicao) 
            VALUES(?,?,?)");

            $prepareStatement -> bindValue (1, $galeriaInstituicao -> getIdGaleriaFoto());
            $prepareStatement -> bindValeu (2, $galeriaInstituicao -> getFotoGaleria());
            $prepareStatement -> bindValeu (3, $galeriaInstituicao -> getIdInstituicao());
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