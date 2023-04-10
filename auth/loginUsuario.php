<?php
    session_start();

    require_once 'global.php';

    $conectar=Conexao::conectar();

    // Verifica se o formulário foi submetido
    if ($_SERVER['REQUEST_METHOD'] === 'POST') 
    {
        // Obtém as credenciais do formulário
        $login = $_POST['login'];
        $senha = $_POST['senha'];

        $_SESSION['login']=$login;
        $_SESSION['senha']=$senha;


        if($verificaUsuario=Utils::cpfOuCnpj($login) == "Cpf" )
        {
            $stmt=$conectar->prepare("SELECT codVoluntario,nomeVoluntario,emailVoluntario,logVoluntario,numLogVoluntario,cepVoluntario,bairroVoluntario,cidadeVoluntario,estadoVoluntario,compVoluntario,paisVoluntario FROM tbvoluntario WHERE cpfVoluntario = ? AND senhaVoluntario = ?");
            $stmt->bindValue(1, $login);
            $stmt->bindValue(2, $senha);
            $stmt->execute(); 

            // Verifica se encontrou algum resultado
            if ($stmt->rowCount() > 0) 
            {
                // Obtém o código do usuário/instituição
                $result = $stmt->fetch();
                $codUsuario = $result[0];
        
                // Armazena o código na sessão
                $_SESSION['codUsuario'] = $codUsuario;
                $_SESSION['nomeUsuario'] = $result['nomeVoluntario'];
                $_SESSION['emailUsuario'] = $result['emailVoluntario'];
                $_SESSION['logUsuario'] = $result['logVoluntario'];
                $_SESSION['numLogUsuario'] = $result['numLogVoluntario'];
                $_SESSION['cepUsuario'] = $result['cepVoluntario'];
                $_SESSION['bairroUsuario'] = $result['bairroVoluntario'];
                $_SESSION['cidadeUsuario'] = $result['cidadeVoluntario'];
                $_SESSION['estadoUsuario'] = $result['estadoVoluntario'];
                $_SESSION['compUsuario'] = $result['compVoluntario'];
                $_SESSION['paisUsuario'] = $result['paisVoluntario'];
        
                // Redireciona para a página inicial do sistema
                header('Location: ../area-voluntario/perfil-voluntario.php');
                exit();
            } 
            else 
            {
                // Exibe mensagem de erro
                echo "Login e/ou senha inválidos.";
            }
        
        }
        else if($verificaUsuario=Utils::cpfOuCnpj($login) == "Cnpj")
        {
            $stmt=$conectar->prepare("SELECT codInstituicao,nomeInstituicao,emailInstituicao,logInstituicao,numLogInstituicao,cepInstituicao,bairroInstituicao,cidadeInstituicao,estadoInstituicao,compInstituicao,paisInstituicao FROM tbinstituicao WHERE cnpjInstituicao = ? AND senhaInstituicao = ?");
            $stmt->bindValue(1, $login);
            $stmt->bindValue(2, $senha);
            $stmt->execute(); 

            // Verifica se encontrou algum resultado
            if ($stmt->rowCount() > 0) 
            {
                // Obtém o código do usuário/instituição
                $result = $stmt->fetch();
                $codUsuario = $result[0];
        
                // Armazena o código na sessão
                $_SESSION['codUsuario'] = $codUsuario;
                $_SESSION['nomeUsuario'] = $result['nomeInstituicao'];
                $_SESSION['emailUsuario'] = $result['emailInstituicao'];
                $_SESSION['logUsuario'] = $result['logInstituicao'];
                $_SESSION['numLogUsuario'] = $result['numLogInstituicao'];
                $_SESSION['cepUsuario'] = $result['cepInstituicao'];
                $_SESSION['bairroUsuario'] = $result['bairroInstituicao'];
                $_SESSION['cidadeUsuario'] = $result['cidadeInstituicao'];
                $_SESSION['estadoUsuario'] = $result['estadoInstituicao'];
                $_SESSION['compUsuario'] = $result['compInstituicao'];
                $_SESSION['paisUsuario'] = $result['paisInstituicao'];
        
                // Redireciona para a página inicial do sistema
                header('Location: ../area-instituicao/perfil-instituicao.php');
                exit();

            }
            else
            {
                echo("Login e/ou senha inválidos.");
            }
        }
    }     
    //"SELECT nomeVoluntario,dataNascVoluntario, emailVoluntario,numFoneVoluntario,
    //cidadeVoluntario, estadoVoluntario, paisVoluntario, TIMESTAMPDIFF(YEAR, dataNascVoluntario, NOW()) AS dataNascVoluntario FROM tbVoluntario 
    //INNER JOIN tbFoneVoluntario ON tbFoneVoluntario.codVoluntario = tbVoluntario.codVoluntario
    //WHERE emailVoluntario = '$user_vol'"
?>

