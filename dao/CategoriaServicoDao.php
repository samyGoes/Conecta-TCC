<?php
    require_once 'global.php';

    class CategoriaServicoDao
    {
        public static function cadastrar($categoriaServico)
        {
            $conexao = Conexao :: conectar();

            $prepareStatement = $conexao -> prepare ( "INSERT INTO tbcategoriaServico(nomeCategoria) 
            VALUES(?)");

            $prepareStatement -> bindValue (1, $categoriaServico -> getNomeCategoria());
            $prepareStatement -> execute();
        }

        public static function listar()
        {
            $conexao = Conexao::conectar();
            $querySelect = "SELECT codCategoriaServico, nomeCategoria FROM tbcategoriaServico";
            $resultado = $conexao->query($querySelect);
            $lista = $resultado->fetchAll();
            return $lista;  
        }
        
    }


?>
 
