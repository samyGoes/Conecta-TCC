<?php
    require 'global.php';

    function buscaEmail($email)
    {
        //require 'global.php';
        
        $conectar = Conexao::conectar();
    
        $stmt = $conectar->prepare("SELECT nomeVoluntario AS nome, emailVoluntario AS email FROM tbvoluntario WHERE emailVoluntario = :email
                                    UNION 
                                    SELECT nomeInstituicao AS nome, emailInstituicao AS email FROM tbinstituicao WHERE emailInstituicao = :email");
        
        $stmt->bindValue(':email', $email, PDO::PARAM_STR);
        //echo "Valor do email: " . $email;
        $stmt->execute();
        $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);

        //print_r($resultados);

        foreach($resultados as $resultado)
        {
            if ($resultado['email'] == $email)  
            {
                return array('email' => true, 'nome' => $resultado['nome']);
            } 
        }
        return array('email' => false, 'nome' => '');       
    }

    function pegaId($email)
    {
  
        $conectar = Conexao::conectar();
    
        $stmt = $conectar->prepare("SELECT codVoluntario FROM tbvoluntario WHERE emailVoluntario = :email");
                                    
        
        $stmt->bindValue(':email', $email, PDO::PARAM_STR);
        //echo "Valor do email: " . $email;
        $stmt->execute();
        $codsVoluntario = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach($codsVoluntario as $codVoluntario)
        {
            if ($codVoluntario['codVoluntario'])  
            {
                return $codVoluntario;
            }
            else
            {
                $stmt2 = $conectar->prepare("SELECT codInstituicao FROM tbinstituicao WHERE emailInstituicao = :email");
                $stmt2->bindValue(':email', $email, PDO::PARAM_STR);
                $stmt2->execute();
                $codsInstituicao = $stmt2->fetchAll(PDO::FETCH_ASSOC);

                foreach($codsInstituicao as $codInstituicao)
                {
                    if ($codInstituicao['codVoluntario'])  
                    {
                        return $codInstituicao;
                    }
                }
            }
        }
        return false;
    }

?>