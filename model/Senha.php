<?php 
  class Senha
  {
    function validar($senha,$confirmar_senha)
    {
      if ($senha != $confirmar_senha) {
        return false;
      } else {
        return true;
      }
  }
  }
?>