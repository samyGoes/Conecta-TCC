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

        $query= $conexao->prepare("SELECT dataNascVoluntario, DATEDIFF(YY, dataNascVoluntario, GETDATE() - 
        CASE WHEN DATEADD(YY, DATEDIFF(YY, dataNascVoluntario, GETDATE()), dataNascVoluntario) > GETDATE() THEN 1 ELSE 0 AS idade FROM tbVoluntarios");
        $query->execute();

        echo $query;

        // $dataNasc = $query;

        // list($ano, $mes, $dia) = explode('-', $dataNasc);

        // $hoje= mktime(0,0,0, date('m'), date('d'), date('Y'));

        // $nascimento = mktime(0,0,0, $mes, $dia, $ano);

        // $idade = floor((((($hoje - $nascimento) / 60) / 60) / 24) / 365.25);

        // return $idade;
    }

    public static function melhoresInstituicoes(){
        $conexao = Conexao::conectar();

        $query= $conexao->prepare("SELECT nomeVoluntario, AVG(numAvaliacao) AS estrelas FROM tbAvaliacao");
        
    }
   
}


?>