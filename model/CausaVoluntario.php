<?php 

    class CausaVoluntario{
        //Atributos

        private $codCausaVoluntario;
        private $codCategoria = array();
        private $codVoluntario;

        //Getters
        public function getCodCategoria(){
            return $this->codCategoria;
        }
        public function getCodCausaVoluntario(){
            return $this->codCausaVoluntario;
        }
        public function getCodVoluntario(){
            return $this->codVoluntario;
        }
        
        //Setters
        public function setCodCategoria($codCategoria){
            $this->codCategoria=$codCategoria;
        }
        public function setCodCausaVoluntario($codCausaVoluntario){
            $this->codCausaVoluntario=$codCausaVoluntario;
        }
        public function setCodVoluntario($codVoluntario){
            $this->codVoluntario=$codVoluntario;
        }
    }
?>