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

          $resultado = array();

           $total= $conexao->prepare("SELECT TIMESTAMPDIFF(YEAR, dataNascVoluntario, NOW()) AS idade FROM tbVoluntario");
           $total->execute();

           $dez = $conexao->prepare("SELECT COUNT(TIMESTAMPDIFF(YEAR, dataNascVoluntario, NOW())) AS idadeDez FROM tbVoluntario HAVING idadeDez BETWEEN '0' AND '10'");
           $dez->execute();
           $resultado['dez'] = $dez->fetch(PDO::FETCH_ASSOC);

          $vinte = $conexao->prepare("SELECT COUNT(TIMESTAMPDIFF(YEAR, dataNascVoluntario, NOW())) AS idadeVinte FROM tbVoluntario HAVING idadeVinte BETWEEN '11' AND '20'");
          $vinte->execute();
          $resultado['vinte'] = $vinte->fetch(PDO::FETCH_ASSOC);

           $trinta = $conexao->prepare("SELECT COUNT(TIMESTAMPDIFF(YEAR, dataNascVoluntario, NOW())) AS idadeTrinta FROM tbVoluntario HAVING idadeTrinta BETWEEN '21' AND '30'");
           $trinta->execute();
           $resultado['trinta'] = $trinta->fetch(PDO::FETCH_ASSOC);

           $quarenta = $conexao->prepare("SELECT COUNT(TIMESTAMPDIFF(YEAR, dataNascVoluntario, NOW())) AS idadeQuarenta FROM tbVoluntario HAVING idadeQuarenta BETWEEN '31' AND '40'");
           $quarenta->execute();
           $resultado['quarenta'] = $quarenta->fetch(PDO::FETCH_ASSOC);

           $cinquenta = $conexao->prepare("SELECT COUNT(TIMESTAMPDIFF(YEAR, dataNascVoluntario, NOW())) AS idadeCinquenta FROM tbVoluntario HAVING idadeCinquenta BETWEEN '41' AND '50'");
           $cinquenta->execute();
           $resultado['cinquenta'] = $cinquenta->fetch(PDO::FETCH_ASSOC);

           $sessenta = $conexao->prepare("SELECT COUNT(TIMESTAMPDIFF(YEAR, dataNascVoluntario, NOW())) AS idadeSessenta FROM tbVoluntario HAVING idadeSessenta BETWEEN '51' AND '60'");
           $sessenta->execute();
           $resultado['sessenta'] = $sessenta->fetch(PDO::FETCH_ASSOC);

           $setenta = $conexao->prepare("SELECT COUNT(TIMESTAMPDIFF(YEAR, dataNascVoluntario, NOW())) AS idadeSetenta FROM tbVoluntario HAVING idadeSetenta BETWEEN '61' AND '70'");
           $setenta->execute();
           $resultado['setenta'] = $setenta->fetch(PDO::FETCH_ASSOC);

           $oitenta = $conexao->prepare("SELECT COUNT(TIMESTAMPDIFF(YEAR, dataNascVoluntario, NOW())) AS idadeOitenta FROM tbVoluntario HAVING idadeOitenta >= '71'");
           $oitenta->execute();
           $resultado['oitenta'] = $oitenta->fetch(PDO::FETCH_ASSOC);


            return;
        
      }

}


?>