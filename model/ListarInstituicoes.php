<?php
    class ListarInstituicoes{

        function listar(){

            $conexao = Conexao::conectar();
            $querySelect = "SELECT codInstituicao, nomeInstituicao, emailInstituicao, cidadeInstituicao, estadoInstituicao, paisInstituicao FROM tbinstituicao";
            $resultado = $conexao->query($querySelect);
            $lista = $resultado->fetchAll();
            return $lista;  
        }
    }
?>