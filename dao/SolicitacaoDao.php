<?php

    class SolicitacaoDao{

        public static function cadastrar($solicitcao)
        {

            $conexao = Conexao::conectar();

            $prepareStatement = $conexao -> prepare ( "INSERT INTO tbSolicitacao(codInstituicao, nomeCategoriaHabilidade, statusSolicitacao) 
            VALUES(?,?,?)");

            $prepareStatement -> bindValue (1, $solicitcao -> getCodInstituicao());
            $prepareStatement -> bindValue (2, $solicitcao -> getNomeCategoria());
            $prepareStatement -> bindValue (3, $solicitcao -> getStatusCategoria());
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

        public static function aceitarSolicitacao($idSolicitacao)
        {
            $conexao = Conexao::conectar();
        
            $nomeCategoria = getNomeCategoriaHabilidade(); // Supondo que seja uma função

            $queryAceito = "INSERT INTO tbCategoriaServico (nomeCategoria) VALUES ('$nomeCategoria')";
            $resultadoAceito = $conexao->query($queryAceito);

            $queryAceito = "DELETE FROM tbSolicitacao WHERE codSolicitacao = $idSolicitacao";
            $resultadoAceito = $conexao->query($queryAceito);

            echo "Sua solicitação foi aceita";

            return $resultadoAceito->fetchAll();

        }

        public static function recusarSolicitacao($idSolicitacao)
        {
            $conexao = Conexao::conectar();

            $queryRecusado = "DELETE FROM tbSolicitacao  WHERE codSolicitacao = $idSolicitacao";
            $resultado = $conexao->query($queryRecusado);

            echo("sua causa foi recusada");

            return $resultado;
        }
    }
    
?>