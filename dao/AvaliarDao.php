<?php

require_once 'global.php';

class AvaliarDao 
{

    public static function avaliar( $codVoluntario, $numAvaliacao){

        $conexao = Conexao::conectar();

        if(isset($codVoluntario)){ // AVALIACAO VOLUNTARIO
            $sqlCodVolunt = "SELECT * FROM tbAvaliacao WHERE codVoluntario = '$codVoluntario'";
            $resultVolunt = $conexao->query($sqlCodVolunt);

            if($resultVolunt-> rowCount()>0 ){

                 $queryEstrelas = "SELECT numAvaliacao FROM tbAvaliacao WHERE codVoluntario = '$codVoluntario'";
                 $resultEstrelas = $conexao->query($queryEstrelas);
                 $resultEstrelas->execute();
                 $resultEstrelas = $resultEstrelas->fetchColumn();

                 $resultEstrelas = ($resultEstrelas + $numAvaliacao)/2;

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

        } else if(isset($codInstituicao)){ // AVALIACAO INSTIRUICAO
            $sqlCodInst = "SELECT * FROM tbAvaliacao WHERE codInstiruicao = '$codInstituicao'";
            $resultInsti = $conexao->query($sqlCodInst);

            if($resultInsti-> rowCount()>0 ){
               
                $queryEstrelas = "SELECT numAvaliacao FROM tbAvaliacao WHERE codInstituicao = '$codInstituicao'";
                $resultEstrelas = $conexao->query($queryEstrelas);

                $resultEstrelas = ($resultEstrelas + $numAvaliacao)/2;

                $stmt = $conexao->prepare("UPDATE tbAvaliacao SET numAvaliacao = '$resultEstrelas'
                 WHERE codInstituicao = '$codInstituicao'");

                $stmt->bindValue(1, $numAvaliacao);
                $stmt->execute();

            }else{
                
                $prepareStatement = $conexao->prepare("INSERT INTO tbavaliacao(codInstituicao, numAvaliacao)
                    VALUES (?,?)");

                $prepareStatement->bindValue(1, $codInstituicao);
                $prepareStatement->bindValue(2, $numAvaliacao);
                $prepareStatement->execute();

            }
        }

        return 'Cadastrou';
        
    }
}
?>