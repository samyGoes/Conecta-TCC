
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

            $idVaga = $conexao->lastInsertId();

            // Insere a categoria vinculadas à  instituicao na tabela tbInstituicaoCategoriaServico
            foreach ($categoriaServico->getCodInstituicao() as $instituicao) {
                $prepareStatement = $conexao->prepare("INSERT INTO  tbInstituicaoCategoriaServico (codCategoriaServico, codInstituicao) 
                VALUES (?,?)");
                $prepareStatement->bindValue(1, $idVaga);
                $prepareStatement->bindValue(2, $instituicao);
                $prepareStatement->execute();
              }
        }

        public static function listar()
        {
            $conexao = Conexao::conectar();
            $querySelect = "SELECT codCategoriaServico, nomeCategoria FROM tbcategoriaServico";
            $resultado = $conexao->query($querySelect);
            $lista = $resultado->fetchAll();
            return $lista;  
        }

        
        public static function listarCausaPerfil()
        {

            $codInstituicao = $_SESSION['codUsuario'];
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
            $querySelect = ("SELECT DISTINCT tbCategoriaServico.codCategoriaServico, tbcausavaga.codCategoriaServico, tbServico.codServico, tbinstituicao.codInstituicao FROM tbCategoriaServico 
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
 
