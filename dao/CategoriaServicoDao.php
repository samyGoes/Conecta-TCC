
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

            if(isset($_POST['pesquisar'])){
                $pesquisar= $_POST['pesquisar'];
                $querySelect = "SELECT codCategoriaServico, nomeCategoria FROM tbcategoriaServico WHERE nomeCategoria LIKE '%$pesquisar%";

            }else{
                $querySelect = "SELECT codCategoriaServico, nomeCategoria FROM tbcategoriaServico";
            }
            
            $resultado = $conexao->query($querySelect);
            $lista = $resultado->fetchAll();
            return $lista;  
        }

        
        public static function listarCausaPerfil($codInstituicao)
        {
            $conexao = Conexao::conectar();
            
            $querySelect = ( "SELECT DISTINCT tbCategoriaServico.codCategoriaServico, tbCategoriaServico.nomeCategoria
            FROM tbCategoriaServico
            INNER JOIN tbCausaVaga ON tbCategoriaServico.codCategoriaServico = tbCausaVaga.codCategoriaServico
            INNER JOIN tbServico ON tbCausaVaga.codServico = tbServico.codServico
            WHERE tbServico.codInstituicao = $codInstituicao");

            $resultado = $conexao->query($querySelect);
            $lista = $resultado->fetchAll();
            return $lista;  
        }

        public static function listarCausaInstituicoes($codInstituicao)
        {
            $conexao = Conexao::conectar();
            
            $querySelect = ( "SELECT DISTINCT tbCategoriaServico.codCategoriaServico, tbinstituicao.codInstituicao, tbCategoriaServico.nomeCategoria FROM tbCategoriaServico 
            INNER JOIN tbCausaVaga ON tbCategoriaServico.codCategoriaServico = tbCausaVaga.codCategoriaServico 
            INNER JOIN tbServico ON tbCausaVaga.codServico = tbServico.codServico 
            INNER JOIN tbinstituicao ON tbinstituicao.codInstituicao = tbServico.codInstituicao 
            WHERE tbServico.codInstituicao = $codInstituicao");

            $resultado = $conexao->query($querySelect);
            $lista = $resultado->fetchAll();
            return $lista;  
        }

        
    }


?>
 
