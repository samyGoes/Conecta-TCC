-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 20-Jun-2023 às 22:36
-- Versão do servidor: 10.4.22-MariaDB
-- versão do PHP: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `bdconecta`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbadm`
--

CREATE TABLE `tbadm` (
  `codAdm` int(11) NOT NULL,
  `nomeAdm` varchar(50) NOT NULL,
  `loginAdm` varchar(40) NOT NULL,
  `senhaAdm` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbavaliacao`
--

CREATE TABLE `tbavaliacao` (
  `codAvaliacao` int(11) NOT NULL,
  `codVoluntario` int(11) DEFAULT NULL,
  `codInstituicao` int(11) DEFAULT NULL,
  `numAvaliacao` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbcandidatura`
--

CREATE TABLE `tbcandidatura` (
  `codCandidatura` int(11) NOT NULL,
  `codVoluntario` int(11) NOT NULL,
  `codServico` int(11) NOT NULL,
  `statusCandidatura` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `tbcandidatura`
--

INSERT INTO `tbcandidatura` (`codCandidatura`, `codVoluntario`, `codServico`, `statusCandidatura`) VALUES
(1, 4, 26, 'pendente'),
(4, 11, 26, 'pendente'),
(6, 19, 30, 'recusado'),
(7, 19, 28, 'pendente'),
(8, 19, 33, 'aceito');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbcategoriaservico`
--

CREATE TABLE `tbcategoriaservico` (
  `codCategoriaServico` int(11) NOT NULL,
  `nomeCategoria` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `tbcategoriaservico`
--

INSERT INTO `tbcategoriaservico` (`codCategoriaServico`, `nomeCategoria`) VALUES
(14, 'Crianças'),
(15, 'Adolescentes'),
(18, 'moradores de rua'),
(20, 'deficientes'),
(21, 'meio ambiente'),
(22, 'Idosos'),
(23, 'Animais '),
(24, 'Mulheres');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbcausavaga`
--

CREATE TABLE `tbcausavaga` (
  `codCausaVaga` int(11) NOT NULL,
  `codServico` int(11) NOT NULL,
  `codCategoriaServico` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `tbcausavaga`
--

INSERT INTO `tbcausavaga` (`codCausaVaga`, `codServico`, `codCategoriaServico`) VALUES
(23, 30, 14),
(24, 30, 21),
(25, 31, 15),
(26, 31, 24),
(27, 32, 18),
(28, 26, 14),
(29, 26, 15),
(30, 28, 21),
(31, 29, 14),
(32, 33, 21),
(33, 33, 23);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbcausavoluntario`
--

CREATE TABLE `tbcausavoluntario` (
  `codCausaVoluntario` int(11) NOT NULL,
  `codCategoriaServico` int(11) DEFAULT NULL,
  `codVoluntario` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `tbcausavoluntario`
--

INSERT INTO `tbcausavoluntario` (`codCausaVoluntario`, `codCategoriaServico`, `codVoluntario`) VALUES
(8, 14, 4),
(9, 15, 4),
(10, 18, 10),
(11, 21, 10),
(13, 14, 11),
(14, 21, 11),
(15, 22, 14),
(16, 23, 14),
(17, 14, 15),
(18, 15, 15),
(19, 22, 15),
(27, 18, 12),
(28, 20, 12),
(29, 21, 12),
(30, 22, 12),
(31, 23, 12),
(32, 15, 16),
(33, 21, 16),
(34, 22, 16),
(35, 23, 16),
(36, 14, 17),
(37, 15, 17),
(38, 14, 18),
(39, 15, 18),
(40, 21, 18),
(41, 23, 18),
(42, 21, 19),
(43, 23, 19),
(44, 21, 20),
(45, 23, 20),
(46, 21, 21),
(47, 23, 21),
(48, 24, 21);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbfoneinstituicao`
--

CREATE TABLE `tbfoneinstituicao` (
  `codFoneInstituicao` int(11) NOT NULL,
  `numFoneInstituicao` varchar(15) NOT NULL,
  `numSeqFone` int(20) NOT NULL,
  `codInstituicao` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tbfoneinstituicao`
--

INSERT INTO `tbfoneinstituicao` (`codFoneInstituicao`, `numFoneInstituicao`, `numSeqFone`, `codInstituicao`) VALUES
(17, '(11) 97701-3618', 1, 10),
(18, '(11) 95205-9562', 2, 10),
(19, '(11) 95380-5993', 1, 11),
(20, '', 2, 11),
(21, '(11) 92584-5682', 1, 12),
(22, '', 2, 12),
(23, '(67) 98378-4340', 1, 13),
(24, '', 2, 13);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbfonevoluntario`
--

CREATE TABLE `tbfonevoluntario` (
  `codFoneVoluntario` int(11) NOT NULL,
  `numFoneVoluntario` varchar(15) NOT NULL,
  `numSeqFone` int(20) NOT NULL,
  `codVoluntario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tbfonevoluntario`
--

INSERT INTO `tbfonevoluntario` (`codFoneVoluntario`, `numFoneVoluntario`, `numSeqFone`, `codVoluntario`) VALUES
(7, '(11)96587-4333', 1, 4),
(8, '(11)2016-8242', 2, 4),
(9, '(11) 95991-1849', 1, 5),
(10, '', 2, 5),
(11, '(11) 5698-2355', 1, 6),
(12, '', 2, 6),
(13, '(11) 95991-1849', 1, 7),
(14, '', 2, 7),
(15, '(11) 5698-2355', 1, 8),
(16, '', 2, 8),
(17, '(11) 5698-2355', 1, 9),
(18, '', 2, 9),
(19, '', 1, 10),
(20, '(11) 95991-1849', 2, 10),
(21, '(11) 97701-3618', 1, 11),
(22, '', 2, 11),
(23, '', 1, 12),
(24, '(11) 95897-0126', 2, 12),
(25, '(11) 94516-1148', 1, 13),
(26, '', 2, 13),
(27, '(11) 94516-1148', 1, 14),
(28, '', 2, 14),
(29, '(11) 95205-9562', 1, 15),
(30, '', 2, 15),
(31, '(11) 92587-3410', 1, 16),
(32, '', 2, 16),
(33, '(11) 96787-4406', 1, 17),
(34, '', 2, 17),
(35, '(11) 95380-5992', 1, 18),
(36, '', 2, 18),
(37, '(11) 94112-8777', 1, 19),
(38, '', 2, 19),
(39, '(11) 98809-2216', 1, 20),
(40, '', 2, 20),
(41, '(11) 91668-9423', 1, 21),
(42, '(11) 94251-0470', 2, 21);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbfotosinstituicao`
--

CREATE TABLE `tbfotosinstituicao` (
  `codfotoInstituicao` int(11) NOT NULL,
  `fotosInstituicao` varchar(200) NOT NULL,
  `codInstituicao` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tbfotosinstituicao`
--

INSERT INTO `tbfotosinstituicao` (`codfotoInstituicao`, `fotosInstituicao`, `codInstituicao`) VALUES
(1, 'galeria-instituicao/647e1708e3758.png', 10),
(2, 'galeria-instituicao/647e1dad28e23.png', 10),
(3, 'galeria-instituicao/647e1e934e551.jpg', 10),
(4, 'galeria-instituicao/647e1e99d5308.jpg', 10),
(5, 'galeria-instituicao/647e1f447d26c.jpg', 10);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbhabilidadeservico`
--

CREATE TABLE `tbhabilidadeservico` (
  `codHabilidadeServico` int(11) NOT NULL,
  `nomeHabilidadeServico` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `tbhabilidadeservico`
--

INSERT INTO `tbhabilidadeservico` (`codHabilidadeServico`, `nomeHabilidadeServico`) VALUES
(3, 'Inglês'),
(4, 'Cozinhar'),
(5, 'Francês'),
(6, 'Comunicabilidade'),
(7, 'Dirigir'),
(8, 'Agricultura'),
(9, 'Conhecimento sobre animais'),
(10, 'Primeiros socorros'),
(11, 'Conhecimentos de legislação e regulamentações');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbhabivaga`
--

CREATE TABLE `tbhabivaga` (
  `codHabiVaga` int(11) NOT NULL,
  `codServico` int(11) DEFAULT NULL,
  `codHabilidadeServico` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `tbhabivaga`
--

INSERT INTO `tbhabivaga` (`codHabiVaga`, `codServico`, `codHabilidadeServico`) VALUES
(12, 30, 8),
(13, 31, 6),
(14, 31, 7),
(15, 32, 6),
(16, 32, 7),
(17, 26, 3),
(18, 26, 6),
(19, 28, 8),
(20, 29, 3),
(21, 29, 6),
(22, 33, 9),
(23, 33, 10);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbinstituicao`
--

CREATE TABLE `tbinstituicao` (
  `codInstituicao` int(11) NOT NULL,
  `nomeInstituicao` varchar(100) NOT NULL,
  `logInstituicao` varchar(50) NOT NULL,
  `numLogInstituicao` varchar(10) NOT NULL,
  `cepInstituicao` char(9) NOT NULL,
  `compInstituicao` varchar(50) NOT NULL,
  `bairroInstituicao` varchar(40) NOT NULL,
  `cidadeInstituicao` varchar(30) NOT NULL,
  `estadoInstituicao` varchar(100) NOT NULL,
  `paisInstituicao` varchar(100) NOT NULL,
  `emailInstituicao` varchar(30) NOT NULL,
  `cnpjInstituicao` char(18) NOT NULL,
  `senhaInstituicao` varchar(10) NOT NULL,
  `descInstituicao` varchar(400) NOT NULL,
  `fotoInstituicao` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tbinstituicao`
--

INSERT INTO `tbinstituicao` (`codInstituicao`, `nomeInstituicao`, `logInstituicao`, `numLogInstituicao`, `cepInstituicao`, `compInstituicao`, `bairroInstituicao`, `cidadeInstituicao`, `estadoInstituicao`, `paisInstituicao`, `emailInstituicao`, `cnpjInstituicao`, `senhaInstituicao`, `descInstituicao`, `fotoInstituicao`) VALUES
(10, 'Ong Raio de sol', 'Estrada Manuel de Oliveira Ramos ', '282', '08473-050', 'casa', 'Conjunto Habitacional Sitio Conceição', 'São Paulo', 'São Paulo', 'Brasil', 'OngRaioSol@gmail.com', '78.806.858/0001-35', 'Ongraio1@', 'somos uma ong em apoio às crianças em estado de vulnerabilidade nas periferias de São Paulo', 'img-instituicao/10.jpg'),
(11, 'Ong FLor Azul', 'Rua Manuel Félix de Lima', '300', '08191-290', '', 'Jardim Romano', 'São Paulo', 'SP', 'Brasil', 'ongflorazul@gmail.com', '82.479.237/0001-61', 'OngAzul1@', 'A ONG Flor Azul é um movimento voluntário sem vínculos partidários, dedicado ao combate ao coronavírus no Estado de São Paulo. Nosso objetivo é oferecer suporte e assistência às comunidades afetadas pela pandemia, por meio de arrecadação de fundos, doações de suprimentos médicos e alimentos, conscientização e apoio emocional. A organização busca parcerias estratégicas e valoriza a transparência na', 'img-instituicao/11.jpg'),
(12, 'Ong Amor em Movimento', 'Avenida Tomás Lopes de Camargo', '123', '08191-230', 'casa', 'Jardim Romano', 'São Paulo', 'SP', 'Brasil', 'OngAmorEmMovimento@gmail.com', '70.089.965/0001-88', 'OngAmor1@', '\"Promover através de Ações e Gestos o desenvolvimento da comunidade local, contribuindo para o fortalecimento dos vínculos familiares e sociais.\"', 'img-instituicao/12.png'),
(13, 'Ong Decolar', 'Servidão do Passarinho', '666', '88066-552', 'casa', 'Armação do Pântano do Sul', 'Florianópolis', 'SC', 'Brasil', 'ongdecolar@gmail.com', '64.309.992/0001-16', 'Decolar1@', 'Somos uma ONG que busca trabalhar com as periferias.', 'img-instituicao/13.png');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbservico`
--

CREATE TABLE `tbservico` (
  `codServico` int(11) NOT NULL,
  `horarioServico` time NOT NULL,
  `periodoServico` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `codInstituicao` int(11) NOT NULL,
  `descServico` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `cepLocalServico` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bairroLocalServico` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `estadoLocalServico` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `logradouroLocalServico` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `complementoLocalServico` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `paisLocalServico` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `numeroLocalServico` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cidadeLocalServico` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nomeservico` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tipoServico` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dataInicioServico` date NOT NULL,
  `qntdVagaServico` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `tbservico`
--

INSERT INTO `tbservico` (`codServico`, `horarioServico`, `periodoServico`, `codInstituicao`, `descServico`, `cepLocalServico`, `bairroLocalServico`, `estadoLocalServico`, `logradouroLocalServico`, `complementoLocalServico`, `paisLocalServico`, `numeroLocalServico`, `cidadeLocalServico`, `nomeservico`, `tipoServico`, `dataInicioServico`, `qntdVagaServico`) VALUES
(26, '08:00:00', 'nortuno', 10, 'Precisamos de professores de inglês que estão dispostos a ensinar crianças e adolescentes o básico para que possam se sair bem em exames.  \r\n', '08461-200', 'Cidade Popular', 'SP', 'Rua Paulo Ramos', 'casa', 'Brasil', '60', 'São Paulo', 'Professor de Inglês', 'Presencial', '2023-05-10', 3),
(28, '08:00:00', 'matutino', 10, 'Precisamos de jardineiros para cuidar do nosso espaço para que fique mais aconchegante e bonito.\r\n', '08460-635', 'Jardim do Divino', 'SP', 'Travessa João Batista Cramer', 'Casa', 'Brasil', '60', 'São Paulo', 'Jardineiro(a)', 'Presencial', '2023-06-05', 5),
(29, '15:00:00', 'vespertino', 10, 'Precisamos de professores que ensinem matemática e português básicos para nossas crianças que precisam de recuperação.', '08191-260', 'Jardim Romano', 'SP', 'Rua André Furtado de Mendonça', 'Casa', 'Brasil', '800', 'São Paulo', 'Professor de ensino basico ', 'híbrido', '2023-06-05', 3),
(30, '09:00:00', 'matutino', 11, 'Queremos pessoas que acompanhe crianças de um orfanato para ir em um campo plantar árvores e sementes. Procuramos pessoas que tenham um pouco de noção em jardinagem para auxilia-las.', '03337-000', 'Jardim Anália Franco', 'SP', 'Rua Eleonora Cintra', '', 'Brasil', '1065', 'São Paulo', 'Acompanhante e educador ambiental', 'presencial', '2023-06-26', 15),
(31, '10:00:00', 'matutino', 11, 'Procuramos pessoas que possam acompanhar vitimas de um acidentes na zona sul ao psicólogo, ofertando-as carinho e ombro na viagem.', '08120-500', 'Jardim Camargo Novo', 'SP', 'Rua Tristão Achaval', '', 'Brasil', '2', 'São Paulo', 'Orientadora e ouvinte', 'presencial', '2004-09-10', 18),
(32, '18:00:00', 'nortuno', 11, 'Procuramos pessoas que queiram entregar marmitas para pessoas em situação de rua em um projeto que temos na Vila Itaim.', '08110-780', 'Vila Itaim', 'SP', 'Rua Cachoeira Escaramuça', '', 'Brasil', '4', 'São Paulo', 'Entregador de marmitas', 'presencial', '2023-09-23', 25),
(33, '00:00:00', 'matutino', 11, 'Precisamos de voluntários para auxiliar no resgate de animais em situações de emergência, ', '08240-590', 'Vila Progresso (Zona Leste)', 'SP', 'Avenida Moisés Maimônides', '', 'Brasil', '1065', 'São Paulo', 'Resgatador de animais', 'presencial', '1970-01-01', 15);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbsolicitacaocategoria`
--

CREATE TABLE `tbsolicitacaocategoria` (
  `codSolicitacaoCategoria` int(11) NOT NULL,
  `codInstituicao` int(11) NOT NULL,
  `nomeCategoria` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `statusSolicitacao` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `tbsolicitacaocategoria`
--

INSERT INTO `tbsolicitacaocategoria` (`codSolicitacaoCategoria`, `codInstituicao`, `nomeCategoria`, `statusSolicitacao`) VALUES
(4, 10, 'Idosos', 'aceito'),
(5, 10, 'Animais ', 'aceito');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbsolicitacaohabilidade`
--

CREATE TABLE `tbsolicitacaohabilidade` (
  `codSolicitacaoHabilidade` int(11) NOT NULL,
  `codInstituicao` int(11) NOT NULL,
  `nomeHabilidade` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `statusSolicitacao` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbvoluntario`
--

CREATE TABLE `tbvoluntario` (
  `codVoluntario` int(11) NOT NULL,
  `nomeVoluntario` varchar(50) NOT NULL,
  `dataNascVoluntario` date NOT NULL,
  `cpfVoluntario` char(14) NOT NULL,
  `logVoluntario` varchar(60) NOT NULL,
  `numLogVoluntario` varchar(10) NOT NULL,
  `cepVoluntario` char(8) NOT NULL,
  `compVoluntario` varchar(60) NOT NULL,
  `bairroVoluntario` varchar(60) NOT NULL,
  `cidadeVoluntario` varchar(50) NOT NULL,
  `estadoVoluntario` varchar(100) NOT NULL,
  `paisVoluntario` varchar(100) NOT NULL,
  `emailVoluntario` varchar(50) NOT NULL,
  `senhaVoluntario` varchar(15) NOT NULL,
  `descVoluntario` varchar(400) NOT NULL,
  `fotoVoluntario` varchar(50) NOT NULL,
  `visibilidadeVoluntario` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tbvoluntario`
--

INSERT INTO `tbvoluntario` (`codVoluntario`, `nomeVoluntario`, `dataNascVoluntario`, `cpfVoluntario`, `logVoluntario`, `numLogVoluntario`, `cepVoluntario`, `compVoluntario`, `bairroVoluntario`, `cidadeVoluntario`, `estadoVoluntario`, `paisVoluntario`, `emailVoluntario`, `senhaVoluntario`, `descVoluntario`, `fotoVoluntario`, `visibilidadeVoluntario`) VALUES
(4, 'Fernanda de Souza Bezerra', '2005-07-27', '548.599.388-52', 'Travessa JoÃ£o Batista Cramer', '03', '08460-63', 'casa', 'Jardim do Divino', 'SÃ£o Paulo', 'SP', 'Brasil', 'bezerrafernanda223@gmail.com', 'Fernanda@1', 'Tenho 17 anos e creio que por meio do trabalho voluntário podemos melhorar o mundo, nem que seja com pequenos gestos, normalmente trabalho com instituições que apoiam crianças e adolescentes ', 'img-voluntario/4.png', 'on'),
(10, 'Gabriella Ferreira Alves', '2005-05-22', '503.807.788-90', 'Rua Paulo Ramos', '48', '08461-20', 'Casa', 'Cidade Popular', 'São Paulo', 'SP', 'Brasil', 'ferreiraalvesg2@outlook.com', 'gabiGabi2@', 'Quero ser uma voluntária!', 'img-voluntario/10jpeg', 'on'),
(11, 'Marcos Eric de Medeiros', '2004-07-02', '481.230.448-28', 'Avenida Tomás Lopes de Camargo', '800', '08191-23', 'Casa', 'Jardim Romano', 'São Paulo', 'SP', 'Brasil', 'srmarcoserick1@gmail.com', '02072004mM.', 'Amo cuidar de animais e gostaria de poder demonstrar esse sentimento que eu tenho por animais.', 'img-voluntario/11.jpg', 'on'),
(12, 'Kauã Ferreira da Silva', '2004-09-09', '388.178.558-20', 'Travessa Michel Lambert', '34', '08473-55', 'casa 2', 'Conjunto Habitacional Barro Branco II', 'São Paulo', 'SP', 'Brasil', 'kauasimone.1@gmail.com', 'Kauas2simone!', 'estou disposto a aceitar qualquer tipo de trabalho voluntário que se encaixe com meu perfil.', 'img-voluntario/12.png', 'on'),
(14, 'Ryan Gustavo Santos de Jesus', '2005-08-26', '528.342.778-18', 'Rua. Cachoeira Escaramuça', '719', '08110-78', 'Casa 2', 'Vila Itaim', 'São Paulo', 'SP', 'Brasil', 'ryangustavo23@gmail.com', 'Ryanzin@26', 'Olá, meu nome é Ryan.\r\nTenho 17 anos.\r\nAceito trabalhar como voluntário em áreas que se adequam o meu perfil.', 'img-voluntario/14.jpg', 'on'),
(15, 'Sandra Regina de Souza', '1983-06-26', '316.469.188-27', 'Avenida Tomás Lopes de Camargo', '800', '08191-23', 'casa', 'Jardim Romano', 'São Paulo', 'SP', 'Brasil', 'sandrargnsz@gmail.com', '10022713Sr', 'Sou professora e gosto muito de ajudar crianças', 'img-voluntario/15.jpg', 'on'),
(16, 'Fabio Medeiros da Silva', '1981-04-27', '293.822.098-75', 'Avenida Tomás Lopes de Camargo', '800', '08191-23', 'Casa', 'Jardim Romano', 'São Paulo', 'SP', 'Brasil', 'fabiomedeiross02@gmail.com', '10022713Sr', 'Amo animais', 'img-voluntario/16.jpg', 'on'),
(17, 'Maria José de Jesus Ferreira', '1945-09-11', '602.802.030-39', 'Rua Paulo Ramos', '48', '08461-20', 'Casa 1', 'Cidade Popular', 'São Paulo', 'SP', 'Brasil', 'mariaj@gmail.com', 'mariaJ1', 'Sou idosa mas sou dura na queda !\r\nQuero fazer bolinhos para as crianças.', 'img-voluntario/17jpeg', 'on'),
(18, 'Simone da Silva Ribeiro', '1983-04-13', '322.868.858-50', '', '34', '08473-55', 'casa 2', 'Conjunto Habitacional Barro Branco II', 'São Paulo', '', 'Brasil', 'simone@gmail.com', 'Simone1@', 'amo cozinha e gostaria de se voluntáriar nessa área', 'img-voluntario/18jpeg', 'on'),
(19, 'Joao Henrique Porfirio Santos', '2002-05-09', '429.745.318-57', 'Avenida Teodoro Bernardo do Nascimento', '1022', '08150-00', '', 'Jardim Robru', 'São Paulo', 'SP', 'Brasil', 'henrique@lindo.com', 'Joao123!', 'Eu sou um voluntário dedicado e apaixonado por animais e meio ambiente. Me envolvo em projetos de resgate e reabilitação de animais feridos, além de participar de atividades de conservação ambiental, como a limpeza de áreas naturais e o plantio de árvores. Também trabalho para conscientizar as pessoas sobre a importância da sustentabilidade e incentivar práticas ecológicas. Sou comprometido em pro', 'img/user.png', 'on'),
(20, 'Seann Rocha Barroso', '1996-08-03', '119.600.726-84', 'Av. Moisés maimônides ', '318', '08240-59', 'Em frente o ponto de ónibus 2731-10', 'Vila Progresso (Zona Leste)', 'São Paulo', 'SP', 'Brasil', 'seann120@gmail.com', 'screamolife7SCR', 'Quero ajudar animais com cuidados de saúde e alimentação e também oferecer terapia para que possam ter menos stress no dia a dia, disponível aos finais de semana por 3 horas seguidas, e também ajudar nas causas do meio ambiente. ', 'img/user.png', 'on'),
(21, 'Ana Beatriz Silva Oliveira', '2002-04-20', '506.099.068-01', 'Rua Gato Cinzento', '20', '08615-07', 'bloco 03 apto 302', 'Vila Urupês', 'Suzano', 'SP', 'Brasil', 'anabeatrizsilva.imp@gmail.com', '17144N4.', 'Quero ajudar a tornar o mundo um lugar melhor.', 'img/user.png', 'off');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `tbadm`
--
ALTER TABLE `tbadm`
  ADD PRIMARY KEY (`codAdm`);

--
-- Índices para tabela `tbavaliacao`
--
ALTER TABLE `tbavaliacao`
  ADD PRIMARY KEY (`codAvaliacao`),
  ADD KEY `fk_AvaliacaoVoluntario` (`codVoluntario`),
  ADD KEY `fk_AvaliacaoInstituicao` (`codInstituicao`);

--
-- Índices para tabela `tbcandidatura`
--
ALTER TABLE `tbcandidatura`
  ADD PRIMARY KEY (`codCandidatura`),
  ADD KEY `fk_vaga` (`codServico`),
  ADD KEY `fk_ajudante` (`codVoluntario`);

--
-- Índices para tabela `tbcategoriaservico`
--
ALTER TABLE `tbcategoriaservico`
  ADD PRIMARY KEY (`codCategoriaServico`);

--
-- Índices para tabela `tbcausavaga`
--
ALTER TABLE `tbcausavaga`
  ADD PRIMARY KEY (`codCausaVaga`),
  ADD KEY `fk_CausaVaga` (`codCategoriaServico`),
  ADD KEY `fk_ServicoVaga` (`codServico`);

--
-- Índices para tabela `tbcausavoluntario`
--
ALTER TABLE `tbcausavoluntario`
  ADD PRIMARY KEY (`codCausaVoluntario`),
  ADD KEY `fk_codVoluntario` (`codVoluntario`),
  ADD KEY `fk_codCategoria` (`codCategoriaServico`);

--
-- Índices para tabela `tbfoneinstituicao`
--
ALTER TABLE `tbfoneinstituicao`
  ADD PRIMARY KEY (`codFoneInstituicao`),
  ADD KEY `codInstituicao` (`codInstituicao`);

--
-- Índices para tabela `tbfonevoluntario`
--
ALTER TABLE `tbfonevoluntario`
  ADD PRIMARY KEY (`codFoneVoluntario`),
  ADD KEY `codVoluntario` (`codVoluntario`);

--
-- Índices para tabela `tbfotosinstituicao`
--
ALTER TABLE `tbfotosinstituicao`
  ADD PRIMARY KEY (`codfotoInstituicao`),
  ADD KEY `codInstituicao` (`codInstituicao`);

--
-- Índices para tabela `tbhabilidadeservico`
--
ALTER TABLE `tbhabilidadeservico`
  ADD PRIMARY KEY (`codHabilidadeServico`);

--
-- Índices para tabela `tbhabivaga`
--
ALTER TABLE `tbhabivaga`
  ADD PRIMARY KEY (`codHabiVaga`),
  ADD KEY `fk_habiVagaServ` (`codHabilidadeServico`),
  ADD KEY `fk_serv` (`codServico`);

--
-- Índices para tabela `tbinstituicao`
--
ALTER TABLE `tbinstituicao`
  ADD PRIMARY KEY (`codInstituicao`);

--
-- Índices para tabela `tbservico`
--
ALTER TABLE `tbservico`
  ADD PRIMARY KEY (`codServico`),
  ADD KEY `fk_Instituicao` (`codInstituicao`);

--
-- Índices para tabela `tbsolicitacaocategoria`
--
ALTER TABLE `tbsolicitacaocategoria`
  ADD PRIMARY KEY (`codSolicitacaoCategoria`),
  ADD KEY `fk_SolicitacaoCategoria` (`codInstituicao`);

--
-- Índices para tabela `tbsolicitacaohabilidade`
--
ALTER TABLE `tbsolicitacaohabilidade`
  ADD PRIMARY KEY (`codSolicitacaoHabilidade`),
  ADD KEY `fk_SolicitacaoHabilidade` (`codInstituicao`);

--
-- Índices para tabela `tbvoluntario`
--
ALTER TABLE `tbvoluntario`
  ADD PRIMARY KEY (`codVoluntario`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `tbadm`
--
ALTER TABLE `tbadm`
  MODIFY `codAdm` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tbavaliacao`
--
ALTER TABLE `tbavaliacao`
  MODIFY `codAvaliacao` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tbcandidatura`
--
ALTER TABLE `tbcandidatura`
  MODIFY `codCandidatura` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de tabela `tbcategoriaservico`
--
ALTER TABLE `tbcategoriaservico`
  MODIFY `codCategoriaServico` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT de tabela `tbcausavaga`
--
ALTER TABLE `tbcausavaga`
  MODIFY `codCausaVaga` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT de tabela `tbcausavoluntario`
--
ALTER TABLE `tbcausavoluntario`
  MODIFY `codCausaVoluntario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT de tabela `tbfoneinstituicao`
--
ALTER TABLE `tbfoneinstituicao`
  MODIFY `codFoneInstituicao` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT de tabela `tbfonevoluntario`
--
ALTER TABLE `tbfonevoluntario`
  MODIFY `codFoneVoluntario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT de tabela `tbfotosinstituicao`
--
ALTER TABLE `tbfotosinstituicao`
  MODIFY `codfotoInstituicao` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `tbhabilidadeservico`
--
ALTER TABLE `tbhabilidadeservico`
  MODIFY `codHabilidadeServico` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de tabela `tbhabivaga`
--
ALTER TABLE `tbhabivaga`
  MODIFY `codHabiVaga` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de tabela `tbinstituicao`
--
ALTER TABLE `tbinstituicao`
  MODIFY `codInstituicao` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de tabela `tbservico`
--
ALTER TABLE `tbservico`
  MODIFY `codServico` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT de tabela `tbsolicitacaocategoria`
--
ALTER TABLE `tbsolicitacaocategoria`
  MODIFY `codSolicitacaoCategoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `tbsolicitacaohabilidade`
--
ALTER TABLE `tbsolicitacaohabilidade`
  MODIFY `codSolicitacaoHabilidade` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `tbvoluntario`
--
ALTER TABLE `tbvoluntario`
  MODIFY `codVoluntario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `tbavaliacao`
--
ALTER TABLE `tbavaliacao`
  ADD CONSTRAINT `fk_AvaliacaoInstituicao` FOREIGN KEY (`codInstituicao`) REFERENCES `tbinstituicao` (`codInstituicao`),
  ADD CONSTRAINT `fk_AvaliacaoVoluntario` FOREIGN KEY (`codVoluntario`) REFERENCES `tbvoluntario` (`codVoluntario`);

--
-- Limitadores para a tabela `tbcandidatura`
--
ALTER TABLE `tbcandidatura`
  ADD CONSTRAINT `fk_ajudante` FOREIGN KEY (`codVoluntario`) REFERENCES `tbvoluntario` (`codVoluntario`),
  ADD CONSTRAINT `fk_vaga` FOREIGN KEY (`codServico`) REFERENCES `tbservico` (`codServico`);

--
-- Limitadores para a tabela `tbcausavaga`
--
ALTER TABLE `tbcausavaga`
  ADD CONSTRAINT `fk_CausaVaga` FOREIGN KEY (`codCategoriaServico`) REFERENCES `tbcategoriaservico` (`codCategoriaServico`),
  ADD CONSTRAINT `fk_ServicoVaga` FOREIGN KEY (`codServico`) REFERENCES `tbservico` (`codServico`);

--
-- Limitadores para a tabela `tbsolicitacaocategoria`
--
ALTER TABLE `tbsolicitacaocategoria`
  ADD CONSTRAINT `fk_SolicitacaoCategoria` FOREIGN KEY (`codInstituicao`) REFERENCES `tbinstituicao` (`codInstituicao`);

--
-- Limitadores para a tabela `tbsolicitacaohabilidade`
--
ALTER TABLE `tbsolicitacaohabilidade`
  ADD CONSTRAINT `fk_SolicitacaoHabilidade` FOREIGN KEY (`codInstituicao`) REFERENCES `tbinstituicao` (`codInstituicao`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
