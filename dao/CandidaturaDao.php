<?php 
  
    require_once 'global.php';
    
    class CandidaturaDao
    {

        public static function listar(){
            $conexao = Conexao :: conectar();

                
                $querySelect = "SELECT codCandidatura, codInstituicao, nomeVoluntario, cidadeVoluntario, estadoVoluntario, paisVoluntario, nomeservico ,fotoVoluntario 
                FROM tbCandidatura
                WHERE codInstituicao LIKE '?'
                INNER JOIN tbVoluntario ON tbCandidatura.codVoluntario = tbVoluntario.codVoluntario
                INNER JOIN tbServico ON tbCandidatura.codServico = tbServico.codServico
                INNER JOIN tbInstituicao ON tbServico.codInstituicao = tbInstituicao.codInstituicao
                ";
                $resultado = $conexao -> query($querySelect);
                $lista = $resultado -> fetchAll();
            
            //"SELECT codVoluntario, nomeVoluntario, descVoluntario, emailVoluntario, cidadeVoluntario, estadoVoluntario, paisVoluntario, fotoVoluntario FROM tbVoluntario";
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