<?php

    require_once '../auth/verifica-logado.php';
    require_once 'global.php';
    
    try
    {
        header('Location: form-editar-perfil-voluntario.php?edicao=sucesso');
      
        $voluntario= new Voluntario();
        $voluntario -> setIdVoluntario($_SESSION['codUsuario']);
        $voluntario -> setNomeVoluntario($_POST ['nome']);
        $voluntario-> setTelefone1Voluntario($_POST['telefone1']);
        $voluntario-> setTelefone2Voluntario($_POST['telefone2']);
        $voluntario-> setEmailVoluntario($_POST['email']);
        $voluntario-> setLogVoluntario($_POST['log']);
        $voluntario-> setNumLogVoluntario($_POST['numeroCasa']);
        $voluntario-> setCompVoluntario($_POST['complemento']);
        $voluntario-> setBairroVoluntario($_POST['bairro']);
        $voluntario-> setCidadeVoluntario($_POST['cidade']);
        $voluntario-> setCepVoluntario($_POST['cep']);
        $voluntario-> setEstadoVoluntario($_POST['uf']);
        $voluntario-> setPaisVoluntario($_POST['pais']);
        $voluntario-> setDescVoluntario($_POST['desc']);

        //Atualizando sem a foto
        $update =VoluntarioDao::editar($voluntario);

        //Atualizar telefones
        $updateTel = VoluntarioDao::editarTel($voluntario);

        if(isset($_FILES['foto']) && !empty($_FILES['foto']['tmp_name'])) 
        {
            //Consultando o id do Voluntário
            $idVoluntario = VoluntarioDao::consultarId($voluntario);

            //nome original do arquivo no computador do usuário
            $nome = $_FILES['foto']['name'];

            //nome temporário do arquivo como foi armazenado no servidor, é o ARQUIVO!!!
            $arquivo = $_FILES['foto'] ['tmp_name'];
    
            $diretorio = "img-voluntario/";
        
            $extensao = substr($nome, -4);//pega o ponto e os 3 caracteres da extensão do arquivo
    
            $nomenovo = $idVoluntario.$extensao;
    
            $nomecompleto =  $diretorio.$nomenovo;
            
            // $nomecompleto =  $diretorio.$nome;
    
            move_uploaded_file($arquivo, $nomecompleto);
    
            //inserindo a foto na classe Voluntário
            $voluntario -> setFotoPerfilVoluntario ($nomecompleto);
    
            //Chamando a função da classe Dao para atualizar a foto de perfil
            $atualizar=VoluntarioDao::atualizarFotoPerfil($voluntario);

             //Guardando a foto na sessão
             $_SESSION['dadoPerfil']['fotoVoluntario'] = $nomecompleto;
        }

        //Atualizando as sessões
        $consulta = VoluntarioDao::consultarVoluntario($_SESSION['codUsuario']);
        $_SESSION['dadoPerfil'] = $consulta;

        
    }
    catch(Exception $e)
    {
        echo "Erro update-instituição";
        echo '<pre>';
            echo($e);
        echo '</pre>';
         
    }

?>