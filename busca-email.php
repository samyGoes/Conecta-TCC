<?php
    
    function buscaEmail($email)
    {
        require 'global.php';
        $conectar = Conexao::conectar();
    
        $stmt=$conectar->prepare("SELECT emailVoluntario FROM tbvoluntario WHERE emailVoluntario = :email
                                  UNION 
                                  SELECT emailInstituicao FROM tbinstituicao WHERE emailInstituicao = :email");
        $stmt->bindValue(':email', $email, PDO::PARAM_STR);
        $stmt->execute();
        $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach($resultados as $resultado)
        {
            if ($resultado['emailVoluntario'] == $email || $resultado['emailInstituicao'] == $email) 
            {
                return true;
            }
        }

        return false;        
    }
    
?>