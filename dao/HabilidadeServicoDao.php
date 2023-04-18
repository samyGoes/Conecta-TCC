<?php
    require_once 'global.php';

    class HabilidadeServicoDao
    {
        public static function cadastrar($habilidadeServico)
        {
            $conexao = Conexao :: conectar();

            $prepareStatement = $conexao -> prepare ( "INSERT INTO tbhabilidadeServico(nomeHabilidadeServico) 
            VALUES(?)");

            $prepareStatement -> bindValue (1, $habilidadeServico -> getNomeHabilidade());
            $prepareStatement -> execute();
        }


        public static function listar()
        {
            $conexao = Conexao::conectar();
            $querySelect = "SELECT codHabilidadeServico, nomeHabilidadeServico FROM tbhabilidadeServico";
            $resultado = $conexao->query($querySelect);
            $lista = $resultado->fetchAll();
            return $lista;  
        }

        
        
    }


?>