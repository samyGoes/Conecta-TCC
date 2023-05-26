<?php

    class galeria
    { 
        private $idGaleriaFoto;
        private $fotoGaleria;
        

        public function getIdGaleriaFoto()
        {
            return $this->idGaleriaFoto;
        }
        public function getFotoGaleria()
        {
            return $this->fotoGaleria;
        }


        public function setIdGaleriaFoto($idGaleriaFoto)
        {
            return $this->$idGaleriaFoto = $idGaleriaFoto;
        }
        public function setFotoGaleira($fotoGaleria)
        {
            return $this->$fotoGaleria = $fotoGaleria;
        }
    }
    
?>