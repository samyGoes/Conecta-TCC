<?php 
  
    require_once 'global.php';
    class CandidaturaDao
    {   
        public static function listar($idInstituicaoLogada) {
            $conexao = Conexao::conectar();
            $idInstituicaoLogada= $_SESSION['codUsuario'];

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
        

        public static function listarVoluntariosRejeitados($idInstituicaoLogada) {
            $conexao = Conexao::conectar();
            $idInstituicaoLogada= $_SESSION['codUsuario'];
    
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
        


        public static function aceitarCandidato($idCandidatura) {
            $conexao = Conexao::conectar();
            $queryAceito = "UPDATE tbCandidatura SET statusCandidatura = 'aceito' WHERE codCandidatura = $idCandidatura";
            $resultado = $conexao->query($queryAceito);
            $status = $resultado->fetchAll();
            return $status;
        }
        

        public static function rejeitarCandidato($idCandidatura) {
            $conexao = Conexao::conectar();
            $queryAceito = "UPDATE tbCandidatura SET statusCandidatura = 'rejeitado' WHERE codCandidatura = $idCandidatura";
            $resultado = $conexao->query($queryAceito);
            $status = $resultado->fetchAll();
            return $status;

        }

        public static function retirarRejeicao($codCandidatura) {
            $conexao = Conexao::conectar();
            
            $query = "UPDATE tbCandidatura SET statusCandidatura = 'aceito' WHERE codCandidatura = ?";
            $stmt = $conexao->prepare($query);
            $stmt->execute([$codCandidatura]);
        }
        
        
        public static function cadastrar($candidato,$vaga,$status)
        {
            $conexao = Conexao :: conectar();

            $prepareStatement = $conexao -> prepare ( "INSERT INTO tbcandidatura(codVoluntario,codServico,statusCandidatura) 
            VALUES(?,?,?)");

            $prepareStatement -> bindValue (1, $candidato);
            $prepareStatement -> bindValue (2, $vaga);
            $prepareStatement -> bindValue (3, $status);
            $prepareStatement -> execute();
        }

        //$queryRejeitado = "UPDATE tbCandidatura SET statusCandidatura = 'rejeitado'";
    }
?>