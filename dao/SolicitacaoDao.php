<?php

    class SolicitacaoDao{

        public static function cadastrar($solicitcao)
        {

            $conexao = Conexao::conectar();

            $prepareStatement = $conexao -> prepare ( "INSERT INTO tbSolicitacao(codInstituicao, nomeCategoriaHabilidade, statusSolicitacao) 
            VALUES(?,?,?)");

            $prepareStatement -> bindValue (1, $solicitcao -> getCodInstituicao());
            $prepareStatement -> bindValue (2, $solicitcao -> getNomeCategoriaHabilidade());
            $prepareStatement -> bindValue (3, $solicitcao -> getStatusSolicitacao());
            $prepareStatement -> execute();
            }

        public static function listarSolicitacaoCausa()
        {
            $conexao = Conexao :: conectar();
            $querySelect = "SELECT codSolicitacao, nomeCategoriaHabilidade, statusSolicitacao, tbInstituicao.nomeInstituicao FROM tbSolicitacao
                                INNER JOIN tbInstituicao ON tbInstituicao.codInstituicao = tbSolicitacao.codInstituicao";
            $resultado = $conexao -> query($querySelect);
            $lista = $resultado -> fetchAll();
            return $lista;
        }

    
        public static function aceitarSolicitacao($nomeCategoria, $idSolicitacao)
        {
            $conexao = Conexao::conectar();

            $queryAceito = "INSERT INTO tbCategoriaServico (nomeCategoria) VALUES ('$nomeCategoria')";

            $conexao->query($queryAceito);

            $queryDelete = "DELETE FROM tbSolicitacao WHERE codSolicitacao = $idSolicitacao";
            $conexao->query($queryDelete);

            echo "Sua solicitação foi aceita";
            
        }   

        


        public static function recusarSolicitacao($idSolicitacao)
        {
            $conexao = Conexao::conectar();

            $queryRecusado = "DELETE FROM tbSolicitacao WHERE codSolicitacao = $idSolicitacao";
            $conexao->query($queryRecusado);

            echo "Sua causa foi recusada";
        }
    }
    
?>