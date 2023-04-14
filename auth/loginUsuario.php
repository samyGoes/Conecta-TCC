<?php
    require_once 'global.php';

    session_start();

    $conectar=Conexao::conectar();

    // Verifica se o formulário foi submetido
    if (isset($_POST['login']) && isset($_POST['senha']))
    {
        // Obtém as credenciais do formulário
        $login = $_POST['login'];
        $senha = $_POST['senha'];

       

        if($verificaUsuario=Utils::cpfOuCnpj($login) == "Cpf" )
        {
            $stmt=$conectar->prepare("SELECT tbVoluntario.codVoluntario, nomeVoluntario, dataNascVoluntario, 
            emailVoluntario, 
            COALESCE(tbFoneVoluntario1.numFoneVoluntario, '') AS telefone1,
            COALESCE(tbFoneVoluntario2.numFoneVoluntario, '') AS telefone2,
            logVoluntario, numLogVoluntario, cepVoluntario, bairroVoluntario, 
            cidadeVoluntario, estadoVoluntario, paisVoluntario, compVoluntario, 
            descVoluntario,TIMESTAMPDIFF(YEAR, dataNascVoluntario, NOW()) AS idade FROM tbVoluntario 
            INNER JOIN tbFoneVoluntario tbFoneVoluntario1 ON tbFoneVoluntario1.codVoluntario = tbVoluntario.codVoluntario 
                INNER JOIN tbFoneVoluntario tbFoneVoluntario2 
                    ON tbFoneVoluntario1.codVoluntario = tbFoneVoluntario2.codVoluntario 
                        AND tbFoneVoluntario1.codFoneVoluntario <> tbFoneVoluntario2.codFoneVoluntario 
                        WHERE cpfVoluntario = ? AND senhaVoluntario = ?");
            
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
                $_SESSION['login']=$login;
                $_SESSION['senha']=$senha;        
                $_SESSION['codUsuario'] = $codUsuario;
                $_SESSION['nomeUsuario'] = $result['nomeVoluntario'];
                $_SESSION['dataNasc'] = $result['dataNascVoluntario'];
                $_SESSION['emailUsuario'] = $result['emailVoluntario'];
                $_SESSION['numFoneUsuario1'] = $result['telefone1'];
                $_SESSION['numFoneUsuario2'] = $result['telefone2'];
                $_SESSION['logUsuario'] = $result['logVoluntario'];
                $_SESSION['numLogUsuario'] = $result['numLogVoluntario'];
                $_SESSION['cepUsuario'] = $result['cepVoluntario'];
                $_SESSION['bairroUsuario'] = $result['bairroVoluntario'];
                $_SESSION['cidadeUsuario'] = $result['cidadeVoluntario'];
                $_SESSION['estadoUsuario'] = $result['estadoVoluntario'];
                $_SESSION['compUsuario'] = $result['compVoluntario'];
                $_SESSION['paisUsuario'] = $result['paisVoluntario'];
                $_SESSION['idadeUsuario'] = $result['idade'];
                $_SESSION['descUsuario'] = $result['descVoluntario'];
        
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
            $stmt=$conectar->prepare("SELECT tbInstituicao.codInstituicao, nomeInstituicao, emailInstituicao, 
            COALESCE(tbFoneInstituicao1.numFoneInstituicao, '') AS telefone1,
            COALESCE(tbFoneInstituicao2.numFoneInstituicao, '') AS telefone2,
            logInstituicao, numLogInstituicao, cepInstituicao, bairroInstituicao, 
            cidadeInstituicao, estadoInstituicao, paisInstituicao, compInstituicao, 
            descInstituicao 
            FROM tbInstituicao 
            INNER JOIN tbFoneInstituicao tbFoneInstituicao1 
                ON tbInstituicao.codInstituicao = tbFoneInstituicao1.codInstituicao 
                    INNER JOIN tbFoneInstituicao tbFoneInstituicao2 
                        ON tbInstituicao.codInstituicao = tbFoneInstituicao2.codInstituicao 
                        AND tbFoneInstituicao1.codFoneInstituicao <> tbFoneInstituicao2.codFoneInstituicao 
                        WHERE cnpjInstituicao = ? AND senhaInstituicao = ?");

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
                $_SESSION['login']=$login;
                $_SESSION['senha']=$senha;        
                $_SESSION['codUsuario'] = $codUsuario;
                $_SESSION['nomeUsuario'] = $result['nomeInstituicao'];
                $_SESSION['emailUsuario'] = $result['emailInstituicao'];
                $_SESSION['numFoneUsuario1'] = $result['telefone1'];
                $_SESSION['numFoneUsuario2'] = $result['telefone2'];
                $_SESSION['logUsuario'] = $result['logInstituicao'];
                $_SESSION['numLogUsuario'] = $result['numLogInstituicao'];
                $_SESSION['cepUsuario'] = $result['cepInstituicao'];
                $_SESSION['bairroUsuario'] = $result['bairroInstituicao'];
                $_SESSION['cidadeUsuario'] = $result['cidadeInstituicao'];
                $_SESSION['estadoUsuario'] = $result['estadoInstituicao'];
                $_SESSION['compUsuario'] = $result['compInstituicao'];
                $_SESSION['paisUsuario'] = $result['paisInstituicao'];
                $_SESSION['descUsuario'] = $result['descInstituicao'];
                
        
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
?>

