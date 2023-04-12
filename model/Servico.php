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
        private $codHabilidadeServico;
        private $codInstituicao;
        private $codCategoriaServico;


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
            return $this->cpfavaliacaoInstituicao;
        }

        public function getStatusServico(){
            return $this->statusServico;
        }
        
        public function getNomeServico(){
            return $this->nomeServcio;
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

        public function getQntdServico(){
            return $this->qntdServico;
        }

        public function getDescServico(){
            return $this->descServico;
        }

        public function getCodHabilidadeServico(){
            return $this->codHabilidadeServico;
        }

        public function getCodInstituicao(){
            return $this->codInstituicao;
        }

        public function getCodCategoriaServico(){
            return $this->codCategoriaServico;
        }

        
        

        //Setters//

        public function setId($id){
            $this -> id = $id;
        }

        public function setNomeVoluntario($nomeVoluntario){
            $this -> nomeVoluntario = $nomeVoluntario;
        }

        public function setTelefone1Voluntario($telefone1Voluntario){
            $this -> telefone1Voluntario = $telefone1Voluntario;
        }

        public function setTelefone2Voluntario($telefone2Voluntario){
            $this -> telefone2Voluntario = $telefone2Voluntario;
        }

        public function setCpfVoluntario($cpfVoluntario){
            $this -> cpfVoluntario = $cpfVoluntario;
        }

        
        public function setDataNascVoluntario($dataNascVoluntario){
            $this -> dataNascVoluntario = $dataNascVoluntario;
        }

        public function setEmailVoluntario($emailVoluntario){
            $this -> emailVoluntario = $emailVoluntario;
        }

        public function setSenhaVoluntario($senhaVoluntario){
            $this -> senhaVoluntario = $senhaVoluntario;
        }

        public function setConfSenhaVoluntario($confSenhaVoluntario){
            $this -> confSenhaVoluntario = $confSenhaVoluntario;
        }

        public function setLogVoluntario($logVoluntario){
            $this -> logVoluntario = $logVoluntario;
        }

        public function setNumLogVoluntario($numLogVoluntario){
            $this -> numLogVoluntario = $numLogVoluntario;
        }

        public function setCompVoluntario($compVoluntario){
            $this -> compVoluntario = $compVoluntario;
        }

        public function setBairroVoluntario($bairroVoluntario){
            $this -> bairroVoluntario = $bairroVoluntario;
        }

        public function setCidadeVoluntario($cidadeVoluntario){
            $this -> cidadeVoluntario = $cidadeVoluntario;
        }

        public function setDescVoluntario($descVoluntario){
            $this -> descVoluntario = $descVoluntario;
        }

        public function setCepVoluntario($cepVoluntario){
            $this -> cepVoluntario = $cepVoluntario;
        }

        public function setFotoVoluntario($fotoVoluntario){
            $this -> fotoVoluntario = $fotoVoluntario;
        }

        public function setEstadoVoluntario($estadoVoluntario){
            $this -> estadoVoluntario = $estadoVoluntario;
        }

        public function setPaisVoluntario($paisVoluntario){
            $this -> paisVoluntario = $paisVoluntario;
        }


    }

    class foneVoluntario{
        private $numFoneVoluntario;
        
        public function getNumFoneVoluntario(){
            return $this->numFoneVoluntario;
        }

        
        public function setNumFoneVoluntario($numFoneVoluntario){
            $this -> numFoneVoluntario = $numFoneVoluntario;
        }

    }