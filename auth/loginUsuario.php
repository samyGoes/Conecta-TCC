<?php
    require_once 'global.php';

    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    $conectar=Conexao::conectar();

    // Verifica se o formulário foi submetido
    if (isset($_POST['login']) && isset($_POST['senha']))
    {
        // Obtém as credenciais do formulário
        $login = $_POST['login'];
        $senha = $_POST['senha'];

       

        if($verificaUsuario=Utils::cpfOuCnpj($login) == "Cpf" )
        {
            $stmt=$conectar->prepare("SELECT codVoluntario,nomeVoluntario,
            emailVoluntario	FROM tbvoluntario WHERE cpfVoluntario = ? AND senhaVoluntario = ?");
            
            $stmt->bindValue(1, $login);
            $stmt->bindValue(2, $senha);
            $stmt->execute(); 

            // Verifica se encontrou algum resultado
            if ($stmt->rowCount() > 0) 
            {
                // Obtém o código do usuário/Voluntário
                $result = $stmt->fetch();
                $codUsuario = $result[0];
        
                // Armazena os dados na sessão       
                $_SESSION['codUsuario'] = $codUsuario;
                $_SESSION['nomeUsuario'] = $result['nomeVoluntario'];
                $_SESSION['emailUsuario'] = $result['emailVoluntario'];
                $_SESSION['tipoPerfil']= 'Voluntario';
               

                // Redireciona para a página inicial do site
                header('Location: ../index.php');
               
                exit();
            } 
            else 
            {
                echo"erro";
            }
        
        }
        else if($verificaUsuario=Utils::cpfOuCnpj($login) == "Cnpj")
        {
            $stmt=$conectar->prepare("SELECT codInstituicao,nomeInstituicao,
            emailInstituicao FROM tbinstituicao WHERE cnpjInstituicao = ? AND senhaInstituicao = ?");

            $stmt->bindValue(1, $login);
            $stmt->bindValue(2, $senha);
            $stmt->execute(); 

            // Verifica se encontrou algum resultado
            if ($stmt->rowCount() > 0) 
            {
                // Obtém o código do usuário/instituição
                $result = $stmt->fetch();
                $codUsuario = $result[0];
        
                // Armazena os dados na sessão
                $_SESSION['codUsuario'] = $codUsuario;
                $_SESSION['nomeUsuario'] = $result['nomeInstituicao'];
                $_SESSION['emailUsuario'] = $result['emailInstituicao'];
                $_SESSION['tipoPerfil']= 'Instituicao';
        
                // Redireciona para a página inicial do site
                header('Location: ../index.php');
                exit();

            }
            else
            {
                echo("Login e/ou senha inválidos.");
            }
        }
    }     
?>

