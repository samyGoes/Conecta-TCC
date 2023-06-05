<?php

      require_once 'global.php';

      try{
          header('Location: form-login.php?cadastro=sucesso');

        $validaSenha= new Senha();
        $validaCpf=new Cpf();
        $voluntario= new Voluntario();

        $voluntario -> setNomeVoluntario($_POST ['nome']);
        $voluntario-> setCpfVoluntario($_POST['cpf']);
        $voluntario-> setTelefone1Voluntario($_POST['telefone1']);
        $voluntario-> setTelefone2Voluntario($_POST['telefone2']);
        $voluntario-> setEmailVoluntario($_POST['email']);
        $voluntario-> setSenhaVoluntario($_POST['senha']);
        $voluntario-> setConfSenhaVoluntario($_POST['confSenha']);
        $voluntario-> setLogVoluntario($_POST['logradouro']);
        $voluntario-> setNumLogVoluntario($_POST['numLog']);
        $voluntario-> setCompVoluntario($_POST['complemento']);
        $voluntario-> setBairroVoluntario($_POST['bairro']);
        $voluntario-> setCidadeVoluntario($_POST['cidade']);
        $voluntario-> setCepVoluntario($_POST['cep']);
        $voluntario-> setEstadoVoluntario($_POST['uf']);
        $voluntario-> setPaisVoluntario($_POST['pais']);
        $voluntario-> setVisibilidadeVoluntario($_POST['switch']);

        if (isset($_POST['switch'])) {
          $visibilidade = $_POST['switch'];
        } else {
          $visibilidade = "off"; // Valor padrão quando o switch não foi clicado
        }
        
        $voluntario->setVisibilidadeVoluntario($visibilidade);
        

        $data_brasil = $_POST['date'];
        $data_americana = date('Y-m-d', strtotime(str_replace('/', '-', $data_brasil)));
        $voluntario->setDataNascVoluntario($data_americana);

        //Guardando caminho da foto de perfil padrão
        $user = "img/user.png";

        //inserindo a foto na classe Voluntário
        $voluntario -> setFotoPerfilVoluntario ($user);

        if(isset($_POST['cpf']) && ($_POST['email'])){
            $cpf = $_POST['cpf'];
            $email = $_POST['email'];
            $conexao = new PDO("mysql:host=localhost;dbname=bdconecta","root","");

            $sqlCpf = "SELECT * FROM tbVoluntario WHERE cpfVoluntario = '$cpf'";
            $sqlEmail = "SELECT * FROM tbVoluntario WHERE emailVoluntario = '$email'";
            $resultCpf = $conexao->query($sqlCpf);
            $resultEmail = $conexao->query($sqlEmail);

        if ($resultCpf-> rowCount()> 0 && $resultEmail->rowCount()>0) {
            echo  "<script>
            alert('Esse endereço de email e CPF já estão em uso por outro usuário!');
            setTimeout(function() {
              window.location.href = 'form-voluntario.php';
            }, 300);
          </script>";
                
        }
        else if ($resultEmail-> rowCount()> 0) {
            echo  "<script>
            alert('Esse endereço de email já está em uso por outro usuário!');
            setTimeout(function() {
              window.location.href = 'form-voluntario.php';
            }, 300);
          </script>";
        } 
        else if ($resultCpf-> rowCount()> 0) {
            echo "<script>
            alert('Esse CPF já está em uso por outro usuário!');
            setTimeout(function() {
              window.location.href = 'form-voluntario.php';
            }, 300);
          </script>";
        }
        else{
            $cadastrar =VoluntarioDao::Cadastrar($voluntario);
            //Chamando a função da classe Dao para atualizar a foto de perfil
            $atualizar=VoluntarioDao::atualizarFotoPerfil($voluntario);
            echo  "<script>alert('Cadastro feito com sucesso!');</script>";
        }
        }
        }

      catch(Exception $e)
          {
              echo "Erro cadastra-voluntario";
              echo '<pre>';
                  echo($e);
              echo '</pre>';
              
          }
?>

