<?php
    require 'global.php';

    function buscaEmail($email)
    {
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

        $stmt = $conectar->prepare("SELECT codVoluntario FROM tbvoluntario WHERE emailVoluntario = :email 
                                    UNION 
                                    SELECT codInstituicao FROM tbinstituicao WHERE emailInstituicao = :email");
        $stmt->bindValue(':email', $email, PDO::PARAM_STR);
        $stmt->execute();
        $cod = $stmt->fetch(PDO::FETCH_ASSOC);  

        if ($cod) 
        {
            if (isset($cod['codVoluntario'])) 
            {
                return intval($cod['codVoluntario']);
            } 
            else if (isset($cod['codInstituicao'])) 
            {
                return intval($cod['codInstituicao']);
            }
        }
        return null;
        //return $cod;
        //print_r($cod);
    }
    
?>