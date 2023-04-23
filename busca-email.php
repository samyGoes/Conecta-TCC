<?php
    
    function buscaEmail($email)
    {
        require 'global.php';
        $conectar = Conexao::conectar();
    
        $stmt = $conectar->prepare("SELECT emailVoluntario FROM tbvoluntario WHERE emailVoluntario = :email
                                  UNION 
                                  SELECT emailInstituicao FROM tbinstituicao WHERE emailInstituicao = :email");
        
        $stmt->bindValue(':email', $email, PDO::PARAM_STR);
        $stmt->execute();
        $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach($resultados as $resultado)
        {
            if ($resultado['emailVoluntario'] == $email || $resultado['emailInstituicao'] == $email)  
            {
                $nome = nomeEmail($email);
                return array('email' => true, 'nome' => $nome);
                // return true;
            }
        }
        
        return array('email' => false, 'nome' => '');
        //return false;        
    }



    function nomeEmail($email)
    {
        require 'global.php';
        $conectar = Conexao::conectar();

        $stmt = $conectar->prepare("SELECT nomeVoluntario FROM tbvoluntario WHERE emailVoluntario = :email
                                    UNION 
                                    SELECT nomeInstituicao FROM tbinstituicao WHERE emailInstituicao = :email");

        $stmt->bindValue(':email', $email, PDO::PARAM_STR);
        $stmt->execute();
        $nomes = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $nome = $nomes[0]['nomeVoluntario'] ?? $nomes[0]['nomeInstituicao'] ?? '';

        return $nome;  
    }
    
?>