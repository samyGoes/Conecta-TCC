<?php 

    class Servico{
        private $id;
        private $horarioServico;
        private $periodoServico;
        private $avaliacaoVoluntario;
        private $avaliacaoInstituicao;
        private $statusServico;
        private $descServico;
        private $nomeServico;
        private $tipoServico;
        private $dataInicioServico;
        private $dataTerminoServico;
        private $qntdVagaServico;
        private $habilidadeServico = array();
        private $instituicao;
        private $categoriaServico = array();
        private $cepLocalServico;
        private $bairroLocalServico;
        private $estadoLocalServico;
        private $logradouroLocalServico;
        private $complementoLocalServico;
        private $paisLocalServico;
        private $numeroLocalServico;
        private $cidadeLocalServico;




        //Getters//

        public function getId(){
            return $this->id;
        }

        public function getHorarioServico(){
            return $this->horarioServico;
        }
        
        public function getPeriodoServico(){
            return $this->periodoServico;
        }
        public function getAvaliacaoVoluntario(){
            return $this->avaliacaoVoluntario;
        }
        public function getAvaliacaoInstituicao(){
            return $this->avaliacaoInstituicao;
        }

        public function getStatusServico(){
            return $this->statusServico;
        }
        
        public function getNomeServico(){
            return $this->nomeServico;
        }

        public function getTipoServico(){
            return $this->tipoServico;
        }

        public function getDataInicioServico(){
            return $this->dataInicioServico;
        }

        public function getDataTerminoServico(){
            return $this->dataTerminoServico;
        }

        public function getQntdVagaServico(){
            return $this->qntdVagaServico;
        }

        public function getDescServico(){
            return $this->descServico;
        }

        public function getHabilidadeServico(){
            return $this->habilidadeServico;
        }

        public function getInstituicao(){
            return $this->instituicao;
        }

        public function getCategoriaServico(){
            return $this->categoriaServico;
        }

        public function getCepLocalServico(){
            return $this->cepLocalServico;
        }

        public function getBairroLocalServico(){
            return $this->bairroLocalServico;
        }

        public function getEstadoLocalServico(){
            return $this->estadoLocalServico;
        }

        public function getLogradouroLocalServico(){
            return $this->logradouroLocalServico;
        }

        public function getComplementoLocalServico(){
            return $this->complementoLocalServico;
        }

        public function getPaisLocalServico(){
            return $this->paisLocalServico;
        }

        public function getNumeroLocalServico(){
            return $this->numeroLocalServico;
        }

        public function getCidadeLocalServico(){
            return $this->cidadeLocalServico;
        }


        //Setters//

        public function setId($id){
            $this -> id = $id;
        }

        public function setHorarioServico($horarioServico){
            $this -> horarioServico = $horarioServico;
        }

        public function setPeriodoServico($periodoServico){
            $this -> periodoServico = $periodoServico;
        }

        public function setAvaliacaoVoluntario($avaliacaoVoluntario){
            $this -> avaliacaoVoluntario = $avaliacaoVoluntario;
        }

        public function setAvaliacaoInstituicao($avaliacaoInstituicao){
            $this -> avaliacaoInstituicao = $avaliacaoInstituicao;
        }

        
        public function setStatusServico($statusServico){
            $this -> statusServico = $statusServico;
        }

        public function setDescservico($descServico){
            $this -> descServico = $descServico;
        }

        public function setNomeServico($nomeServico){
            $this -> nomeServico = $nomeServico;
        }

        public function setTipoServico($tipoServico){
            $this -> tipoServico = $tipoServico;
        }

        public function setDataInicioServico($dataInicioServico){
            $this -> dataInicioServico = $dataInicioServico;
        }

        public function setDataTerminoServico($dataTerminoServico){
            $this -> dataTerminoServico = $dataTerminoServico;
        }

        public function setQntdVagaServico($qntdVagaServico){
            $this -> qntdVagaServico = $qntdVagaServico;
        }

        public function setHabilidadeServico($habilidadeServico){
            $this -> habilidadeServico = $habilidadeServico;
        }

        public function setCategoriaServico($categoriaServico){
            $this -> categoriaServico = $categoriaServico;
        }

        public function setInstituicao($instituicao){
            $this -> instituicao = $instituicao;
        }

        public function setCepLocalServico($cepLocalServico){
            $this -> cepLocalServico = $cepLocalServico;
        }

        public function setBairroLocalServico($bairroLocalServico){
            $this -> bairroLocalServico = $bairroLocalServico;
        }

        public function setEstadoLocalServico($estadoLocalServico){
            $this -> estadoLocalServico = $estadoLocalServico;
        }

        public function setLogradouroLocalServico($logradouroLocalServico){
            $this -> logradouroLocalServico = $logradouroLocalServico;
        }

        public function setComplementoLocalServico($complementoLocalServico){
            $this -> complementoLocalServico = $complementoLocalServico;
        }

        public function setPaisLocalServico($paisLocalServico){
            $this -> paisLocalServico = $paisLocalServico;
        }

        public function setNumeroLocalServico($numeroLocalServico){
            $this -> numeroLocalServico = $numeroLocalServico;
        }

        public function setCidadeLocalServico($cidadeLocalServico){
            $this -> cidadeLocalServico = $cidadeLocalServico;
        }
    }
?>