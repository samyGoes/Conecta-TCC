<?php
    //Classe de conexão com o banco de dados.
    Class Conexao
    {
        public static function conectar()
        {
            try
            {
                //Objeto da classe PDO
                // $conexao = new PDO("TIPO_BANCO:host=SERVIDOR;dbname=NOME_BANCO", "USUARIO", "SENHA"); 
                $conexao = new PDO("mysql:host=localhost;dbname=bdconecta","root","");
                $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                return $conexao;
            }
            catch(Exception $e)
            {
                //Impressão do erro
                echo "Erro de conexão";
                echo '<pre>';
                    echo($e);
                echo '</pre>';
            }
        }
    }
     
?>