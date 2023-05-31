<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

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

        $verificaUsuario=Utils::cpfOuCnpj($login);

        if($verificaUsuario == "Cpf" )
        {
            $stmt=$conectar->prepare("SELECT codVoluntario,nomeVoluntario, emailVoluntario	FROM tbvoluntario WHERE cpfVoluntario = ? AND senhaVoluntario = ?");
            
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

                // NOVA NOTIFICAÇÃO
                $notificacao = $conectar->prepare("SELECT COUNT(codCandidatura) FROM tbCandidatura WHERE statusCandidatura = 'aceito' OR statusCandidatura = 'recusado'");
                $notificacao->execute();
                $qtdMensagemAntiga = $notificacao -> fetchAll();
                $_SESSION['qtdMensagemAntiga'] = $qtdMensagemAntiga[0][0];
               

                // Redireciona para a página inicial do site
                header('Location: ../index.php');
               
                exit();
            } 
            else 
            {
                header('Location: ../form-login.php?status=erro1');
            }
        
        }
        else if($verificaUsuario == "Cnpj")
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

                // NOVA NOTIFICAÇÃO
                $notificacao = $conectar->prepare("SELECT COUNT(codCandidatura) FROM tbCandidatura");
                $notificacao->execute();
                $qtdMensagemAntiga = $notificacao -> fetchAll();
                $_SESSION['qtdMensagemAntiga'] = $qtdMensagemAntiga;
        
                // Redireciona para a página inicial do site
                header('Location: ../index.php');
                exit();

            }
            else
            {
                header('Location: ../form-login.php?status=erro2');
            }
        }else{
            header('Location: ../form-login.php?status=erro3');
        }
    }     
?>

