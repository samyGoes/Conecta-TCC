<?php 

    class CategoriaServ{
        //Atributos
        private $idCategoria;
        private $nomeCategoria;

        //Getters
        public function getIdCategoria(){
            return $this->idCategoria;
        }
        public function getNomeCategoria(){
            return $this->nomeCategoria;
        }
        
        
        //Setters
        public function setIdCategoria($idCategoria){
            $this->idCategoria=$idCategoria;
        }
        public function setNomeCategoria($nomeCategoria){
            $this->nomeCategoria=$nomeCategoria;
        }
       
    }
?>