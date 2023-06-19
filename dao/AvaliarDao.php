<?php

require_once 'global.php';

class AvaliarDao 
{

    public static function avaliarVoluntario( $codVoluntario, $numAvaliacao){

        $conexao = Conexao::conectar();

            $sqlCodVolunt = "SELECT * FROM tbAvaliacao WHERE codVoluntario = '$codVoluntario'";
            $resultVolunt = $conexao->query($sqlCodVolunt);

            if($resultVolunt-> rowCount()>0 ){

                 $queryEstrelas = "SELECT numAvaliacao FROM tbAvaliacao WHERE codVoluntario = '$codVoluntario'";
                 $resultEstrelas = $conexao->query($queryEstrelas);
                 $resultEstrelas->execute();
                 $resultEstrelas = $resultEstrelas->fetchColumn();

                 $resultEstrelas = ($resultEstrelas + $numAvaliacao)/2;
                
                 $resultEstrelas = number_format($resultEstrelas);

                 $stmt = $conexao->prepare("UPDATE tbAvaliacao SET numAvaliacao = :resultEstrelas
                  WHERE codVoluntario = :codVoluntario");

                 $stmt->bindValue(':resultEstrelas', $resultEstrelas);
                 $stmt->bindValue(':codVoluntario', $codVoluntario);
                 $stmt->execute();

            }else{

                $prepareStatement = $conexao->prepare("INSERT INTO tbavaliacao(codVoluntario, numAvaliacao)
                    VALUES (?,?)");

                $prepareStatement->bindValue(1, $codVoluntario);
                $prepareStatement->bindValue(2, $numAvaliacao);
                $prepareStatement->execute();
            }

        return $resultEstrelas;
        
    }

    public static function avaliarInstituicao($codInstituicao, $numAvaliacao){

        $conexao = Conexao::conectar();

        $sqlCodInst = "SELECT * FROM tbAvaliacao WHERE codInstituicao = '$codInstituicao'";
            $resultInsti = $conexao->query($sqlCodInst);

            if($resultInsti-> rowCount()>0 ){
               
                $queryEstrelas = "SELECT numAvaliacao FROM tbAvaliacao WHERE codInstituicao = '$codInstituicao'";
                 $resultEstrelas = $conexao->query($queryEstrelas);
                 $resultEstrelas->execute();
                 $resultEstrelas = $resultEstrelas->fetchColumn();

                $resultEstrelas = ($resultEstrelas + $numAvaliacao)/2;

                $resultEstrelas = number_format($resultEstrelas);

                $stmt = $conexao->prepare("UPDATE tbAvaliacao SET numAvaliacao = :resultEstrelas
                  WHERE codInstituicao = :codInstituicao");

                 $stmt->bindValue(':resultEstrelas', $resultEstrelas);
                 $stmt->bindValue(':codInstituicao', $codInstituicao);
                 $stmt->execute();

            }else{
                
                $prepareStatement = $conexao->prepare("INSERT INTO tbavaliacao(codInstituicao, numAvaliacao)
                    VALUES (?,?)");

                $prepareStatement->bindValue(1, $codInstituicao);
                $prepareStatement->bindValue(2, $numAvaliacao);
                $prepareStatement->execute();

            }

        return $resultEstrelas;
    }

    public static function mostrarAvaliacaoVoluntario($codVoluntario) {
        $conexao = Conexao::conectar();

        $queryEstrelas = "SELECT numAvaliacao FROM tbAvaliacao WHERE codVoluntario = '$codVoluntario'";
                 $resultEstrelas = $conexao->query($queryEstrelas);
                 $resultEstrelas->execute();
                 $resultEstrelas = $resultEstrelas->fetchColumn();

            return $resultEstrelas;
    }

    public static function mostrarAvaliacaoInstituicao($codInstituicao) {
        $conexao = Conexao::conectar();

        $queryEstrelas = "SELECT numAvaliacao FROM tbAvaliacao WHERE codInstituicao = '$codInstituicao'";
                 $resultEstrelas = $conexao->query($queryEstrelas);
                 $resultEstrelas->execute();
                 $resultEstrelas = $resultEstrelas->fetchColumn();

            return $resultEstrelas;
    }
}
?>