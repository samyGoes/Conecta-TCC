<?php

    class SolicitacaoHabilidadeDao{

        public static function cadastrar($solicitcao)
        {

            $conexao = Conexao::conectar();

            $prepareStatement = $conexao -> prepare ( "INSERT INTO  tbsolicitacaohabilidade(codInstituicao, nomeHabilidade, statusSolicitacao) 
            VALUES(?,?,?)");

            $prepareStatement -> bindValue (1, $solicitcao -> getCodInstituicao());
            $prepareStatement -> bindValue (2, $solicitcao -> getNomeHabilidade());
            $prepareStatement -> bindValue (3, $solicitcao -> getStatusSolicitacao());
            $prepareStatement -> execute();
            }

        public static function listarSolicitacaoHabilidade()
        {
            $conexao = Conexao :: conectar();
            $querySelect = "SELECT codSolicitacaoHabilidade, nomeHabilidade, statusSolicitacao, tbInstituicao.nomeInstituicao FROM tbSolicitacaoHabilidade
                                INNER JOIN tbInstituicao ON tbInstituicao.codInstituicao =  tbsolicitacaohabilidade.codInstituicao";
            $resultado = $conexao -> query($querySelect);
            $lista = $resultado -> fetchAll();
            return $lista;
        }

    
        public static function aceitarSolicitacao($nomeHabilidade, $idSolicitacao)
        {
            $conexao = Conexao::conectar();

            $queryAceito = "INSERT INTO tbHabilidadeServico (nomeHabilidadeServico) VALUES ('$nomeHabilidade')";

            $conexao->query($queryAceito);

            $queryDelete = "DELETE FROM tbSolicitacaoHabilidade WHERE codSolicitacaoHabilidade = $idSolicitacao";
            $conexao->query($queryDelete);

            echo "Sua solicitação foi aceita";
            
        }   

        


        public static function recusarSolicitacao($idSolicitacao)
        {
            $conexao = Conexao::conectar();

            $queryRecusado = "DELETE FROM tbSolicitacaoHabilidade WHERE codSolicitacaoHabilidade = $idSolicitacao";
            $conexao->query($queryRecusado);

            echo "Sua causa foi recusada";
        }
    }
    
?>