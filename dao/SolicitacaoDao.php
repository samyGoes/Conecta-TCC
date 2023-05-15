<?php

    class SolicitacaoDao{

        public static function cadastrar($solicitcao){

            $conexao = Conexao::conectar();

            $prepareStatement = $conexao -> prepare ( "INSERT INTO tbSolicitacao(codInstituicao, nomeCategoria, statusCategoria) 
            VALUES(?,?,?)");

            $prepareStatement -> bindValue (1, $solicitcao -> getCodInstituicao());
            $prepareStatement -> bindValue (2, $solicitcao -> getNomeCategoria());
            $prepareStatement -> bindValue (3, $solicitcao -> getStatusCategoria());
            $prepareStatement -> execute();
            }
        }
    
?>