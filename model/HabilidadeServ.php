<?php 

    class HabilidadeServ{
        //Atributos
        private $idHabilidade;
        private $nomeHabilidade;

        //Getters
        public function getIdHabilidade(){
            return $this->idHabilidade;
        }
        public function getNomeHabilidade(){
            return $this->nomeHabilidade;
        }
        

        //Setters
        public function setIdHabilidade($idHabilidade){
            $this->idHabilidade=$idHabilidade;
        }
        public function setNomeHabilidade($nomeHabilidade){
            $this->nomeHabilidade=$nomeHabilidade;
        }
    }
?>