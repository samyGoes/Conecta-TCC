<?php 

    class Solicitacao{
        //Atributos
        private $codInstituicao;
        private $nomeCategoriaHabilidade;
        private $statusSolicitacao;

        //Getters
        public function getCodInstituicao(){
            return $this->codInstituicao;
        }
        public function getNomeCategoriaHabilidade(){
            return $this->nomeCategoriaHabilidade;
        }
        public function getStatusSolicitacao(){
            return $this->statusSolicitacao;
        }

        
        //Setters
        public function setCodInstituicao($codInstituicao){
            $this->codInstituicao=$codInstituicao;
        }
        public function setNomeCategoriaHabilidade($nomeCategoriaHabilidade){
            $this->nomeCategoriaHabilidade=$nomeCategoriaHabilidade;
        }
        public function setStatusSolicitacao($statusSolicitacao){
            $this->statusSolicitacao=$statusSolicitacao;
        }
    }
?>