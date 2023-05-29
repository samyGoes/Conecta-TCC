<?php
    require_once 'global.php';
    

    class CausasVoluntarioDao
    {
        public static function cadastrar($causaVoluntario, $codVoluntario)
        {
            $conexao = Conexao::conectar();
        
            $verificaCausa = $conexao->prepare("SELECT codVoluntario FROM tbcausaVoluntario WHERE codCategoriaServico IN (?) AND codVoluntario != ? AND codVoluntario = ?");
            $codCategoria = implode(",", $causaVoluntario->getCodCategoria());
            $verificaCausa->bindValue(1, $codCategoria);
            $verificaCausa->bindValue(2, $codVoluntario);
            $verificaCausa->bindValue(3, $codVoluntario);
            $verificaCausa->execute();
        
            if ($verificaCausa->rowCount() > 0) 
            {
                echo "<script>alert('Essa causa já foi adicionada ao seu perfil');</script>";
                return false;
            }
            else
            {

                // Insere as categorias
                foreach ($causaVoluntario->getCodCategoria() as $causa) {
                    $prepareStatement = $conexao->prepare("INSERT INTO  tbcausavoluntario (codVoluntario, codCategoriaServico) 
                    VALUES (?,?)");

                    $prepareStatement->bindValue(1, $causaVoluntario -> getCodVoluntario());
                    $prepareStatement->bindValue(2, $causa);
                    $prepareStatement->execute();
                }
            }
        
        }

        
        public static function listar($codVoluntario)
        {

            $conexao = Conexao::conectar();
            $querySelect = ("SELECT tbCausaVoluntario.codCausaVoluntario, tbCategoriaServico.codCategoriaServico, tbCategoriaServico.nomeCategoria,  
            tbVoluntario.codVoluntario FROM tbCausaVoluntario
            INNER JOIN tbCategoriaServico ON tbCategoriaServico.codCategoriaServico = tbCausaVoluntario.codCategoriaServico
            INNER JOIN tbVoluntario ON tbVoluntario.codVoluntario = tbCausaVoluntario.codVoluntario
            WHERE tbVoluntario.codVoluntario = $codVoluntario ");
            $resultado = $conexao->query($querySelect);
            $lista = $resultado->fetchAll();
            return $lista;  
        }

        public static function listarVoluntariosCausas($codVoluntario)
        {

            $conexao = Conexao::conectar();
            $querySelect = ("SELECT DISTINCT tbCausaVoluntario.codCausaVoluntario, tbCategoriaServico.codCategoriaServico, tbCategoriaServico.nomeCategoria  
            FROM tbCausaVoluntario
            INNER JOIN tbCategoriaServico ON tbCategoriaServico.codCategoriaServico = tbCausaVoluntario.codCategoriaServico
            WHERE tbCausaVoluntario.codVoluntario = $codVoluntario");

            $resultado = $conexao->query($querySelect);
            $lista = $resultado->fetchAll();
            return $lista;  
        }

           
    }
?>