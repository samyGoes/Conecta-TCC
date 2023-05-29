<?php

    class SolicitacaoCategoriaDao{

        public static function cadastrar($solicitcao)
        {

            $conexao = Conexao::conectar();

            $prepareStatement = $conexao -> prepare ( "INSERT INTO tbSolicitacaoCategoria(codInstituicao, nomeCategoria, statusSolicitacao) 
            VALUES(?,?,?)");

            $prepareStatement -> bindValue (1, $solicitcao -> getCodInstituicao());
            $prepareStatement -> bindValue (2, $solicitcao -> getNomeCategoria());
            $prepareStatement -> bindValue (3, $solicitcao -> getStatusSolicitacao());
            $prepareStatement -> execute();
            }

        public static function listarSolicitacaoCausa()
        {
            $conexao = Conexao :: conectar();
            $querySelect = "SELECT codSolicitacaoCategoria, nomeCategoria, statusSolicitacao, tbInstituicao.nomeInstituicao FROM tbSolicitacaoCategoria
                                INNER JOIN tbInstituicao ON tbInstituicao.codInstituicao = tbSolicitacaoCategoria.codInstituicao
                                    WHERE statusSolicitacao LIKE 'pendente'";
            $resultado = $conexao -> query($querySelect);
            $lista = $resultado -> fetchAll();
            return $lista;
        }

    
        public static function aceitarSolicitacao($nomeCategoria, $idSolicitacao)
        {
            $conexao = Conexao::conectar();
        
            $queryAceito = "UPDATE tbSolicitacaoCategoria SET statusSolicitacao = 'aceito' WHERE codSolicitacaoCategoria = $idSolicitacao";
            $conexao->query($queryAceito);
        
            $queryInsert = "INSERT INTO tbCategoriaServico (nomeCategoria) VALUES ('$nomeCategoria')";
            $conexao->query($queryInsert);
        
            //echo "Sua solicitação foi aceita";
        }
        
        public static function recusarSolicitacao($idSolicitacao)
        {
            $conexao = Conexao::conectar();
        
            $queryRecusado = "UPDATE tbSolicitacaoCategoria SET statusSolicitacao = 'recusado' WHERE codSolicitacaoCategoria = $idSolicitacao";
            $conexao->query($queryRecusado);
        
            //echo "Sua causa foi recusada";
        }
    }
    
?>