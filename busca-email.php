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

?>