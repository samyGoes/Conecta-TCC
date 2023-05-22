<?php

require_once 'global.php';
class DashboardDao
{
    public static function qtdInstituicao($codInstituicao){
        $conexao = Conexao::conectar();

        $querySelect = "SELECT COUNT(codInstituicao) FROM tbIntituicao";
        $resultado = $conexao->query($querySelect);
        $resultado->execute();
        $qtdInstituicao = $resultado->fetchAll();

        return $qtdInstituicao;

    }
}
?>