<?php 

    class SolicitacaoCategoria{
        //Atributos
        private $codInstituicao;
        private $nomeCategoria;
        private $statusSolicitacao;

        //Getters
        public function getCodInstituicao(){
            return $this->codInstituicao;
        }
        public function getNomeCategoria(){
            return $this->nomeCategoria;
        }
        public function getStatusSolicitacao(){
            return $this->statusSolicitacao;
        }

        
        //Setters
        public function setCodInstituicao($codInstituicao){
            $this->codInstituicao=$codInstituicao;
        }
        public function setNomeCategoria($nomeCategoria){
            $this->nomeCategoria=$nomeCategoria;
        }
        public function setStatusSolicitacao($statusSolicitacao){
            $this->statusSolicitacao=$statusSolicitacao;
        }
    }
?>