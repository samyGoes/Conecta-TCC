# Conecta, Um Portal Para Incentivar o Voluntariado
![image](https://github.com/user-attachments/assets/b3c8d07e-6296-4f37-a3ff-d2248798f687)

TCC (Trabalho de conclusão de curso) desenvolvido para o curso técnico de Desenvolvimento de Sistemas - ETEC de Guaianases.

## Sobre o sistema
A plataforma Conecta foi feita com o intuito de incentivar e informar sobre o voluntariado, como também facilitar a conexão entre instituições e voluntários.

## Funcionalidades
### Como visitante ou cadastrado você pode:
- Acessar a página inicial onde terão algumas informações e vagas;
- Visualizar os voluntários que escolheram manter seu perfil como público;
- Visualizar as instituições cadastradas;
- Visualizar as vagas cadastradas;
> É possível pesquisar pelos nomes dos três acima.
 
> Caso você entre com seu cadastro de voluntário a filtragem automática mostrará vagas de acordo com as causas adicionadas no seu perfil.
- Clicar na vaga para ver as informações completas;
- Acessar a página sobre nós;
- Ter acesso a um formulário para contato conosco (está estático);

### Como instituição você pode:
- Se cadastrar;
- Logar com seu CNPJ e senha;
- Cadastrar novas informações de perfil, como fotos e uma descrição;
- Editar/desativar seu perfil;
- Trocar senha;
- Cadastrar/editar/excluir vagas;
- Solicitar ao ADM novas habilidades e causas;
- Gerenciar vagas: é possível ver os voluntários que se candidataram as vagas, tendo como opções chamá-los, recusá-los ou entrar em contato via chat. Os voluntários recusados ficam em uma lista onde é possível retirar a recusa caso necessário. Também é possível ver quantas ocupações de cada vaga foram preenchidas e quais voluntários estão confirmados e avaliar os voluntários.

### Como voluntário você pode:
- Se cadastrar;
- Logar com seu CPF e senha;
- Cadastrar novas informações de perfil, como foto de perfil e uma descrição;
- Editar/desativar seu perfil;
- Trocar senha;
- Adicionar causas ao seu perfil;
- Se candidatar a uma vaga;
- Gerenciar candidaturas: é possível ver todas as vagas que você se candidatou, tendo como opções entrar em contato com a instituição via chat, avaliar a instituição e retirar a candidatura.

### Como administrador você pode:
- Logar com nome e senha (deixamos um fixo);
- Visualizar informações gerais na dashboard;
- Ver todos os voluntários, instituições e vagas cadastrados;
- Ver e cadastrar novas causas e habilidades e recusar ou aceitar as causas e habilidades solicitadas pelas instituições;
- Gerar PDF de qualquer listagem acima;

### Extras:
#### Cadastro 
- Validação de CPF;
- Validação de CNPJ;
- CEP automático;
- Confirmação de senha;
- Máscaras nos campos.

#### Login
Há apenas uma página de login que serve tanto para o voluntário como para a instituição se logar. A diferenciação é feita através do CPF e CNPJ;

#### Geral
- Notificações;
- "Esqueci a senha": é enviado um email com um código de confirmação para a troca da senha em caso de esquecimento;
- Avisos ao usuário como de cadastro realizado com sucesso e etc;

## Tecnologias
- HTML;
- CSS;
- JavaScript;
- PHP;
- SQL.

> [!NOTE]
> O site e o banco de dados não estão hospedados em nenhum servidor.

## Como testar?
- Simule um servidor local, caso queira baixe o [xampp](https://www.apachefriends.org/pt_br/index.html) (ele já contém o `apache` e `mysql`);
- Entre na pasta `xampp/htdocs/` pelo terminal e execute o comando para clonar o repositório:
~~~cmd
git clone https://github.com/samyGoes/Conecta-TCC.git
~~~
> Você precisa ter o [GIT](https://git-scm.com/downloads) instalado para executar o comando acima.

- Entre na pasta `xampp/mysql/bin/` e execute o comando no terminal para importar o banco:
~~~cmd
mysql -u root -p < "caminho-até-a-pasta/xampp/htdocs/Conecta-TCC/bdconecta.sql"
~~~
- Acesse `localhost/Conecta-TCC/` no navegador :)
