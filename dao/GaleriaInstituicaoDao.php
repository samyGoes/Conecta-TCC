<?php

    require_once 'global.php';

    class GaleriaInstituicaoDao
    {
        public static function cadastrar($galeriaInstituicao)
        {
            $conexao = Conexao :: conectar();

            $prepareStatement = $conexao -> prepare ( "INSERT INTO tbFotosInstituicao(idFotosIntituicao, fotosInstituicao) 
            VALUES(?,?)");

            $prepareStatement -> bindValue (1, $galeriaInstituicao -> getFotoGaleria());
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

        //public static function editar($galeriaInstituicao)
        //{
            //Conexão com o banco de dados
           // $conectar=Conexao::conectar();

            //Editando 
           // $prepareStatement = $conectar->prepare("UPDATE tbFotosInstituicao SET fotosInstituicao = ?")

           // $prepareStatement -> bindValue (1, $galeriaInstituicao -> getFotoGaleria());

           // $prepareStatement -> execute();

            //Guardando o id 
           // $idFotoInsti = $galeriaInstituicao->getId();

            //Excluindo 
           // $deleteFotoInsti = $conectar->prepare("DELETE FROM tbFotosInstituicao WHERE codServico = ?");
           // $deleteFotoInsti->bindValue(1,$$idFotoInsti);
           // $deleteFotoInsti->execute();

        //}


       // public static function excluir($codFotoInsti)
        //{
         //   $conectar=Conexao::conectar();

        //    $deleteHabiVaga = $conectar->prepare("DELETE FROM tbFotosInstituicao WHERE codServico = ?");
        //    $deleteHabiVaga->bindValue(1,$cod);
        //    $deleteHabiVaga->execute();

//        }

    }