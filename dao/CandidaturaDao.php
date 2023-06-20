<?php

require_once 'global.php';
class CandidaturaDao
{
    public static function listar($idInstituicaoLogada)
    {
        $conexao = Conexao::conectar();
        $idInstituicaoLogada = $_SESSION['codUsuario'];
        if (isset($_POST['pesquisar'])) {
            $pesquisar = $_POST['pesquisar'];

            $querySelect = "SELECT tbCandidatura.codCandidatura, tbInstituicao.codInstituicao, tbVoluntario.codVoluntario, tbVoluntario.nomeVoluntario, TIMESTAMPDIFF(YEAR, tbVoluntario.dataNascVoluntario, NOW()) AS idade, tbVoluntario.cidadeVoluntario, tbVoluntario.estadoVoluntario, tbVoluntario.paisVoluntario, tbServico.codServico, tbServico.nomeservico, tbVoluntario.fotoVoluntario
            FROM tbCandidatura
            INNER JOIN tbVoluntario ON tbCandidatura.codVoluntario = tbVoluntario.codVoluntario
            INNER JOIN tbServico ON tbCandidatura.codServico = tbServico.codServico
            INNER JOIN tbInstituicao ON tbServico.codInstituicao = tbInstituicao.codInstituicao
            WHERE tbInstituicao.codInstituicao = ? AND tbCandidatura.statusCandidatura = 'pendente' AND (tbVoluntario.nomeVoluntario LIKE '%$pesquisar%' OR tbServico.nomeservico LIKE '%$pesquisar%')";
        
        } else {
            $querySelect = "SELECT tbCandidatura.codCandidatura, tbInstituicao.codInstituicao, tbVoluntario.codVoluntario, tbVoluntario.nomeVoluntario,TIMESTAMPDIFF(YEAR, tbVoluntario.dataNascVoluntario, NOW()) AS idade, tbVoluntario.cidadeVoluntario, tbVoluntario.estadoVoluntario, tbVoluntario.paisVoluntario, tbServico.nomeservico, tbVoluntario.fotoVoluntario
        FROM tbCandidatura
        INNER JOIN tbVoluntario ON tbCandidatura.codVoluntario = tbVoluntario.codVoluntario
        INNER JOIN tbServico ON tbCandidatura.codServico = tbServico.codServico
        INNER JOIN tbInstituicao ON tbServico.codInstituicao = tbInstituicao.codInstituicao
        WHERE tbInstituicao.codInstituicao = ? AND tbCandidatura.statusCandidatura = 'pendente'";
        }

        $resultado = $conexao->prepare($querySelect);
        $resultado->execute(array($idInstituicaoLogada));
        $lista = $resultado->fetchAll();
        return $lista;
    }

    public static function listarVoluntario($idVoluntarioLogada)
    {
        $conexao = Conexao::conectar();
        $idInstituicaoLogada = $_SESSION['codUsuario'];
        if (isset($_POST['pesquisar'])) {
            $pesquisar = $_POST['pesquisar'];

            $querySelect = "SELECT tbCandidatura.codCandidatura, tbInstituicao.codInstituicao, tbVoluntario.codVoluntario, tbVoluntario.nomeVoluntario, tbVoluntario.cidadeVoluntario, tbVoluntario.estadoVoluntario, tbVoluntario.paisVoluntario, tbServico.codServico, tbServico.nomeservico, tbVoluntario.fotoVoluntario
            FROM tbCandidatura
            INNER JOIN tbVoluntario ON tbCandidatura.codVoluntario = tbVoluntario.codVoluntario
            INNER JOIN tbServico ON tbCandidatura.codServico = tbServico.codServico
            INNER JOIN tbInstituicao ON tbServico.codInstituicao = tbInstituicao.codInstituicao
            WHERE tbInstituicao.codInstituicao = ? AND tbCandidatura.statusCandidatura = 'pendente' AND (tbVoluntario.nomeVoluntario LIKE '%$pesquisar%' OR tbServico.nomeservico LIKE '%$pesquisar%')";
        
        } else {
            $querySelect = "SELECT tbCandidatura.codCandidatura, tbInstituicao.codInstituicao, nomeInstituicao, descInstituicao, emailInstituicao, cidadeInstituicao, estadoInstituicao, paisInstituicao, fotoInstituicao, tbVoluntario.codVoluntario, tbVoluntario.nomeVoluntario, tbVoluntario.cidadeVoluntario, tbVoluntario.estadoVoluntario, tbVoluntario.paisVoluntario, tbServico.nomeservico, tbVoluntario.fotoVoluntario
        FROM tbCandidatura
        INNER JOIN tbVoluntario ON tbCandidatura.codVoluntario = tbVoluntario.codVoluntario
        INNER JOIN tbServico ON tbCandidatura.codServico = tbServico.codServico
        INNER JOIN tbInstituicao ON tbServico.codInstituicao = tbInstituicao.codInstituicao
        WHERE tbVoluntario.codVoluntario = ? ";
        }

        $resultado = $conexao->prepare($querySelect);
        $resultado->execute(array($idVoluntarioLogada));
        $lista = $resultado->fetchAll();
        return $lista;
    }


