<?php

require_once 'global.php';
class DashboardDao
{
    public static function SelecionaInstituicao(){
        $conexao = Conexao::conectar();
        
        $stmt= $conexao->prepare("SELECT codInstituicao FROM tbInstituicao");
        $stmt-> execute();

        $selectQuery = "SELECT COUNT(codInstituicao) AS qtd FROM tbInstituicao";
        $resultado = $conexao->query($selectQuery);
        $resultado->execute();
        $qtdInstituicao = $resultado->fetchAll(PDO::FETCH_COLUMN);

        return $qtdInstituicao;
    }

    public static function SelecionaVoluntario(){
        $conexao = Conexao::conectar();
        
        $stmt= $conexao->prepare("SELECT codVoluntario FROM tbVoluntario");
        $stmt-> execute();

        $selectQuery = "SELECT COUNT(codVoluntario) AS qtd FROM tbVoluntario";
        $resultado = $conexao->query($selectQuery);
        $resultado->execute();
        $qtdVoluntario = $resultado->fetchAll(PDO::FETCH_COLUMN);

        return $qtdVoluntario;
    }

    public static function porcentagem(){
        $conexao = Conexao::conectar();

        $query= $conexao->prepare("SELECT TIMESTAMPDIFF(YEAR, dataNascVoluntario, NOW()) AS idade FROM tbVoluntario");
        $query->execute();

        $dez = $conexao->prepare("SELECT TIMESTAMPDIFF(YEAR, dataNascVoluntario, NOW()) LIKE BETWEEN '0' AND '10' AS dez FROM tbVoluntario");
        $dez->execute();

        $vinte = $conexao->prepare("SELECT AVG(TIMESTAMPDIFF(YEAR, dataNascVoluntario, NOW()) LIKE BETWEEN '11' AND '20' AS vinte) FROM tbVoluntario");
        $vinte->execute();

        $trinta = $conexao->prepare("SELECT AVG(TIMESTAMPDIFF(YEAR, dataNascVoluntario, NOW()) LIKE BETWEEN '21' AND '30' AS trinta) FROM tbVoluntario");
        $trinta->execute();
     $resultado = $query->fetch(PDO::FETCH_ASSOC);



        return $resultado;
    }

    public static function melhoresInstituicoes(){
        $conexao = Conexao::conectar();

        $query= $conexao->prepare("SELECT nomeVoluntario, AVG(numAvaliacao) AS estrelas FROM tbAvaliacao");
        
    }
   
}


?>