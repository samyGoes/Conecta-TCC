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

          

           $total= $conexao->prepare("SELECT COUNT(TIMESTAMPDIFF(YEAR, dataNascVoluntario, NOW())) AS total_registros FROM tbVoluntario");
           $total->execute();
           $total_registros = $total->fetch(PDO::FETCH_ASSOC)['total_registros'];


           $idades = array();

           $dez = $conexao->prepare("SELECT DATE_FORMAT(dataNascVoluntario, '%d/%m/%Y') as dataNascVoluntario, COUNT(TIMESTAMPDIFF(YEAR, dataNascVoluntario, NOW())) AS idadeDez
           FROM tbVoluntario
           WHERE TIMESTAMPDIFF(YEAR, dataNascVoluntario, NOW()) BETWEEN 0 AND 10");
           $dez->execute();
           $idades['dez'] = $dez->fetch(PDO::FETCH_ASSOC)['idadeDez'];

           $vinte = $conexao->prepare("SELECT DATE_FORMAT(dataNascVoluntario, '%d/%m/%Y') as dataNascVoluntario, COUNT(TIMESTAMPDIFF(YEAR, dataNascVoluntario, NOW())) AS idadeVinte
           FROM tbVoluntario
           WHERE TIMESTAMPDIFF(YEAR, dataNascVoluntario, NOW()) BETWEEN 11 AND 20");
           $vinte->execute();
           $idades['vinte'] = $vinte->fetch(PDO::FETCH_ASSOC)['idadeVinte'];

           $trinta = $conexao->prepare("SELECT DATE_FORMAT(dataNascVoluntario, '%d/%m/%Y') as dataNascVoluntario, COUNT(TIMESTAMPDIFF(YEAR, dataNascVoluntario, NOW())) AS idadeTrinta
           FROM tbVoluntario
           WHERE TIMESTAMPDIFF(YEAR, dataNascVoluntario, NOW()) BETWEEN 21 AND 30");
           $trinta->execute();
           $idades['trinta'] = $trinta->fetch(PDO::FETCH_ASSOC)['idadeTrinta'];

           $quarenta = $conexao->prepare("SELECT DATE_FORMAT(dataNascVoluntario, '%d/%m/%Y') as dataNascVoluntario, COUNT(TIMESTAMPDIFF(YEAR, dataNascVoluntario, NOW())) AS idadeQuarenta
           FROM tbVoluntario
           WHERE TIMESTAMPDIFF(YEAR, dataNascVoluntario, NOW()) BETWEEN 31 AND 40");
           $quarenta->execute();
           $idades['quarenta'] = $quarenta->fetch(PDO::FETCH_ASSOC)['idadeQuarenta'];

           $cinquenta = $conexao->prepare("SELECT DATE_FORMAT(dataNascVoluntario, '%d/%m/%Y') as dataNascVoluntario, COUNT(TIMESTAMPDIFF(YEAR, dataNascVoluntario, NOW())) AS idadeCinquenta
           FROM tbVoluntario
           WHERE TIMESTAMPDIFF(YEAR, dataNascVoluntario, NOW()) BETWEEN 41 AND 50");
           $cinquenta->execute();
           $idades['cinquenta'] = $cinquenta->fetch(PDO::FETCH_ASSOC)['idadeCinquenta'];

           $sessenta = $conexao->prepare("SELECT DATE_FORMAT(dataNascVoluntario, '%d/%m/%Y') as dataNascVoluntario, COUNT(TIMESTAMPDIFF(YEAR, dataNascVoluntario, NOW())) AS idadeSessenta
           FROM tbVoluntario
           WHERE TIMESTAMPDIFF(YEAR, dataNascVoluntario, NOW()) BETWEEN 51 AND 60");
           $sessenta->execute();
           $idades['sessenta'] = $sessenta->fetch(PDO::FETCH_ASSOC)['idadeSessenta'];

           $setenta = $conexao->prepare("SELECT DATE_FORMAT(dataNascVoluntario, '%d/%m/%Y') as dataNascVoluntario, COUNT(TIMESTAMPDIFF(YEAR, dataNascVoluntario, NOW())) AS idadeSetenta
           FROM tbVoluntario
           WHERE TIMESTAMPDIFF(YEAR, dataNascVoluntario, NOW()) BETWEEN 61 AND 70");
           $setenta->execute();
           $idades['setenta'] = $setenta->fetch(PDO::FETCH_ASSOC)['idadeSetenta'];

           $oitenta = $conexao->prepare("SELECT DATE_FORMAT(dataNascVoluntario, '%d/%m/%Y') as dataNascVoluntario, COUNT(TIMESTAMPDIFF(YEAR, dataNascVoluntario, NOW())) AS idadeOitenta
           FROM tbVoluntario
           WHERE TIMESTAMPDIFF(YEAR, dataNascVoluntario, NOW()) BETWEEN 71 AND 100");
           $oitenta->execute();
           $idades['oitenta'] = $oitenta->fetch(PDO::FETCH_ASSOC)['idadeOitenta'];

           // Calcular as porcentagens
            $porcentagens = array();
            foreach ($idades as $faixa => $quantidade) {
                $porcentagens[$faixa] = ($quantidade / $total_registros) * 100;
            }

            return $porcentagens;
        
      }

}


?>