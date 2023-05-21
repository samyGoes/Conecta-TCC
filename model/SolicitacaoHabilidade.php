<?php 

    class SolicitacaoHabilidade{
        //Atributos
        private $codInstituicao;
        private $nomeHabilidade;
        private $statusSolicitacao;

        //Getters
        public function getCodInstituicao(){
            return $this->codInstituicao;
        }
        public function getNomeHabilidade(){
            return $this->nomeHabilidade;
        }
        public function getStatusSolicitacao(){
            return $this->statusSolicitacao;
        }

        
        //Setters
        public function setCodInstituicao($codInstituicao){
            $this->codInstituicao=$codInstituicao;
        }
        public function setNomeHabilidade($nomeHabilidade){
            $this->nomeHabilidade=$nomeHabilidade;
        }
        public function setStatusSolicitacao($statusSolicitacao){
            $this->statusSolicitacao=$statusSolicitacao;
        }
    }
?>