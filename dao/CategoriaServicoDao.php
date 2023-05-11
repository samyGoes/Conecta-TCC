
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

            $idCategoria = $conexao->lastInsertId();

            // Insere a categoria vinculadas à  instituicao na tabela tbInstituicaoCategoriaServico
                $prepareStatement = $conexao->prepare("INSERT INTO   tbinstituicaocategoriaservico ( codInstituicao, codCategoriaServico) 
                VALUES (?,?)");
                $prepareStatement->bindValue(1, $categoriaServico -> getCodInstituicao());
                $prepareStatement->bindValue(2, $idCategoria);
                $prepareStatement->execute();
                
        }

        public static function listar()
        {
            $conexao = Conexao::conectar();
            $querySelect = "SELECT codCategoriaServico, nomeCategoria FROM tbcategoriaServico";
            $resultado = $conexao->query($querySelect);
            $lista = $resultado->fetchAll();
            return $lista;  
        }

        public static function listarServico()
        {
            $conexao = Conexao::conectar();
            $querySelect = "SELECT codServico, nomeServico FROM tbServico";
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

        public static function listarTabela($codInstituicao)
        {
            $codInstituicao = $_SESSION['codUsuario'];

            $conexao = Conexao :: conectar();

            $querySelect = ("SELECT tbCategoriaServico.codCategoriaServico,  tbinstituicaocategoriaservico. codInstituicaocategoriaservico, tbinstituicao.codInstituicao FROM tbCategoriaServico  
            INNER JOIN tbinstituicaocategoriaservico ON tbinstituicaocategoriaservico.codCategoriaServico = tbCategoriaServico.codCategoriaServico
            INNER JOIN tbinstituicao ON tbinstituicao.codInstituicao = tbinstituicaocategoriaservico.codInstituicao  
            WHERE  tbinstituicaocategoriaservico.codInstituicao = $codInstituicao");
            
            $resultado = $conexao->query($querySelect);
            $lista = $resultado->fetchAll();
            return $lista; 

        }
        
    }


?>
 
