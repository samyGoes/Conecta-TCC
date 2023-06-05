<?php 

    class Voluntario{
        private $idVoluntario;
        private $nomeVoluntario;
        private $dataNascVoluntario;
        private $cpfVoluntario;
        private $telefone1Voluntario;
        private $telefone2Voluntario;
        private $emailVoluntario;
        private $senhaVoluntario;
        private $confSenhaVoluntario;
        private $logVoluntario;
        private $numLogVoluntario;
        private $compVoluntario;
        private $bairroVoluntario;
        private $cidadeVoluntario;
        private $descVoluntario;
        private $cepVoluntario;
        private $fotoPerfilVoluntario;
        private $paisVoluntario;
        private $estadoVoluntario;
        private $visibilidadeVoluntario;


        //Getters//

        public function getIdVoluntario(){
            return $this->idVoluntario;
        }

        public function getNomeVoluntario(){
            return $this->nomeVoluntario;
        }
        
        public function getTelefone1Voluntario(){
            return $this->telefone1Voluntario;
        }
        public function getTelefone2Voluntario(){
            return $this->telefone2Voluntario;
        }
        public function getCpfVoluntario(){
            return $this->cpfVoluntario;
        }

        public function getDataNascVoluntario(){
            return $this->dataNascVoluntario;
        }
        
        public function getEmailVoluntario(){
            return $this->emailVoluntario;
        }

        public function getSenhaVoluntario(){
            return $this->senhaVoluntario;
        }

        public function getConfSenhaVoluntario(){
            return $this->confSenhaVoluntario;
        }

        public function getLogVoluntario(){
            return $this->logVoluntario;
        }

        public function getNumLogVoluntario(){
            return $this->numLogVoluntario;
        }

        public function getCompVoluntario(){
            return $this->compVoluntario;
        }

        public function getBairroVoluntario(){
            return $this->bairroVoluntario;
        }

        public function getCidadeVoluntario(){
            return $this->cidadeVoluntario;
        }

        public function getDescVoluntario(){
            return $this->descVoluntario;
        }

        public function getCepVoluntario(){
            return $this->cepVoluntario;
        }
        
        public function getFotoPerfilVoluntario(){
            return $this->fotoPerfilVoluntario;
        }
        public function getPaisVoluntario(){
            return $this->paisVoluntario;
        }
        public function getEstadoVoluntario(){
            return $this->estadoVoluntario;
        }
        public function getVisibilidadeVoluntario(){
            return $this->visibilidadeVoluntario;
        }

        //Setters//

        public function setIdVoluntario($idVoluntario){
            $this -> idVoluntario = $idVoluntario;
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

        public function setFotoPerfilVoluntario($fotoPerfilVoluntario){
            $this -> fotoPerfilVoluntario = $fotoPerfilVoluntario;
        }

        public function setEstadoVoluntario($estadoVoluntario){
            $this -> estadoVoluntario = $estadoVoluntario;
        }

        public function setPaisVoluntario($paisVoluntario){
            $this -> paisVoluntario = $paisVoluntario;
        }
        public function setVisibilidadeVoluntario($visibilidadeVoluntario){
            $this -> visibilidadeVoluntario = $visibilidadeVoluntario;
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

?>