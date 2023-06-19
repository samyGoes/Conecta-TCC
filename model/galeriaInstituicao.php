<?php

    class GaleriaInstituicao
    { 
        private $idGaleriaFoto;
        private $fotoGaleria = array();
        private $idInstituicao;
        

        public function getIdGaleriaFoto()
        {
            return $this->idGaleriaFoto;
        }
        public function getFotoGaleria()
        {
            return $this->fotoGaleria;
        }
        public function getIdInstituicao()
        {
            return $this->idInstituicao;
        }

        public function setIdGaleriaFoto($idGaleriaFoto)
        {
            $this->idGaleriaFoto = $idGaleriaFoto;
        }
        public function setFotoGaleria($fotoGaleria)
        {
            $this->fotoGaleria = $fotoGaleria;
        }
        public function setIdInstituicao($idInstituicao)
        {
            $this->idInstituicao = $idInstituicao;
        }
    }
    
?>