    public static function listarCandidaturasRecusadas($idInstituicaoLogada)
    {
        $conexao = Conexao::conectar();
        $idInstituicaoLogada = $_SESSION['codUsuario'];
        if (isset($_POST['pesquisar'])) {
            $pesquisar = $_POST['pesquisar'];

            $querySelect = "SELECT tbCandidatura.codCandidatura, tbInstituicao.codInstituicao, tbVoluntario.nomeVoluntario, TIMESTAMPDIFF(YEAR, tbVoluntario.dataNascVoluntario, NOW()) AS idade, tbVoluntario.cidadeVoluntario, tbVoluntario.estadoVoluntario, tbVoluntario.paisVoluntario, tbServico.nomeservico, tbVoluntario.fotoVoluntario
            FROM tbCandidatura
            INNER JOIN tbVoluntario ON tbCandidatura.codVoluntario = tbVoluntario.codVoluntario
            INNER JOIN tbServico ON tbCandidatura.codServico = tbServico.codServico
            INNER JOIN tbInstituicao ON tbServico.codInstituicao = tbInstituicao.codInstituicao
            WHERE tbInstituicao.codInstituicao = ? AND tbCandidatura.statusCandidatura = 'recusado' AND (tbVoluntario.nomeVoluntario LIKE '%$pesquisar%' OR tbServico.nomeservico LIKE '%$pesquisar%')";
        
        } else {
            $querySelect = "SELECT tbCandidatura.codCandidatura, tbInstituicao.codInstituicao, tbVoluntario.nomeVoluntario, TIMESTAMPDIFF(YEAR, tbVoluntario.dataNascVoluntario, NOW()) AS idade, tbVoluntario.cidadeVoluntario, tbVoluntario.estadoVoluntario, tbVoluntario.paisVoluntario, tbServico.nomeservico, tbVoluntario.fotoVoluntario
        FROM tbCandidatura
        INNER JOIN tbVoluntario ON tbCandidatura.codVoluntario = tbVoluntario.codVoluntario
        INNER JOIN tbServico ON tbCandidatura.codServico = tbServico.codServico
        INNER JOIN tbInstituicao ON tbServico.codInstituicao = tbInstituicao.codInstituicao
        WHERE tbInstituicao.codInstituicao = ? AND tbCandidatura.statusCandidatura = 'recusado'";
        }

        $resultado = $conexao->prepare($querySelect);
        $resultado->execute(array($idInstituicaoLogada));
        $lista = $resultado->fetchAll();
        return $lista;
    }

    public static function listarVoluntariosAceitos($idInstituicaoLogada, $codServico)
    {
        $conexao = Conexao::conectar();
    
        $querySelect = "SELECT tbCandidatura.codCandidatura, tbInstituicao.codInstituicao, tbVoluntario.codVoluntario, tbVoluntario.nomeVoluntario, TIMESTAMPDIFF(YEAR, tbVoluntario.dataNascVoluntario, NOW()) AS idade, tbVoluntario.cidadeVoluntario, tbVoluntario.estadoVoluntario, tbVoluntario.paisVoluntario, tbServico.nomeservico, tbVoluntario.fotoVoluntario
            FROM tbCandidatura
            INNER JOIN tbVoluntario ON tbCandidatura.codVoluntario = tbVoluntario.codVoluntario
            INNER JOIN tbServico ON tbCandidatura.codServico = tbServico.codServico
            INNER JOIN tbInstituicao ON tbServico.codInstituicao = tbInstituicao.codInstituicao
            WHERE tbInstituicao.codInstituicao = ? AND tbServico.codServico = ? AND tbCandidatura.statusCandidatura = 'aceito'";
    
        $resultado = $conexao->prepare($querySelect);
        $resultado->execute(array($idInstituicaoLogada, intval($codServico)));
        $lista = $resultado->fetchAll();
        return $lista;
    }



