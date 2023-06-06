<?php
    require_once "global.php";

    class AdmDao
    {
        public static function notificacoes()
        {            
            $conexao = Conexao::conectar();

            // NOTIFICAÇÃO NOVOS VOLUNTÁRIOS
            $querySelect = $conexao->prepare("SELECT codVoluntario FROM tbVoluntario");
            $querySelect->execute();
            $listaVoluntario = $querySelect->fetchAll();


            // NOTIFICAÇÃO NOVAS INSTITUIÇÕES
            $querySelect2 = $conexao->prepare("SELECT codInstituicao FROM tbInstituicao");
            $querySelect2->execute();
            $listaInstituicao = $querySelect2->fetchAll();


            // NOTIFICAÇÃO NOVAS SOLICITAÇÕES DE CAUSAS
            $querySelect3 = $conexao->prepare("SELECT statusSolicitacao FROM tbSolicitacaoCategoria WHERE statusSolicitacao = 'pendente'");
            $querySelect3->execute();
            $listaSolicitacaoCausa = $querySelect3->fetchAll();      
            
            // NOTIFICAÇÃO NOVAS SOLICITAÇÕES DE CAUSAS
            $querySelect4 = $conexao->prepare("SELECT statusSolicitacao FROM tbSolicitacaoHabilidade WHERE statusSolicitacao = 'pendente'");
            $querySelect4->execute();
            $listaSolicitacaoHabili = $querySelect4->fetchAll();   

            // VARIÁVEIS E ARRAYS
            $cadastroVo = 0;
            $cadastroIn = 0;
            $solicitacaoCausa = 0;
            $solicitacaoHabilidade = 0;
            $mensagens = [];

            $mensagemCadastroVo = array
            (
                "Novo cadastro" . '<span class="box-icone-notificacao"><i id="icone-notificacao-nova" class="fa-solid fa-plus"></i></span>' => "Um novo voluntário se cadastrou no sistema.",
                'arquivo' => 'voluntarios-cadastrados.php'
            );
            $mensagemCadastroIn = array
            (
                "Novo cadastro" . '<span class="box-icone-notificacao"><i id="icone-notificacao-nova" class="fa-solid fa-plus"></i></span>' => "Uma nova instituição se cadastrou no sistema.",
                'arquivo' => 'instituicoes-cadastradas.php'
            );
            $mensagemSolicitacaoCausa = array
            (
                "Nova Solicitação" . '<span class="box-icone-notificacao"><i id="icone-notificacao-nova" class="fa-solid fa-plus"></i></span>' => "Uma nova solicitação de causa foi feita.",
                'arquivo' => 'tabela-solicitacao-causas.php'
            );
            $mensagemSolicitacaoHabili = array
            (
                "Nova Solicitação" . '<span class="box-icone-notificacao"><i id="icone-notificacao-nova" class="fa-solid fa-plus"></i></span>' => "Uma nova solicitação de habilidade foi feita.",
                'arquivo' => 'tabela-solicitacao-habilidade.php'
            );



            // ADICIONANDO A QUANTIDADE DE MENSAGENS EM VARIÁVEIS 
            if(!empty($listaVoluntario))
            {
                $cadastroVo++;
            }
            if(!empty($listaInstituicao))
            {
                $cadastroIn++;
            }
            if(!empty($listaSolicitacaoCausa))
            {
                $solicitacaoCausa++;
            }
            if(!empty($listaSolicitacaoHabili))
            {
                $solicitacaoHabilidade++;
            }

            // VERIFICANDO QUAIS NOTIFICAÇÕES TEM E RETORNANDO ELAS
            if($cadastroVo >= 1)
            {
                for($i = 0; $i < $cadastroVo; $i++)
                {
                    $mensagens[] = $mensagemCadastroVo;
                }
            }
            if($cadastroIn >= 1)
            {
                for($i = 0; $i < $cadastroIn; $i++)
                {
                    $mensagens[] = $mensagemCadastroIn;
                }
            }
            if($solicitacaoCausa >= 1)
            {
                for($i = 0; $i < $solicitacaoCausa; $i++)
                {
                    $mensagens[] = $mensagemSolicitacaoCausa;
                }
            }
            if($solicitacaoHabilidade >= 1)
            {
                for($i = 0; $i < $solicitacaoHabilidade; $i++)
                {
                    $mensagens[] = $mensagemSolicitacaoHabili;
                }
            }

            if(!empty($mensagens))
            {
                return $mensagens;
            }
            else
            {
                return array();
            }
        }
    }

?>