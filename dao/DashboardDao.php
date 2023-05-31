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

    public static function melhoresInstituicoes(){
        $conexao = Conexao::conectar();

        $query= $conexao->prepare("SELECT tbInstituicao.nomeInstituicao AS nomeInstituicao, tbInstituicao.fotoInstituicao, AVG(tbAvaliacao.numAvaliacao) AS estrelas
        FROM tbAvaliacao
        INNER JOIN tbInstituicao ON tbAvaliacao.codInstituicao = tbInstituicao.codInstituicao
        ORDER BY tbAvaliacao.numAvaliacao DESC");

        $query->execute();
        $lista = $query->fetchAll();

        return $lista;
    }

    public static function melhoresVoluntarios(){
        $conexao = Conexao::conectar();

        $query= $conexao->prepare("SELECT tbVoluntario.nomeVoluntario AS nomeVoluntario, tbVoluntario.fotoVoluntario, AVG(tbAvaliacao.numAvaliacao) AS estrelas
        FROM tbAvaliacao
        INNER JOIN tbVoluntario ON tbAvaliacao.codVoluntario = tbVoluntario.codVoluntario
        ORDER BY tbAvaliacao.numAvaliacao DESC");

        $query->execute();
        $lista = $query->fetchAll();

        return $lista;
    }

      public static function porcentagem(){
          $conexao = Conexao::conectar();

          $query= $conexao->prepare("SELECT TIMESTAMPDIFF(YEAR, dataNascVoluntario, NOW()) AS idade FROM tbVoluntario");
          $query->execute();

          $dez = $conexao->prepare("SELECT TIMESTAMPDIFF(YEAR, dataNascVoluntario, NOW()) AS idadeDez FROM tbVoluntario WHERE 'idadeDez' BETWEEN 0 AND 10");
          $dez->execute();

          $vinte = $conexao->prepare("SELECT TIMESTAMPDIFF(YEAR, dataNascVoluntario, NOW()) AS idadeVinte FROM tbVoluntario WHERE 'idadeVinte' BETWEEN 11 AND 20");
          $vinte->execute();

          $trinta = $conexao->prepare("SELECT TIMESTAMPDIFF(YEAR, dataNascVoluntario, NOW()) AS idadeTrinta FROM tbVoluntario WHERE 'idadeTrinta' BETWEEN 19 AND 30");
          $trinta->execute();
          
        $resultado = $vinte->fetch(PDO::FETCH_ASSOC);



          return $resultado;
      }

}


?>