    public static function obterQuantidadeInscritosPorServico($codServico)
    {
        $conexao = Conexao::conectar();

        $query = "SELECT COUNT(*) AS qntdVagasPreenchida 
              FROM tbServico
              INNER JOIN tbCandidatura ON tbServico.codServico = tbCandidatura.codServico
              WHERE tbServico.codServico = :codServico AND tbCandidatura.statusCandidatura = 'aceito'";

        $stmt = $conexao->prepare($query);
        $stmt->bindValue(':codServico', $codServico);
        $stmt->execute();

        $resultado = $stmt->fetchColumn();

        return $resultado;
    }





    public static function aceitarCandidatura($idCandidatura)
    {
        $conexao = Conexao::conectar();
        $queryAceito = "UPDATE tbCandidatura SET statusCandidatura = 'aceito' WHERE codCandidatura = $idCandidatura";
        $resultado = $conexao->query($queryAceito);
        $status = $resultado->fetchAll();
        return $status;

        /*    $queryIncrementar = "UPDATE tbServico SET qntdVagasPreenchidas = qntdVagasPreenchidas + 1 WHERE codServico = (
        SELECT codServico FROM tbCandidatura WHERE codCandidatura = :idCandidatura
    )";
    $stmtIncrementar = $conexao->prepare($queryIncrementar);
    $stmtIncrementar->bindValue(':idCandidatura', $idCandidatura);
    $stmtIncrementar->execute();

    return true;*/
    }


    public static function recusarCandidatura($idCandidatura)
    {
        $conexao = Conexao::conectar();
        $queryAceito = "UPDATE tbCandidatura SET statusCandidatura = 'recusado' WHERE codCandidatura = $idCandidatura";
        $resultado = $conexao->query($queryAceito);
        $status = $resultado->fetchAll();
        return $status;
    }


    public static function retirarCandidatura($idCandidatura)
    {
        $conexao = Conexao::conectar();
        $queryAceito = "DELETE FROM tbCandidatura  WHERE codCandidatura = $idCandidatura";
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

    public static function buscaCandidaturaBotao($voluntario, $vaga)
    {
        $conexao = Conexao::conectar();

        $query = "SELECT * FROM tbCandidatura WHERE codVoluntario = ? AND codServico = ?";
        $stmt = $conexao->prepare($query);
        $stmt->bindValue(1, $voluntario);
        $stmt->bindValue(2, $vaga);
        $stmt->execute();

        $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if (count($resultado) <= 0) {
            return false;
        } else {
            return true;
        }
    }

    public static function buscaEmail($codCandidatura)
    {
        $conectar = Conexao::conectar();
    
        $stmt = $conectar->prepare("SELECT nomeVoluntario AS nome, emailVoluntario AS email, tbCandidatura.codCandidatura FROM tbvoluntario
                                        INNER JOIN tbCandidatura ON tbVoluntario.codVoluntario = tbCandidatura.codVoluntario 
                                        WHERE codCandidatura = :codCandidatura
                                    ");
        
        $stmt->bindValue(':codCandidatura', $codCandidatura, PDO::PARAM_STR);
        //echo "Valor do email: " . $email;
        $stmt->execute();
        $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);

        //print_r($resultados);

        foreach($resultados as $resultado)
        {
            if ($resultado['codCandidatura'] == $codCandidatura)  
            {
                return array('codCandidatura' => true, 'nome' => $resultado['nome'], 'email' => $resultado['email']);
            } 
        }
        return array('codCandidatura' => false, 'nome' => '', 'email' => '');       
    }




    //$queryRejeitado = "UPDATE tbCandidatura SET statusCandidatura = 'rejeitado'";
}
