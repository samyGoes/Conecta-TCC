<?php 
  
    require_once 'global.php';

    class CandidaturaDao
    {

        public static function listar(){
            $conexao = Conexao :: conectar();
            $querySelect = "SELECT codCandidatura, nomeVoluntario, cidadeVoluntario, estadoVoluntario, paisVoluntario, nomeservico ,fotoVoluntario FROM tbCandidatura
            INNER JOIN tbVoluntario ON tbCandidatura.codVoluntario = tbVoluntario.codVoluntario
            INNER JOIN tbServico ON tbCandidatura.codServico = tbServico.codServico";
            //"SELECT codVoluntario, nomeVoluntario, descVoluntario, emailVoluntario, cidadeVoluntario, estadoVoluntario, paisVoluntario, fotoVoluntario FROM tbVoluntario";
            $resultado = $conexao -> query($querySelect);
            $lista = $resultado -> fetchAll();
            return $lista;
        }

        public static function atualizarStatus(){
            $conexao = Conexao :: conectar();
            $queryAceito = "UPDATE tbCandidatura SET statusCandidatura = 'aceito' WHERE codCandidatura = ?";
            
            $resultado = $conexao -> query($queryAceito);
            $status = $resultado ->fetchAll();
            return $status;
        }

        public static function deletarCandidatura(){
            $conexao = Conexao :: conectar();
            
            $queryRejeitado = "DELETE FROM tbCandidatura WHERE codCandidatura = ?";

            $resultado = $conexao ->query($queryRejeitado);
            $status = $resultado ->fetchAll();
            return $status;
        }

        //$queryRejeitado = "UPDATE tbCandidatura SET statusCandidatura = 'rejeitado'";
    }
?>