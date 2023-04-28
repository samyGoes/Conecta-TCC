<?php 

    class CategoriaServ{
        //Atributos
        private $idCategoria;
        private $nomeCategoria;
        private $codInstituicao = array();

        //Getters
        public function getIdCategoria(){
            return $this->idCategoria;
        }
        public function getNomeCategoria(){
            return $this->nomeCategoria;
        }
        public function getCodInstituicao(){
            return $this->codInstituicao;
        }

        
        //Setters
        public function setIdCategoria($idCategoria){
            $this->idCategoria=$idCategoria;
        }
        public function setNomeCategoria($nomeCategoria){
            $this->nomeCategoria=$nomeCategoria;
        }
        public function setCodInstituicao($codInstituicao){
            $this->codInstituicao=$codInstituicao;
        }
    }
?>