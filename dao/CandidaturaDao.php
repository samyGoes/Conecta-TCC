<?php

require_once 'global.php';
class CandidaturaDao
{
    public static function listar($idInstituicaoLogada)
    {
        $conexao = Conexao::conectar();
        $idInstituicaoLogada = $_SESSION['codUsuario'];

        $querySelect = "SELECT tbCandidatura.codCandidatura, tbInstituicao.codInstituicao, tbVoluntario.nomeVoluntario, tbVoluntario.cidadeVoluntario, tbVoluntario.estadoVoluntario, tbVoluntario.paisVoluntario, tbServico.nomeservico, tbVoluntario.fotoVoluntario
            FROM tbCandidatura
            INNER JOIN tbVoluntario ON tbCandidatura.codVoluntario = tbVoluntario.codVoluntario
            INNER JOIN tbServico ON tbCandidatura.codServico = tbServico.codServico
            INNER JOIN tbInstituicao ON tbServico.codInstituicao = tbInstituicao.codInstituicao
            WHERE tbInstituicao.codInstituicao = ? AND tbCandidatura.statusCandidatura = 'pendente'";

        $resultado = $conexao->prepare($querySelect);
        $resultado->execute(array($idInstituicaoLogada));
        $lista = $resultado->fetchAll();
        return $lista;
    }


    public static function listarCandidaturasRecusadas($idInstituicaoLogada)
    {
        $conexao = Conexao::conectar();
        $idInstituicaoLogada = $_SESSION['codUsuario'];

        $querySelect = "SELECT tbCandidatura.codCandidatura, tbInstituicao.codInstituicao, tbVoluntario.nomeVoluntario, tbVoluntario.cidadeVoluntario, tbVoluntario.estadoVoluntario, tbVoluntario.paisVoluntario, tbServico.nomeservico, tbVoluntario.fotoVoluntario
            FROM tbCandidatura
            INNER JOIN tbVoluntario ON tbCandidatura.codVoluntario = tbVoluntario.codVoluntario
            INNER JOIN tbServico ON tbCandidatura.codServico = tbServico.codServico
            INNER JOIN tbInstituicao ON tbServico.codInstituicao = tbInstituicao.codInstituicao
            WHERE tbInstituicao.codInstituicao = ? AND tbCandidatura.statusCandidatura = 'rejeitado'";

        $resultado = $conexao->prepare($querySelect);
        $resultado->execute(array($idInstituicaoLogada));
        $lista = $resultado->fetchAll();
        return $lista;
    }



    public static function aceitarCandidatura($idCandidatura)
    {
        $conexao = Conexao::conectar();
        $queryAceito = "UPDATE tbCandidatura SET statusCandidatura = 'aceito' WHERE codCandidatura = $idCandidatura";
        $resultado = $conexao->query($queryAceito);
        $status = $resultado->fetchAll();
        return $status;
    }


    public static function recusarCandidatura($idCandidatura)
    {
        $conexao = Conexao::conectar();
        $queryAceito = "UPDATE tbCandidatura SET statusCandidatura = 'rejeitado' WHERE codCandidatura = $idCandidatura";
        $resultado = $conexao->query($queryAceito);
        $status = $resultado->fetchAll();
        return $status;
    }

    public static function retirarRecusa($codCandidatura)
    {
        $conexao = Conexao::conectar();

        $query = "UPDATE tbCandidatura SET statusCandidatura = 'pendente' WHERE codCandidatura = ?";
        $stmt = $conexao->prepare($query);
        $stmt->execute([$codCandidatura]);
    }


    public static function cadastrar($candidato, $vaga, $status)
    {
        $conexao = Conexao::conectar();

        $prepareStatement = $conexao->prepare("INSERT INTO tbcandidatura(codVoluntario,codServico,statusCandidatura) 
            VALUES(?,?,?)");

        $prepareStatement->bindValue(1, $candidato);
        $prepareStatement->bindValue(2, $vaga);
        $prepareStatement->bindValue(3, $status);
        $prepareStatement->execute();
    }

    public static function vagasCandidatadasVoluntario($codVoluntario)
    {
        $conexao = Conexao::conectar();

        $query = "SELECT * FROM tbCandidatura WHERE codVoluntario = :codVoluntario";
        $stmt = $conexao->prepare($query);
        $stmt->bindValue(':codVoluntario', $codVoluntario);
        $stmt->execute();

        $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $resultado;
    }



    //$queryRejeitado = "UPDATE tbCandidatura SET statusCandidatura = 'rejeitado'";
}
