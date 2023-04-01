<?php

require_once 'global.php';
include_once('Conexao.php');


// print_r($_REQUEST)

$conectar=Conexao::conectar();



    // Acessa
    /* print_r('Email: ' . $email);
     print_r('<br>');
     print_r('Senha: ' . $senha);*/
     $user =  $_POST['email'];
     $senha =  $_POST['senha'];

     $sql =$conectar->prepare("SELECT * FROM tbInstituicao WHERE emailInstituicao = :user AND senhaInstituicao = :senha");

     $sql->bindParam(':user', $user);
     $sql->bindParam(':senha', $senha);
     $sql->execute();
     

    //print_r($sql);
    //print_r($result);

    if ($sql->rowCount() > 0) {
        header("Location: ../area-instituicao/perfil-instituicao.php");
        exit();
    } else {
        header("Refresh: 1; url=../form-login.php");
        echo "<script language='javascript' type='text/javascript'>
        alert('login e / ou senha incorretos');
        </script>";
        exit();

    }

    
    ?>








































/*if(isset($_POST['submit']) && empty(['email']) && empty(['password'])){

    $email= $_POST['email'];
    $senha= $_POST['password'];
    /*print_r('Email: '. $email);
    print_r('Senha: ' . $senha);
    echo "oi";*/
    /*$sql = "SELECT * FROM tbVoluntario WHERE emailVoluntario = $email AND senhaVoluntario = $senha";
    $result = $conexao->query($sql);
    print_r($result);*/

//}
/*
else{
    echo "oi";
}*/






//validação para o usuario só conseguir vim para essa pag pelo form

/*

if(isset($_POST['submit']) && empty(['email']) && empty(['password'])) {
	header('Location: ../views/form-instituicao.html');
	exit();
}

 
$email = mysqli_real_escape_string($conexao, $_POST['email']);
$senha = mysqli_real_escape_string($conexao, $_POST['senha']);
 
$query = "SELECT * FROM tbVoluntario WHERE emailVoluntario = '{$email}' AND senhaVoluntario = md5('{$senha}')";
 
$result = mysqli_query($conexao, $query);
 
$row = mysqli_num_rows($result);
if($row == 1) {
	$_SESSION['email'] = $email;
	header('Location: ../testeLogin.php');
	exit();
} else {
	$_SESSION['nao_autenticado'] = true;
	header('Location: index.php');
	exit();
}*/
