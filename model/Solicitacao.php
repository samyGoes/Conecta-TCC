<?php 

    class Solicitacao{
        //Atributos
        private $codInstituicao;
        private $nomeCategoria;
        private $statusCategoria;

        //Getters
        public function getCodInstituicao(){
            return $this->codInstituicao;
        }
        public function getNomeCategoria(){
            return $this->nomeCategoria;
        }
        public function getStatusCategoria(){
            return $this->statusCategoria;
        }

        
        //Setters
        public function setCodInstituicao($codInstituicao){
            $this->codInstituicao=$codInstituicao;
        }
        public function setNomeCategoria($nomeCategoria){
            $this->nomeCategoria=$nomeCategoria;
        }
        public function setStatusCategoria($statusCategoria){
            $this->statusCategoria=$statusCategoria;
        }
    }
?>