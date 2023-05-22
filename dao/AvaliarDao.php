<?php

require_once 'global.php';

class AvaliarDao 
{

    public static function avaliar($codInstituicao, $codVoluntario, $numAvaliacao){

        $conexao = Conexao::conectar();

        $prepareStatement = $conexao->prepare("INSERT INTO tbavaliacao(codInstituicao, codVoluntario, numAvaliacao)
        VALUES (?,?,?)");

        $prepareStatement->bindValue(1, $codInstituicao);
        $prepareStatement->bindValue(2, $codVoluntario);
        $prepareStatement->bindValue(3, $numAvaliacao);
        $prepareStatement->execute();
    }
}
?>