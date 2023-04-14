<?php
    require_once 'global.php';
    //Executando comandos no banco
    class InstituicaoDao
    {   
        public static function cadastrar($instituicao)
        {
            $conectar=Conexao::conectar();

            $verificaEmail=$conectar->prepare("SELECT codInstituicao FROM tbinstituicao WHERE emailInstituicao = ?");
            $verificaEmail->bindValue(1, $instituicao->getEmailInstituicao());
            $verificaEmail->execute();

            $verificaCnpj=$conectar->prepare("SELECT codInstituicao FROM tbinstituicao WHERE cnpjInstituicao = ?");
            $verificaCnpj->bindValue(1, $instituicao->getCnpjInstituicao());
            $verificaCnpj->execute();

            $validaCpnj= new Cnpj();
            $validaSenha= new Senha();
            $senhaSegura = new SenhaSegura();

            if($verificaEmail->rowCount() > 0 && $verificaCnpj->rowCount() > 0 )
            {
                echo "<script>alert('Esse endereço de email e CNPJ já estão em uso por outro usuário!');</script>";
                return false;
            }
            else if ($verificaEmail->rowCount() > 0)
            {
                echo "<script>alert('Esse endereço de email já está em uso por outro usuário!');</script>";
                return false;
            }
            else if($validaCpnj->validar($instituicao->getCnpjInstituicao()) != true)
            {
                echo"<script>alert('Cnpj inválido!');</script>";
            }
            else if($verificaCnpj->rowCount() > 0)
            {
                echo "<script>alert('Esse CNPJ já está em uso por outro usuário!');</script>";
                return false;
            }
            else if($validaSenha->validar($instituicao->getSenhaInstituicao(),$instituicao->getConfSenhaInstituicao()) == false)
            {
                echo "<script>alert('Confirmação de senha não confere!');</script>";
            }
            else if ($senhaSegura->segura($instituicao->getSenhaInstituicao()) == false)
            {
                echo "<script>alert('Senha esta faltando algum requisito!');</script>";
            }
            else
            {
                $stmt=$conectar->prepare("INSERT INTO tbinstituicao(nomeInstituicao,emailInstituicao,cnpjInstituicao,senhaInstituicao,logInstituicao,
                                                                numLogInstituicao,cepInstituicao,bairroInstituicao,cidadeInstituicao,compInstituicao,estadoInstituicao,paisInstituicao)
                                                                VALUES(?,?,?,?,?,?,?,?,?,?,?,?)");
           
                $stmt->bindValue(1, $instituicao->getNomeInstituicao());
                $stmt->bindValue(2, $instituicao->getEmailInstituicao());
                $stmt->bindValue(3, $instituicao->getCnpjInstituicao());
                $stmt->bindValue(4, $instituicao->getSenhaInstituicao());
                $stmt->bindValue(5, $instituicao->getLogradouroInstituicao());
                $stmt->bindValue(6, $instituicao->getNumeroInstituicao());
                $stmt->bindValue(7, $instituicao->getCepInstituicao());
                $stmt->bindValue(8, $instituicao->getBairroInstituicao());
                $stmt->bindValue(9, $instituicao->getCidadeInstituicao());
                $stmt->bindValue(10, $instituicao->getCompInstituicao());
                $stmt->bindValue(11, $instituicao->getEstadoInstituicao());
                $stmt->bindValue(12, $instituicao->getPaisInstituicao());
                $stmt->execute();

                $id = $conectar->lastInsertId();

                $stmt2=$conectar->prepare("INSERT INTO tbfoneinstituicao(numFoneInstituicao,codInstituicao)
                                                                VALUES(?,$id)");
                $stmt2->bindValue(1, $instituicao->getTel1Instituicao());
                $stmt2->execute();

                $stmt3=$conectar->prepare("INSERT INTO tbfoneinstituicao(numFoneInstituicao,codInstituicao)
                                                                VALUES(?,$id)");
                $stmt3->bindValue(1, $instituicao->getTel2Instituicao());
                $stmt3->execute();

                echo "<script>alert('Cadastro feito com sucesso!');</script>";
                return true;
            } 
            
        }

        public static function editar($instituicao)
        {
            $conectar=Conexao::conectar();

            $stmt = $conectar->prepare("UPDATE tbinstituicao SET nomeInstituicao = ?,logInstituicao = ?,numLogInstituicao = ?,
            cepInstituicao = ?,compInstituicao = ?,bairroInstituicao = ?,cidadeInstituicao = ?,
            estadoInstituicao = ?,paisInstituicao = ?,emailInstituicao = ?,descInstituicao = ? WHERE codInstituicao = ?");

            $stmt->bindValue(1, $instituicao->getNomeInstituicao());
            $stmt->bindValue(2, $instituicao->getLogradouroInstituicao());
            $stmt->bindValue(3, $instituicao->getNumeroInstituicao());
            $stmt->bindValue(4, $instituicao->getCepInstituicao());
            $stmt->bindValue(5, $instituicao->getCompInstituicao());
            $stmt->bindValue(6, $instituicao->getBairroInstituicao());
            $stmt->bindValue(7, $instituicao->getCidadeInstituicao());
            $stmt->bindValue(8, $instituicao->getEstadoInstituicao());
            $stmt->bindValue(9, $instituicao->getPaisInstituicao());
            $stmt->bindValue(10, $instituicao->getEmailInstituicao());
            $stmt->bindValue(11, $instituicao->getDescInstituicao());
            $stmt->bindValue(12, $instituicao->getIdInstituicao());
            $stmt->execute();

        }

        public static function listar(){

            $conexao = Conexao::conectar();
            $querySelect = "SELECT codInstituicao, nomeInstituicao, emailInstituicao, cidadeInstituicao, estadoInstituicao, paisInstituicao FROM tbinstituicao";
            $resultado = $conexao->query($querySelect);
            $lista = $resultado->fetchAll();
            return $lista;  
        }
    }
?>