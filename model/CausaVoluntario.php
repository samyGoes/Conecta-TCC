<?php 

    class CausaVoluntario{
        //Atributos

        private $codCategoria = array();
        private $codVoluntario;

        //Getters
        public function getCodCategoria(){
            return $this->codCategoria;
        }
        public function getCodVoluntario(){
            return $this->codVoluntario;
        }
        
        //Setters
        public function setCodCategoria($codCategoria){
            $this->codCategoria=$codCategoria;
        }
        public function setCodVoluntario($codVoluntario){
            $this->codVoluntario=$codVoluntario;
        }
    }
?>